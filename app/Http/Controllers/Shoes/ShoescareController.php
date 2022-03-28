<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Controllers\ShoesController;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoescareController extends ShoesController
{
    public function index()
    {
        $shoeCare = DB::table('shoescare')
            ->select('id as resid', 'key as id', 'name', 'desc', 'shape', 'style', 'price', 'sale', 'arrival', 'closeout', 'view')
            ->where('closeout', 'N')
            ->where('shape', 'ShoeCare')
            ->get();
        $shoeCareArr = [];
        $shoeCare = $shoeCare->toArray();

        foreach ($shoeCare as $value) {
            $item = [];
            foreach ($value as $key => $val)              $item[$key] = $val;
            $shoeCareArr[] = $item;

            $shoeCareArr[count($shoeCareArr) - 1]['tag'] = [
                "price" => $value->price . setting('site.sign'),
                "sale" => $value->sale . setting('site.sign')
            ];
        }

        $standardSize = DB::table('size_country_name')
            ->select('name', 'size')
            ->leftJoin('size_shoes', 'size_country_name.id', '=', 'size_shoes.country_no')
            ->get();
        $result = array();
        $list = [];
        foreach ($standardSize as $key => $item) {
            $list[] = $item->name;
            $result[] = [
                "name" => $item->name,
                "size" => array_map('doubleval', explode(',', $item->size))
            ];
        }
        $data = [
            "collection"  => $shoeCareArr,
            "shoesize"    => [
                "list"  => $list,
                "chart" => $result
            ]
        ];
        // dd(json_decode(json_encode($data)));
        return view('shoescare', ["data" => json_encode($data)]);
    }
    public function detail()
    {
        return view('shoescare.customshoescare');
    }

    public function addShoeCare(Request $request)
    {
        foreach ($request->request as $key => $item) {
            $cart               = new Cart();
            $cart->key          = $item['id'];
            $cart->name         = $item['name'];
            $cart->shape        = $item['shape'];
            $cart->style        = $item['style'];
            $cart->quantity     = $item['quantity'];
            if( !empty(auth()->user() ) )
                $cart->session = auth()->user()->id;
            else
                $cart->token = session()->get('_token');
            //dd($cart);
            $cart->save();
        }
    }
}
