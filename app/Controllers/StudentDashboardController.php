<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class StudentDashboardController extends Controller
{
    public function dashboard()
    {
        $session = session();
        if (!$session->has('student')) {
            return redirect()->to('student-login');
        }

        $email = $session->get('student')['email'];
        $studentModel = new StudentModel();
        $studentData = $studentModel->getStudentByEmail($email);

        return view('student/dashboard', ['studentData' => $studentData]);
    }

    public function edit()
    {
        $email = $this->request->getGet('email');

        $studentModel = new StudentModel();
        $student = $studentModel->getStudentByEmail($email);

        return view('student/edit_student', ['studentData' => $student]);
    }

    public function editStudent($email)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->getStudentByEmail($email);

        if ($this->request->getMethod() === 'post') {
            $data = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'gender' => $this->request->getPost('gender'),
                'email' => $this->request->getPost('email'),
                'address' => $this->request->getPost('address'),
            ];

            $newEmail = $this->request->getPost('new_email');

            $studentModel->update($email, $data);

            if ($newEmail !== $email) {
                $session = session();
                $session->set('student', $studentModel->getStudentByEmail($newEmail));
            }

            return redirect()->back()->with('success', 'Profile updated successfully.');
        }

        return view('student/edit_student', ['student' => $student]);
    }


    public function updateProfilePhoto($email)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->getStudentByEmail($email);

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        $profilePhoto = $this->request->getFile('profile_photo');

        if ($profilePhoto->isValid() && $profilePhoto->getExtension() === 'jpg') {
            $newName = $profilePhoto->getRandomName();
            $profilePhoto->move(ROOTPATH . 'public/images', $newName);

            $studentModel->updateProfilePhoto($email, $newName);

            return redirect()->back()->with('success', 'Profile photo updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Invalid file format. Please choose a valid JPG image to update the profile photo.');
        }
    }


    public function updateProfile()
    {
        $file = $this->request->getFile('profile_photo');

        if ($file && $file->isValid() && $file->getExtension() === 'jpg') {
            $email = $this->request->getPost('email');
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/images', $newName);

            $model = new StudentModel();
            $model->updateProfile($email, $newName);

            return redirect()->back()->with('success', 'Profile photo updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Invalid file format. Please choose a valid JPG image to update the profile photo.');
        }
    }


}