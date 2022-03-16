<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $tokenId = session()->get('_token');
        // dd(session()->get('_token'));
        $lang = getLanguage();
        if( !empty(auth()->user()))
            $goods = DB::table('carts')->where('checkout', 0)->where('session', auth()->user()->id)->get();
        else
            $goods = DB::table('carts')->where('checkout', 0)->where('token', $tokenId)->get();
        // 
        $goodsLists = [];
        $i = 0;
        foreach ($goods as $item) {
            $i++;
            if ($item->shape == "ShoeCare") {
                $goodsLists[$i . ''] = json_decode(json_encode(
                    [
                        "id" => $item->id,
                        "COUPON_STATUS" => $item->coupon_status,
                        "SEX" => $item->gender,
                        "DESIGN_TYPE" => "designer",
                        "MODELNO" => $item->key,
                        "productType" => $item->style,
                        "productLabel" => $item->shape,
                        "productName" => $item->name,
                        "getQty" => $item->quantity,
                        "countSession" => 1,
                        "PRICE" => 25.5,
                        "SHIPPING" => 9.99,
                        "MIX_PRICE" => 0,
                        "SUMPRICE" => 25.5,
                        "PRICE_SOLEMIX" => 0,
                        "PRICE_SYMBOLIC" => 0
                    ]
                ));
            } else {
                $goodsLists[$i . ''] = empty($item->desc) ? "" : json_decode(base64_decode($item->desc));
                $goodsLists[$i . '']->id = $item->id;
                $goodsLists[$i . '']->DESIGN_TYPE = 'custom';           //<===  from designer page to carts for new model designing
                $goodsLists[$i . '']->MODELNO = $item->key;
                $goodsLists[$i . '']->productName = $item->name;
                $goodsLists[$i . '']->getQty = $item->quantity;
                //dd($goodsLists[$i . '']->getLeatherName);               
            }
        }
        $data = [
            'language' => $lang,
            'goods' => json_encode($goodsLists),
            'goodsLists' => $goodsLists
        ];
        //dd($goodsLists);
        return view("checkout.checkout", $data);
    }

    public function detail(Request $request)
    {
        $modelno = [];
        $cart_id = $request->id;
        $cartItem = Cart::find($cart_id);
        $token = $cartItem->token;
        if(!empty($cartItem))
        {
            $shoeInfo = json_decode(base64_decode($cartItem->desc));
            $modelno[] = $cartItem->key ?? '';
            $shoeInfo->gender   = $cartItem->gender;
            $shoeInfo->shape    = $cartItem->shape;
            $shoeInfo->style    = $cartItem->style;
            $shoeInfo->quantity = $cartItem->quantity;
            $shoeInfo->length   = $cartItem->length;
            $shoeInfo->width    = $cartItem->width;
            $shoeInfo->unit     = $cartItem->unit;
            $shoeInfo->sizeType = $cartItem->sizeType;
            $shoeInfo->DESIGN_TYPE = $cartItem->style;
        }
        $cart_items = [$shoeInfo];
        
        if( !empty(auth()->user()))
            $cartItemCollection = Cart::where('id', '<>', $cart_id)->where('session', auth()->user()->id)->get();
        else
            $cartItemCollection = Cart::where('id', '<>', $cart_id)->where('token', $token)->get();
            
        foreach($cartItemCollection as $cartItem)
        {
            $shoeInfo = json_decode(base64_decode($cartItem->desc));
            if(!!empty($cartItem->desc) || !!empty($shoeInfo)) continue;

            $modelno[] = $cartItem->key ?? '';
            $shoeInfo->gender   = $cartItem->gender;
            $shoeInfo->shape    = $cartItem->shape;
            $shoeInfo->style    = $cartItem->style;
            $shoeInfo->quantity = $cartItem->quantity;
            $shoeInfo->length   = $cartItem->length;
            $shoeInfo->width    = $cartItem->width;
            $shoeInfo->unit     = $cartItem->unit;
            $shoeInfo->sizeType = $cartItem->sizeType;
            $shoeInfo->DESIGN_TYPE = $cartItem->style;
            $cart_items[] = $shoeInfo;
        }
        $imageArray = [];
        foreach($cart_items as $item)
        {
            $imageArray[ (count($imageArray)+1) .''] = $item;
        }
        return view('pages.designshoes.detail')
                ->with('cart_items', $cart_items)
                ->with('json_items', json_encode($imageArray))
                ->with('modelno', $modelno);
    }
}
