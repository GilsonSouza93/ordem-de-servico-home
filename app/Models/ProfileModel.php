<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'profiles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'name',
        'admin',
        'AddCustomer',
        'consultCustomer',
        'deleteCustomer',
        'editCostumer',
        'all_costumer',
        'createContract',
        'editContract',
        'SeeReports',
        'all_administrative',
        'consultCTO',
        'addCTO',
        'deleteCTO',
        'all_support',
        'addPay',
        'issueDRE',
        'issueNf',
        'issueTicket',
        'deleteTicket',
        'all_financial',
        'consultMap',
        'addVehicle',
        'deleteVehicle',
        'all_fleet',
        'addProduct',
        'editProduct',
        'consultStock',
        'all_stock',
        'addCount',
        'editCount',
        'deleteCount',
        'all_settings',
        'manage_email',
        'manage_pop',
        'manage_sms',
        'manage_vehicle',
        'manage_all',
        'company_id',
        'created_at',
        'updated_at',
        'deleted_at',
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
            'name',
        ];

        $fieldsToReturn = [
            'id',
            'name',
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
