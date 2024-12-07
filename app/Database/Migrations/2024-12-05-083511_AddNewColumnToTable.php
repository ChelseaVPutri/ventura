<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNewColumnToTable extends Migration
{
    public function up()
    {
        //
        $fields = [
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'deleted_at' => [
                'type' => 'DATETIME'
            ]
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('users', 'created_at');
    }
}
