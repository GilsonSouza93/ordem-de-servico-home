<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    public $viewPath = '';
    public $data = [];
    public $tittle = '';
    public $addButtonText = '';
    public $baseRoute = '';
    public $baseRoutePrint = '';
    public $mainModel = null;
    public $saveMessage = 'Salvo com sucesso!';
    public $deleteMessage = 'Excluído com sucesso!';

    public function __construct()
    {
        $this->data['navigation_bar_items'] = [

            'dashboard' => [
                'title' => 'Dashboard',
                'href' => base_url('dashboard'),
                'show_subitems' => false,
                'subitems' => []
            ],

            'customers' => [
                'title' => 'Clientes',
                'href' => base_url('clientes'),
                'icon' => '<i class="fas fa-users"></i>',
                'show_subitems' => false,
            ],

            // 'financial' => [
            //     'title' => 'Financeiro',
            //     'href' => base_url('financeiro'),
            //     'icon' => '<i class="fas fa-tools"></i>',
            //     'show_subitems' => true,
            //     'color' => '#3e444a',
            //     'subitems' => [
            //         'dashboard' => [
            //             'title' => 'Dashboard',
            //             'href' => base_url('financeiro/dashboard'),
            //         ],
            //         'caixa' => [
            //             'title' => 'Caixa',
            //             'href' => base_url('financeiro/caixa'),
            //         ],
            //         'payable' => [
            //             'title' => 'Contas a Pagar',
            //             'href' => base_url('financeiro/contas-pagar'),
            //         ],
            //         'receive' => [
            //             'title' => 'Contas a Receber',
            //             'href' => base_url('financeiro/contas-receber'),
            //         ],
            //         'ticket' => [
            //             'title' => 'Boletos',
            //             'href' => base_url('financeiro/boleto'),
            //         ],
            //         'contract' => [
            //             'title' => 'Contratos',
            //             'href' => base_url('financeiro/contratos'),
            //         ],
            //         'paymentpoint' => [
            //             'title' => 'Ponto de Pagamento',
            //             'href' => base_url('financeiro/pontosdepagamento'),
            //         ],
            //         'paymentplans' => [
            //             'title' => 'Planos de Pagamento',
            //             'href' => base_url('financeiro/planosdepagamento'),
            //         ],

            //     ]

            // ],

            // 'gerencial' => [
            //     'title' => 'Gerencial',
            //     'href' => base_url('gerencial'),
            //     'icon' => '<i class="fas fa-tools"></i>',
            //     'show_subitems' => true,
            //     'color' => '#3e444a',
            //     'subitems' => [
            //         'pop' => [
            //             'title' => 'POP',
            //             'href' => base_url('gerencial/pop'),
            //         ],
            //         'email' => [
            //             'title' => 'Email',
            //             'href' => base_url('gerencial/email'),
            //         ],
            //         'sms' => [
            //             'title' => 'SMS',
            //             'href' => base_url('gerencial/sms'),
            //         ],
            //         'vehicle' => [
            //             'title' => 'Veículos',
            //             'href' => base_url('gerencial/veiculos'),
            //         ],
            //     ]

            // ],
            // 'equipment' => [
            //     'title' => 'Equipamentos',
            //     'href' => base_url('equipamentos'),
            //     'icon' => '<i class="fas fa-tools"></i>',
            //     'show_subitems' => true,
            //     'color' => '#3e444a',
            //     'subitems' => [
            //         'olt' => [
            //             'title' => 'OLTs',
            //             'href' => base_url('equipamentos/olt'),
            //             'icon' => '<i class="fas fa-server"></i>'
            //         ],
            //         'onu' => [
            //             'title' => 'ONUs',
            //             'href' => base_url('equipamentos/onu'),
            //             'icon' => '<i class="fas fa-microchip"></i>'
            //         ],
            //         'switch' => [
            //             'title' => 'Switches',
            //             'href' => base_url('equipamentos/switch'),
            //             'icon' => '<i class="fas fa-network-wired"></i>'
            //         ],
            //         'router' => [
            //             'title' => 'Roteadores',
            //             'href' => base_url('equipamentos/router'),
            //             'icon' => '<i class="fas fa-network-wired"></i>'
            //         ],
            //         'radius' => [
            //             'title' => 'Radius',
            //             'href' => base_url('equipamentos/radius'),
            //             'icon' => '<i class="fas fa-network-wired"></i>'

            //         ],
            //         'nas' => [
            //             'title' => 'NAS',
            //             'href' => base_url('equipamentos/nas'),
            //             'icon' => '<i class="fas fa-network-wired"></i>'

            //         ],
            //         'poste' => [
            //             'title' => 'Poste',
            //             'href' => base_url('equipamentos/poste'),
            //             'icon' => '<i class="fas fa-wifi"></i>'
            //         ],
            //         'tower' => [
            //             'title' => 'Torre',
            //             'href' => base_url('equipamentos/tower'),
            //             'icon' => '<i class="fas fa-wifi"></i>'
            //         ],
            //         'servidor' => [
            //             'title' => 'Servidores',
            //             'href' => base_url('equipamentos/servidor'),
            //             'icon' => '<i class="fas fa-server"></i>'
            //         ]
            //     ]
            // ],

            'Estoque' => [
                'title' => 'Estoque',
                'href' => base_url('estoque'),
                'icon' => '<i class="fas fa-boxes"></i>',
                'show_subitems' => true,
                'color' => '#3e444a',
                'subitems' => [
                    'Produtos' => [
                        'title' => 'Produtos',
                        'href' => base_url('estoque/produtos'),
                        'icon' => '<i class="fas fa-boxes"></i>'
                    ],

                    'Categorias' => [
                        'title' => 'Categorias',
                        'href' => base_url('estoque/categorias'),
                        'icon' => '<i class="fas fa-boxes"></i>'
                    ],

                    'Fornecedores' => [
                        'title' => 'Fornecedores',
                        'href' => base_url('estoque/fornecedores'),
                        'icon' => '<i class="fas fa-boxes"></i>'
                    ],

                    'Fabricantes' => [
                        'title' => 'Fabricantes',
                        'href' => base_url('estoque/fabricantes'),
                        'icon' => '<i class="fas fa-boxes"></i>'
                    ],

                    'movimentacoes' => [
                        'title' => 'Movimentações',
                        'href' => base_url('estoque/movimentacoes'),
                        'icon' => '<i class="fas fa-boxes"></i>',
                    ],
                ]
            ],

            // 'Monitoramento' => [
            //     'title' => 'Monitoramento',
            //     'href' => base_url('monitoramento'),
            //     'icon' => '<i class="fas fa-boxes"></i>',
            //     'show_subitems' => true,
            //     'color' => '#3e444a',
            //     'subitems' => [
            //         'Mapa' => [
            //             'title' => 'Mapa',
            //             'href' => base_url('monitoramento/mapa')
            //         ],

            //         'Clientes' => [
            //             'title' => 'Clientes',
            //             'href' => base_url('monitoramento/clientes')
            //         ],

            //         'Equipamentos' => [
            //             'title' => 'Equipamentos',
            //             'href' => base_url('monitoramento/equipamentos')
            //         ],

            //         'Rede' => [
            //             'title' => 'Rede',
            //             'href' => base_url('monitoramento/rede')
            //         ],
            //     ]
            // ],

            'settings' => [
                'title' => 'Configurações',
                'href' => base_url('configuracoes'),
                'icon' => '<i class="fas fa-cog"></i>',
                'show_subitems' => true,
                'color' => '#3e444a',
                'subitems' => [
                    'Conta' => [
                        'title' => 'Contas',
                        'href' => base_url('configuracoes/contas'),
                    ],
                    'permisions_groups' => [
                        'title' => 'Grupos de Permissão',
                        'href' => base_url('configuracoes/grupo-permissao'),
                    ],
                    // 'Planos' => [
                    //     'title' => 'Planos',
                    //     'href' => base_url('configuracoes/planos'),
                    // ],
                    // 'Ip Pool' => [
                    //     'title' => 'IP POOL',
                    //     'href' => base_url('configuracoes/ippool'),
                    // ],
                    // 'Ipv6 Pool' => [
                    //     'title' => 'IPv6 POOL',
                    //     'href' => base_url('configuracoes/ipv6pool'),
                    // ],
                    // 'Central do Assinante' => [
                    //     'title' => 'Central do Assinante',
                    //     'href' => base_url('configuracoes/centraldoassinante'),
                    // ],
                    // 'Integrações' => [
                    //     'title' => 'Integrações',
                    //     'href' => base_url('configuracoes/integracoes'),
                    // ],
                    'Alterar Senha' => [
                        'title' => 'Alterar Senha',
                        'href' => base_url('configuracoes/alterarsenha'),
                    ],
                ]
            ],
            'support' => [
                'title' => 'Suporte',
                'href' => base_url('suporte'),
                'icon' => '<i class="fas fa-tools"></i>',
                'show_subitems' => true,
                'color' => '#3e444a',
                'subitems' => [
                    // 'routerboard' => [
                    //     'title' => 'Routerboard',
                    //     'href' => base_url('suporte/routerboard'),
                    // ],
                    'order_service' => [
                        'title' => 'Ordem de Serviço',
                        'href' => base_url('suporte/ordem-de-servico'),
                    ],
                ]
            ],
        ];

        // add button logout
        $this->data['navigation_bar_items']['logout'] = [
            'title' => 'Sair',
            'href' => base_url('auth/logout'),
            'icon' => '<i class="fas fa-sign-out-alt"></i>',
            'show_subitems' => false,
        ];

        $this->data['lang'] = 'pt-br';
        $this->data['tittle'] = $this->tittle;
        $this->data['addButtonText'] = $this->addButtonText;
        $this->data['baseRoute'] = base_url($this->baseRoute);
    }

    public function index()
    {
        return view($this->viewPath . '/index', $this->data);
    }

    public function edit($id = null)
    {
        $this->data['register'] = (object) $this->mainModel->find($id);

        return view($this->viewPath . '/form', $this->data);
    }

    public function delete()
    {
        $data = $this->request->getJSON();

        if (is_object($data))
            $data = (array) $data;

        $response = $this->mainModel->delete($data['id']);

        if ($response) {
            $data = [
                'status' => 'success',
                'message' => 'Excluído com sucesso!',
                'data' => $response
            ];
        } else {
            $data = [
                'status' => 'fail',
                'message' => 'Erro ao excluir!',
                'data' => $response
            ];
        }

        return $this->response->setJSON($data);
    }

    public function form()
    {
        return view($this->viewPath . '/form', $this->data);
    }

    public function treatmentBeforeSave($data)
    {
        return $data;
    }

    public function save()
    {
        $data = $this->request->getPost();

        if (!$data)
            $data = $this->request->getJSON();

        if (is_object($data))
            $data = (array) $data;

        $data = $this->treatmentBeforeSave($data);

        if (isset($data['error'])) {
            return $this->response->setJSON([
                'status' => 'fail',
                'message' => $data['error'],
            ]);
        }

        $response = $this->mainModel->save($data);

        if ($response) {
            $data = [
                'status' => 'success',
                'message' => $this->saveMessage,
            ];
        } else {
            $data = [
                'status' => 'fail',
                'message' => $this->deleteMessage,
            ];
        }

        return $this->response->setJSON($data);
    }

    public function FormatBoolean($value){

        if($value == 'on' || $value == '1' || $value == 1 || $value == true ) return 1;
        else return 0;

    }

    public function search()
    {
        $json = $this->request->getJSON();

        $data = [
            'search' => $json->search
        ];

        try {
            $response = $this->mainModel->search($data);

            return $this->response->setJSON([
                'status' => 'success',
                'data' => $response
            ]);
        } catch (\Throwable $th) {
            if (ENVIRONMENT == 'production') {
                $message = 'Não foi possivel conectar ao banco de dados, solicite suporte!';
            } else {
                $message = $th->getMessage();
            }

            return $this->response->setJSON([
                'status' => 'error',
                'message' => $message
            ]);
        }
    }
}
