<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SwitchController extends BaseController
{

  public $tittle = 'Switch';
  public $addButtonText = 'Novo Switch';
  public $viewPath = 'equipamentos/switch';
  public $baseRoute = '/equipamentos/switch';

  public function __construct()
  {
    $this->mainModel = model('SwitchModel');

    $oltsModel = model('OltModel');
    $this->data['olts'] = $oltsModel->findAll();

    $polesModel = model('PoleModel');
    $this->data['poles'] = $polesModel->findAll();

    parent::__construct();
  }

  public function treatmentBeforeSave($data)
  {
    $session = session();
    $data['company_id'] = $session->get('company_id');
    if (isset($data['boolean']))
      $data['boolean'] = $this->FormatBoolean($data['boolean']);

    return $data;
  }
}
