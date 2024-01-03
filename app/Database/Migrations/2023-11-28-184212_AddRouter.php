<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRouter extends Migration
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

            'font' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'port' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'source' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'parameter' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'olt_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
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
        $this->forge->addForeignKey('olt_id', 'olts', 'id');
        $this->forge->createTable('routers');

    }

    public function down()
    {
        $this->forge->dropTable('routers');
    }
}
