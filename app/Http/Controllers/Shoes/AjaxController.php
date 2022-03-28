<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Controllers\ShoesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ModelSerial;
use App\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\models\Type;
use App\models\ColorMain;
use App\models\ColorFront;
use App\models\ColorSide;
use App\models\ColorBack;
use App\models\ColorSole;
use App\models\ColorAccessory;
use App\models\ColorLining;
use App\models\ColorLace;
use App\models\PatinaShoe;

class AjaxController extends ShoesController
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
        $Cart_Items = Cart::where('cart_sessionid', $now_token)->get();
        // Cart::where('token', $now_token)
        //     ->update([
        //             'token'     => '', 
        //             'session'   => $auth_id, 
        //                 ]);
        $items = [];
        foreach($Cart_Items as $leaved_item)
        {
            $json_description = $leaved_item->item_description;
            $obj_description = json_decode($json_description);
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
    
    public function addModelShoesToCart(Request $request)
    {

        #############   add Patina shoes to the cart ###############
        if( !empty($request->collection) &&
            $request->collection=='Patina' )
        {
            $model      = $request->model;
            $main       = $request->main;

            $fabric = ColorMain::where('pkey', $main)->first();
            $img_source = "images/models/iShoes/designershoes/$model/view1/main/$main.png";
            
            $modelInfo  = PatinaShoe::where('key', $model)->first();

            
            if($modelInfo ==null)
            {
                return response()->json(array('result'=>'false'));
            }
            $mainFolder = StyleFolder($request->modelStyle);
            $group_type = Type::where('type', strtolower($request->modelStyle))->first();
            if($group_type!=null)
                $group_type_id = $group_type->id;
            else
            $group_type_id = null;
    
            $description = [
                "productType"       => $request->collection
                ,"folderType"       => $mainFolder
                ,"getShape"         => $request->modelShape
                ,"shoeType"         => strtolower($request->modelStyle)
                ,"currentView"      => ""
    
                ,"getStyle"         => $request->modelShape
    
                ,"getLeatherGroup"  => 'Patina'
                ,"getLeather"       => 'false'
                ,"getLeatherName"   => 'none'
                ,"getLeatherNo"     => $request->main         //"LT-002"
                ,"getLeatherNoName" => $request->main_name    //"LT-002"
    
                ,"front"            => "none"
                ,"getFront"         => "none"
                ,"getFrontName"     => "none"
                ,"getFrontNo"       => $request->front
                ,"getFrontNoName"   => $request->front_name
    
                ,"side"             => "none"
                ,"getSide"          => 'none'          
                ,"getSideName"      => ''
                ,"getSideNo"        => $request->side
                ,"getSideNoName"    => $request->side_name
    
                ,"back"             => 'none'
                ,"getBack"          => 'none'
                ,"getBackName"      => 'none'
                ,"getBackNo"        => $request->back
                ,"getBackNoName"    => $request->back_name
    
                ,"sole"             => 'none'
                ,"getSole"          => $request->sole
                ,"getSoleName"      => $request->sole_name

                ,"getSoleBorder"    => 'none'
                ,"mixSolePriceStatus"   => "no"
    
                ,"getLacesNo"       => $request->laces
                ,"getLacesName"     => $request->laces
    
                ,"getLiningNo"      => $request->lining
                ,"getLiningName"    => $request->lining_name
                
                ,"getAccessory"     => 'none'
                ,"getAccessoryNo"   => $request->accessory
                ,"getAccessoryName" => $request->accessory_name
    
                // must none, because it is not view from bottom
                ,"getStitchingNo"   => $request->backstitch
                ,"getStitchingName" => $request->backstitchColor
    
                ,"getSpeci"         => "mix-match"
                ,"getBrogueNo"      => "none"
                
                ,"getMonoIn"        => $request->monogram['insideLining']  //""
                ,"getMonoOut"       => $request->monogram['outsideSole']  

                ,"getSizeTypeName"  => $request->measurement['regularSize']    //"EU"
                ,"getSizeType"      => $request->measurement['regularSize']    //"EURO"
                ,"getSizeNo"        => $request->measurement['size']           //"null"
                ,"getUnit"          => $request->measurement['unit']           //"null"
                ,"getLength"        => $request->measurement['length']         //"0"
                ,"getWidth"         => $request->measurement['width']          //"0"
                ,"getQty"           => $request->measurement['quantity']
                ,"getShoePrice"     => $request->totalPrice
                ,"getMixPrice"      => $request->totalPrice
                ,"getShoeDiscountItem" => "0"
                ,"getShoeShipping"  => setting("site.shipping_amount")
                ,"setStatusMix"     => "false"
                ,"prevLeatherNo"    => "none"
                ,"response"         => "false"
                ,"shape"            => "shape-" . $request->modelShape
                ,"getShapeName"     => $request->modelShape //"Sharp"
                ,"shoeTypeName"     => $request->modelStyle // "oxford"
                ,"getStyleName"     => "none"
    
                ,"getBrogueName"    => "none"
                ,"optionBorderSlim" => "N"
                ,"setMenuLth"       => "premium"
                ,"code64"           => "null"
                ,"img"              => "null"
                ,"measureMenu"      => "bodySize"
                ,"id"               => $modelInfo->id
                ,"DESIGN_TYPE"      => "custom"     //<---#######################
             ];
    
            $description_json = json_encode($description);        
                
            if(Session::has('carts')) {
                $cartsess=Session::get('carts');						
            }else{
                $carts=md5(microtime().rand());
                $cartsess=Session::put('carts', $carts);							
            }		
            
            if (Auth::check())
            {
                $userid=Auth::user()->id;
                
                $cartuser = Cart::select('id')->where('user_id' ,'=' , $userid)->count();
                if($cartuser>0){
                        DB::table('carts')
                        ->where('user_id', $userid)
                        ->update(['cart_sessionid' => $cartsess]);					
                }
            }else{
                $userid=Null;
            }
              
            $finalarr       = $description_json;
    
            if( strtolower($request->collection)=='patina' )
            {
                {
                    $bodyqty=1;
                }
                for($i=0;$i<$bodyqty;$i++){
                    $cartSet = [
                        'cart_sessionid'    => $cartsess,
                        'cat_id'            => CONST_CATEGORY_PATINASHOES,
                        'user_id'           => $userid,
                        'group_id'          => $group_type_id,
                        'fabric_name'       => $request->main_name,
                        'fabric_id'         => $fabric!=null ? $fabric->id : 0,
                        'fabric_image'      => '/images/Menu/Leather/M/' . $request->main . '.png',
                        'canvas_front_img'  => $img_source,
                        'item_description'  => serialize($description_json),
                        'price'             => $request->totalPrice,
                        'qty'               => 1,
                        'total'             =>  $request->totalPrice *  $request->measurement['quantity'],
                    ];
                    
                    #this is editing
                    if( !! empty($request->ocartID)){
                        $ids = DB::table('carts')->insert($cartSet);
                        $cartId = DB::getPdo()->lastInsertId();	
                    }
                    else
                    {
                        DB::table('carts')
                           ->where('id', $request->ocartID)
                           ->update($cartSet);
                           
                    }
                }
           } 
        }   


        ############# add design shoes to the cart ###############
        else
        {
            $img_source = $request->image_source;
            $model      = $request->model;
            $modelInfo  = ModelSerial::where('modelno', $model)->first();
            if($modelInfo ==null)
            {
                return response()->json(array('result'=>'false'));
            }
            $mainFolder = StyleFolder($modelInfo->style);
            $group_type = Type::where('type', strtolower($modelInfo->style))->first();
            if($group_type!=null)
                $group_type_id = $group_type->id;
            else
            $group_type_id = null;
    
            //$description_json = json_encode( $request->description );
            $description = [
                "productType"       => $request->productType
                ,"folderType"       => $mainFolder
                ,"getShape"         => $modelInfo->shape
                ,"shoeType"         => strtolower($modelInfo->style)
                ,"currentView"      => "Right"
    
                ,"getStyle"         => "shape"
    
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
                ,"getSideName"  => $modelInfo->sidetyp->name  ?? ''       //"SD1"
                ,"getSideNo"    => $modelInfo->sideclr->key ?? 'none'          //"none"
                ,"getSideNoName"=> $modelInfo->sideclr->name ?? ''
    
                ,"back"         => $request->back               // "BK1"
                ,"getBack"      => $modelInfo->backtyp->pkey  ?? 'none'          //"BK1"
                ,"getBackName"  => $modelInfo->backtyp->name  ?? ''      //"BK1"
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
                ,"getAccessoryName" => 'none'
    
                // must none, because it is not view from bottom
                ,"getStitchingNo"   => 'none'
                ,"getStitchingName" => 'none'
    
                ,"getSpeci"         => "mix-match"
                ,"getBrogueNo"      => "none"
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
    
                ,"getBrogueName"    => "none"
                ,"optionBorderSlim" => "N"
                ,"setMenuLth"       => "premium"
                ,"code64"           => "null"
                ,"img"              => "null"
                ,"measureMenu"      => "bodySize"
                ,"id"               => $modelInfo->id
                ,"DESIGN_TYPE"      => "custom"     //<---#######################
             ];
    
            $description_json = json_encode($description);        
                
            if(Session::has('carts')) {
                $cartsess=Session::get('carts');						
            }else{
                $carts=md5(microtime().rand());
                $cartsess=Session::put('carts', $carts);							
            }		
            
            if (Auth::check())
            {
                $userid=Auth::user()->id;
                
                $cartuser = Cart::select('id')->where('user_id' ,'=' , $userid)->count();
                if($cartuser>0){
                        DB::table('carts')
                        ->where('user_id', $userid)
                        ->update(['cart_sessionid' => $cartsess]);					
                }
            }else{
                $userid=Null;
            }
              
            $eTailorObj     = $request->description;  # // json_decode($_POST['setarr'], true);  
            $finalarr       = $description_json;
    
            if( strtolower($request->productType)=='shoe' )
            {
                {
                    $bodyqty=1;
                }
                for($i=0;$i<$bodyqty;$i++){
                    $cartSet = [
                        'cart_sessionid'    => $cartsess,
                        'cat_id'            => CONST_CATEGORY_ID_SHOES,
                        'user_id'           => $userid,
                        'group_id'          => $group_type_id,
                        'fabric_name'       => $modelInfo->style . ' ' . strtolower($modelInfo->shape) . ' ' .$model,
                        'fabric_id'         => $modelInfo->main,
                        'fabric_image'      => $model . '/view/view1.jpg',
                        'canvas_front_img'  => $img_source,
                        'item_description'  => serialize($finalarr),
                        'price'             => $request->totalPrice,
                        'qty'               => 1,
                        'total'             => $request->measurement['quantity'] * $request->totalPrice,
                    ];
                    
                    #this is editing
                    if( !! empty($eTailorObj['ocartID'])){
                        $ids = DB::table('carts')->insert($cartSet);
                        $cartId = DB::getPdo()->lastInsertId();	
                    }
                    else
                    {
                        DB::table('carts')
                           ->where('id', $eTailorObj['ocartID'])
                           ->update($cartSet);
                           
                    }
                }
           } 
        }

		return response()->json(array('mes'=>'sucess'));
    }

    public function addModelshoesToImage(Request $request)
    {
        
        $model      = $request->model;
        $modelInfo  = ModelSerial::where('modelno', $model)->first();
        $mainFolder = StyleFolder($modelInfo->style);
        $group_type = Type::where('type', strtolower($modelInfo->style))->first();
        if($group_type!=null)
            $group_type_id = $group_type->id;
        else
        $group_type_id = null;
        

        $description = [
                    "productType"       => $request->productType
                    ,"folderType"       => $mainFolder
                    ,"getShape"         => $modelInfo->shape
                    ,"shoeType"         => strtolower($modelInfo->style)
                    ,"currentView"      => "Right"

                    ,"getStyle"         => "shape"

                    ,"getLeatherGroup"  => $modelInfo->maintyp->id
                    ,"getLeather"       => $modelInfo->maintyp->key  ?? 'none'// "premium"
                    ,"getLeatherName"   => $request->main_name         //"the premium"
                    ,"getLeatherNo"     => $modelInfo->mainclr->pkey   //"LT-001"
                    ,"getLeatherNoName" => $modelInfo->mainclr->name

                    ,"front"            => $request->front             //"none"
                    ,"getFront"         => $modelInfo->fronttyp->pkey ?? 'none'         //"none"
                    ,"getFrontName"     => $request->front_name       //"none"
                    ,"getFrontNo"       => !empty($request->frontclr) ? $request->frontclr->key : '0'        //"none"
                    ,"getFrontNoName"   => ""

                    ,"side"         => $request->side              //"SD1"
                    ,"getSide"      => $modelInfo->sidetyp->pkey  ?? 'none'          //"SD1"
                    ,"getSideName"  => $modelInfo->sidetyp->name  ?? ''       //"SD1"
                    ,"getSideNo"    => $modelInfo->sideclr->key ?? 'none'          //"none"
                    ,"getSideNoName"=> $modelInfo->sideclr->name ?? ''

                    ,"back"         => $request->back               // "BK1"
                    ,"getBack"      => $modelInfo->backtyp->pkey  ?? 'none'          //"BK1"
                    ,"getBackName"  => $modelInfo->backtyp->name  ?? ''      //"BK1"
                    ,"getBackNo"    => !empty($request->backclr) ? $request->backclr->key : 'none'              //"none"
                    ,"getBackNoName"=> !empty($request->backclr) ? $request->backclr->name : ''              //"none"

                    ,"sole"         => $modelInfo->soletyp->pkey  ?? 'none'          // "Sole-1L"
                    ,"getSoleBorder"=> $modelInfo->soleclr->pkey  ?? 'none'
                    ,"mixSolePriceStatus" => "no"
                    ,"getSole"      => $modelInfo->soletyp->pkey  ?? 'none'          // "LT-N007"
                    ,"getSoleName"  => $modelInfo->soletyp->name  ?? ''

                    ,"getLacesNo"   => !empty($request->laceclr) ? $request->laceclr->key : 'none'            //"HT-Black"
                    ,"getLacesName" => $request->laces ?? ''            //"HT-Black"

                    ,"getLiningNo"  => !empty($request->liningclr) ? $request->liningclr->key : 'none'        //"SH-SW08"
                    ,"getLiningName"=> $request->lining_name   ?? ''    //"Dark Brown"
                    
                    ,"getAccessory"     => 'none' //"none"
                    ,"getAccessoryNo"   => 'none'         //"none"
                    ,"getAccessoryName" => ""

                    // must none, because it is not view from bottom
                    ,"getStitchingNo"   => 'none'     //"none"
                    ,"getStitchingName" => 'none'       //"none"


                    ,"getSpeci"         => "mix-match"
                    ,"getBrogueNo"      => "none"
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

                    ,"getBrogueName"    => "none"
                    ,"optionBorderSlim" => "N"
                    ,"setMenuLth"       => "premium"
                    ,"code64"           => "null"
                    ,"img"              => "null"
                    ,"measureMenu"      => "bodySize"
                    ,"id"               => $modelInfo->id

                    //---#######################->
                    ,"DESIGN_TYPE"      => "designer"  # 'custom' // because this is already designed shoes
                    //<---#######################-
                 ];

        if($request->modelSeries=='customize')
        {
            if( !empty($request->main) )
            {
                if( ($mainclr = ColorMain::where('pkey', $request->main)->first()) )
                {
                    $description["getLeatherNo"]     = $mainclr->pkey;   //"LT-001"
                    $description["getLeatherNoName"] = $mainclr->name;
                }
            }

            if( !empty($request->front) )
            {
                if( ($frontclr = ColorFront::where('key', $request->front)->first()) )
                {
                    $description["getFrontNo"]       = $frontclr->key;
                    $description["getFrontNoName"]   = $frontclr->name;
                }
            }

            if( !empty($request->side) )
            {
                if( ($sideclr = ColorSide::where('key', $request->side)->first()) )
                {
                    $description["getSideNo"]        = $sideclr->key;
                    $description["getSideNoName"]    = $sideclr->name;
                }
            }

            if( !empty($request->back) )
            {
                if( ($backclr = ColorBack::where('key', $request->back)->first()) )
                {
                    $description["getBackNo"]        = $backclr->key;
                    $description["getBackNoName"]    = $backclr->name;
                }
            }

            if( !empty($request->sole) )
            {
                if( ($soleclr = ColorSole::where('pkey', $request->sole)->first()) )
                {
                    $description["getSole"]          = $soleclr->pkey;
                    $description["getSoleName"]      = $soleclr->name;
                }    
            }

            if( !empty($request->laces) )
            {
                if( ($laceclr = ColorLace::where('key', $request->laces)->first()) )
                {
                    $description["getLacesNo"]       = $laceclr->key;
                    $description["getLacesName"]     = $laceclr->name;
                }
            }

            if( !empty($request->lining) )
            {
                if(($liningclr = ColorLining::where('key', $request->lining)->first()))
                {
                    $description["getLiningNo"]      = $liningclr->key;
                    $description["getLiningName"]    = $liningclr->Name;
                }
            }

            if( !empty($request->accessory) )
            {
                if(($accessclr = ColorAccessory::where('key', $request->accessory)->first()))
                {
                    $description["getAccessoryNo"]   = $accessclr->key;
                    $description["getAccessoryName"] = $accessclr->name;
                }
            }
        }
            
        //dd($description);
        $description_json = json_encode($description);
        
        $goodsLists['1']                = json_decode( $description_json );
        $goodsLists['1']->id            = $modelInfo->id;
        $goodsLists['1']->getQty        = 1;

        //---#######################->
        $goodsLists['1']->DESIGN_TYPE   = 'designer'; # 'custom'; // because this is already designed shoes   
        //<--########################

        $goodsLists['1']->MODELNO       = $model;        
        $goodsLists['1']->productName   = ucfirst( $modelInfo->maintyp->name ) 
                        . ' ' . ucfirst( $modelInfo->style )
                        . (!empty($modelInfo->serials) ? ' ' : '') 
                        . ucfirst( $modelInfo->serials );

		return response()->json([
            'description'   => $description_json,
            'goods'         => $goodsLists,
        ]);

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
                'ID'            => $item->id,
                'ROW'           => $idx,
                'NO'            => $item->modelno,
                'NEW_TAG'       => $item->coupons,
                'MODELSTYLE'    => $item->style,
                'FRONT_CATEGORY'=> $item->front,
                'FRONT_COLORGRP'=> $item->front_color,
                'MAIN_CATEGORY' => $item->main,
                'MAIN_COLORFRP' => $item->main_color,
                'SIDE_CATEGORY' => $item->side,
                'SIDE_COLORGRP' => $item->side_color,
                'BACK_CATEGORY' => $item->back,
                'BACK_COLORGRP' => $item->back_color,
                'ACCESSORY_CATEGORY' => $item->accessory,
                'ACCESSORY_COLORGRP' => $item->access_color,
                'PRICE'         => $item->price,
                'SALE_STATUS'   => $item->sale_status,
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

    function createDesignImagesInformation(Request $request)
    {
        $goodsLists['1']                = empty($request->shoes_info) ? "" : json_decode( base64_decode($request->shoes_info) );
        $goodsLists['1']->id            = 0;                    # it's unknown
        $goodsLists['1']->getQty        = 1;
        $goodsLists['1']->DESIGN_TYPE   = 'custom';             # <== from designer page to carts for new model designing
        $goodsLists['1']->MODELNO       = '';                   # $item->key;
        $goodsLists['1']->productName   = '';                   # $item->name;

        return json_encode(
            [
                'goods'         => json_encode($goodsLists),
            ]
        );
    }
}