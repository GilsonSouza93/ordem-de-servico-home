<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "TYPE" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],

            "name" => [
                "type" => "VARCHAR",
                "constraint" => 255
            ],
            
            "email" => [
                "type" => "VARCHAR",
                "constraint" => 255
            ],
            
            "phone1" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true
            ],

            "password" => [
                "type" => "VARCHAR",
                "constraint" => 255
            ],
            "passwordConfirm" => [
                "type" => "VARCHAR",
                "constraint" => 255
            ],
            "setor" => [
                "type" => "VARCHAR",
                "constraint" => 255
            ],

            "account_type_id" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
            ],

            "deleted_by" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "null" => true
            ],

            "updated_by" => [
                "type" => "INT",
                "constraint" => 5,
                "unsigned" => true,
                "null" => true
            ],

            "deleted_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],

            "updated_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],

            "company_id" => [
                "type" => "INT",
                "constraint" => 5,
            ],
            
            'created_at timestamp DEFAULT current_timestamp NOT NULL',
        ]);

        $this->forge->addKey('id', true);
        
        $this->forge->addPrimaryKey("id");
        $this->forge->addForeignKey("account_type_id", "account_types", "id");

        $this->forge->addForeignKey('deleted_by', 'users', 'id');
        $this->forge->addForeignKey('updated_by', 'users', 'id');
        $this->forge->addForeignKey('company_id', 'companies', 'id');

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
