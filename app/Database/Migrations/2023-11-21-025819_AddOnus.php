<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdOnu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'code' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],

            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'ip' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'parameters' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
            'olt' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'port' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            
            'deleted_at' => [
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

        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('onus');
    }

    public function down()
    {
        $this->forge->dropTable('onus');
    }
}
