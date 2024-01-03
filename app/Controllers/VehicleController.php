<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class VehicleController extends BaseController
{
    public $tittle = 'Veículos';
    public $addButtonText = 'Nova Veículo';
    public $viewPath = 'vehicle';
    public $baseRoute = '/gerencial/veiculos';

    public function __construct()
    {
        $this->mainModel = model('VehicleModel');
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