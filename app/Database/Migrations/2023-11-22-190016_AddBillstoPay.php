<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBillstoPay extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],

            'payment_form' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'pop_id' => [
                "type" => "int",
                "constraint" => 5,
            ],

            'supplier_id' => [
                "type" => "int",
                "constraint" => 5,
            ],

            'payment' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'installment' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'value' => [
                'type' => 'INT',
                'constraint' => '30',
            ],

            'obs' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'doc_type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'issue' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'invoice' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            
            'fix_value' => [
                'type' => 'BOOLEAN',
                'default' => 0,
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

            'created_at timestamp DEFAULT current_timestamp NOT NULL',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('pop_id', 'pops', 'id');
        $this->forge->addForeignKey('supplier_id', 'suppliers', 'id');
        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('bills_to_pay');
    }

    public function down()
    {
        $this->forge->DropTable('bills_to_pay');
    }
}
