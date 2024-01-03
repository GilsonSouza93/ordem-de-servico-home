<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IppoolController extends BaseController
{

    public $tittle = 'IP Pool';
    public $addButtonText = 'Novo IP POOL';
    public $viewPath = 'ippool';
    public $baseRoute = '/configuracoes/ippool';

    public function __construct()
    {
        $this->mainModel = model('IppoolModel');
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
