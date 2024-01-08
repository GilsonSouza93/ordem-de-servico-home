<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrderService extends Migration
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
            
            "company_id" => [
                "type" => "INT",
                "constraint" => 5,
            ],
            
        ]);
        
        
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('company_id', 'companies', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('OrderService');
    }
}
