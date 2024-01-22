<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
  public $tittle = 'Dashboard';
  public $viewPath = 'dashboard';

  public function __construct()
  {
    parent::__construct();
  }
  
}
