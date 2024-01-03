<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],

            'service' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'pop_id' => [
                "type" => "INT",
                "constraint" => 11,
            ],

            'sending_limit' => [
                "type" => "int",
                "constraint" => 5,
            ],

            'group' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'tags' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'nas' => [
                'type' => 'INT',
                'constraint' => '30',
            ],

            'condominium' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'street' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'district' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'source' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'route' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            
            'tower' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'plan_id' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => true,
            ],
            'olt_id' => [
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => true,
            ],
            'slot' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pon' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'billing_method' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'expiration' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'invoice' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'invoice_until' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'person_type' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'contact' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'loyalty' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'active' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'terms' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'comodato' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'mensage' => [
                'type' => 'VARCHAR',
                'constraint' => '3000',
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
        $this->forge->addForeignKey('olt_id', 'olts', 'id');
        $this->forge->addForeignKey('plan_id', 'plans', 'id');
        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('emails');
    }

    public function down()
    {
        $this->forge->DropTable('emails');
    }
}
