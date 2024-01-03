<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RouterController extends BaseController
{
    public $tittle = 'Roteadores';
    public $addButtonText = 'Novo roteador';
    public $viewPath = 'equipamentos/router';
    public $baseRoute = '/equipamentos/router';

    public function __construct()
    {
        $this->mainModel = model('RouterModel');

        $oltsModel = model('OltModel');
        $this->data['olts'] = $oltsModel->findAll();

        parent::__construct();
    }

    public function treatmentBeforeSave($data)
    {
      $session = session();
      $data['company_id'] = $session->get('company_id');
      if(isset($data['boolean'])) 
        $data['boolean'] = $this->FormatBoolean($data['boolean']);    
      return $data;
    }
}
