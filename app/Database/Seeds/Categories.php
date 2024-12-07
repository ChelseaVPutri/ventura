<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categories extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Atasan'],
            ['name' => 'Bawahan'],
            ['name' => 'Luaran'],
            ['name' => 'Aksesoris'],
        ];
        $this->db->table('categories')->insertBatch($data);
    }
}
