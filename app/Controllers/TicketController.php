<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TicketController extends BaseController
{
    public $tittle = 'Boleto';
    public $addButtonText = 'Gerar Novo Boleto';

    public $viewPath = 'ticket';
    public $baseRoute = '/financeiro/boleto';


    public function __construct()
    {
        $this->mainModel = model('TicketModel');
        $this->data['baseRoutePrint'] = 'boleto/imprimir-em-lote';
        $this->data['addButtonPrint'] = 'Imprimir em lote';



        $popModel = model('PopModel');

        $this->data['pops'] = $popModel->findAll();

        $subscriptionModel = model('SubscriptionModel');

        $this->data['subscription'] = $subscriptionModel->findAll();

        

        $this->saveMessage = 'Cliente salvo com sucesso!';

        parent::__construct();
    }

    public function print()
    {
        $this->data['tittle'] = 'Imprimir Boletos';

        return view($this->viewPath . '/print', $this->data);
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


