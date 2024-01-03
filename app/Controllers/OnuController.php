<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OnuController extends BaseController
{
    public $tittle = 'Onu';
    public $addButtonText = 'Nova ONU';
    public $viewPath = 'equipamentos/onu';
    public $baseRoute = '/equipamentos/onu';


    public function __construct()
    {
        $this->mainModel = model('OnuModel');
        $this->oltModel = model('OltModel');


        $this->data['olts'] = $this->oltModel->findAll();
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
