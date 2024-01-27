<?php
namespace App\Controllers;

use App\Models\TeacherModel;
use App\Models\StudentModel;
use CodeIgniter\Controller;

class TeacherController extends Controller
{
    public function login()
    {
        echo view('teacher/login');
    }

    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $teacherModel = new TeacherModel();

        $teacher = $teacherModel->getTeacherByEmail($email);

        if ($teacher) {
            if (password_verify($password, $teacher['password'])) {
                session()->set([
                    'email' => $teacher['email'],
                    'first_name' => $teacher['first_name'],
                    'last_name' => $teacher['last_name'],
                    'gender' => $teacher['gender'],
                    'address' => $teacher['address'],
                    'course' => $teacher['course']
                ]);

                return redirect()->to('teacher/dashboard');
            }
        }

        $data['error'] = 'Invalid email or password';

        return view('teacher/login', $data);
    }

    public function dashboard()
    {
        return view('teacher/dashboard');
    }


    public function changePassword()
    {
        echo view('teacher/change_password');
    }

    public function updatePassword()
    {
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');
    }

    public function editProfile()
    {
        echo view('teacher/edit_profile');
    }

    public function updateProfile()
    {
        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
    }

    public function importStudents()
    {
        echo view('teacher/import_students');
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
                        'address' => $row[5]
                    ];
                }
            }

            if (!empty($data)) {
                $model = new StudentModel();

                $model->insertBatch($data);
                return redirect()->to('teacher/dashboard')->with('success', 'CSV file imported successfully.');
            } else {
                return redirect()->back()->with('error', 'No valid data found in the CSV file.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid CSV file. Please choose a valid CSV file to import.');
        }
    }


}
// CREATE TABLE teachers (
//     first_name VARCHAR(50) NOT NULL,
//     last_name VARCHAR(50) NOT NULL,
//     email VARCHAR(100) PRIMARY KEY,
//     gender ENUM('Male', 'Female', 'Other') NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     address VARCHAR(255) NOT NULL
// );
