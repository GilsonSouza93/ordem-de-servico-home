<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BrandController extends BaseController
{
    public $tittle = 'Marcas';
    public $addButtonText = 'Novo marca';
    public $viewPath = 'stock/brand';
    public $baseRoute = '/estoque/marcas';

    public function __construct()
    {
        $this->mainModel = model('BrandModel');
        parent::__construct();
    }

    public function treatmentBeforeSave($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');

        if($this->mainModel->where('name', $data['name'])->first()){
            $data['error'] = 'Já existe uma marca com este nome!';
        }

        return $data;
    }
}
