<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AsaasApiGatewayController extends BaseController
{
    public $tittle = 'Pagamentos';
    public $addButtonText = '';
    public $viewPath = '';
    public $baseRoute = '/pagamentos';

    private $apiKey;
    private $url;
    private $customerModel;

    public function __construct()
    {

        if (getenv('CI_ENVIRONMENT') === 'development') {
            $companyModel = model('companiesModel');
            $company = $companyModel->find(session()->get('company_id'));

            $this->apiKey = $company['asaas_api_key'];

            $this->url = getenv('AsaasGatewayApiUrlDevelopmentMode');
        }
    }

    public function sendRequestPost($endpoint, $data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: ' . $this->apiKey,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    public function sendRequestGet($endpoint)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'access_token: ' . $this->apiKey,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    // public function initPayment($customerId)
    // {
    // }

    // public function updatePaymentStatus()
    // {
    // }

    public function createCustomer()
    {
        $this->customerModel = model('customersModel');

        $customer = $this->customerModel->find($this->request->getPost('customer_id'));

        $data = [
            'name' => $customer->name,
            
            'externalReference' => $customer->id,
        ];

        $response = $this->sendRequestPost('customers', $data);

        if ($response->errors) {
            $data = [
                'status' => 'fail',
                'message' => $response->errors[0]->description,
            ];
        } else {
            $this->customerModel->update($customer->id, [
                'assas_customer_id' => $response->id,
            ]);

            $data = [
                'status' => 'success',
                'message' => 'Cliente criado com sucesso!',
            ];
        }

        return $this->response->setJSON($data);
    }

    public function testConnection()
    {
        $response = $this->sendRequestGet('customers');

        if ($response === null) {
            $data = [
                'status' => 'fail',
                'message' => 'Falha ao conectar com a API!',
            ];
        } else {
            $data = [
                'status' => 'success',
                'message' => 'Conexão realizada com sucesso!',
            ];
        }

        return $this->response->setJSON($data);
    }

}
