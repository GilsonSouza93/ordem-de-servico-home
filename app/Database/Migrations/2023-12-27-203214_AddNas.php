<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNas extends Migration
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
                'constraint' => '1000',
            ],

            'ip_radius' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'auth_port' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'acct_port' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'notice_port' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'vpn_type' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'host_vpn' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'vpn_port' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'config_connection' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'config_user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'config_password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'active' => [
                'type' => 'BOOLEAN',
                'default' => false,
                null => true,
            ],

            'template' => [
                'type' => 'VARCHAR',
                'constraint' => '100000',
            ],

            "company_id" => [
                "type" => "int",
                "constraint" => 5,
            ],



            'created_at timestamp DEFAULT current_timestamp NOT NULL',
        ]);
        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('ip_radius', 'radiusnan', 'ip_address');
        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('nas');
    }


    public function down()
    {
        $this->forge->dropTable('nas');
    }
}
