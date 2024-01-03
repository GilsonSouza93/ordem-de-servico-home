<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIpv6pool extends Migration
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

            'range' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'next_range' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'radius' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'order' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],

            'active' => [
                'type' => 'BOOLEAN',
                'default' => 0,
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

        $this->forge->CreateTable('ipv6pools');
    }
    public function down()
    {
        $this->forge->DropTable('ipv6pools');
    }
}
