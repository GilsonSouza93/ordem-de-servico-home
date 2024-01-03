<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOlts extends Migration
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

            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'host' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'slot' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'password_admin' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'snmp_version' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'snmp_community' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'coord' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'debug' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'auto_save' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'template_onu' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'cto' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'authorization' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'vlan' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'disable_onu' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'pop_filter' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'pop' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'plot_sign' => [
                'type'    => 'BOOLEAN',
                'default' => 0,
            ],

            'active' => [
                'type'    => 'BOOLEAN',
                'default' => 0,
            ],

            'telnet' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'protocol' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'obs' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'tl1_ip' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'tl1_port' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'tl1_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'tl1_password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'wait' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'parameters' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'integration' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'template_filter' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'onu_filter' => [
                'type'       => 'BOOLEAN',
                'default' => 0,
            ],

            'high_signal' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'low_signal' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'high_signal_color' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'low_signal_color' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'voip_ip' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'voip_mask' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'voip_gateway' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'voip_port' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'parameters_json' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'service_active' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'service_suspend' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'change_plan' => [
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

            'created_by' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],

            'updated_by' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],

            "company_id" => [
                "type" => "INT",
                "constraint" => 5,
            ],

            'created_at timestamp DEFAULT current_timestamp NOT NULL',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('created_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');

        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('olts');
    }

    public function down()
    {
        $this->forge->dropTable('olts');
    }
}
