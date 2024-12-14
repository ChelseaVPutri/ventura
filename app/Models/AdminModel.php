<?php

namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model {
    protected $table = "admin";
    protected $primary_key = 'admin_id';
    protected $allowed_fields = ['username', 'password']; //field atau kolom apa saja yg boleh diubah

    public function getData($username) {
        //untuk ambil data
        $builder = $this->table($this->table);
        $builder->where('username=', $username);
        $query = $builder->get();
        return $query->getRowArray(); 
    }

    // public function updateData($data) {
    //     //untuk update data
    //     $builder = $this->table($this->table);
    //     if($builder->save()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}