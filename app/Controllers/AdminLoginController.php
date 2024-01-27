<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();

        $admin = $adminModel->getAdminByEmail($email);

        if ($admin && $password == $admin['password']) {
            $adminData = [
                'email' => $admin['email'],
                'first_name' => $admin['first_name'],
                'last_name' => $admin['last_name']
            ];

            $session = session();
            $session->set('admin', $adminData);

            return redirect()->to('admin/admin_dashboard');
        } else {
            return redirect()->to('admin-login')->with('error', 'Invalid email or password');
        }
    }

    public function changePass()
    {
        return view('admin/change_password');
    }

    public function changePassword()
    {
        $model = new AdminModel();
        $session = session();
        $adminEmail = $session->get('admin')['email'];

        if ($this->request->getMethod() === 'post') {
            $currentPassword = $this->request->getPost('current_password');
            $newPassword = $this->request->getPost('new_password');
            $confirmPassword = $this->request->getPost('confirm_password');

            if ($newPassword !== $confirmPassword) {
                return redirect()->back()->with('error', 'New password and confirm password do not match');
            }

            if (!$model->verifyPassword($adminEmail, $currentPassword)) {
                return redirect()->back()->with('error', 'Current password is incorrect');
            }

            $model->changePassword($adminEmail, $newPassword);

            return redirect()->to(base_url('admin/editAdmin'))->with('success', 'Password changed successfully');
        }

        return view('admin/change_password');
    }

    public function logout()
    {
        $session = session();
        $session->remove('admin');

        return redirect()->to('admin-login');
    }
}