<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'emails';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'service',
        'sending_limit',
        'pop_id',
        'group',
        'tags',
        'nas',
        'condominium',
        'street',
        'district',
        'source',
        'route',
        'tower',
        'plan_id',
        'olt_id',
        'slot',
        'pon',
        'billing_method',
        'expiration',
        'invoice',
        'invoice_until',
        'person_type',
        'status',
        'contact',
        'loyalty',
        'active',
        'terms',
        'comodato',
        'mensage',
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
            'service',
            'sending_limit',
            'group',
            'expiration',
            'status',
            'mensage',
        ];

        $fieldsToReturn = [
            'id',
            'service',
            'sending_limit',
            'expiration',
            'group',
            'status',
            'mensage',
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
