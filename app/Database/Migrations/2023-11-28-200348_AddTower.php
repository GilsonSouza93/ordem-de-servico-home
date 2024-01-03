<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTower extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'sustainable' => [
                'type' => 'FLOAT',
                'constraint' => 10,
            ],

            'pop_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],

            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'Latitude/Longitude' => [
                'type' => 'INT',
                'constraint' => 255,
            ],

            'active' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],

            'company_id' => [
                'type' => 'INT',
                'constraint' => 30,
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
        $this->forge->addForeignKey('pop_id', 'pops', 'id');
        $this->forge->createTable('tower');
    }

    public function down()
    {
        $this->forge->DropTable('tower');
    }
}
