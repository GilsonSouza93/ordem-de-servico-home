<?php

namespace App\Models;

use CodeIgniter\Model;

abstract class BaseModel extends Model {

    public $searchQuery = null;
    public $fieldsToReturn = [];
    public $fieldsToSearch = [];
    public $searchLength = 15;

    public function search(array $filters = null, string $search = null, int $page = null) {

        if($this->searchQuery == null)
            $this->searchQuery = $this->db->table($this->table);
        
        if($search) {
            $this->searchQuery->groupStart();
            foreach($this->fieldsToSearch as $field) {
                $this->searchQuery->orLike($field, $search);
            }
            $this->searchQuery->groupEnd();
        }

        if($filters) {
            foreach($filters as $key => $filter) {

                if($filter != "") {
                    if($filter == 'null') {
                        $this->searchQuery->where($key, null);
                    } else {
                        $key = $key == 'team_id' ? 'customers.team_id' : $key;
                        $this->searchQuery->where($key, $filter);
                    }
                }
            }
        }
        
        $this->searchQuery->orderBy('created_at', 'DESC');
        $result = $this->searchQuery->get()->getResultArray();


        $qty = count($result);
        $pages = ceil($qty / $this->searchLength);

        if($page > $pages)
            $page = $pages;

        $start = ($page - 1) * $this->searchLength;

        if ($this->searchLength > 0)
            $result = array_slice($result, $start, $this->searchLength);
        
        return [
            'pages' => $pages,
            'qty' => $qty,
            'data' => $result
        ];
    }
}