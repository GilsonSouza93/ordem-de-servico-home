<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CategoryController extends BaseController
{
  public $tittle = 'Categoria';
  public $addButtonText = 'Nova Categoria';
  public $viewPath = 'stock/category';
  public $baseRoute = '/estoque/categorias';

  public function __construct()
  {
      $this->mainModel = model('CategoryModel');
      parent::__construct();
  }


  public function treatmentBeforeSave($data)
  {
    $session = session();

    $data['account_type_id'] = 2;
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['company_id'] = $session->get('company_id');
    if(isset($data['boolean'])) 
    $data['boolean'] = $this->FormatBoolean($data['boolean']);


    if ($this->mainModel->where('name', $data['name'])->first()) {
      $data['error'] = 'Já existe uma categoria com este nome!';
    }

    return $data;
  }
}
