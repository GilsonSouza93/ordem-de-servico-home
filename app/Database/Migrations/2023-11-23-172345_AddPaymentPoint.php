<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPaymentPoint extends Migration
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

            'carrier' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'carriers' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'companies' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'active' => [
                'type' => 'boolean',
                'default' => false,

            ],

            'bills_discount' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'admin_discount' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'allow_discount' => [
                'type' => 'boolean',
                'default' => false,
            ],

            'refinance' => [
                'type' => 'boolean',
                'default' => false,
            ],

            'method' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'receiver' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'balance' => [
                'type' => 'INT',
                'constraint' => 55,
            ],

            'pops' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'canceled' => [
                'type' => 'boolean',
                'default' => false,
            ],

            'plan' => [
                'type' => 'boolean',
                'default' => false,
            ],

            'return_release' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'card_release' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'debit_release' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'generate_invoice' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'invoice' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'send_invoice' => [
                'type' => 'boolean',
                'default' => false,
            ],

            'filter' => [
                'type' => 'boolean',
                'default' => false,
            ],

            'cash_reports' => [
                'type' => 'boolean',
                'default' => false,
            ],

            'schedule' => [
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

            'created_at timestamp DEFAULT current_timestamp NOT NULL',
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->CreateTable('paymentpoints');
    }

    public function down()
    {
        $this->forge->DropTable('paymentpoints');
    }
}
