<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAccountTypes extends Migration
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
            
            'account_type_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'company_id'=> [
                'type' => 'INT',
                'constraint' => '5',
            ],

            'created_at timestamp DEFAULT current_timestamp NOT NULL',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('account_types');
    }

    public function down()
    {
        $this->forge->dropTable('account_types');
    }
}
