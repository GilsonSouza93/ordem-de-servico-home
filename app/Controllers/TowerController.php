<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TowerController extends BaseController
{
    public $tittle = 'Torre';
    public $addButtonText = 'Nova Torre';
    public $viewPath = 'equipamentos/tower';
    public $baseRoute = '/equipamentos/tower';

    public $popModel;

    public function __construct()
    {
        $this->mainModel = model('TowerModel');
        $this->popModel = model('PopModel');
        $this->data['pops'] = $this->popModel->findAll();
        parent::__construct();
    }
}
