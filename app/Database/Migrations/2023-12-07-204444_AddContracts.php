<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddContracts extends Migration
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

            'group' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'avaiable' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],

            'base64_data' => [
                'type' => 'TEXT', 
                'constraint' => '5000000'
            ],

            'competence' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'abstract_data' => [
                'type' => 'VARCHAR',
                'constraint' => 255,

            ],

            'obs' => [
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

        $this->forge->CreateTable('contracts');
    }
    public function down()
    {
        $this->forge->DropTable('contracts');
    }
}
