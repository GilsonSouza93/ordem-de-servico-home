<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRadius extends Migration
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
            'pop_id' => [
                'type' => 'INT',
                'constraint' => 255,
            ],
            'ip_pool' => [
                'type' => 'INT',
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
            'ipv6_prefix' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ipv6_pool' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ip_pool_block' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'port' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'secret_word' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nas_ip' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'extra_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ip_origin' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'radius_config' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'port_2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'user_2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password_2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'snmp_version' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'snmp_community' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'snmp_port' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'http_port' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'dns_primary' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'dns_secondary' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'accounting_update' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'port_secondary' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lat_long' => [
                'type' => 'INT',
                'constraint' => 255,
            ],
            'active_radius' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'customer_available' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'verify_login' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'verify_mac' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'verify_mac_login' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'rrd_interfaces' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'json_parameters' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'auto_reload' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'simultaneous_login' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'check_radius' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'timeout_check' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'check_connection' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'timeout_graphics' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ip_address_access' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'access_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'access_port' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'access_user' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'access_password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'short_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->addKey('ip_address', false);
        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('radiusnan');
    }

    public function down()
    {
        $this->forge->dropTable('radiusnan');
    }
}