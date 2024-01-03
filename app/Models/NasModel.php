<?php

namespace App\Models;

use CodeIgniter\Model;

class NasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'nas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'description',
        'ip_radius',
        'auth_port',
        'acct_port',
        'timeout',
        'notice_port',
        'vpn_type',
        'host_vpn',
        'vpn_port',
        'user',
        'password',
        'config_connection',
        'config_user',
        'template',
        'config_password',
        'active',
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
            'description',
            'ip_radius',
            'password',
            'active',
            'vpn_type',
            'created_at',
            'active',
            'id',
        ];

        $fieldsToReturn = [
            'description',
            'ip_radius',
            'password',
            'active',
            'vpn_type',
            'created_at',
            'active',
            'id',
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
