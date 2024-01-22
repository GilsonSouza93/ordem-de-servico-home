<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OrderServiceController extends BaseController
{
    public $tittle = 'Ordem de Serviço';
    public $addButtonText = 'Nova O.S';
    public $viewPath = 'orderService';
    public $baseRoute = '/suporte/ordem-de-servico';

    public $CustomerModel;
    public $AccountModel;
    public $ProductModel;

    public function __construct()
    {
        $this->mainModel = model('OrderServiceModel');

        $this->CustomerModel = model('CustomerModel');

        $this->data['costumer'] = $this->CustomerModel->findAll();

        $this->data['customerQty'] = $this->CustomerModel->getDashboardData();
        
        $this->AccountModel = model('AccountModel');

        $this->data['account'] = $this->AccountModel->findAll();
        
        $this->ProductModel = model('ProductModel');

        $this->data['product'] = $this->ProductModel->findAll();
        
        $this->saveMessage = 'Ordem de Serviço salva com sucesso!';
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

    public function getDashboardData()
    {
      return $this->response->setJSON([
        'status' => 'success',
        'data' => $this->mainModel->getDashboardData(),
      ]);
    }

}
