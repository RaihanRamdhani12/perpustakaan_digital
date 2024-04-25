<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'tb_member';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_lengkap', 'alamat', 'role', 'email','no_telpon', 'password'];

    public function dapatkan_user_role($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['email' => $email]);
        }
    }
}