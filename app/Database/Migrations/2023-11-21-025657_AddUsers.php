<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "auto_increment" => true
            ],

            "name" => [
                "type" => "varchar",
                "constraint" => 255
            ],

            "account_type_id" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
            ],

            "email" => [
                "type" => "varchar",
                "constraint" => 255
            ],

            "password" => [
                "type" => "varchar",
                "constraint" => 255
            ],

            "phone1" => [
                "type" => "varchar",
                "constraint" => 255,
                "null" => true
            ],

            "phone2" => [
                "type" => "varchar",
                "constraint" => 255,
                "null" => true
            ],

            "deleted_by" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "null" => true
            ],

            "updated_by" => [
                "type" => "int",
                "constraint" => 5,
                "unsigned" => true,
                "null" => true
            ],

            "deleted_at" => [
                "type" => "timestamp",
                "null" => true,
            ],

            "updated_at" => [
                "type" => "timestamp",
                "null" => true,
            ],

            "company_id" => [
                "type" => "int",
                "constraint" => 5,
            ],
            
            'created_at timestamp DEFAULT current_timestamp NOT NULL',
        ]);

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
