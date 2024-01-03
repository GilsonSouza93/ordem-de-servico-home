<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFinancialBoxes extends Migration
{
    // 'id', 'type',   'pop_id',    'payment_point',    'payment_plans',    'payment_form',    'value',
    // 'checking_proof',   'date',   'obs',   'data',   'company_id',
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'pop_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],


            'payment_point' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'payment_plans' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'payment_form' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'value' => [
                'type' => 'FLOAT',
                'constraint' => '10',
            ],

            'base64_data' => [
                'type' => 'TEXT', 
                'constraint' => '5000000'
            ],

            'date' => [
                'type' => 'DATETIME',
            ],

            'obs' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'data' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'company_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'created_at timestamp DEFAULT current_timestamp NOT NULL',

        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->CreateTable('cashboxes');

    }

    public function down()
    {
        $this->forge->DropTable('cashboxes');
    }
}
