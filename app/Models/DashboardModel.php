<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dashboards';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function getDashboardData()
    {
        $session = session();

        $companyId = $session->get('company_id');

        $query = $this->db->table($this->table)
            ->select('status, count(status) as count')
            ->where('company_id', $companyId)
            ->groupBy('status')
            ->get()->getResultArray();

        $data = [
            'aberto' => 0,
            'execução' => 0,
            'pendente' => 0,
            'cancelada' => 0,
            'encerrada' => 0,
            'concluidos' => 0,
        ];

        foreach ($query as $row) {
            switch ($row['status']) {
                case 'aberto':
                    $data['aberto'] = $row['count'];
                    break;
                case 'execução':
                    $data['execução'] = $row['count'];
                    break;
                case 'pendente':
                    $data['pendente'] = $row['count'];
                    break;
                case 'cancelados':
                    $data['cancelados'] = $row['count'];
                    break;
                case 'encerrada':
                    $data['encerrada'] = $row['count'];
                    break;
                case 'concluidos':
                    $data['concluidos'] = $row['count'];
                    break;    
            }
        }
    }

}
