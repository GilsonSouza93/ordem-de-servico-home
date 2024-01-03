<?php

namespace App\Models;

use CodeIgniter\Model;

class OltModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'olts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'name',
        'host',
        'slot',
        'type',
        'user',
        'password',
        'password_admin',
        'snmp_version',
        'snmp_community',
        'coord',
        'debug',//
        'auto_save',//
        'template_onu',//
        'cto',//
        'authorization',//
        'vlan',//
        'disable_onu',//
        'pop_filter',//
        'pop',
        'plot_sign',//
        'active',//
        'telnet',
        'protocol',
        'obs',
        'tl1_ip',
        'tl1_port',
        'tl1_user',
        'tl1_password',
        'wait',
        'parameters',
        'integration',
        'template_filter',//
        'onu_filter',//
        'high_signal',
        'low_signal',
        'high_signal_color',
        'low_signal_color',
        'voip_ip',
        'voip_mask',
        'voip_gateway',
        'voip_port',
        'parameters_json',
        'service_active',
        'service_suspend',
        'change_plan',
        'company_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
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
            'host',
            'name',
            'slot',
            'type',
            'active',
        ];

        $fieldsToReturn = [
            'id',
            'host',
            'name',
            'slot',
            'type',
            'active',
            'created_at',
            'created_by',
            'deleted_at',
            'updated_at',
            'updated_by',
        ];

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

        $query->orderBy('created_at', 'DESC');
        $result = $query->get()->getResultArray();

        return $result;
    }

}
