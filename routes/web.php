<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Shoes\collectionController;
use App\Http\Controllers\Shoes\AjaxController;
use App\Http\Controllers\Shoes\CheckoutController;
use App\Http\Controllers\Shoes\DesignerIdeaController;
use App\Http\Controllers\Shoes\elementsController;
use App\Http\Controllers\Shoes\libController;
use App\Http\Controllers\Shoes\PatinaController;
use App\Http\Controllers\Shoes\PatinaDetailController;
use App\Http\Controllers\Shoes\ShoescareController;
use App\Http\Controllers\Shoes\PaymentController;

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

Route::group(['prefix' => 'admin'], function () {    Voyager::routes();});
Route::get('/',                                                     [collectionController::class, 'index'])->name('shoes.collection');

Route::get('/elements',                                             [elementsController::class, 'index']);
Route::get('/elements/loadPrice',                                   [elementsController::class, 'loadPrice']);
Route::get('/elements/LoadPreDesignArr',                            [elementsController::class, 'LoadPreDesignArr']);
Route::get('/elements/loadXmlStyle_2',                              [elementsController::class, 'loadXmlStyle_2']);
Route::get('/elements/popUp/PopUpDesignDetail',                     [elementsController::class, 'PopUpPreDesign']);
Route::get('/elements/popUp/PopUpRecommend',                        [elementsController::class, 'PopUpRecommend']);
Route::get('/elements/popUp/PopUpproduct',                          [elementsController::class, 'PopUpproduct']);
Route::get('/elements/layout-option-color',                         [elementsController::class, 'layoutOptionColor']);

Route::post('/designshoes/elements/cart/addShoeCare',               [ShoescareController::class, 'addShoeCare']);
Route::post('/designshoes/elements/cart/addModelshoesToImage',      [AjaxController::class,      'addModelshoesToImage'])->name('modelimages.parameters');
Route::post('/designshoes/elements/cart/addModelShoesToCart',       [AjaxController::class,      'addModelShoesToCart'])->name('addcart.parameters');
Route::post('/designshoes/elements/cart/add',                       [elementsController::class,  'addCart']);
Route::get('/designshoes/elements/popUp/PopUpQuestionDeleteItem',   [elementsController::class,  'delModel']);
Route::get('/designshoes/elements/cart/del',                        [elementsController::class, 'delCart']);
Route::get('/designshoes/elements/loadDataLang',                    [elementsController::class, 'loadDataLang']);

// check out
Route::get('/designshoes/checkout',                                 [CheckoutController::class, 'index'])->name('checkout.main');
Route::get('/designshoes/detail',                                   [CheckoutController::class, 'detail'])->name('checkout.detail');

Route::post('/lib/canvasImg',                           [libController::class, 'canvasImg']);


Route::get('/patina',                                   [PatinaController::class, 'index'])->name('patina');
Route::get('/design-patina-shoes',                      [PatinaController::class, 'detail'])->name('patinadetail');
Route::get('/patina/shoescare',                         [ShoescareController::class, 'index'])->name('shoescare');
Route::get('/custom-shoes-care',                        [ShoescareController::class, 'detail'])->name('shoescaredetail');


Route::get('/designidea',                                   [DesignerIdeaController::class, 'index'])->name('designidea');
Route::get('/designershoes/index',                          [DesignerIdeaController::class, 'designerShoes'])->name('designerShoes');

Route::post('/createDesignImagesInformation',               [AjaxController::class,         'createDesignImagesInformation'])->name('shoes.ajax.shoesinfo');

Route::get('/women-shoes/designidea',                       [DesignerIdeaController::class, 'index'])->name('women.designidea');
Route::get('/women-shoes/designershoes/index',              [DesignerIdeaController::class, 'designerShoes'])->name('women.designershoes');

Route::post('/women-shoes/Designidea/json/json',                    [AjaxController::class, 'getJson'])->name('filter.women.getjson');
Route::post('/designershoes/Designidea/json/json',                  [AjaxController::class, 'getJson'])->name('filter.man.getjson');
//Route::post('/Designidea/json/json',                                [AjaxController::class, 'getJson'])->name('filter.man.getjson');
Route::get('/designshoes/elements/popUp/PopUpContinueShopping',     [AjaxController::class, 'PopUpContinueShopping'])->name('cart.continueshopping');
Route::post('/designshoes/elements/checkout/add',                   [AjaxController::class, 'addPayment'])->name('checkout.addpayment');
Route::get('/designshoes/elements/popUp/PopUpCompleted',            [AjaxController::class, 'PopUpCompleted'])->name('elements.popup.completed');    
Route::get('/designshoes/elements/popUp/PopUpLimitProDesign',       [AjaxController::class, 'PopUpLimitProDesign'])->name('elements.popup.limited');    

Route::post('/designshoes/elements/acc/Login',            [AjaxController::class, 'login'])->name('login.getjson');
Route::get('/designshoes/elements/topMenu',               [elementsController::class, 'topMenu'])->name('element.topMenu');
Route::get('designshoes/elements/loadPrice',              [AjaxController::class, 'loadPrice'])->name('loadPrice.getjson');
Route::get('/designshoes/elements/popUp/proDesign/checkSessionPreDesign',[DesignerIdeaController::class, 'savePreDesign'])->name('checkSessionPreDesign.save');
Route::post('/createDesignImages',                        [DesignerIdeaController::class, 'createDesignImages'])->name('checkSessionPreDesign.save');

Route::middleware('auth')->group(function () {
    Route::get('/designshoes/elements/checkout/paypal',    [PaymentController::class, 'paypal'])->name('checkout.paypal');
    Route::get('/designshoes/elements/acc/logout',         [AjaxController::class, 'logout'])->name('logout.getjson');
    
});


Route::get('/cart',                                         [CheckoutController::class, 'cart'])->name('cart');

# this is  for test
Route::get('/savedesignimage',[DesignerIdeaController::class, 'createDesignImages'])->name('checkSessionPreDesign.save.test');