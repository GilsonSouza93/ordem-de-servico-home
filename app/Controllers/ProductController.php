<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public $tittle = 'Produtos';
    public $addButtonText = 'Novo produto';
    public $viewPath = 'stock/product';
    public $baseRoute = '/estoque/produtos';

    public function index() {
        return view($this->viewPath . '/index', $this->data);
    }

    public function __construct()
    {
        $this->mainModel = model('ProductModel');

        $manufacturerModel = model('ManufacturerModel');
        $categoryModel = model('CategoryModel');
        $supplierModel = model('SupplierModel');

        $this->data['manufacturers'] = $manufacturerModel->findAll();
        $this->data['categories'] = $categoryModel->findAll();
        $this->data['suppliers'] = $supplierModel->findAll();

        parent::__construct();
    }

    public function treatmentBeforeSave($data)
    {
        $session = session();

        $data['created_at'] = date('Y-m-d H:i:s');
        $data['company_id'] = $session->get('company_id');
        if(isset($data['boolean'])) 
        $data['boolean'] = $this->FormatBoolean($data['boolean']);
    
        if($this->mainModel->where('name', $data['name'])->first() && !isset($data['id'])){
            $data['error'] = 'Já existe um produto com este nome!';
        }

        $data['price'] = str_replace('R$', '', $data['price']);
        $data['price'] = str_replace('.', '', $data['price']);
        $data['price'] = str_replace(',', '.', $data['price']);
        $data['price'] = str_replace(' ', '', $data['price']);
        $data['price'] = floatval($data['price']);

        return $data;
    }
}
