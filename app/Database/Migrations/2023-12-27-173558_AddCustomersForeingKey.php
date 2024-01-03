<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Add_foreign_key_to_customers extends Migration
{
    public function up()
    {
        $this->forge->addForeignKey('plan_id', 'plans', 'id');
    }

    public function down()
    {
        $this->forge->dropForeignKey('customers', 'plan_id');
    }
}
