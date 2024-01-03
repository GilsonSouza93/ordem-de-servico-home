<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InStockController extends BaseController
{
    public $tittle = 'Entradas';
    public $addButtonText = 'Adicionar Entrada';
    public $viewPath = 'inStock';
    public $baseRoute = '/estoque/entradas';

    public function __construct()
    {
        $this->mainModel = model('EntradaModel');
        parent::__construct();
    }

    public function search()
    {
        $data = $this->request->getJSON();
        
        $entradas = $this->mainModel->search($data->search);

        return $this->response->setJSON($entradas);
    }
}
