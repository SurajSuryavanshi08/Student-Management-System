<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class StudentLoginController extends Controller
{
    public function index()
    {
        return view('student/login');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = new StudentModel();
        $student = $model->getStudentByEmail($email);

        if ($student && $password == $student['password']) {
            $studentData = [
                'email' => $student['email'],
                'first_name' => $student['first_name'],
                'last_name' => $student['last_name'],
                'gender' => $student['gender'],
                'address' => $student['address'],
                'profile_photo' => $student['profile_photo']
            ];

            $session = session();
            $session->set('student', $studentData);

            return redirect()->to('student/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }


    public function changePassword($email)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->getStudentByEmail($email);

        if ($this->request->getMethod() === 'post') {
            $currentPassword = $this->request->getPost('current_password');
            $newPassword = $this->request->getPost('new_password');
            $confirmPassword = $this->request->getPost('confirm_password');

            if ($currentPassword === $student['password']) {
                if ($newPassword === $confirmPassword) {
                    $studentModel->updatePassword($email, $newPassword);

                    return redirect()->to('student/dashboard')->with('success', 'Password changed successfully.');
                } else {
                    return redirect()->back()->with('error', 'New password and confirm password do not match.');
                }
            } else {
                return redirect()->back()->with('error', 'Incorrect current password.');
            }
        }

        return redirect()->to('student/edit_student/' . $email);
    }

    public function logout()
    {
        $session = session();
        $session->remove('student');

        return redirect()->to('student-login');
    }
}