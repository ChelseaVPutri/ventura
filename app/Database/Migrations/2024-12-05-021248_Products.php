<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'product_id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true
                ],

                'name' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                ],

                'price' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                ],

                'stock' => [
                    'type'           => 'INT',
                    'constraint'     => '255',
                ],

                'description' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                ],

                'img' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '255',
                    'null'           => true,
                ],

                'category_id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'null'           => true,
                    'unsigned'       => true,
                ],

                'created_at timestamp default current_timestamp',
                'updated_at timestamp default current_timestamp on update current_timestamp',
                
            ]
            );
            $this->forge->addKey('product_id', true);
            $this->forge->addForeignKey('category_id', 'categories', 'category_id');
            $this->forge->createTable('products', true);
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
