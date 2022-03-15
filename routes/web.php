<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\collectionController;
use App\Http\Controllers\DesignerIdeaController;
use App\Http\Controllers\elementsController;
use App\Http\Controllers\libController;
use App\Http\Controllers\PatinaController;
use App\Http\Controllers\PatinaDetailController;
use App\Http\Controllers\ShoescareController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PaymentController;

use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('designshoes');
// });
Route::get('/', [collectionController::class, 'index'])->name('designershoes');
// Route::get('/designershoes', [collectionController::class, 'index'])->name('designershoes');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/elements',                             [elementsController::class, 'index']);
Route::get('/elements/loadPrice',                   [elementsController::class, 'loadPrice']);
Route::get('/elements/LoadPreDesignArr',            [elementsController::class, 'LoadPreDesignArr']);
Route::get('/elements/loadXmlStyle_2',              [elementsController::class, 'loadXmlStyle_2']);
Route::get('/elements/popUp/PopUpDesignDetail',     [elementsController::class, 'PopUpPreDesign']);
Route::get('/elements/popUp/PopUpRecommend',        [elementsController::class, 'PopUpRecommend']);
Route::get('/elements/popUp/PopUpproduct',          [elementsController::class, 'PopUpproduct']);
Route::get('/elements/layout-option-color',         [elementsController::class, 'layoutOptionColor']);

Route::post('/designshoes/elements/cart/add',       [elementsController::class, 'addCart']);
Route::get('/designshoes/elements/popUp/PopUpQuestionDeleteItem', [elementsController::class, 'delModel']);
Route::get('/designshoes/elements/cart/del',        [elementsController::class, 'delCart']);
Route::get('/designshoes/elements/loadDataLang',    [elementsController::class, 'loadDataLang']);

// check out
Route::get('/designshoes/checkout',                 [CheckoutController::class, 'index'])->name('checkout.main');
Route::get('/designshoes/detail',                   [CheckoutController::class, 'detail'])->name('checkout.detail');

Route::post('/lib/canvasImg',                           [libController::class, 'canvasImg']);


Route::get('/patina',                                   [PatinaController::class, 'index'])->name('patina');
Route::get('/design-patina-shoes',                      [PatinaController::class, 'detail'])->name('patinadetail');
Route::get('/patina/shoescare',                         [ShoescareController::class, 'index'])->name('shoescare');
Route::get('/custom-shoes-care',                        [ShoescareController::class, 'detail'])->name('shoescaredetail');
Route::post('/designshoes/elements/cart/addShoeCare',   [ShoescareController::class, 'addShoeCare']);


Route::get('/designidea',                                   [DesignerIdeaController::class, 'index'])->name('designidea');
Route::get('/designershoes/index',                          [DesignerIdeaController::class, 'designerShoes'])->name('designerShoes');


Route::get('/women-shoes/designidea',                       [DesignerIdeaController::class, 'index'])->name('woman.designidea');
Route::get('/women-shoes/designershoes/index',              [DesignerIdeaController::class, 'designerShoes'])->name('women.designershoes');

Route::post('/designshoes/elements/cart/addDesignerShoes',          [AjaxController::class, 'addDesignerShoes'])->name('addcart.parameters');
Route::post('/women-shoes/Designidea/json/json',                    [AjaxController::class, 'getJson'])->name('filter.women.getjson');
Route::post('/designershoes/Designidea/json/json',                  [AjaxController::class, 'getJson'])->name('filter.man.getjson');
//Route::post('/Designidea/json/json',                                [AjaxController::class, 'getJson'])->name('filter.man.getjson');
Route::get('/designshoes/elements/popUp/PopUpContinueShopping',     [AjaxController::class, 'PopUpContinueShopping'])->name('cart.continueshopping');
Route::post('/designshoes/elements/checkout/add',                   [AjaxController::class, 'addPayment'])->name('checkout.addpayment');

Route::post('elements/acc/Login',            [AjaxController::class, 'login'])->name('login.getjson');
Route::get('elements/topMenu',               [elementsController::class, 'topMenu'])->name('element.topMenu');

Route::middleware('auth')->group(function () {
    Route::get('/designshoes/elements/checkout/paypal',                     [PaymentController::class, 'paypal'])->name('checkout.paypal');
    Route::get('designshoes/elements/popUp/proDesign/checkSessionPreDesign',[DesignerIdeaController::class, 'savePreDesign'])->name('checkSessionPreDesign.save');
    
    Route::get('elements/acc/logout',         [AjaxController::class, 'logout'])->name('logout.getjson');
    
});