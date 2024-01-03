<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddServer extends Migration
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

            'pop_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'heigth' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'lat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'sustainable' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],

            'active' => [
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

        $this->forge->addForeignKey('pop_id', 'pops', 'id');
        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->CreateTable('servers');
    }

    public function down()
    {
        $this->forge->DropTable('servers');
    }
}
