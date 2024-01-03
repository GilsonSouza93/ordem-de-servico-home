<?php

namespace App\Models;

use CodeIgniter\Model;

class CashboxModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cashboxes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'type',
        'pop_id',
        'payment_point',
        'payment_plans',
        'payment_form',
        'value',
        'checking_proof',
        'date',
        'obs',
        'data',
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
            'payment_point',
            'payment_plans',
            'payment_form',
            'value',
            'checking_proof',
            'date',
            'obs',
        ];

        $fieldsToReturn = [
            'id',
            'type',
            'pop_id',
            'payment_point',
            'payment_plans',
            'payment_form',
            'value',
            'checking_proof',
            'date',
            'obs',
        ];

        $createAtName = 'created_at';

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

        $query->orderBy($createAtName, 'DESC');
        $result = $query->get()->getResultArray();

        return $result;
    }
}
