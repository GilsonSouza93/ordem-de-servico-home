<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StockController extends BaseController
{
    public $tittle = 'Estoque';
    public $addButtonText = 'Novo Produto';
    public $viewPath = 'stock';
    public $baseRoute = '/estoque';
}