<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'usigned' => true, 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'business_id' => ['type' => 'VARCHAR', 'constraint' => 200],
            'client_name' => ['type' => 'VARCHAR', 'constraint' => 200],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp ',
            'status' => ['type' => 'INT', 'default' => 1],
            'is_delete' => ['type' => 'INT', 'default' => 0]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clients');
    }

    public function down()
    {
        //
    }
}
