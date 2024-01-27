<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $session = session();
        $email = $session->get('admin')['email'];

        $adminModel = new AdminModel();
        $admin = $adminModel->getAdminByEmail($email);

        return view('admin/admin_dashboard', ['admin' => $admin]);
    }


    public function teachersDashboard()
    {
        $model = new TeacherModel();
        $data['teachers'] = $model->getAllTeachers();

        return view('admin/teachers_dashboard', $data);
    }

    public function studentsDashboard()
    {
        $model = new StudentModel();
        $data['students'] = $model->getAllStudents();

        return view('admin/students_dashboard', $data);
    }

    public function search()
    {
        $model = new StudentModel();

        $searchKeyword = $this->request->getPost('search_keyword');

        $data['students'] = $model->searchStudents($searchKeyword);
        $data['search_keyword'] = $searchKeyword;

        return view('admin/search_results', $data);
    }

    public function searchTeacher()
    {
        $searchKeyword = $this->request->getPost('search_keyword');

        $model = new TeacherModel();

        $teachers = $model->searchTeachers($searchKeyword);

        $data = [
            'teachers' => $teachers,
            'search_keyword' => $searchKeyword
        ];

        return view('admin/search_results_teacher', $data);
    }


    public function studadder()
    {
        return view('admin/add_student');
    }

    public function addStudent()
    {
        $model = new StudentModel();

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'gender' => $this->request->getPost('gender'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
            'password' => $this->request->getPost('password')
        ];

        $profilePhoto = $this->request->getFile('profile_photo');
        if ($profilePhoto->isValid() && $profilePhoto->getExtension() === 'jpg') {
            $newName = $profilePhoto->getRandomName();
            $profilePhoto->move(ROOTPATH . 'public/images', $newName);
            $data['profile_photo'] = $newName;
        }

        $model->addStudent($data);

        return redirect()->to('admin/students_dashboard');
    }


    public function editStudent($email)
    {
        $model = new StudentModel();

        $data['student'] = $model->getStudentByEmail($email);
        $data['email'] = $email;

        if (empty($data['student'])) {
            return redirect()->to('admin/students_dashboard');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedData = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'gender' => $this->request->getPost('gender'),
                'email' => $this->request->getPost('email'),
                'address' => $this->request->getPost('address')
            ];

            $model->updateStudent($email, $updatedData);

            return redirect()->to('admin/students_dashboard');
        }

        return view('admin/edit_student', $data);
    }

    public function editTeacher($email)
    {
        $model = new TeacherModel();
        $data['teacher'] = $model->getTeacherByEmail($email);

        if (empty($data['teacher'])) {
            return redirect()->to('admin/teachers_dashboard');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedData = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'email' => $this->request->getPost('email'),
                'address' => $this->request->getPost('address'),
                'gender' => $this->request->getPost('gender'),
                'course' => $this->request->getPost('course')
            ];

            $model->updateTeacher($email, $updatedData);

            return redirect()->to('admin/teachers_dashboard');
        }

        return view('admin/edit_teacher', $data);
    }


    public function deleteStudent($email)
    {
        $model = new StudentModel();

        $deleted = $model->deleteStudent($email);

        $data['student_email'] = $email;
        $data['deleted'] = $deleted;

        return view('admin/delete_student', $data);
    }
    public function deleteTeacher($email)
    {
        $model = new TeacherModel();

        $deleted = $model->deleteTeacher($email);

        $data['email'] = $email;
        $data['deleted'] = $deleted;

        return view('admin/delete_teacher', $data);
    }

    public function importStudents()
    {
        echo view('admin/import_students');
    }

    public function processImport()
    {
        $file = $this->request->getFile('csv_file');

        if ($file && $file->isValid() && $file->getExtension() === 'csv') {
            $csvData = array_map('str_getcsv', file($file->getPathname()));

            $data = [];
            foreach ($csvData as $row) {
                if (count($row) === 6) {
                    $data[] = [
                        'first_name' => $row[0],
                        'last_name' => $row[1],
                        'email' => $row[2],
                        'gender' => $row[3],
                        'password' => password_hash($row[4], PASSWORD_DEFAULT),
                        'address' => $row[5],
                    ];
                }
            }

            if (!empty($data)) {
                $model = new StudentModel();

                $model->insertBatch($data);

                return redirect()->to('admin/students_dashboard')->with('success', 'CSV file imported successfully.');
            } else {
                return redirect()->back()->with('error', 'No valid data found in the CSV file.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid CSV file. Please choose a valid CSV file to import.');
        }
    }

    public function importteachers()
    {
        echo view('admin/import_teachers');
    }

    public function teacherImport()
    {
        $file = $this->request->getFile('csv_file');

        if ($file && $file->isValid() && $file->getExtension() === 'csv') {
            $filePath = $file->getTempName();

            $fileContent = file_get_contents($filePath);
            $rows = explode("\n", $fileContent);

            $data = [];
            foreach ($rows as $row) {
                if (empty(trim($row))) {
                    continue;
                }

                $columns = explode(",", $row);

                if (count($columns) !== 6) {
                    return redirect()->back()->with('error', 'Invalid data found in the CSV file.');
                }

                $firstName = $columns[0];
                $lastName = $columns[1];
                $course = $columns[2];
                $gender = $columns[3];
                $email = $columns[4];
                $address = $columns[5];

                $data[] = [
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                    'address' => $address,
                    'gender' => $gender,
                    'course' => $course
                ];
            }

            if (!empty($data)) {
                $model = new TeacherModel();

                $model->insertBatch($data);

                return redirect()->to('admin/teachers_dashboard')->with('success', 'CSV file imported successfully.');
            } else {
                return redirect()->back()->with('error', 'No valid data found in the CSV file.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid CSV file. Please choose a valid CSV file to import.');
        }
    }

    public function editAdmin()
    {
        $session = session();
        $adminData = $session->get('admin');

        $adminModel = new AdminModel();
        $admin = $adminModel->getAdminByEmail($adminData['email']);

        $data['admin'] = [
            'email' => $admin['email'],
            'first_name' => $admin['first_name'],
            'last_name' => $admin['last_name'],
            'profile_photo' => $admin['profile_photo']
        ];

        return view('admin/edit_admin', $data);
    }

    public function teacher_dashboard()
    {
        $model = new TeacherModel();
        $data['teachers'] = $model->getAllTeachers();

        return view('admin/teachers_dashboard', $data);
    }

    public function updateProfileImage()
    {
        $file = $this->request->getFile('profile_photo');

        if ($file && $file->isValid() && $file->getExtension() === 'jpg') {
            $adminModel = new AdminModel();

            $session = session();
            $email = $session->get('admin')['email'];

            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/images', $newName);

            $adminModel->updateProfilePhoto($email, $newName);

            return redirect()->to('admin/editAdmin')->with('success', 'Profile photo updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Invalid file format. Please choose a valid JPG image to update the profile photo.');
        }
    }

    public function updateProfile()
    {
        $adminEmail = $this->request->getVar('email');
        $model = new AdminModel();

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name')
        ];

        $model->updateProfile($adminEmail, $data);

        return redirect()->to('admin/edit_admin')->with('success', 'Profile updated successfully.');
    }


    public function updateProfileStudent()
    {
        $email = $this->request->getPost('email');
        $file = $this->request->getFile('profile_photo');

        if ($file && $file->isValid() && $file->getExtension() === 'jpg') {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/images', $newName);

            $model = new StudentModel();
            $model->updateProfilePhoto($email, $newName);

            return redirect()->to('admin/students_dashboard/edit_student/' . $email)->with('success', 'Profile photo updated successfully.');
        } else {
            return redirect()->to('admin/students_dashboard/edit_student/' . $email)->with('error', 'Invalid file format. Please choose a valid JPG image to update the profile photo.');
        }
    }


}