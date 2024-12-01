<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        // insert data
        $data = [
            'username' => 'chelsea',
            'password' => password_hash('admin123', PASSWORD_DEFAULT)
        ];
        $this->db->table('admin')->insert($data);
    }
}
