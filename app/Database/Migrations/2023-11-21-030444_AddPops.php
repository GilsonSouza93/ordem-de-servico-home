<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPops extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],

            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'carrier' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'plan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'nas' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'user' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],

            'identification' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],

            'cep' => [
                'type' => 'int',
                'constraint' => 8,
            ],

            'street' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'district' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'number' => [
                'type' => 'int',
                'constraint' => 8,
            ],
            
            'complement' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            
            'reference_point' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            
            'deleted_at' => [
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

        $this->forge->createTable('pops');
    }

    public function down()
    {
        $this->forge->dropTable('pops');
    }
}
