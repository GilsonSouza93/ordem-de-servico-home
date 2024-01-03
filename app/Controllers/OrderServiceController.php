<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OrderServiceController extends BaseController
{
    public $tittle = 'Ordem de Serviço';
    public $addButtonText = 'Nova O.S';
    public $viewPath = 'orderService';
    public $baseRoute = '/suporte/ordem-de-servico';

}
