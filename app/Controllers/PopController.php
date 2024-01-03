<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PopController extends BaseController
{
    public $tittle = 'Pop';
    public $addButtonText = 'Novo Pop';
    public $viewPath = 'pop';
    public $baseRoute = '/gerencial/pop';

    public $subscriptionModel;
    public $nasModel;
    private $userModel;
    

    public function __construct()
    {
        $this->mainModel = model('App\Models\PopModel');
        $this->mainModel = model('PopModel');
        $this->subscriptionModel = model('SubscriptionModel');
        $this->data['plans'] = $this->subscriptionModel->findAll();
        $this->userModel = model('UserModel');
        $this->data['users'] = $this->userModel->getUsers();

               
        $this->nasModel = model('nasModel');
        $this->data['nas'] = $this->nasModel->findAll();

        return parent::__construct();
    }

    public function treatmentBeforeSave($data)
    {
      $session = session();
      $data['company_id'] = $session->get('company_id');
      if(isset($data['active'])) 
        $data['active'] = $this->FormatBoolean($data['active']);      
      return $data;
    }
}
