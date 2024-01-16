<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
  public $tittle = 'Dashboard';
  public $viewPath = 'dashboard';

  protected $customerModel;
  protected $orderServiceModel;


  public function __construct()
  {
    $this->customerModel = new \App\Models\CustomerModel();

    $this->orderServiceModel = new \App\Models\OrderServiceModel();

    $this->data['customerQty'] = $this->customerModel->getDashboardData();
   
    $this->data['orderService'] = $this->orderServiceModel->getCustomerQty();

    return parent::__construct();
  }

  public function getDashboardData()
  {
    return $this->response->setJSON([
      'status' => 'success',
      'data' => $this->mainModel->getDashboardData(),
    ]);
  }
}
