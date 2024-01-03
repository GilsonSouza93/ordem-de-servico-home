<?php

namespace App\Models;

use CodeIgniter\Model;

class BillsToPayModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bills_to_pay';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'pop_id',
        'supplier_id',
        'payment_form',
        'value',
        'fix_value',
        'doc_type',
        'invoice',
        'issue',
        'payment',
        'installment',
        'obs',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'company_id',
        
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

    public function search($data)
    {
        $fieldsToSearch = [
            'id',
            'pop_id',
            'suplier_id',
            'payment_form',
            'value',
            'fix_value',
            'doc_type',
            'invoice',
            'issue',
            'payment',
            'installment',
            'obs',
            'description',
            
        ];

        $fieldsToReturn = [
            'id',
            'pop_id',
            'supplier_id',
            'payment_form',
            'value',
            'fix_value',
            'doc_type',
            'invoice',
            'issue',
            'payment',
            'installment',
            'obs',
            'description',
            
        ];

        $createdAtName = 'created_at';

        $search = null;

        if (isset($data['search']))
            $search = $data['search'];

        $query = $this->db->table($this->table)
            ->select($fieldsToReturn);

        if ($search) {
            $query->groupStart();
            foreach ($fieldsToSearch as $field) {
                $query->orLike($field, $search);
            }
            $query->groupEnd();
        }

        $query->orderBy($createdAtName, 'DESC');
        $result = $query->get()->getResultArray();

    return $result;
    }
}
