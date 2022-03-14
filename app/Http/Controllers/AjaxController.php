<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ModelSerial;
use App\Models\Cart;


class AjaxController extends Controller
{
    public $gender = 'male';
    public $data  = '';

    public function index()
    {
    }
    
    public function addDesignerShoes(Request $request)
    {
       // dd($request);
        if( $request->productType=='shoe' )
        {
            $model = $request->model;
            $modelInfo = ModelSerial::where('modelno', $model)->first();
            $description = [
                        "productType" => $request->productType
                        ,"folderType" => $modelInfo->style . "Shoes"
                        ,"getShape" => $modelInfo->shape
                        ,"shoeType" => strtolower($modelInfo->style)
                        ,"currentView" => "Right"
                        ,"getLeatherNo" => $modelInfo->maintbl->pkey   //"LT-001"
                        ,"getLeather" => $modelInfo->maintbl->name  ?? 'none'// "premium"
                        ,"getLeatherGroup" => "1"
                        ,"getStyle" => "shape"
                        ,"getFront" => $modelInfo->fronttbl->name ?? 'none'         //"none"
                        ,"getSide" => $modelInfo->sidetbl->name  ?? 'none'          //"SD1"
                        ,"getBack" => $modelInfo->backtbl->name  ?? 'none'          //"BK1"
                        ,"getSole" => $modelInfo->soletbl->name  ?? 'none'          //"LT-N007"
                        ,"getAccessory" => $modelInfo->accessorytbl->name ?? 'none' //"none"
                        ,"getSpeci" => "mix-match"
                        ,"getSideNo" => $modelInfo->sidetbl->key ?? 'none'          //"none"
                        ,"getFrontNo" => !empty($request->fronttbl) ? $request->fronttbl->key : 'none'        //"none"
                        ,"getLiningNo" => !empty($request->liningtbl) ? $request->liningtbl->key : 'none'        //"SH-SW08"
                        ,"getStitchingNo" => $request->backstitch     //"none"
                        ,"getLacesNo" => !empty($request->lacetbl) ? $request->lacetbl->key : 'none'            //"HT-Black"
                        ,"getBrogueNo" => "none"
                        ,"getBackNo" => !empty($request->backtbl) ? $request->backtbl->key : 'none'              //"none"
                        ,"getAccessoryNo" => !empty($request->accesstbl) ? $request->accesstbl->key : 'none'         //"none"
                        ,"getSoleBorder" => "LE2"
                        ,"getMonoIn" =>         $request->monogram['insideLining']  //""
                        ,"getMonoOut" =>        $request->monogram['outsideSole']  
                        ,"getSizeTypeName" =>   $request->measurement['regularSize']    //"EU"
                        ,"getSizeType" =>       $request->measurement['regularSize']  //"EURO"
                        ,"getSizeNo" =>         $request->measurement['size']  //"null"
                        ,"getUnit" =>           $request->measurement['unit']    //"null"
                        ,"getLength" =>         $request->measurement['length']   //"0"
                        ,"getWidth" =>          $request->measurement['width']     //"0"
                        ,"getQty" =>            $request->measurement['quantity']
                        ,"getShoePrice" =>      $request->totalPrice
                        ,"getMixPrice" => 0                             //"9.9"
                        ,"getShoeDiscountItem" => "0"
                        ,"mixSolePriceStatus" => "no"
                        ,"getShoeShipping" => "0"
                        ,"setStatusMix" => "false"
                        ,"prevLeatherNo" => "none"
                        ,"response" => "false"
                        ,"shape" => "shape-" . $request->modelShape
                        ,"front" => $request->front             //"none"
                        ,"side" => $request->side              //"SD1"
                        ,"back" => $request->back               // "BK1"
                        ,"sole" => $request->sole               // "Sole-1L"
                        ,"getShapeName" => $request->modelShape //"Sharp"
                        ,"shoeTypeName" => $request->modelStyle // "oxford"
                        ,"getLeatherNoName" => "none"
                        ,"getLeatherName" => $request->main_name         //"the premium"
                        ,"getStyleName" => "none"
                        ,"getFrontName" => $request->front_name       //"none"
                        ,"getSideName" => $request->side_name       //"SD1"
                        ,"getBackName" => $request->back_name       //"BK1"
                        ,"getSoleName" => $request->sole_name       //"Leather"
                        ,"getAccessoryName" => $request->accessory_name       //"none"
                        ,"getSideNoName" => "none"
                        ,"getFrontNoName" => "none"
                        ,"getLiningName" => $request->lining_name       //"Dark Brown"
                        ,"getStitchingName" => $request->backstitch       //"none"
                        ,"getLacesName" => $request->laces             //"HT-Black"
                        ,"getBrogueName" => "none"
                        ,"getBackNoName" => "none"
                        ,"optionBorderSlim" => "N"
                        ,"setMenuLth" => "premium"
                        ,"code64" => "null"
                        ,"img" => "null"
                        ,"measureMenu" => "bodySize"
                        ,"id"=> $modelInfo->id
                        ,"DESIGN_TYPE" => "custom" ];

            $description_json = base64_encode(json_encode($description));
            $cart = new Cart([
                'key'       => $model,
                'name'      => '',
                'gander'    => $modelInfo->sex=='female' ? 'W' : 'M' ,
                'type'      => strtolower($modelInfo->style),
                'shape'     => strtolower($modelInfo->shape),
                'style'     => strtolower($modelInfo->style),
                'monoIn'    => $request->monogram['insideLining'] ?? 'false',
                'monoOut'   => $request->monogram['outsideSole'] ?? 'false',
                'desc'      => $description_json,

                'token'     => session()->get('_token'),
            ]);
            $cart->save();

            $result = [$description];

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