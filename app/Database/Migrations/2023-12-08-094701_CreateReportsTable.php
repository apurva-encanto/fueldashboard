<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReportsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'usigned' => true, 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'external_id_no' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'sold_to' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'payer' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'p_customer_acc_no' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'customer_name' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'card_number' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'card_holder_name' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'vehicle_no' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'transaction_date' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'transaction_time' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'processing_date' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'processing_time' => ['type' => 'VARCHAR', 'constraint' => 200, 'default' => null],
            'invoice_number' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'invoice_date' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            've_sst_acc_no' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'p_ss_no' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'service_st_name' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'receipt' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'transaction_type' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'p_s_no' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'p_s_name' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'quantity' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'terminal_price' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'discount_rate' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'terminal_t_amt' => ['type' => 'VARCHAR', 'constraint' => 200, 'default' => null],            
            'customer_price' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'discount_amount' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'customer_amount' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'p_odo_reading' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'c_odo_reading' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'distance_travel' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'fuel_capacity' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'transaction_litres' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'v_max_consumption' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'consumption_liters' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'cost' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'v_tag_no' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'v_reg_no_tag' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'v_desc_no_tag' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'driver_tag_no' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],
            'driver_tag_name' => ['type' => 'VARCHAR', 'constraint' => 200,'default'=>null],            
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp ',
            'status' => ['type' => 'INT', 'default' => 1],
            'is_delete' => ['type' => 'INT', 'default' => 0],
            'company_id' => ['type' => 'VARCHAR', 'constraint' => 200, 'default' => null],
            'report_date' => ['type' => 'VARCHAR', 'constraint' => 200, 'default' => null], 
            

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('reports');
    }

    public function down()
    {
        //
    }
}
