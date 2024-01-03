<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PasswordController extends BaseController
{
    public $tittle = 'Senhas';
    public $addButtonText = 'Alterar Senha';
    public $viewPath = 'password';
    public $baseRoute = '/configuracoes/alterarsenha';
}
