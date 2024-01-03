<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BillstoreciverController extends BaseController
{
    public $tittle = 'Contas a Receber';
    public $addButtonText = 'Adicionar Conta a Receber';
    public $viewPath = 'billstoreciver';
    public $baseRoute = '/financeiro/contas-receber';
    
    public function __construct()
    {
        $this->mainModel = model('BillstoreciverModel');
        
        $popModel = model('PopModel');
        $this->data['pops'] = $popModel->findAll();
        
        $supplierModel = model('SupplierModel');
        $this->data['suppliers'] = $supplierModel->findAll();
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
