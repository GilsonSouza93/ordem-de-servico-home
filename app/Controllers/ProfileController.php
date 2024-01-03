<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public $tittle = 'Grupo de Permissões';
    public $addButtonText = 'Novo Grupo de Permissão';
    public $viewPath = 'permission-group';
    public $baseRoute = 'configuracoes/grupo-permissao';

    public $subscriptionModel;

    public $onuModel;

    public function __construct()
    {
        $this->mainModel = model('ProfileModel');

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
