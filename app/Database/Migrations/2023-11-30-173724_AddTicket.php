<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTicket extends Migration
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

            'district' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'andress' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],


            'pop_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],

            'nas' => [
                'type' => 'INT',
                'constraint' => 50,
            ],

            'parcel' => [
                'type' => 'INT',
                'constraint' => 50,
            ],

            'date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'carrier' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'plans_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'edf' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'payment' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'date_start' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'date_end' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'ticket_open' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],

            'pix' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],

            'title_issued_start' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'title_issued_end' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'obs' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'company_id' => [
                'type' => 'int',
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
        $this->forge->addForeignKey('pop_id', 'pops', 'id');
        $this->forge->addForeignKey('plans_id', 'plans', 'id');
        $this->forge->createTable('ticket');
    }

    public function down()
    {
        $this->forge->DropTable('ticket');
    }
}
