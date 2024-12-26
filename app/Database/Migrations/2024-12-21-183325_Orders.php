<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
    {
        $this->forge->addField
        (
            [
                'order_id' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true,
                ],

                'uID' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                ],

                'total' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => '255'
                ],

                'status' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => '255',
                ],

                'shipping' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => '255',
                ],

                'payment' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => '255',
                ],
                
                'created_at timestamp default current_timestamp',
                'updated_at timestamp default current_timestamp on update current_timestamp'
            ]
        );

        $this->forge->addKey('order_id', true);
        $this->forge->addForeignKey('uID', 'users', 'user_id');
        $this->forge->createTable('orders', true);
    }

    public function down()
    {
        $this->forge->dropTable('orders', true);
    }
}
