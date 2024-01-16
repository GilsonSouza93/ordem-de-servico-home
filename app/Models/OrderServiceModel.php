<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderServiceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'order_service';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'name',
        'phone',
        'cpf',
        'company',
        'setor',
        'service',
        'user',
        'date_of_birth',
        'status',
        'product',
        'origin',
        'shop',
        'description',
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
            'name',
            'phone',
            'cpf',
            'company',
            'setor',
            'service',
            'user',
            'date_of_birth',
            'status',
            'product',
            'origin',
            'shop',
            'description',
        ];

        $fieldsToReturn = [
            'id',
            'name',
            'phone',
            'cpf',
            'company',
            'setor',
            'service',
            'user',
            'date_of_birth',
            'status',
            'product',
            'origin',
            'shop',
            'description',
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
            'abertos' => 0,
            'andamento' => 0,
            'concluidos' => 0,
            'pendente' => 0,
            'cancelados' => 0,
        ];

        foreach ($query as $row) {
            switch ($row['status']) {
                case 'abertos':
                    $data['abertos'] = $row['count'];
                    break;
                case 'andamento':
                    $data['andamento'] = $row['count'];
                    break;
                case 'concluidos':
                    $data['concluidos'] = $row['count'];
                    break;
                case 'pendente':
                    $data['pendente'] = $row['count'];
                    break;
                case 'cancelados':
                    $data['cancelados'] = $row['count'];
                    break;
            }
        }

        return $data;
    }
}
