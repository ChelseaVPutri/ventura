<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrdersDetail extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'od_id' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true,
                ],

                'oID' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                ],
                
                'pID' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                ],

                'address' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                ],

                'qty' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                ],

            ]
        );

        $this->forge->addKey('od_id', true);
        $this->forge->addForeignKey('oID', 'orders', 'order_id');
        $this->forge->addForeignKey('pID', 'products', 'product_id');
        $this->forge->addForeignKey('address', 'alamat', 'alamat_id');
        $this->forge->createTable('ordersdetail', true);
    }

    public function down()
    {
        $this->forge->dropTable('ordersdetail', true);
    }
}