<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wishlist extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'wishlist_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'product_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ]
        ]);
        $this->forge->addKey('wishlist_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'product_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('wishlist');
    }

    public function down()
    {
        //
        $this->forge->dropTable('wishlist');
    }
}
