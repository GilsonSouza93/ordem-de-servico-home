<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RelatorioController extends BaseController
{
    public $tittle = 'Relatórios';
    public $addButtonText = 'Adicionar relatório';
    public $viewPath = 'relatorios';
    public $baseRoute = '/estoque/relatorios';

    public function __construct()
    {
        $this->mainModel = model('ReportModel');
        parent::__construct();
    }

    public function search()
    {
        $data = $this->request->getJSON();
        
        $reports = $this->mainModel->search($data->search);

        return $this->response->setJSON($reports);
    }
}
