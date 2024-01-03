<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PaymentPointController extends BaseController
{
    public $tittle = 'Ponto de Pagamento';
    public $addButtonText = 'Novo Ponto de Pagamento';
    public $viewPath = 'paymentpoint';
    public $baseRoute = 'financeiro/pontosdepagamento';

    public function __construct()
    {
        $this->mainModel = model('PaymentPointModel');
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
