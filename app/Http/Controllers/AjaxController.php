<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ModelSerial;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class AjaxController extends Controller
{
    public $gender = 'male';
    public $data  = '';
    

    public function PopUpLimitProDesign(Request $request)
    {
        return view("ajax.PopUpMessageBox")->with('message', 'Limit Max Save Design 6 Item');
    }    

    public function PopUpCompleted(Request $request)
    {
        return view("ajax.PopUpMessageBox")->with('message', 'Save Completed.');
    }
    public function logout(Request $request)
    {
        auth()->logout();
    }
    
    public function loadPrice(Request $request)
    {

    }

    public function login(Request $request)
    {
        //$request->password
        $user = User::where(["email" => $request->email])->first();
        auth()->login($user, $request->remember_me);

        if( !empty($request->remember_me ))
        {
            Cookie::queue("cookieUserName", $this->email,   setting('site.cookie_expired_seconds'));
            Cookie::queue("cookieUserPwd", $this->password, setting('site.cookie_expired_seconds'));
            Cookie::queue( cookie()->forever("cookieSetFlag", $this->remember_me) );
        }

        $now_token = session()->get('_token');
        $discount = 0;
        $price = 0;
        $sumprice = 0;
        $qty = 0;
        $shipping = 0;
        $total = 0;
        
        $auth_id = auth()->user()->id;
        $Cart_Items = Cart::where('token', $now_token)->get();
        Cart::where('token', $now_token)
            ->update([
                    'token'     => '', 
                    'session'   => $auth_id, 
                        ]);
        $items = [];
        foreach($Cart_Items as $leaved_item)
        {
            $json_description = $leaved_item->desc;
            $obj_description = json_decode(base64_decode($json_description));
            $discount += $obj_description->getShoeDiscountItem;
            $price += $obj_description->getShoePrice;
            $qty += $obj_description->getQty;
            $shipping += $obj_description->getShoeShipping;
            $sumprice += $obj_description->getShoePrice * $obj_description->getQty;
            $total+= $sumprice + $obj_description->getShoeShipping - $obj_description->getShoeDiscountItem;

            $items[] = [
                'SUMPRICE'  =>  $obj_description->getShoePrice * $obj_description->getQty,
                'SHIPPING'  =>  $obj_description->getShoeShipping,
                'TOTAL'     =>  $obj_description->getShoePrice * $obj_description->getQty - $obj_description->getShoeDiscountItem + $obj_description->getShoeShipping,
            ];
        }

        $returnData = [
            'TAGID' => 'list-hover.tagProductList-0',
            'PRODUCT' => [
                'ITEM' => $items,
                'SUM' => [
                    "CURR" => "EUR",
                    "DISCOUNT"  => $discount,
                    "PRICE"     => $price,
                    "QTY"       => $qty,
                    "SHIPPING"  => $shipping,
                    "SIGN"      => setting('site.sign'),
                    "SOLEMIXPRICE" => 0,
                    "TOTAL"     => $total
                ]
            ]
        ];
        return json_encode($returnData);
    }
    
    public function addDesignerShoes(Request $request)
    {
       // dd($request);
        if( $request->productType=='shoe' )
        {
            $model = $request->model;
            $modelInfo = ModelSerial::where('modelno', $model)->first();
            $mainFolder =   StyleFolder($modelInfo->style);

            $description = [
                        "productType" => $request->productType
                        ,"folderType" => $mainFolder
                        ,"getShape" => $modelInfo->shape
                        ,"shoeType" => strtolower($modelInfo->style)
                        ,"currentView" => "Right"

                        ,"getStyle" => "shape"

                        ,"getLeatherGroup"  => $modelInfo->maintyp->id
                        ,"getLeather"       => $modelInfo->maintyp->key  ?? 'none'// "premium"
                        ,"getLeatherName"   => $request->main_name         //"the premium"
                        ,"getLeatherNo"     => $modelInfo->mainclr->pkey   //"LT-001"
                        ,"getLeatherNoName" => $modelInfo->mainclr->name

                        ,"front"            => $request->front             //"none"
                        ,"getFront"         => $modelInfo->fronttyp->pkey ?? 'none'         //"none"
                        ,"getFrontNo"       => !empty($request->frontclr) ? $request->frontclr->key : 'none'        //"none"
                        ,"getFrontName"     => $request->front_name       //"none"
                        ,"getFrontNoName"   => "none"

                        ,"side"         => $request->side              //"SD1"
                        ,"getSide"      => $modelInfo->sidetyp->pkey  ?? 'none'          //"SD1"
                        ,"getSideName"  => $modelInfo->sidetyp->name       //"SD1"
                        ,"getSideNo"    => $modelInfo->sideclr->key ?? 'none'          //"none"
                        ,"getSideNoName"=> $modelInfo->sideclr->name

                        ,"back"         => $request->back               // "BK1"
                        ,"getBack"      => $modelInfo->backtyp->pkey  ?? 'none'          //"BK1"
                        ,"getBackName"  => $modelInfo->backtyp->name       //"BK1"
                        ,"getBackNo"    => !empty($request->backclr) ? $request->backclr->key : 'none'              //"none"
                        ,"getBackNoName"=> !empty($request->backclr) ? $request->backclr->name : 'none'              //"none"

                        ,"sole"         => $modelInfo->soletyp->pkey  ?? 'none'               // "Sole-1L"
                        ,"getSole"      => $modelInfo->soletyp->pkey  ?? 'none'          //"LT-N007"
                        ,"getSoleName"  => $modelInfo->soletyp->name  ?? 'none'
                        ,"getSoleBorder"=> $modelInfo->soleclr->pkey  ?? 'none'
                        ,"mixSolePriceStatus" => "no"

                        ,"getLacesNo"   => !empty($request->laceclr) ? $request->laceclr->key : 'none'            //"HT-Black"
                        ,"getLacesName" => $request->laces             //"HT-Black"

                        ,"getLiningNo"  => !empty($request->liningclr) ? $request->liningclr->key : 'none'        //"SH-SW08"
                        ,"getLiningName"=> $request->lining_name       //"Dark Brown"
                        
                        ,"getAccessory"     => 'none' //"none"
                        ,"getAccessoryNo"   => 'none'         //"none"
                        ,"getAccessoryName" => "none"

                        ,"getSpeci"     => "mix-match"
                        ,"getStitchingNo" => $request->backstitch     //"none"
                        ,"getBrogueNo"  => "none"
                        ,"getMonoIn"        =>  $request->monogram['insideLining']  //""
                        ,"getMonoOut"       =>  $request->monogram['outsideSole']  
                        ,"getSizeTypeName"  =>  $request->measurement['regularSize']    //"EU"
                        ,"getSizeType"  =>      $request->measurement['regularSize']    //"EURO"
                        ,"getSizeNo"    =>      $request->measurement['size']           //"null"
                        ,"getUnit"      =>      $request->measurement['unit']           //"null"
                        ,"getLength"    =>      $request->measurement['length']         //"0"
                        ,"getWidth"     =>      $request->measurement['width']          //"0"
                        ,"getQty"       =>      $request->measurement['quantity']
                        ,"getShoePrice" =>      $request->totalPrice
                        ,"getMixPrice"  => 0                             //"9.9"
                        ,"getShoeDiscountItem" => "0"
                        ,"getShoeShipping"  => setting("site.shipping_amount")
                        ,"setStatusMix"     => "false"
                        ,"prevLeatherNo"    => "none"
                        ,"response"     => "false"
                        ,"shape"        => "shape-" . $request->modelShape
                        ,"getShapeName" => $request->modelShape //"Sharp"
                        ,"shoeTypeName" => $request->modelStyle // "oxford"
                        ,"getStyleName"     => "none"

                        ,"getStitchingName" => $request->backstitch       //"none"
                        ,"getBrogueName"    => "none"
                        ,"optionBorderSlim" => "N"
                        ,"setMenuLth"   => "premium"
                        ,"code64"       => "null"
                        ,"img"          => "null"
                        ,"measureMenu"  => "bodySize"
                        ,"id"           => $modelInfo->id
                        ,"DESIGN_TYPE"  => "custom" ];

            $description_json = base64_encode(json_encode($description));
            $cart = new Cart([
                'key'       => $model,
                'name'      => '',
                'gender'    => $modelInfo->sex=='female' ? 'W' : 'M' ,
                'type'      => strtolower($modelInfo->style),
                'shape'     => strtolower($modelInfo->shape),
                'style'     => strtolower($modelInfo->style),
                'monoIn'    => $request->monogram['insideLining'] ?? 'false',
                'monoOut'   => $request->monogram['outsideSole'] ?? 'false',
                'desc'      => $description_json,
                'quantity'  => $request->measurement['quantity'],
                'length'    => $request->measurement['length'],
                'width'     => $request->measurement['width'],
                'unit'      => $request->measurement['unit'],
                'sizeType'  => $request->measurement['regularSize'],
            ]);

            if( !empty(auth()->user() ) )
                $cart->session = auth()->user()->id;
            else
                $cart->token = session()->get('_token');

            $cart->save();
            // $result = [$description];

        }
        return $description_json;
    }

    public function PopUpContinueShopping(Request $request)
    {
        return view('ajax.popupContinueShopping');
    }

    public function getJson(Request $request)
    {
        $gender = 'man';
        if(stripos(Route::currentRouteName(), 'women')!==false) 
        {
            $gender = 'women';
        }

        // dd($request);
        //dd($request->data);

        $models_query = ModelSerial::where('sex', $gender);
        
        if(!empty($request->data['category']))
        {
            $searchCate = $request->data['category'];
            $models_query->where( function($query1) use ($searchCate) {
                foreach($searchCate as $item)
                {
                    $query1->orWhere('main', $item);
                }
            });
        }
        
        if(!empty($request->data['style']))
        {
            $searchStyle = $request->data['style'];
            $models_query->where( function($query1) use ($searchStyle) {
                foreach($searchStyle as $item)
                {
                    $query1->orWhere('style', $item);
                }
            });
        }

        if(!empty($request->data['colorGrp']))
        {
            $searchColor = $request->data['colorGrp'];
            $models_query->where( function($query1) use ($searchColor) {
                foreach($searchColor as $item)
                {
                    $query1->orWhere('main_color', $item);
                }
            });
        }
        //dd($request->data);
        if(!empty($request->data['optionSele']))
        {
            $searchOption = $request->data['optionSele'];
            $models_query->where( function($query1) use ($searchOption) {
                $query1->orWhere('main_color', 'like', '%,'.$searchOption.',%');
            });
        }

        
        //dd($models_query->toSql());
        $query_result = $models_query->get();
        $result = [
            'COUNT'     =>$query_result->count(),
            'PAGE_SIZE' => 0,
            'ITEM'      => []
                ];

        $itemPage = $request->data['itemPage'];
        if(empty($itemPage) || $itemPage<=1)    $itemPage = 1;
        $itemSize = $request->data['itemSize'];
        $idx = 0;

        //dd($query_result);
        foreach($query_result as $item)
        {
            $idx++;

            if( ($idx-1)<($itemPage-1)*$itemSize ||
                ($idx-1)>=($itemPage)*$itemSize )    continue;

            $result['ITEM'][] = [
                'ID'  => $item->id,
                'ROW' => $idx,
                'NO' => $item->modelno,
                'NEW_TAG' => $item->coupons,
                'MODELSTYLE' => $item->style,
                'FRONT_CATEGORY' => $item->front,
                'FRONT_COLORGRP' => $item->front_color,
                'MAIN_CATEGORY' => $item->main,
                'MAIN_COLORFRP' => $item->main_color,
                'SIDE_CATEGORY' => $item->side,
                'SIDE_COLORGRP' => $item->side_color,
                'BACK_CATEGORY' => $item->back,
                'BACK_COLORGRP' => $item->back_color,
                'ACCESSORY_CATEGORY' => $item->accessory,
                'ACCESSORY_COLORGRP' => $item->access_color,
                'PRICE' => $item->price,
                'SALE_STATUS' => $item->sale_status,
                'SALE'          => $item->sale_price,
            ];
        }

        // print_r($result['ITEM']); exit;
        return json_encode($result);
    }

    function addPayment(Request $request)
    {
        
        if($request->paymentType=='Paypal')
        {

        }
        elseif(urldecode($request->paymentType=='Credit Card Paypal') )
        {

        }

        //"_token" => "PrYSDDaxB5OJBIlsIGjvkEVE9IlrXGXn2EKFWSik"
        $req = [
            $request->fname, 
            $request->lname, 
            $request->address1, 
            $request->address2, 
            $request->city, 
            $request->state, 
            $request->post, 
            $request->country,
            $request->phone, 
            $request->email, 
            $request->password, 
        ];
        return json_encode([
                'STATUS'=> "true",
                'PAGE'  => "paypal",        //'inec'
                            
                    ]);
    }
}