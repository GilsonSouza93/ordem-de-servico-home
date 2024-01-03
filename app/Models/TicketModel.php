<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ticket';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        "district",
        "andress",
        "pop_id",
        "nas",
        "parcel",
        "date",
        "carrier",
        "plans_id",
        "edf",
        "payment",
        "date_start",
        "date_end",
        "ticket_open",
        "pix",
        "title_issued_start",
        "title_issued_end",
        "obs",
        'company_id',
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
        "district",
        "andress",
        "pop_id",
        "nas",
        "parcel",
        "date",
        "carrier",
        "plans_id",
        "edf",
        "payment",
        "date_start",
        "date_end",
        "ticket_open",
        "pix",
        "title_issued_start",
        "title_issued_end",
        "obs",
        'created_at',
        'updated_at',
        'deleted_at',
        'company_id',
        ];

        $fieldsToReturn = [
            'id',
            "district",
            "andress",
            "pop_id",
            "nas",
            "parcel",
            "date",
            "carrier",
            "plans_id",
            "edf",
            "payment",
            "date_start",
            "date_end",
            "ticket_open",
            "pix",
            "title_issued_start",
            "title_issued_end",
            "obs",
            'created_at',
            'updated_at',
            'deleted_at',
            'company_id',
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
