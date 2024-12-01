<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'admin_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'last_login timestamp default now()'
        ]);
        $this->forge->addKey('admin_id', true);
        $this->forge->createTable('admin', true);
    }

    public function down()
    {
        // drop table
        $this->forge->dropTable('admin');
    }
}
