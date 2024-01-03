<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ManufacturerController extends BaseController
{
    
    public $tittle = 'Fabricante';
    public $addButtonText = 'Nova Fabricante';
    public $viewPath = 'stock/manufacturer';
    public $baseRoute = '/estoque/fabricantes';
    
    public function __construct()
    {
        $this->mainModel = model('ManufacturerModel');
        parent::__construct();
    }


    public function treatmentBeforeSave($data)
    {
        $session = session();

        $data['created_at'] = date('Y-m-d H:i:s');
        $data['company_id'] = $session->get('company_id');
        if(isset($data['boolean'])) 
        $data['boolean'] = $this->FormatBoolean($data['boolean']);


        if($this->mainModel->where('name', $data['name'])->first()){
            $data['error'] = 'Já existe uma fabricante com este nome!';
        }

        return $data;
    }
}
