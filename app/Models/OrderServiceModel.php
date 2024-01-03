<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderServiceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'orderservices';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'contract',
        'service',
        'company',
        'deposit',
        'user',
        'type',
        'origin',
        'status',
        'name',
        'phone',
        'obs',
        'obsin',
        'available',
        'notification',
        'updated_at',
        'deleted_at',
        'company_id',
        'created_at',
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
            'contract',
            'service',
            'company',
            'deposit',
            'user',
            'type',
            'origin',
            'status',
            'name',
            'phone',
            'obs',
            'obsin',
            'available',
            'notification',
        ];

        $fieldsToReturn = [
            'id',
            'contract',
            'service',
            'company',
            'deposit',
            'user',
            'type',
            'origin',
            'status',
            'name',
            'phone',
            'obs',
            'obsin',
            'available',
            'notification',
            'updated_at',
            'deleted_at',
            'company_id',
            'created_at',
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
