<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSwitch extends Migration
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

            'source' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'route' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'initial_port' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'total_ports' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'pole_id' => [
                'type' => 'INT',
                'constraint' => 255,
            ],

            'unavailable' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'ip' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],

            'port' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'access_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'user' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'switch_model' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'template_model' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'snmp_community' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'snmp_version' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'lat_long' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
            ],

            'obs' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
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
        $this->forge->addForeignKey('pole_id', 'poles', 'id');
        $this->forge->createTable('switch');




    }

    public function down()
    {
        $this->forge->DropTable('switch');
    }
}
