<?php

namespace App\Models;

use CodeIgniter\Model;

class RadiusModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'radiusnan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'pop_id',
        "ip_pool",
        "user",
        "password",
        "ipv6_prefix",
        "ipv6_pool",
        "ip_pool_block",
        "ip_address",
        "name",
        "type",
        "port",
        "secret_word",
        "nas_ip",
        "extra_type",
        "ip_origin",
        "radius_config",
        "port_2",
        "user_2",
        "password_2",
        "snmp_version",
        "snmp_community",
        "snmp_port",
        "http_port",
        "dns_primary",
        "dns_secondary",
        "account_ing_update",
        "port_secondary",
        "lat_long",
        "active_radius",
        "costumer_disponible",
        "verify_login",
        "verify_mac",
        "verify_mac_login",
        "rrd_interfaces",
        "json_parameters",
        "auto_reload",
        "simultaneous_login",
        "check_radius",
        "timeout_check",
        "check_conexion", 
        "timeout_graphics",
        "ip_address_access",//
        "access_type",
        "access_port",
        "access_user",
        "access_password",
        "short_code",
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
            'type',
            'port',
            'secret_word',
            'created_at',
            'active_radius',
        ];

        $fieldsToReturn = [
            'id',
            'type',
            'port',
            'secret_word',
            'created_at',
            'active_radius',
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
