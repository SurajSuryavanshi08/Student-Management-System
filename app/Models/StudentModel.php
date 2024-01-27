<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'email';
    protected $allowedFields = ['first_name', 'last_name', 'gender', 'email', 'address', 'profile_photo'];

    public function getAllStudents()
    {
        return $this->findAll();
    }

    public function updatePassword($email, $newPassword)
    {
        $this->where('email', $email)
            ->set('password', $newPassword)
            ->update();
    }

    public function searchStudents($keyword)
    {
        return $this->like('first_name', $keyword)
            ->orLike('last_name', $keyword)
            ->orLike('email', $keyword)
            ->findAll();
    }

    public function addStudent($data)
    {
        $this->insert($data);
    }

    public function getStudentByEmail($email)
    {
        return $this->db->table('students')->where('email', $email)->get()->getRowArray();

    }

    public function updateStudent($email, $data)
    {
        $this->where('email', $email)
            ->set($data)
            ->update();
    }

    public function deleteStudent($email)
    {
        return $this->where('email', $email)->delete();
    }


    public function updateProfilePhoto($email, $profilePhoto)
    {
        $this->where('email', $email)
            ->set('profile_photo', $profilePhoto)
            ->update();
    }
}