<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    
    public function index()
    {
        return view('auth/index', $this->data);
    }

    public function login()
    {
        if($this->request->getMethod('POST')) {
            $data = $this->request->getPost();

            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]|max_length[16]'
            ];

            if(!$this->validate($rules)) {
                $response = [
                    'status' => 400,
                    'error' => true,
                    'message' => $this->validator->getErrors()
                ];
            } else {
                $email = $data['email'];
                $password = $data['password'];

                $userModel = new \App\Models\UserModel();

                $user = $userModel->where('email', $email)->first();

                if(!$user) {
                    $response = [
                        'status' => 401,
                        'error' => true,
                        'message' => 'Usuário não encontrado'
                    ];
                } else {
                    if(!password_verify($password, $user['password'])) {
                        $response = [
                            'status' => 401,
                            'error' => true,
                            'message' => 'Senha incorreta'
                        ];
                    } else {
                        $SessionData = [
                            'id' => $user['id'],
                            'name' => $user['name'],
                            'email' => $user['email'],
                            'isLoggedIn' => true,
                            'company_id' => $user['company_id'],
                        ];

                        session()->set($SessionData);
                        
                        $response = [
                            'status' => 200,
                            'error' => false,
                            'message' => 'Login efetuado com sucesso'
                        ];
                    }
                }

                return $this->response->setJSON($response);
            }


        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
