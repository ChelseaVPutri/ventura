<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alamat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'alamat_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'kota_kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ],
            'alamat_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'null' => false
            ],
            'is_primary' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ]
        ]);

        $this->forge->addKey('alamat_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE');
        $this->forge->createTable('alamat');
    }

    public function down()
    {
        $this->forge->dropTable('alamat');
    }
}
