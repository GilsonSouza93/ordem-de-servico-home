<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MovementsController extends BaseController
{
    public $tittle = 'Movimentações';
    public $addButtonText = 'Nova Movimentação';
    public $viewPath = 'movements';
    public $baseRoute = 'estoque/movimentacoes';

    public $supplierModel;
    private $userModel;

    public function __construct()
    {
        $this->mainModel = model('MovementsModel');

        $this->saveMessage = 'Movimentação salva com sucesso!';

        $this->supplierModel = model('SupplierModel');
        $this->data['suppliers'] = $this->supplierModel->findAll();

        $this->userModel = model('UserModel');
        $this->data['users'] = $this->userModel->getUsers();


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
