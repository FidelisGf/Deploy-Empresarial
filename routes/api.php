<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Config_GeneralController;
use App\Http\Controllers\ConfigFolhaController;
use App\Http\Controllers\CupomController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\MateriaisController;
use App\Http\Controllers\MedidasController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PenalidadeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResetPwController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Tema_EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendaController;
use App\Http\Middleware\FuncMiddleware;
use App\Http\Middleware\CorsMiddleware;
use App\Product;
use App\Repositories\VendaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/logout', [AuthController::class,
'logout']);

Route::post('sendMailResetPassword', [ResetPwController::class,
'sendResetPwEmail']);

Route::post('resetPassword', [ResetPwController::class,
'resetPassword']);

Route::post('login', [AuthController::class,
'login']);

Route::post('register', [AuthController::class,
'register']);

Route::post('profile', [AuthController::class,
'profile']);

Route::get('auth/validateTkn', [AuthController::class,
'getAuthenticatedUser']);




Route::group(['middleware' => ['jwt.verify', 'cors']], function() {


    Route::get('refresh', [AuthController::class,
    'refresh']);

    Route::get('/showAvalibleRoles', [UsuarioController::class,
    'showAvalibleRoles']);

    Route::get('/findCategoryWithProductsIn', [CategoryController::class,
    'findCategoryWithProductsIn']);

    Route::get('pedidoPorData', [PedidosController::class,
     'pedidosPorPeriodo']);

    Route::get('countProducts', [ProductController::class,
     'countProducts']);



    Route::get('/allByCategory/{id}', [ProductController::class,
    'findAllProductByCategory']);

    Route::get('/checaEmpUser', [UsuarioController::class,
    'checkIfUserHasEmpresa'] );

    Route::get('/profile', [UsuarioController::class,
    'profile']);

    Route::get('despesasByTag/{id}', [DespesaController::class,
     'despesasByTag']);

    Route::get('sumDespesasMensais', [DespesaController::class,
    'sumDespesasMensais']);

    Route::post('checkQuantidadeProduto', [PedidosController::class,
    'checkQuantidadeProduto']);

    Route::get('findLucroByProduto/{id}', [ProductController::class,
    'findLucroByProduto']);

    Route::put('adicionaQuantidadeMaterial/{id}', [MateriaisController::class,
     'adicionaQuantidadeMaterial']);

    Route::get('getVendasByDate', [VendaRepository::class,
    'getVendasByTipoPagamento']);

    Route::get('cupons', [CupomController::class,
     'getCupom']);

    Route::post('cupons', [CupomController::class,
    'applyCupom']);

    Route::post('/setConfigSite', [EmpresaController::class,
    'setConfigSite']);

    Route::post('/updateConfigSite', [EmpresaController::class,
    'updateConfigSite']);

    Route::post('/setConfig', [Config_GeneralController::class,
     'setConfig'])
    ->middleware(FuncMiddleware::class);

    Route::post('/getConfig', [Config_GeneralController::class,
    'getConfig'])
    ->middleware(FuncMiddleware::class);

    Route::post('/vincularUserEmpresa', [UsuarioController::class,
    'vinculaUsuarioEmpresa'])
    ->middleware(FuncMiddleware::class);

    Route::get('/empresaPorUsuario', [UsuarioController::class,
     'getEmpresaByUser'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getVendasPorDia', [VendaController::class,
    'getVendasPorDia'])
    ->middleware(FuncMiddleware::class);

    Route::get("/getLucroAndGastos", [VendaController::class,
    'getLucroAndGastos'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getTotalVendasUltimosTresMeses', [VendaController::class,
    'getTotalVendasInTheLastThreeMonths'])
    ->middleware(FuncMiddleware::class);

    Route::post('/addEstoque', [EstoqueController::class,
    'addEstoque'])
    ->middleware(FuncMiddleware::class);

    Route::get('/pedidos/{id}', [PedidosController::class,
    'show'])
    ->middleware(FuncMiddleware::class);

    Route::put('/pedidos/{id}', [PedidosController::class,
    'update'])
    ->middleware(FuncMiddleware::class);

    Route::delete('/products/{id}', [ProductController::class,
    'destroy'])
    ->middleware(FuncMiddleware::class);

    Route::put('/products/{id}', [ProductController::class,
    'update'])
    ->middleware(FuncMiddleware::class);

    Route::put('aprovarPedido/{id}', [PedidosController::class,
    'aprovarPedido'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getActiveUsers', [UsuarioController::class,
    'getActiveUsers'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getPenalidades/{id}', [UsuarioController::class,
    'getPenalidades'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getVendasByUser/{id}', [UsuarioController::class,
    'getVendasByUser'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getUserMediaVendasByAno/{id}', [UsuarioController::class,
    'getUserMediaVendasByAno'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getUserTotalVendasByMes/{id}', [UsuarioController::class,
    'getUserTotalVendasByMes'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getHistoricoSalarioUser/{id}', [UsuarioController::class,
    'getHistoricoSalarioUser'])
    ->middleware(FuncMiddleware::class);

    Route::post('/getFolhaSalarioUsers', [UsuarioController::class,
    'getFolhaSalarioUsers'])
    ->middleware(FuncMiddleware::class);
    Route::get('/getDescontoMensalByUser/{id}', [PenalidadeController::class,
    'getDescontoMensalByUser'])
    ->middleware(FuncMiddleware::class);

    Route::post('/setAjustes', [ConfigFolhaController::class,
    'setAjustes'])
    ->middleware(FuncMiddleware::class);

    Route::post('/makeWagePayment', [UsuarioController::class,
    'makeWagePayment'])
    ->middleware(FuncMiddleware::class);

    Route::get('/showAjuste', [ConfigFolhaController::class ,
    'showAjuste'])
    ->middleware(FuncMiddleware::class);

    Route::post('/checkIfWageWasPayed', [UsuarioController::class,
    'checkIfWageWasPayed'])
    ->middleware(FuncMiddleware::class);

    Route::get('/getCompleteHistoryPenalidades/{id}', [UsuarioController::class,
    'getCompleteHistoryPenalidades'])
    ->middleware(FuncMiddleware::class);

    Route::get('/usuarios/{id}', [UsuarioController::class,
    'show']);

    Route::get('/getProdutosFromPedidos/{id}', [PedidosController::class,
    'getProdutosFromPedidos']);

    Route::get('/checkIfPassword', [UsuarioController::class,
    'checkIfPassword']);

    Route::post('/pedidosInternet', [PedidosController::class,
    'storeInternetPedidos']);

    Route::get('/getPerfilUserInternet', [UsuarioController::class,
    'getPerfilUserInternet']);

    Route::post('/usuariosUp', [UsuarioController::class,
    'updateUser']);




    Route::resource('materiais', 'MateriaisController');

    Route::resource('medidas', 'MedidasController');

    Route::resource('despesas', 'DespesaController');

    Route::resource('tags', 'TagController');

    Route::resource('clientes', 'ClienteController');

    Route::resource('cores', 'CorController');

    Route::resource('avaliacoes', 'AvaliacaoController');

    Route::resource('vendas', 'VendaController')
    ->middleware(FuncMiddleware::class);

    Route::resource('pagamentos', 'Pagamento_SalarioController')
    ->middleware(FuncMiddleware::class);

    Route::resource('pedidos', 'PedidosController')
    ->except(['show', 'update']);

    Route::resource('empresas', 'EmpresaController');

    Route::resource('estoques', 'EstoqueController');

    Route::resource('usuarios', 'UsuarioController')
    ->except(['show', 'update']);

    Route::resource('penalidades', 'PenalidadeController')
    ->middleware(FuncMiddleware::class);

});

Route::get('/getOneColorOfProduct/{id}', [ProductController::class,
'getOneColorOfProduct'])->middleware(CorsMiddleware::class);

Route::resource('categorys',
'CategoryController')->middleware(CorsMiddleware::class);

Route::resource('products',
'ProductController')
->except(['destroy'])->middleware(CorsMiddleware::class);

Route::get('getQuantidadeProduct/{id}', [EstoqueController::class,
'getQuantidadeProduct'])->middleware(CorsMiddleware::class);

Route::get('produtosDestaques', [ProductController::class,
'getProdutosDestaques'])->middleware(CorsMiddleware::class);

Route::get('/getConfigSite', [EmpresaController::class,
'getConfigSite'])->middleware(CorsMiddleware::class);

Route::get('/getEmpresaFromUser', [EmpresaController::class,
'getEmpresaFromUser'])->middleware(CorsMiddleware::class);

Route::get('/getTema', [Tema_EmpresaController::class,
'show'])->middleware(CorsMiddleware::class);
