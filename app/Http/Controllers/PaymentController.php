<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function paypal(Request $request)
    {
        $data = [];
        return view("checkout.paypal", $data);
    }
}
