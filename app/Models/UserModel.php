<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    // protected $table = 'users';
    // protected $allowed_fields = ['username', 'email', 'password', 'token'];

    public function getData($username, $password) {
        return $this->db->table('users')->where(array('username' => $username, 'password' => $password))->get()->getRowArray();
    }
}