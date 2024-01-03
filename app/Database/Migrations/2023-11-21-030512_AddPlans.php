<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPlans extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'speed' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'monthly_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'contract_duration' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'data_limit' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => true,
            ],
            'connection_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'features' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'required_equipment' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'payment_options' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'geographical_availability' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            "company_id" => [
                "type" => "int",
                "constraint" => 5,
            ],
            'created_at timestamp DEFAULT current_timestamp NOT NULL',	
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('company_id', 'companies', 'id');
        $this->forge->createTable('plans');
    }

    public function down()
    {
        $this->forge->dropTable('plans');
    }
}
