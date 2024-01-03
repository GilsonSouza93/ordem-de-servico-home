<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SubscriptionController extends BaseController
{
    public $tittle = 'Planos';
    public $addButtonText = 'Novo Plano';
    public $viewPath = 'subscription';
    public $baseRoute = '/configuracoes/planos';

    public function __construct()
    {
        $this->mainModel = model('SubscriptionModel');
        parent::__construct();
    }

    public function treatmentBeforeSave($data)
    {
        $session = session();
        $data['company_id'] = $session->get('company_id');

        if(isset($data['boolean'])) 
        $data['boolean'] = $this->FormatBoolean($data['boolean']);

        $data['created_at'] = date('Y-m-d H:i:s');

        $id = isset($data['id']) ? $data['id'] : null;

        if($id){
            $data['updated_at'] = date('Y-m-d H:i:s');
        }

        if($this->mainModel->where('name', $data['name'])->first() && !$id){
            $data['error'] = 'Já existe um plano com este nome!';
        }

        return $data;
    }
}
