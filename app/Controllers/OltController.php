<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OltController extends BaseController
{
      
    public $tittle = 'Olt';
    public $addButtonText = 'Nova Olt';
    public $viewPath = 'equipamentos/olt';
    public $baseRoute = '/equipamentos/olt';
     
    public function __construct()
    {
        $this->mainModel = model('OltModel');
        parent::__construct();
    }

    public function treatmentBeforeSave($data)
    {
        $session = session();

        if(!isset($data['name']))
            $data['error'] = 'Nome é obrigatório';

        $data['company_id'] = $session->get('company_id');
        if(isset($data['boolean'])) 
        $data['boolean'] = $this->FormatBoolean($data['boolean']);
        $data['created_by'] = $session->get('id');

        return $data;
    }
}
