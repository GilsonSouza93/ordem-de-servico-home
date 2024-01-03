<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'name',
        'account_type_id',
        'email',
        'password',
        'phone1',
        'phone2',
        'deleted_by',
        'updated_by',
        'created_by',
        'deleted_at',
        'updated_at',
        'created_at',
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
            'name',
            'email',
            'phone1',
            'phone2',
        ];

        $fieldsToReturn = [
            'id',
            'name',
            'email',
            'phone1',
            'phone2',
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
