<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique' => true
            ],
            'token' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'last_login timestamp default now()'
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
