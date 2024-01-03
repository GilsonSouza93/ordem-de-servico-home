<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProducts extends Migration
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
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'manufacturer_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'suppliers_id' => [
                'type' => 'INT',
                'constraint' => 5,
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
        $this->forge->addForeignKey('manufacturer_id', 'manufacturers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('suppliers_id', 'suppliers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('company_id', 'companies', 'id');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
