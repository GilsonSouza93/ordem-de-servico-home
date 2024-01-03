<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AccountController extends BaseController
{
    public $tittle = 'Contas';
    public $addButtonText = 'Nova Conta';
    public $viewPath = 'account';
    public $baseRoute = '/configuracoes/contas';
    public $saveMessage = 'Conta salva com sucesso!';
    public $deleteMessage = 'Conta excluída com sucesso!';

    public function __construct()
    {
        $this->mainModel = model('AccountModel');
        parent::__construct();
    }

    public function treatmentBeforeSave($data)
    {
        $session = session();

        $data['phone1'] = preg_replace('/[^0-9]/', '', $data['phone1']);
        $data['phone2'] = preg_replace('/[^0-9]/', '', $data['phone2']);
        $data['company_id'] = $session->get('company_id');
      $data['boolean'] = $this->FormatBoolean($data['boolean']);

        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        $data['account_type_id'] = 2;
        $data['created_at'] = date('Y-m-d H:i:s');

        $id = isset($data['id']) ? $data['id'] : null;

        if($id){
            $data['updated_at'] = date('Y-m-d H:i:s');
        }

        if($this->mainModel->where('email', $data['email'])->first() && $id == null){
            $data['error'] = 'Este email já foi cadastrado!';
        }

        return $data;
    }
}