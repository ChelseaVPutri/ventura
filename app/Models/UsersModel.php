<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model {
    protected $table = 'users';
    protected $allowedFields = ['user_id', 'oauth_id', 'username', 'email', 'password', 'last_login', 'created_at'];

    protected $useTimestamp = true;
    protected $createdField = 'created_at';
    
    public function getData($username, $password) {
        // return $this->db->table('users')->where(array('username' => $username, 'password' => $password))->get()->getRowArray();
        return $this->where(['username' => $username, 'password' => $password])->first();
    }
    
    public function setData($username, $email, $password){
        
    }
}