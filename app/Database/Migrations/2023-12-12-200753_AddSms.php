<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSms extends Migration
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

            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
            ],

            'gateway' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'days' => [
                'type' => 'INT',
                'constraint' => 20,
            ],

            'mensage' => [
                'type' => 'VARCHAR',
                'constraint' => 1500,
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

        $this->forge->CreateTable('sms');
    }
    public function down()
    {
        $this->forge->DropTable('sms');
    }
}
