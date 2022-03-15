<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class elementsController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        // return view('designshoes');
    }
    public function loadPrice(Request $request)
    {
        

        return response()->json([
            "list" => "<li id='premium' class='lthType'><span data-lang='cate-1'>PREMIUM LEATHER</span><span class='discount'>".setting('site.sign')."179</span></li><li id='fashion' class='lthType'><span data-lang='cate-2'>FASHION LEATHER</span><span class='discount'>".setting('site.sign')."179</span></li><li id='sheep' class='lthType'><span data-lang='cate-3'>SHEEPSKIN LEATHER</span><span class='discount'>".setting('site.sign')."199</span></li><li id='fabric' class='lthType'><span data-lang='cate-4'>FABRIC</span><span class='discount'>".setting('site.sign')."139</span></li>",
            "mixprice" => ["premium" => "9.9", "fashion" => "9.9", "sheep" => "9.9", "fabric" => "0"],
            "price" => ["premium" => "179", "fashion" => "179", "sheep" => "199", "fabric" => "139"],
            "sign" => setting('site.sign')
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

        if ($request->get("type") == "loafers") {
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
        // dd(base64_decode($request->sobj));
        setcookie("_token", $request->_token, time() + 2 * 24 * 60 * 60);
        $cart = new Cart();
        $cart->token = $request->_token;
        $cart->monoIn = $request->monoIn;
        $cart->monoOut = $request->monoOut;
        $cart->statusPreDesign = $request->statusPreDesign;
        $cart->unit = $request->unit;
        $cart->length = $request->length;
        $cart->width = $request->width;
        $cart->size_type = $request->size_type;
        $cart->size = $request->size_no;
        $cart->size_type_name = $request->size_name;
        $cart->quantity = $request->qty;
        $cart->lastitem = $request->lastitem;
        $cart->desc = $request->sobj;
        $cart->shape = "shoe";
        $cart->style = "custom";
        $cart->save();

        return redirect('/designshoes/checkout');
    }
    public function delModel(Request $request)
    {
        return view('popup.PopUpQuestionDeleteItem');
    }
    public function delCart(Request $request)
    {
        $cart_item = Cart::find($request->id);

        $Last_Items = Cart::where('token', $cart_item->token)->where('id', '<>',$cart_item->id)->get();

        $discount = 0;
        $price = 0;
        $sumprice = 0;
        $qty = 0;
        $shipping = 0;
        $total = 0;

        $items = [];
        foreach($Last_Items as $leaved_item)
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
