<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OutStockController extends BaseController
{
    public $tittle = 'Saídas';
    public $addButtonText = 'Adicionar Saída';
    public $viewPath = 'outStock';
    public $baseRoute = '/estoque/saidas';

    public function __construct()
    {
        $this->mainModel = model('SaidaModel');
        parent::__construct();
    }

    public function search()
    {
        $data = $this->request->getJSON();
        
        $saidas = $this->mainModel->search($data->search);

        return $this->response->setJSON($saidas);
    }
}

