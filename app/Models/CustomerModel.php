<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'rg',
        'cpf',
        'date_of_birth',
        'email',
        'phones',
        'phones',
        'zipcode',
        'address1',
        'address2',
        'number',
        'complement',
        'reference_point',
        'city',
        'state',
        'company_id',
        'onu_id',
        'pop_id',
        'plan_id',
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
            'name',
            'email',
            'phones',
            'pop_id',
            'address1',
        ];

        $fieldsToReturn = [
            'id',
            'name',
            'phones',
            'address1',
            'pop_id',
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
