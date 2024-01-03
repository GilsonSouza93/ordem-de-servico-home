<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
    public $tittle = 'Email';
    public $addButtonText = 'Cadastrar email';
    public $viewPath = 'email';
    public $baseRoute = '/gerencial/email';

    public function __construct()
    {
        $this->mainModel = model('EmailModel');
        $popModel = model('PopModel');
        $this->data['pops'] = $popModel->findAll();

        $plansModel = model('PlansModel');
        $this->data['plans'] = $plansModel->findAll();

        $oltsModel = model('OltModel');
        $this->data['olts'] = $oltsModel->findAll();


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
