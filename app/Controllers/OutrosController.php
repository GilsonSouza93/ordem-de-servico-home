<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OutrosController extends BaseController
{
    public $tittle = 'Outros';
    public $addButtonText = 'Novo outro';
    public $viewPath = 'equipamentos/outros';
    public $baseRoute = '/equipamentos/outros';

    public function __construct()
    {
        $this->mainModel = model('OutroModel');
        parent::__construct();
    }

    public function search()
    {
        $data = $this->request->getJSON();
        
        $outros = $this->mainModel->search($data->search);

        return $this->response->setJSON($outros);
    }
}
