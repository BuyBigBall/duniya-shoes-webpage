<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Controllers\ShoesController;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Shoescare;


class ShoescareController extends ShoesController
{
    public function index()
    {
        $shoeCare = DB::table('shoescares')
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
        //dd($shoeCareArr);
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
        if(Session::has('carts')) {
			$cartsess=Session::get('carts');
		}else{
			$cartsession_id=md5(microtime().rand());
			$cartsess=Session::put('carts', $cartsession_id);
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

        //dd($request);
        foreach ($request->request as $key => $item) {
            $care = Shoescare::where('key', $item['id'])->first();
            if( $care!=null )
            {
                $cart               = new Cart();
                $cart->cart_sessionid    = $cartsess;
                $cart->cat_id            = CONST_CATEGORY_SHOESCRE;
                $cart->user_id           = $userid;
                // $cart->key          = $item['id'];
                // $cart->name         = $item['name'];
                // $cart->shape        = $item['shape'];
                // $cart->style        = $item['style'];
                // $cart->quantity     = $item['quantity'];
                $cart->fabric_image      = '';
                $cart->canvas_front_img  = '/images/patina/shoecare/' . $care->key . '/View1/' . strtolower($care->key) . '.jpg';
                $cart->item_description  = $care->desc;
                $cart->price             = $care->price;
                $cart->qty               = $item['quantity'];
                $cart->total             = $care->price * $item['quantity'];
    
                $cart->save();
            }
        }
    }
}
