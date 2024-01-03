<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SmsController extends BaseController
{
    public $tittle = 'SMS';
    public $addButtonText = 'Cadastrar SMS';
    public $viewPath = 'sms';
    public $baseRoute = '/gerencial/sms';

    public function __construct()
    {
        $this->mainModel = model('SmsModel');
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
