<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPolesForeingKey extends Migration
{
    public function up()
    {
        $this->forge->addForeignKey('pop_id', 'pops', 'id');
        $this->forge->processIndexes('poles');

    }

    public function down()
    {
    }
}
