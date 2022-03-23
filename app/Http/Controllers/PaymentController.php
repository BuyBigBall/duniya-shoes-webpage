<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\models\Cart;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paypal(Request $request)
    {
        $data = [];
        return view("checkout.paypal", $data);
    }

        /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
		$cartsess=Session::get('carts');
		$cartdata = Cart::select('*')->where('session' ,'=' , Auth::id())->get();
		
		$pi=1;
		$total=0;
		$shiptotal=0;
		foreach($cartdata as $key => $cartdetail){
		
		$oprodType = Cart::cartdescnfo($cartdetail->id,'oprodType');
		$pricee=$cartdetail->price;
		$shipping=$cartdetail->shipping;
		if($shipping!='' || $shipping!=0){
			$shiptotal=$shiptotal+$shipping;
		}else{
			$shiptotal=$shiptotal;
		}
		$total=$total+$pricee;
				
		
	
					
		
		
		
		$pi++;			
	}
	$subtotal=$total+$shiptotal;

	
	$grtotal = 0;
	
	
	// $coucount = CartCoupon::select('*')->where('cart_sessionid' ,'=' , $cartsess)->count();
	// 	if($coucount>0){
	// 		$coucode = CartCoupon::select('*')->where('cart_sessionid' ,'=' , $cartsess)->first();			
	// 		$couamt=$coucode->coupon_amt;	
			
	// 	$couptotal=$subtotal-$couamt;	
			
	// 	}else{
	// 		$couptotal=$subtotal;
	// 	}
		
	// 	$taxdata = TaxRate::select('*')->where('id', '=',  1)->first();
		
		
	// 	if($taxdata->tax_status==1){
	// 		$taxrate=$taxdata->tax_rates;
	// 		$tax=($total*$taxrate)/100;
			
	
	// 	$grtotal=$couptotal+$tax;	
			
	// 	}else{
	// 		$tax=0;
			
	// 		$grtotal=$couptotal;
	// 	}
		
		
		
		
		
		
	
	
		//print_r($product);
		//exit();
		

		
	/*	$shipping_address = new ShippingAddress();
		
		$shipping_address->setCity('City');
		$shipping_address->setCountryCode('AR');
		$shipping_address->setPostalCode('200');
		$shipping_address->setLine1('Adress Line1');
		$shipping_address->setState('State');
		$shipping_address->setRecipientName('Recipient Name');
		
		$shipping_address->setShippingAddress($shipping_address);*/
		
		
		
		
		/*$amount_details = new Details();
		$amount_details->setSubtotal($grtotal);*/
	
        $provider = new PayPalClient([]);
        $provider->getAccessToken();

         $e = $provider->createOrder([
             "intent"=> "CAPTURE",
             "purchase_units"=> [
                 0 => [
                     "amount"=> [
                         "currency_code"=> "USD",
                         "value"=> strval(round($grtotal,2))
                     ]
                 ]
             ],
             "application_context" => [
                         "cancel_url" => route('cartitems'),
                         "return_url" => route('payment.status')
                    ] 
           ]);
          // dd(number_format(floor($grtotal*100)/100,2, '.', ''));
           session(['orderID'.auth()->user()->id => $e['id']]);
           foreach($e['links'] as $l){
              if($l['rel'] == 'approve'){
                   return redirect($l['href']);
               }
            
           }
           Session::put('error','Some error occur, sorry for inconvenient');
           return Redirect::route('cartitems');

   
    }
	
}
