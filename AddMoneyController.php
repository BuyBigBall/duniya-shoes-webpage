<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Cart;
use App\Http\helpers;
use App\ShippingRate;
use App\CartCoupon;
use App\TaxRate;

class AddMoneyController extends HomeController
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
      
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('paywithpaypal');
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
		
		
		
		$cartdata = Cart::select('*')->where('cart_sessionid' ,'=' , $cartsess)->get();
		
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

	
	
	
	
	$coucount = CartCoupon::select('*')->where('cart_sessionid' ,'=' , $cartsess)->count();
		if($coucount>0){
			$coucode = CartCoupon::select('*')->where('cart_sessionid' ,'=' , $cartsess)->first();			
			$couamt=$coucode->coupon_amt;	
			
		$couptotal=$subtotal-$couamt;	
			
		}else{
			$couptotal=$subtotal;
		}
		
		$taxdata = TaxRate::select('*')->where('id', '=',  1)->first();
		
		
		if($taxdata->tax_status==1){
			$taxrate=$taxdata->tax_rates;
			$tax=($total*$taxrate)/100;
			
	
		$grtotal=$couptotal+$tax;	
			
		}else{
			$tax=0;
			
			$grtotal=$couptotal;
		}
		
		
		
		
		
		
	
	
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
           \Session::put('error','Some error occur, sorry for inconvenient');
           return Redirect::route('cartitems');

   
    }
	
    public function getPaymentStatus()
    {
        
		$orderID = Session::get('orderID'.auth()->user()->id);
        $provider = new PayPalClient([]);
        $provider->getAccessToken();
        $id = request()->input('PayerID');
        $response = $provider->capturePaymentOrder($orderID);
        //dd($response);
		if($response['status'] == 'COMPLETED')
		return Redirect::route('order');

        \Session::put('error','Payment failed');
        return Redirect::route('cartitems');
    }
  }
