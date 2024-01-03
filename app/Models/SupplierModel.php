<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'suppliers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'name',
        'contact_name',
        'email',
        'phone',
        'address',
        'created_at',
        'updated_at',
        'company_id'
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
            'contact_name',
            'email',
            'phone',
            'address',
        ];

        $fieldsToReturn = [
            'id',
            'name',
            'contact_name',
            'email',
            'phone',
            'address',
        ];

        $search = null;

        if(isset($data['search']))
            $search = $data['search'];

        $query = $this->db->table($this->table)
                ->select($fieldsToReturn);

        if($search) {
            $query->groupStart();
            foreach($fieldsToSearch as $field) {
                $query->orLike($field, $search);
            }
            $query->groupEnd();
        }

        $query->orderBy('created_at', 'DESC');
        $result = $query->get()->getResultArray();

        return $result;
    }
}
