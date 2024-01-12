<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrderService extends Migration
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

            "name" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "phone" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "cpf" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "company" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "setor" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "service" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "user" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "type" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "status" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "origin" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "obs" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            "company_id" => [
                "type" => "int",
                "constraint" => 5,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],


        ]);



        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('order_service');
    }

    public function down()
    {
        $this->forge->dropTable('order_service');
    }
}
