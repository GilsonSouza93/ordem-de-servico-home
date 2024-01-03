<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProfiles extends Migration
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

            'admin' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'AddCustomer' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'consultCustomer' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'deleteCustomer' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'editCostumer' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'all_costumer' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'createContract' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'editContract' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'SeeReports' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'all_administrative' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'consultCTO' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'addCTO' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'deleteCTO' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'all_support' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'addPay' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'issueDRE' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'issueNf' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'issueTicket' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'deleteTicket' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'all_financial' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'consultMap' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'addVehicle' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'deleteVehicle' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'all_fleet' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'addProduct' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'editProduct' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'consultStock' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'all_stock' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'addCount' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'editCount' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'deleteCount' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'all_settings' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'manage_email' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'manage_pop' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'manage_sms' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'manage_vehicle' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'manage_all' => [
                'type' => 'BOOLEAN',
                'default' => false,
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

        $this->forge->createTable('profiles');
    }

    public function down()
    {
        $this->forge->dropTable('profiles');
    }
}
