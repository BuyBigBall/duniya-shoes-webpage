<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Controllers\ShoesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\models\Type;

class elementsController extends ShoesController
{
    public function __construct()
    {
    }
    public function topMenu(Request $request)
    {
        if( !empty(auth()->user()) )
        {
            return view('layouts.topmenu_after_login');
        }
        else
        {
            return view('layouts.topmenu_before_login');
        }
        
    }
    public function loadPrice(Request $request)
    {
        return response()->json([
            "list" => "<li id='premium' class='lthType'><span data-lang='cate-1'>PREMIUM LEATHER</span><span class='discount'>".setting('site.sign')."179</span></li><li id='fashion' class='lthType'><span data-lang='cate-2'>FASHION LEATHER</span><span class='discount'>".setting('site.sign')."179</span></li><li id='sheep' class='lthType'><span data-lang='cate-3'>SHEEPSKIN LEATHER</span><span class='discount'>".setting('site.sign')."199</span></li><li id='fabric' class='lthType'><span data-lang='cate-4'>FABRIC</span><span class='discount'>".setting('site.sign')."139</span></li>",
            "mixprice"  => ["premium" => "9.9", "fashion" => "9.9", "sheep" => "9.9", "fabric" => "0"],
            "price"     => ["premium" => "179", "fashion" => "179", "sheep" => "199", "fabric" => "139"],
            "sign"      => setting('site.sign')
        ]);
    }
    public function LoadPreDesignArr()
    {
        $designs = DB::table('designs')->select(
            [
                'pkey as PKEY', 'codeno as NO', 'groupno as GROUP', 'model as MODEL', 'shape as SHAPE', 'img as IMG', 'selects as SELECTS'
            ]
        )->get();
        return response()->json($designs);
    }

    public function loadXmlStyle_2(Request $request)
    {
        //$shoeType = DB::table('types')->select('id')->where('type', $request->get("type"))->first();

        if ($request->get("type") == "loafers") 
        {
            $accessories = DB::table('style_accessories')->select(
                [
                    'pkey as id', 'name', 'path', 'status'
                ]
            )->get();  // ->where('type_id', $shoeType->id)
        }

        $back = DB::table('style_backs')->select(
            [
                'pkey as id', 'name', 'path', 'status'
            ]
        )->get();  // ->where('type_id', $shoeType->id)

        $shape = DB::table('style_shapes')->select(
            [
                'pkey as id', 'name', 'path', 'status'
            ]
        )->get();  // ->where('type_id', $shoeType->id)

        $sole = DB::table('style_soles')->select(
            [
                'pkey as id', 'name', 'path', 'status'
            ]
        )->get();  // ->where('type_id', $shoeType->id)
        $sides = DB::table('style_sides')
            ->select('id as pid', 'pkey as id', 'name', 'path', 'fasion_type', 'side_type')
            // ->where('type_id', $shoeType->id)
            ->orderBy('pid')
            ->groupBy('fasion_type', 'side_type')
            ->get();
        $fasionType = 'none';
        $sideType = [];
        $fasionTypeArr = [];
        foreach ($sides as $side) {
            if ($side->fasion_type == $fasionType) {
                # this is the only sides for last fashion_type.
                // "pid"	"id"	"name"	"path"	"fasion_type"	"side_type"
                // "46"	"SD1"	"SIDE SD1"	"SD1"	"FT12"	"SD1"
                // "47"	"SD2"	"SIDE SD2"	"SD2"	"FT12"	"SD2"
                // "48"	"SD3"	"SIDE SD3"	"SD3"	"FT12"	"SD3"
                // "49"	"SD4"	"SIDE SD4"	"SD4"	"FT12"	"SD4"
                // "50"	"SD5"	"SIDE SD5"	"SD5"	"FT12"	"SD5"                
                $sideType[$side->side_type] = $side;
            } else {
                $fasionTypeArr[$fasionType] = $sideType;
                $fasionType = $side->fasion_type;
            }
        }
        $arrSides = $fasionTypeArr;
        if ($request->get("type") == "loafers")
            return response()->json([
                "back" => $back,
                "shape" => $shape,
                "sole" => $sole,
                "side" => $arrSides,
                "accessory" => $accessories
            ]);
        else
            return response()->json([
                "back" => $back,
                "shape" => $shape,
                "sole" => $sole,
                "side" => $arrSides
            ]);
    }
    public function PopUpPreDesign()
    {
        return view('popup/popupdesigndetail');
    }
    public function layoutOptionColor(Request $request)
    {
        return view('layoutoptioncolor');
    }
    public function PopUpRecommend(Request $request)
    {
        return view('popup/popuprecommand');
    }
    public function PopUpproduct(Request $request)
    {
        return view('popup/product');
    }
    public function loadDataLang(Request $request)
    {
        setcookie("set_lang", $request->get('langth'), time() + 2 * 24 * 60 * 60);
        return getLanguage($request->get('langth'));
    }

    public function addCart(Request $request)
    {
        if(Session::has('carts')) {
			$cartsess=Session::get('carts');						
		}else{
			$carts=md5(microtime().rand());
			$cartsess=Session::put('carts', $carts);							
		}		
        // $cart = new Cart();
        
        // $cart->monoIn           = $request->monoIn;
        // $cart->monoOut          = $request->monoOut;
        // $cart->statusPreDesign  = $request->statusPreDesign;
        // $cart->unit             = $request->unit;
        // $cart->length           = $request->length;
        // $cart->width            = $request->width;
        // $cart->size_type        = $request->size_type;
        // $cart->size             = $request->size_no;
        // $cart->size_type_name   = $request->size_name;
        // $obj_description    = json_decode(base64_decode($request->sobj));
        // $cart->quantity         = $request->qty;
        // $cart->price            = $obj_description->getShoePrice;
        // $cart->lastitem         = $request->lastitem;
        // $cart->item_description             = $request->sobj;
        // $cart->shape            = "shoe";
        // $cart->style            = "custom";

        // if( !empty(auth()->user()))
        // {
        //     $cart->session = auth()->user()->id;
        // }
        // else
        // {
        //     $cart->token = $request->_token;
        // }
        // $cart->save();

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
		  
        $eTailorObj = $json_description = json_decode(base64_decode($request->sobj));  #//json_decode($_POST['setarr'], true);  
        $finalarr   = base64_decode($request->sobj);

	    if( true )
        {
			// $finalarr['osizeStyle']= $_POST['fitstyle'];
			// $finalarr['osizeType']= $_POST['bsizetyp'];
			// $finalarr['osizeNeck']= $_POST['bsizeNeck'];
			// $finalarr['osizeChest']= $_POST['bsizeChest'];
			// $finalarr['osizeWaist']= $_POST['bsizeWaist'];
			// $finalarr['osizeHip']= $_POST['bsizeHip'];
			// $finalarr['osizeLength']= $_POST['bsizeLength'];
			// $finalarr['osizeShoulder']= $_POST['bsizeShoulder'];
			// $finalarr['osizeSleeve']= $_POST['bsizeSleeve'];
			// $finalarr['oqty']= 1;			
			// $finalarr['ofrontView']= '';
			// $finalarr['obackView']= '';
			// $finalarr['osizeFit']='';
			
			// if( !! empty($eTailorObj->ocartID)){
			// 	$bodyqty=$_POST['selbodyqty'];
			// }else
            {
				$bodyqty=1;
			}
			
			for($i=0;$i<$bodyqty;$i++){
				
				// $ppt=$finalarr;												
				 $cartSet = [
					'cart_sessionid'    => $cartsess,
					'cat_id'            => CONST_CATEGORY_ID_SHOES,
					'user_id'           => $userid,
                    # because there no model, it is no need
					// 'group_id'          => $group_type_id,
					// 'fabric_name'       => $modelInfo->style . ' ' . strtolower($modelInfo->shape) . ' ' .$model,
					// 'fabric_id'         => $modelInfo->main,
                    'fabric_image'          => '/images/Menu/Leather/M/' . $json_description->getLeatherNo . '.png',
					'canvas_front_img'      => $request->shoes_image_base64 ?? '',
                    # <------------------
					'item_description'  => serialize($finalarr),
					'price'             => $json_description->getShoePrice,
					'qty'               => $request->qty,
					'total'             => $request->qty * $json_description->getShoePrice,
				];
				
				if( !! empty($eTailorObj->ocartID)){
			 		
				 	$ids = DB::table('carts')->insert($cartSet);
					$cartId = DB::getPdo()->lastInsertId();	
			
				 }else{	 				 
					 DB::table('carts')
						->where('id', $eTailorObj->ocartID)
						->update($cartSet);
						
					$cartId=$eTailorObj->ocartID;	
					
					// $cartimg = Cart::select('canvas_front_img','canvas_back_img')->where('id', '=',  $cartId)->first();					
					
				
				 }
				 
				// $fabidd=$eTailorObj['ofabric'];
				// $attid=$eTailorObj['osleeve'];
				// $fabric_sty = Stylefabimglist::select('list_img')->where('fab_id', '=', $fabidd)->where('style_id', '=', $attid)->first();
				// $fablist=$fabric_sty->list_img;
				// $cartimgSet = [					
				// 	'canvas_front_img' => $fablist,									 
				// ];
				// DB::table('carts')->where('id', $cartId)->update($cartimgSet);
			}
	   }	
        return redirect('/designshoes/checkout');
    }

    public function delModel(Request $request)
    {
        return view('popup.PopUpQuestionDeleteItem');
    }
    public function delCart(Request $request)
    {
        $cart_item = Cart::find($request->id);
        $delId = 0;
        if($cart_item)      $delId = $cart_item->id;

        $Last_Items = Cart::where('cart_sessionid', $cart_item->cart_sessionid)
                ->where('id', '<>', $delId)->get();

        $discount = 0;
        $price = 0;
        $sumprice = 0;
        $qty = 0;
        $shipping = 0;
        $total = 0;

        $items = [];
        foreach($Last_Items as $leaved_item)
        {
            $json_description = $leaved_item->item_description;
            $obj_description = json_decode(unserialize($json_description));
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


        // 20220220
        $returnData = [
            'TAGID' => 'list-hover.tagProductList-' . $request->id,
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
        //dd($returnData);

        DB::table('carts')->where('id', $request->id)->delete();
        return response()->json($returnData);
    }
}
