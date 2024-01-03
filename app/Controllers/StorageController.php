<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StorageController extends BaseController
{
    public $tittle = 'Storage';
    public $addButtonText = 'Novo storage';
    public $viewPath = 'equipamentos/storage';
    public $baseRoute = '/equipamentos/storage';

    public function __construct()
    {
        $this->mainModel = model('StorageModel');
        parent::__construct();
    }

    public function search()
    {
        $data = $this->request->getJSON();
        
        $storages = $this->mainModel->search($data->search);

        return $this->response->setJSON($storages);
    }

}
