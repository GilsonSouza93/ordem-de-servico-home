<?php

namespace Config;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index');
$routes->post('login', 'LoginController::login');

// protected routes group
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->group('map', static function ($routes) {
        $routes->get('postes', 'MapController::getPosts');
    });
    $routes->group('dashboard', static function ($routes) {
        $routes->get('/', 'DashboardController::index');

        // info to cards
        $routes->get('info', 'DashboardController::info');
    });
    $routes->group('auth', static function ($routes) {
        $routes->get('logout', 'LoginController::logout');
    });

    $routes->group('clientes', static function ($routes) {
        $routes->get('/', 'CustomerController::index');
        $routes->get('novo', 'CustomerController::form');
        $routes->get('editar/(:num)', 'CustomerController::edit/$1');

        $routes->post('save', 'CustomerController::save');
        $routes->post('search', 'CustomerController::search');
        $routes->post('delete', 'CustomerController::delete');
    });


    $routes->group('estoque', static function ($routes) {
        $routes->group('produtos', static function ($routes) {
            $routes->get('/', 'ProductController::index');
            $routes->get('novo', 'ProductController::form');
            $routes->get('novo', 'ProductController::filter');
            $routes->get('editar/(:num)', 'ProductController::edit/$1');

            $routes->post('save', 'ProductController::save');
            $routes->post('search', 'ProductController::search');
            $routes->post('delete', 'ProductController::delete');
        });
        $routes->group('categoria', static function ($routes) {
            $routes->get('/', 'CategoryController::index');
            $routes->get('novo', 'CategoryController::form');
            $routes->get('novo', 'CategoryController::filter');
            $routes->get('editar/(:num)', 'CategoryController::edit/$1');

            $routes->post('save', 'CategoryController::save');
            $routes->post('search', 'CategoryController::search');
            $routes->post('delete', 'CategoryController::delete');
        });
        $routes->group('fabricantes', static function ($routes) {
            $routes->get('/', 'ManufacturerController::index');
            $routes->get('novo', 'ManufacturerController::form');
            $routes->get('editar/(:num)', 'ManufacturerController::edit/$1');

            $routes->post('save', 'ManufacturerController::save');
            $routes->post('search', 'ManufacturerController::search');
            $routes->post('delete', 'ManufacturerController::delete');
        });

        $routes->group('fornecedores', static function ($routes) {
            $routes->get('/', 'SupplierController::index');
            $routes->get('novo', 'SupplierController::form');
            $routes->get('novo', 'SupplierController::filter');
            $routes->get('editar/(:num)', 'SupplierController::edit/$1');

            $routes->post('save', 'SupplierController::save');
            $routes->post('search', 'SupplierController::search');
            $routes->post('delete', 'SupplierController::delete');
        });

        $routes->group('movimentacoes', static function ($routes) {
            $routes->get('/', 'MovementsController::index');
            $routes->get('novo', 'MovementsController::form');
            $routes->get('novo', 'MovementsController::filter');
            $routes->get('editar/(:num)', 'MovementsController::edit/$1');

            $routes->post('save', 'MovementsController::save');
            $routes->post('search', 'MovementsController::search');
            $routes->post('delete', 'MovementsController::delete');
        });
       
        $routes->group('categorias', static function ($routes) {
            $routes->get('/', 'CategoryController::index');
            $routes->get('novo', 'CategoryController::form');
            $routes->get('novo', 'CategoryController::filter');
            $routes->get('editar/(:num)', 'CategoryController::edit/$1');

            $routes->post('save', 'CategoryController::save');
            $routes->post('search', 'CategoryController::search');
            $routes->post('delete', 'CategoryController::delete');
        });
        $routes->group('entradas', static function ($routes) {
            $routes->get('/', 'InStockController::index');
            $routes->get('novo', 'InStockController::form');
            $routes->get('novo', 'InStockController::filter');
            $routes->get('editar/(:num)', 'InStockController::edit/$1');

            $routes->post('save', 'InStockController::save');
            $routes->post('search', 'InStockController::search');
            $routes->post('delete', 'InStockController::delete');
        });
        $routes->group('saidas', static function ($routes) {
            $routes->get('/', 'OutStockController::index');
            $routes->get('novo', 'OutStockController::form');
            $routes->get('novo', 'OutStockController::filter');
            $routes->get('editar/(:num)', 'OutStockController::edit/$1');

            $routes->post('save', 'OutStockController::save');
            $routes->post('search', 'OutStockController::search');
            $routes->post('delete', 'OutStockController::delete');
        });
        $routes->group('relatorios', static function ($routes) {
            $routes->get('/', 'RelatorioController::index');
            $routes->get('novo', 'RelatorioController::form');
            $routes->get('novo', 'RelatorioController::filter');
            $routes->get('editar/(:num)', 'RelatorioController::edit/$1');

            $routes->post('save', 'RelatorioController::save');
            $routes->post('search', 'RelatorioController::search');
            $routes->post('delete', 'RelatorioController::delete');
        });

        $routes->group('transferencia', static function ($routes) {
            $routes->get('/', 'TransferController::index');
            $routes->get('novo', 'TransferController::form');
            $routes->get('novo', 'TransferController::filter');
            $routes->get('editar/(:num)', 'TransferController::edit/$1');

            $routes->post('save', 'TransferController::save');
            $routes->post('search', 'TransferController::search');
            $routes->post('delete', 'TransferController::delete');
        });
        $routes->group('comodato', static function ($routes) {
            $routes->get('/', 'LendingController::index');
            $routes->get('novo', 'LendingController::form');
            $routes->get('novo', 'LendingController::filter');
            $routes->get('editar/(:num)', 'LendingController::edit/$1');

            $routes->post('save', 'LendingController::save');
            $routes->post('search', 'LendingController::search');
            $routes->post('delete', 'LendingController::delete');
        });
    });

    $routes->group('monitoramento', static function ($routes) {
        $routes->group('mapa', static function ($routes) {
            $routes->get('/', 'MapController::index');
            $routes->get('novo', 'MapController::form');
            $routes->get('editar/(:num)', 'MapController::edit/$1');
            $routes->post('search', 'MapController::search');
            $routes->post('save', 'MapController::save');
            $routes->post('delete', 'MapController::delete');
        });
        $routes->group('rede', static function ($routes) {
            $routes->get('/', 'NetworkController::index');
            $routes->get('novo', 'NetworkController::form');
            $routes->get('editar/(:num)', 'NetworkController::edit/$1');
            $routes->post('search', 'NetworkController::search');
            $routes->post('save', 'NetworkController::save');
            $routes->post('delete', 'NetworkController::delete');
        });
    });

    $routes->group('configuracoes', static function ($routes) {
        $routes->group('contas', static function ($routes) {
            $routes->get('/', 'AccountController::index');
            $routes->get('novo', 'AccountController::form');
            $routes->get('editar/(:num)', 'AccountController::edit/$1');
            $routes->post('search', 'AccountController::search');
            $routes->post('save', 'AccountController::save');
            $routes->post('delete', 'AccountController::delete');
        });

        $routes->group('grupo-permissao', static function ($routes) {
            $routes->get('/', 'ProfileController::index');
            $routes->get('novo', 'ProfileController::form');
            $routes->get('editar/(:num)', 'ProfileController::edit/$1');
            $routes->post('search', 'ProfileController::search');
            $routes->post('save', 'ProfileController::save');
            $routes->post('delete', 'ProfileController::delete');
        });

        $routes->group('ippool', static function ($routes) {
            $routes->get('/', 'IppoolController::index');
            $routes->get('novo', 'IppoolController::form');
            $routes->get('novo', 'IppoolController::filter');
            $routes->get('editar/(:num)', 'IppoolController::edit/$1');

            $routes->post('save', 'IppoolController::save');
            $routes->post('search', 'IppoolController::search');
            $routes->post('delete', 'IppoolController::delete');
        });

        $routes->group('ipv6pool', static function ($routes) {
            $routes->get('/', 'Ipv6Controller::index');
            $routes->get('novo', 'Ipv6Controller::form');
            $routes->get('novo', 'Ipv6Controller::filter');
            $routes->get('editar/(:num)', 'Ipv6Controller::edit/$1');

            $routes->post('save', 'Ipv6Controller::save');
            $routes->post('search', 'Ipv6Controller::search');
            $routes->post('delete', 'Ipv6Controller::delete');
        });

        $routes->group('planos', static function ($routes) {
            $routes->get('/', 'SubscriptionController::index');
            $routes->get('novo', 'SubscriptionController::form');
            $routes->get('novo', 'SubscriptionController::filter');
            $routes->get('editar/(:num)', 'SubscriptionController::edit/$1');

            $routes->post('save', 'SubscriptionController::save');
            $routes->post('search', 'SubscriptionController::search');
            $routes->post('delete', 'SubscriptionController::delete');
        });

        $routes->group('alterarsenha', static function ($routes) {
            $routes->get('/', 'PasswordController::index');
            $routes->get('novo', 'PasswordController::form');
        });
        $routes->group('integracoes', static function ($routes) {
            $routes->get('/', 'integrationsController::index');

            // Assas
            $routes->post('save-asaas', 'integrationsController::saveAsaas');
            $routes->get('check-company-asaas-api', 'integrationsController::checkCompanyAssasApi');
            $routes->get('remove-asaas', 'integrationsController::removeAsaas');
            $routes->get('test-asaas-api-key', 'AsaasApiGatewayController::testConnection');

            // Outros
        });
    });
    $routes->group('equipamentos', static function ($routes) {
        $routes->group('onu', static function ($routes) {
            $routes->get('/', 'OnuController::index');
            $routes->get('novo', 'OnuController::form');
            $routes->get('novo', 'OnuController::filter');
            $routes->get('editar/(:num)', 'OnuController::edit/$1');

            $routes->post('save', 'OnuController::save');
            $routes->post('search', 'OnuController::search');
            $routes->post('delete', 'OnuController::delete');
        });
        $routes->group('olt', static function ($routes) {
            $routes->get('/', 'OltController::index');
            $routes->get('novo', 'OltController::form');
            $routes->get('novo', 'OltController::filter');
            $routes->get('editar/(:num)', 'OltController::edit/$1');

            $routes->post('save', 'OltController::save');
            $routes->post('search', 'OltController::search');
            $routes->post('delete', 'OltController::delete');
        });
        $routes->group('switch', static function ($routes) {
            $routes->get('/', 'SwitchController::index');
            $routes->get('novo', 'SwitchController::form');
            $routes->get('novo', 'SwitchController::filter');
            $routes->get('editar/(:num)', 'SwitchController::edit/$1');

            $routes->post('save', 'SwitchController::save');
            $routes->post('search', 'SwitchController::search');
            $routes->post('delete', 'SwitchController::delete');
        });
        $routes->group('router', static function ($routes) {
            $routes->get('/', 'RouterController::index');
            $routes->get('novo', 'RouterController::form');
            $routes->get('novo', 'RouterController::filter');
            $routes->get('editar/(:num)', 'RouterController::edit/$1');

            $routes->post('save', 'RouterController::save');
            $routes->post('search', 'RouterController::search');
            $routes->post('delete', 'RouterController::delete');
        });
        $routes->group('radius', static function ($routes) {
            $routes->get('/', 'RadiusController::index');
            $routes->get('novo', 'RadiusController::form');
            $routes->get('novo', 'RadiusController::filter');
            $routes->get('editar/(:num)', 'RouterController::edit/$1');

            $routes->post('save', 'RadiusController::save');
            $routes->post('search', 'RadiusController::search');
            $routes->post('delete', 'RadiusController::delete');
        });
        $routes->group('nas', static function ($routes) {
            $routes->get('/', 'NasController::index');
            $routes->get('novo', 'NasController::form');
            $routes->get('novo', 'NasController::filter');
            $routes->get('editar/(:num)', 'RouterController::edit/$1');

            $routes->post('save', 'NasController::save');
            $routes->post('search', 'NasController::search');
            $routes->post('delete', 'NasController::delete');
        });
        $routes->group('poste', static function ($routes) {
            $routes->get('/', 'PoleController::index');
            $routes->get('novo', 'PoleController::form');
            $routes->post('save', 'PoleController::save');
            $routes->post('search', 'PoleController::search');
            $routes->get('editar/(:num)', 'PoleController::edit/$1');
            $routes->get('novo', 'PoleController::filter');
            $routes->post('delete', 'PoleController::delete');
        });
        $routes->group('tower', static function ($routes) {
            $routes->get('/', 'TowerController::index');
            $routes->get('novo', 'TowerController::form');
            $routes->get('novo', 'TowerController::filter');
            $routes->get('editar/(:num)', 'TowerController::edit/$1');

            $routes->post('save', 'TowerController::save');
            $routes->post('search', 'TowerController::search');
            $routes->post('delete', 'TowerController::delete');
        });
        $routes->group('servidor', static function ($routes) {
            $routes->get('/', 'ServidorController::index');
            $routes->get('novo', 'ServidorController::form');
            $routes->get('novo', 'ServidorController::filter');
            $routes->get('editar/(:num)', 'ServidorController::edit/$1');

            $routes->post('save', 'ServidorController::save');
            $routes->post('search', 'ServidorController::search');
            $routes->post('delete', 'ServidorController::delete');
        });
        $routes->group('storage', static function ($routes) {
            $routes->get('/', 'StorageController::index');
            $routes->get('novo', 'StorageController::form');
            $routes->get('novo', 'StorageController::filter');
            $routes->get('editar/(:num)', 'StorageController::edit/$1');

            $routes->post('save', 'StorageController::save');
            $routes->post('search', 'StorageController::search');
            $routes->post('delete', 'StorageController::delete');
        });
        $routes->group('outros', static function ($routes) {
            $routes->get('/', 'OutrosController::index');
            $routes->get('novo', 'OutrosController::form');
        });
    });

    $routes->group('financeiro', static function ($routes) {
        $routes->group('dashboard', static function ($routes) {
            $routes->get('/', 'FinancialController::index');
            $routes->get('novo', 'FinancialController::form');
        });

        $routes->group('pontosdepagamento', static function ($routes) {
            $routes->get('/', 'PaymentPointController::index');
            $routes->get('novo', 'PaymentPointController::form');

            $routes->post('save', 'PaymentPointController::save');
            $routes->post('search', 'PaymentPointController::search');
            $routes->post('delete', 'PaymentPointController::delete');
            $routes->get('editar/(:num)', 'PaymentPointController::edit/$1');
        });

        $routes->group('planosdepagamento', static function ($routes) {
            $routes->get('/', 'PaymentPlansController::index');
            $routes->get('novo', 'PaymentPlansController::form');
            $routes->post('save', 'PaymentPlansController::save');
            $routes->post('search', 'PaymentPlansController::search');
            $routes->post('delete', 'PaymentPlansController::delete');
            $routes->get('editar/(:num)', 'PaymentPlansController::edit/$1');
        });

        $routes->group('caixa', static function ($routes) {
            $routes->get('/', 'FinancialboxController::index');
            $routes->get('novo', 'FinancialboxController::form');
            $routes->get('editar/(:num)', 'FinancialboxController::edit/$1');

            $routes->post('save', 'FinancialboxController::save');
            $routes->post('search', 'FinancialboxController::search');
            $routes->post('delete', 'FinancialboxController::delete');
        });

        $routes->group('boleto', static function ($routes) {
            $routes->get('/', 'TicketController::index');
            $routes->get('novo', 'TicketController::form');
            $routes->get('novo', 'TicketController::print');
            $routes->get('novo', 'TicketController::filter');
            $routes->get('editar/(:num)', 'TicketController::edit/$1');

            $routes->post('save', 'TicketController::save');
            $routes->post('search', 'TicketController::search');
            $routes->post('delete', 'TicketController::delete');

            // $routes->get('imprimir')
            $routes->get('imprimir-em-lote', 'TicketController::print');
        });
        $routes->group('contas-pagar', static function ($routes) {
            $routes->get('/', 'BillstopayController::index');
            $routes->get('novo', 'BillstopayController::form');
            $routes->get('novo', 'BillstopayController::filter');
            $routes->get('editar/(:num)', 'BillstopayController::edit/$1');

            $routes->post('save', 'BillstopayController::save');
            $routes->post('search', 'BillstopayController::search');
            $routes->post('delete', 'BillstopayController::delete');
        });
        $routes->group('contas-receber', static function ($routes) {
            $routes->get('/', 'BillstoreciverController::index');
            $routes->get('novo', 'BillstoreciverController::form');
            $routes->get('novo', 'BillstopayController::filter');
            $routes->get('editar/(:num)', 'BillstoreciverController::edit/$1');

            $routes->post('save', 'BillstoreciverController::save');
            $routes->post('search', 'BillstoreciverController::search');
            $routes->post('delete', 'BillstoreciverController::delete');
        });
        $routes->group('contratos', static function ($routes) {
            $routes->get('/', 'ContractController::index');
            $routes->get('novo', 'ContractController::form');
            $routes->get('novo', 'ContractController::filter');
            $routes->get('editar/(:num)', 'ContractController::edit/$1');

            $routes->post('save', 'ContractController::save');
            $routes->post('search', 'ContractController::search');
            $routes->post('delete', 'ContractController::delete');
        });
    });

    $routes->group('suporte', static function ($routes) {
        $routes->group('ordem-de-servico', static function ($routes) {
            $routes->get('/', 'OrderServiceController::index');
            $routes->get('novo', 'OrderServiceController::form');
            $routes->post('search', 'OrderServiceController::search');
            $routes->post('save', 'OrderServiceController::save');
            $routes->post('search', 'OrderServiceController::search');
            $routes->post('delete', 'OrderServiceController::delete');
            $routes->get('editar/(:num)', 'OrderServiceController::edit/$1');
        });

        // outros
    });

    $routes->group('api', static function ($routes) {
        $routes->get('teste', 'ApiController::index');
        $routes->get('listAllQueue', 'ApiController::listAllQueue');
    });

    $routes->group('api-asaas', static function ($routes) {
        $routes->get('teste', 'AsaasApiGatewayController::createCustomer');
    });


    $routes->group('gerencial', static function ($routes) {
        $routes->group('pop', static function ($routes) {
            $routes->get('/', 'PopController::index');
            $routes->get('novo', 'PopController::form');
            $routes->post('save', 'PopController::save');
            $routes->post('search', 'PopController::search');
            $routes->get('novo', 'PopController::filter');
            $routes->get('editar/(:num)', 'PopController::edit/$1');
            $routes->post('delete', 'PopController::delete');
        });
        $routes->group('sms', static function ($routes) {
            $routes->get('/', 'SmsController::index');
            $routes->get('novo', 'SmsController::form');
            $routes->post('save', 'SmsController::save');
            $routes->post('search', 'SmsController::search');
            $routes->get('novo', 'SmsController::filter');
            $routes->get('editar/(:num)', 'SmsController::edit/$1');
            $routes->post('delete', 'SmsController::delete');
        });
        $routes->group('email', static function ($routes) {
            $routes->get('/', 'EmailController::index');
            $routes->get('novo', 'EmailController::form');
            $routes->post('save', 'EmailController::save');
            $routes->post('search', 'EmailController::search');
            $routes->get('novo', 'EmailController::filter');
            $routes->get('editar/(:num)', 'EmailController::edit/$1');
            $routes->post('delete', 'EmailController::delete');
        });
        $routes->group('veiculos', static function ($routes) {
            $routes->get('/', 'VehicleController::index');
            $routes->get('novo', 'VehicleController::form');
            $routes->post('save', 'VehicleController::save');
            $routes->get('novo', 'VehicleController::filter');
            $routes->get('editar/(:num)', 'VehicleController::edit/$1');
            $routes->post('delete', 'VehicleController::delete');
            $routes->post('search', 'VehicleController::search');
        });
        $routes->group('cursos', static function ($routes) {
            $routes->get('/', 'CourseController::index');
            $routes->get('novo', 'CourseController::form');
            $routes->post('save', 'CourseController::save');
            $routes->get('novo', 'CourseController::filter');
            $routes->get('editar/(:num)', 'CourseController::edit/$1');
            $routes->post('delete', 'CourseController::delete');
            $routes->post('search', 'CourseController::search');
        });
    });
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
