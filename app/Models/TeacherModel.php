<?php
namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'email';
    protected $allowedFields = ['email', 'password', 'first_name', 'last_name', 'course', 'gender', 'address'];

    public function getTeacherByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
    public function password_verify($password, $teacher)
    {
        $teacher = $this->getAdminByEmail($teacher);

        if ($teacher && $password == $teacher['password']) {
            return true;
        }

        return false;
    }
    public function changePassword($email, $newPassword)
    {
        $this->where('email', $email)->set('password', $newPassword)->update();
    }

    public function updateProfile($email, $data)
    {
        $this->where('email', $email)->set($data)->update();
    }

    public function getAllTeachers()
    {
        return $this->findAll();
    }

    public function searchTeachers($searchKeyword)
    {
        return $this->where('first_name LIKE', "%$searchKeyword%")
            ->orWhere('last_name LIKE', "%$searchKeyword%")
            ->orWhere('email LIKE', "%$searchKeyword%")
            ->orWhere('address LIKE', "%$searchKeyword%")
            ->orWhere('course LIKE', "%$searchKeyword%")
            ->orWhere('gender LIKE', "%$searchKeyword%")
            ->findAll();
    }

    public function updateTeacher($email, $data)
    {
        return $this->update($email, $data);
    }

    public function deleteTeacher($email)
    {
        return $this->where('email', $email)->delete();
    }
}