<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ServidorController extends BaseController
{
    public $tittle = 'Servidores';
    public $addButtonText = 'Novo servidor';
    public $viewPath = 'equipamentos/servidor';
    public $baseRoute = '/equipamentos/servidor';

    public function __construct()
    {
        $this->mainModel = model('ServerModel');
        
        $popModel = model('PopModel');
        $this->data['pops'] = $popModel->findAll();

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
