<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ContractController extends BaseController
{
 public $tittle ='Contratos';
 public $addButtonText ='Adicionar novo contrato';
 public $viewPath ='contract';
 public $baseRoute ='financeiro/contratos';

 public function __construct()
 {
     $this->mainModel = model('ContractModel');
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
