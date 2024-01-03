<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NasController extends BaseController
{
    public $tittle = 'NAS';
    public $addButtonText = 'Novo NAS';
    public $viewPath = '/equipamentos/nas';
    public $baseRoute = '/equipamentos/nas';

    public $radiusModel;

    public function __construct()
    {
        $this->mainModel = model('NasModel');
       
        $this->radiusModel = model('radiusModel');
        $this->data['radius'] = $this->radiusModel->findAll();

        $this->saveMessage = 'NAS salvo com sucesso!';
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
