<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $tokenId = session()->get('_token');
        // dd(session()->get('_token'));
        $lang = getLanguage();
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
                        "SEX" => $item->gander,
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
                //$goodsLists[$i . '']->DESIGN_TYPE = $item->style;
                $goodsLists[$i . '']->MODELNO = $item->key;
                $goodsLists[$i . '']->productName = $item->name;
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

        return view('pages.designshoes.detail');
    }
}
