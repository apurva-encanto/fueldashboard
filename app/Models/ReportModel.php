<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table            = 'reports';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
         'external_id_no', 'sold_to', 'payer', 'p_customer_acc_no', 'customer_name',
        'card_number', 'card_holder_name', 'vehicle_no', 'transaction_date', 'transaction_time',
        'processing_date', 'invoice_number', 'invoice_date', 've_sst_acc_no', 'p_ss_no',
        'service_st_name', 'receipt', 'transaction_type', 'p_s_no', 'p_s_name', 'quantity',
        'terminal_price', 'discount_rate', 'customer_price', 'discount_amount', 'customer_amount',
        'p_odo_reading', 'c_odo_reading', 'distance_travel', 'fuel_capacity', 'transaction_litres',
        'v_max_consumption', 'consumption_liters', 'cost', 'v_tag_no', 'v_reg_no_tag', 'v_desc_no_tag',
        'driver_tag_no', 'driver_tag_name', 'status', 'is_delete', 'terminal_t_amt', 'company_id', 'report_date'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
