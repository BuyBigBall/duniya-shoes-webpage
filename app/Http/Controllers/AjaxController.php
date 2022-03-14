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
        // //dd(stripos(Route::currentRouteName(), 'women'));
        // if(stripos(Route::currentRouteName(), 'women')!==false) 
        // {
        //     $this->gender = 'female';
        //     $json = '{"category":"","style":"","colorGrp":"","optionSele":"","menuObject":{"CATEGORY":[{"ID":"9","NAME":"PREMIUM LEATHER"},{"ID":"10","NAME":"FASHION LEATHER"},{"ID":"11","NAME":"SHEEPSKIN LEATHER"},{"ID":"12","NAME":"BURNISHED LEATHER"},{"ID":"13","NAME":"FABRIC"},{"ID":"14","NAME":"Suede Leather"},{"ID":"15","NAME":"Thread Accessory"},{"ID":"16","NAME":"Leather Chamois"},{"ID":"17","NAME":"SEAM EDGE"},{"ID":"18","NAME":"Leather Dye"},{"ID":"19","NAME":"Laces"}],"STYLE":[{"ID":"Boot","NAME":"Boot"},{"ID":"Derby","NAME":"Derby"},{"ID":"Loafers","NAME":"Loafers"},{"ID":"Monk","NAME":"Monk"},{"ID":"Oxford","NAME":"Oxford"}],"COLORGRP":[{"ID":"4","NAME":"TAN BROWN                     "},{"ID":"5","NAME":"WARM TONE                     "},{"ID":"6","NAME":"Red-Pink TONE                 "},{"ID":"7","NAME":"NAVY Violet TONE              "},{"ID":"8","NAME":"GREEN TONE                    "},{"ID":"9","NAME":"ORANGE-Y TONE                 "},{"ID":"10","NAME":"BLACK-GREY TONE               "},{"ID":"11","NAME":"YELLOW TONE                   "},{"ID":"12","NAME":"BLUE TONE                     "}]},"designObject":[{"ID":"452","ROW":"1","NO":"DSW_006","NEW_TAG":"Y","MODELSTYLE":"Oxford","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"12","MAIN_COLORFRP":"6","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"404","ROW":"2","NO":"DSW_004","NEW_TAG":"Y","MODELSTYLE":"Monk","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"5","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"9","BACK_COLORGRP":"9","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"89"},{"ID":"457","ROW":"3","NO":"DSW_007","NEW_TAG":"Y","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"12","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"Black","SALE":"149"},{"ID":"410","ROW":"4","NO":"DSW_005","NEW_TAG":"Y","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"18","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"259","SALE_STATUS":"N","SERIES":"red","SALE":"159"},{"ID":"408","ROW":"5","NO":"DSW_005","NEW_TAG":"Y","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"18","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"259","SALE_STATUS":"N","SERIES":"","SALE":"159"},{"ID":"453","ROW":"6","NO":"DSW_007","NEW_TAG":"Y","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"12","MAIN_COLORFRP":"6","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"455","ROW":"7","NO":"DSW_009","NEW_TAG":"Y","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"10","MAIN_COLORFRP":"4","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"N","SERIES":"","SALE":"149"},{"ID":"456","ROW":"8","NO":"DSW_010","NEW_TAG":"Y","MODELSTYLE":"Derby","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"10","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"15","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"N","SERIES":"","SALE":"149"},{"ID":"409","ROW":"9","NO":"DSW_005","NEW_TAG":"Y","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"18","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"259","SALE_STATUS":"N","SERIES":"purple","SALE":"159"},{"ID":"407","ROW":"10","NO":"DSW_004","NEW_TAG":"N","MODELSTYLE":"Monk","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"9","BACK_COLORGRP":"5","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"Greay_Cream","SALE":"89"},{"ID":"400","ROW":"11","NO":"DSW_003","NEW_TAG":"N","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"129","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"401","ROW":"12","NO":"DSW_003","NEW_TAG":"N","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"4","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"129","SALE_STATUS":"N","SERIES":"brown","SALE":"0"},{"ID":"394","ROW":"13","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"6","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"6","PRICE":"129","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"396","ROW":"14","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"5","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"4","PRICE":"129","SALE_STATUS":"N","SERIES":"purple","SALE":"0"},{"ID":"397","ROW":"15","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"6","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"6","PRICE":"129","SALE_STATUS":"N","SERIES":"pink","SALE":"0"},{"ID":"398","ROW":"16","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"8","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"8","PRICE":"129","SALE_STATUS":"N","SERIES":"Green","SALE":"0"},{"ID":"399","ROW":"17","NO":"DSW_001","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"10","MAIN_COLORFRP":"5","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"Cream","SALE":"89"},{"ID":"395","ROW":"18","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"11","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"11","PRICE":"129","SALE_STATUS":"N","SERIES":"Yellow_green","SALE":"0"}],"sign":"&euro;"}';
        // }
        // else
        // {
        //     $json = '{"category":"","style":"","colorGrp":"","optionSele":"","menuObject":{"CATEGORY":[{"ID":"9","NAME":"PREMIUMLEATHER"},{"ID":"10","NAME":"FASHIONLEATHER"},{"ID":"11","NAME":"SHEEPSKINLEATHER"},{"ID":"12","NAME":"BURNISHEDLEATHER"},{"ID":"13","NAME":"FABRIC"},{"ID":"14","NAME":"SuedeLeather"},{"ID":"15","NAME":"ThreadAccessory"},{"ID":"16","NAME":"LeatherChamois"},{"ID":"17","NAME":"SEAMEDGE"},{"ID":"18","NAME":"LeatherDye"},{"ID":"19","NAME":"Laces"}],"STYLE":[{"ID":"Boot","NAME":"Boot"},{"ID":"Derby","NAME":"Derby"},{"ID":"Fashion","NAME":"Fashion"},{"ID":"Loafers","NAME":"Loafers"},{"ID":"Monk","NAME":"Monk"},{"ID":"Oxford","NAME":"Oxford"},{"ID":"Sneaker","NAME":"Sneaker"}],"COLORGRP":[{"ID":"4","NAME":"TANBROWN"},{"ID":"5","NAME":"WARMTONE"},{"ID":"6","NAME":"Red-PinkTONE"},{"ID":"7","NAME":"NAVYVioletTONE"},{"ID":"8","NAME":"GREENTONE"},{"ID":"9","NAME":"ORANGE-YTONE"},{"ID":"10","NAME":"BLACK-GREYTONE"},{"ID":"11","NAME":"YELLOWTONE"},{"ID":"12","NAME":"BLUETONE"}]},"designObject":[{"ID":"440","ROW":"1","NO":"DS_107","NEW_TAG":"Y","MODELSTYLE":"Oxford","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"18","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"259","SALE_STATUS":"N","SERIES":"","SALE":"159"},{"ID":"464","ROW":"2","NO":"DS_114","NEW_TAG":"Y","MODELSTYLE":"Monk","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"12","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"black","SALE":"149"},{"ID":"196","ROW":"3","NO":"DS_042","NEW_TAG":"Y","MODELSTYLE":"Derby","FRONT_CATEGORY":"11","FRONT_COLORGRP":"10","MAIN_CATEGORY":"","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"N","SERIES":"","SALE":"179"},{"ID":"80","ROW":"4","NO":"DS_018","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"13","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"219","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"188","ROW":"5","NO":"DS_038","NEW_TAG":"N","MODELSTYLE":"Derby","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"12","MAIN_COLORFRP":"4","SIDE_CATEGORY":"12","SIDE_COLORGRP":"4","BACK_CATEGORY":"12","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"Y","SERIES":"","SALE":"179"},{"ID":"7","ROW":"6","NO":"DS_002","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"10","MAIN_COLORFRP":"5","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"Y","SERIES":"","SALE":"179"},{"ID":"201","ROW":"7","NO":"DS_046","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"9","FRONT_COLORGRP":"10","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"9","BACK_COLORGRP":"10","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"129","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"170","ROW":"8","NO":"DS_030","NEW_TAG":"N","MODELSTYLE":"Derby","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"14","MAIN_COLORFRP":"10","SIDE_CATEGORY":"9","SIDE_COLORGRP":"5","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"grey_suede","SALE":"149"},{"ID":"23","ROW":"9","NO":"DS_011","NEW_TAG":"N","MODELSTYLE":"Derby","FRONT_CATEGORY":"9","FRONT_COLORGRP":"4","MAIN_CATEGORY":"9","MAIN_COLORFRP":"4","SIDE_CATEGORY":"9","SIDE_COLORGRP":"4","BACK_CATEGORY":"9","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"169","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"177","ROW":"10","NO":"DS_032","NEW_TAG":"N","MODELSTYLE":"Derby","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"11","SIDE_COLORGRP":"10","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"N","SERIES":"","SALE":"149"},{"ID":"16","ROW":"11","NO":"DS_007","NEW_TAG":"N","MODELSTYLE":"Fashion","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"12","MAIN_COLORFRP":"4","SIDE_CATEGORY":"12","SIDE_COLORGRP":"4","BACK_CATEGORY":"12","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"12","ACCESSORY_COLORGRP":"4","PRICE":"169","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"29","ROW":"12","NO":"DS_002","NEW_TAG":"","MODELSTYLE":"Oxford","FRONT_CATEGORY":"12","FRONT_COLORGRP":"6","MAIN_CATEGORY":"10","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"Y","SERIES":"ItalyBlack-Red","SALE":"179"},{"ID":"18","ROW":"13","NO":"DS_008","NEW_TAG":"N","MODELSTYLE":"Monk","FRONT_CATEGORY":"12","FRONT_COLORGRP":"10","MAIN_CATEGORY":"12","MAIN_COLORFRP":"10","SIDE_CATEGORY":"12","SIDE_COLORGRP":"10","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"79"},{"ID":"152","ROW":"14","NO":"DS_024","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"9","SIDE_COLORGRP":"10","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"BlackShoes","SALE":"89"},{"ID":"31","ROW":"15","NO":"DS_012","NEW_TAG":"","MODELSTYLE":"Loafers","FRONT_CATEGORY":"9","FRONT_COLORGRP":"4","MAIN_CATEGORY":"9","MAIN_COLORFRP":"4","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"9","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"9","ACCESSORY_COLORGRP":"4","PRICE":"129","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"228","ROW":"16","NO":"DS_055","NEW_TAG":"N","MODELSTYLE":"Boot","FRONT_CATEGORY":"9","FRONT_COLORGRP":"4","MAIN_CATEGORY":"9","MAIN_COLORFRP":"4","SIDE_CATEGORY":"9","SIDE_COLORGRP":"4","BACK_CATEGORY":"9","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"N","SERIES":"","SALE":"179"},{"ID":"24","ROW":"17","NO":"DS_008","NEW_TAG":"","MODELSTYLE":"Monk","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"12","MAIN_COLORFRP":"4","SIDE_CATEGORY":"12","SIDE_COLORGRP":"6","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"169","SALE_STATUS":"Y","SERIES":"Red","SALE":"149"},{"ID":"81","ROW":"18","NO":"DS_019","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"13","MAIN_COLORFRP":"12","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"9","ACCESSORY_COLORGRP":"4","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"79"},{"ID":"9","ROW":"19","NO":"DS_004","NEW_TAG":"","MODELSTYLE":"Loafers","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"12","MAIN_COLORFRP":"4","SIDE_CATEGORY":"12","SIDE_COLORGRP":"4","BACK_CATEGORY":"12","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"12","ACCESSORY_COLORGRP":"4","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"57","ROW":"20","NO":"DS_014","NEW_TAG":"","MODELSTYLE":"Loafers","FRONT_CATEGORY":"11","FRONT_COLORGRP":"10","MAIN_CATEGORY":"11","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"11","ACCESSORY_COLORGRP":"10","PRICE":"269","SALE_STATUS":"N","SERIES":"Black_Black_SheepSkin","SALE":"179"}],"sign":"&euro;"}';
        // }

        // return view('designidea.designidea')->with('dataObject', $json)->with('gender', $this->gender);
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
                        ,"getFront" => $modelInfo->fronttbl->name ?? 'none'      //"none"
                        ,"getSide" => $modelInfo->sidetbl->name  ?? 'none'      //"SD1"
                        ,"getBack" => $modelInfo->backtbl->name  ?? 'none'        //"BK1"
                        ,"getSole" => $modelInfo->soletbl->name  ?? 'none'        //"LT-N007"
                        ,"getAccessory" => $modelInfo->accessorytbl->name ?? 'none'  //"none"
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