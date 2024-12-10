<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'user_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'product_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'qty' => [
                'type'          => 'INT',
                'constraint'    => 11,
            ],
        ]);

        $this->forge->addKey('cart_id', true);
        $this->forge->addForeignKey('user_id','users', 'user_id');
        $this->forge->addForeignKey('product_id','products', 'product_id');
        $this->forge->createTable('carts', true);
    }

    public function down()
    {
        //
    }
}
