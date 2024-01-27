<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'email';
    protected $allowedFields = ['email', 'first_name', 'last_name', 'password', 'profile_photo'];

    public function getAdminByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function changePassword($email, $newPassword)
    {
        $this->where('email', $email)
            ->set('password', $newPassword)
            ->update();
    }

    public function verifyPassword($email, $password)
    {
        $admin = $this->getAdminByEmail($email);

        if ($admin && $password == $admin['password']) {
            return true;
        }

        return false;
    }

    public function updateProfilePhoto($email, $profilePhoto)
    {
        $this->where('email', $email)
            ->set('profile_photo', $profilePhoto)
            ->update();
    }

    public function updateProfile($email, $data)
    {
        $this->where('email', $email)->update($data);
    }
}