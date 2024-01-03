<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FinancialboxController extends BaseController
{
    public $tittle = 'Caixa';
    public $addButtonText = 'Novo Caixa';
    public $viewPath = 'cashbox';
    public $baseRoute = 'financeiro/caixa';

    public function __construct()
    {
        $this->mainModel = model('FinancialboxModel');

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
