<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RadiusController extends BaseController
{
    public $tittle = 'Radius';
    public $addButtonText = 'Novo Radius';
    public $viewPath = 'equipamentos/radius';
    public $baseRoute = '/equipamentos/radius';

    public function __construct()
    {
      $this->mainModel = model('RadiusModel');

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
