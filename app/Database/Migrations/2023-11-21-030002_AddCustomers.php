<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCustomers extends Migration
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
                'constraint' => '100',
            ],
            
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],

            'phones' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            
            'zipcode' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            
            'address1' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            
            'neighborhood' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            
            'number' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            
            'complement' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            
            'reference_point' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],

            'rg' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],

            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => '14',
                'null' => true,
            ],
            
            'cnpj' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],

            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
            ],
            "company_id" => [
                "type" => "int",
                "constraint" => 5,
            ],
            "account_type_id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
            ],

            "deleted_by" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "null" => true
            ],

            "updated_by" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "null" => true
            ],


            'created_at timestamp DEFAULT current_timestamp NOT NULL',
        ]);
        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('customers');
    }


    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
