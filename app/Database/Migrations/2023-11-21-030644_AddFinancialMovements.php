<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFinancialMovements extends Migration
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
            'recive_point' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'register_date' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'date_competence' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'payment_method' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'history' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'user' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => false,
            ],
            'enter' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'exit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'actions' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'company_id' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('company_id', 'companies', 'id');
        $this->forge->createTable('financial_movements');
    }

    public function down()
    {
        $this->forge->dropTable('financial_movements');
    }
}
