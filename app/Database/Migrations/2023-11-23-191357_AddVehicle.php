<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVehicle extends Migration
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

            'model' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'plate' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'uf' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'locate' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'obs' => [
                'type' => 'VARCHAR',
                'constraint' => 255,

            ],

            'available' => [
                'type' => 'BOOLEAN',
                'default' => 0,
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

        $this->forge->CreateTable('vehicle');
    }
    public function down()
    {
        $this->forge->DropTable('vehicle');
    }
}
