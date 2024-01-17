<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
  public $tittle = 'Dashboard';
  public $viewPath = 'dashboard';

  protected $customerModel;

  public function __construct()
  {
    $this->customerModel = new \App\Models\CustomerModel();

    $this->data['customerQty'] = $this->customerModel->getDashboardData();

    }

  public function getDashboardData()
  {
    return $this->response->setJSON([
      'status' => 'success',
      'data' => $this->mainModel->getDashboardData(),
    ]);
  }
}
