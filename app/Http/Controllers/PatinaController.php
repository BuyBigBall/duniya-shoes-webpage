<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatinaController extends Controller
{
    public function index()
    {
        $patinaShoes = DB::table('patina_shoes')->get();

        return view('patina', ['allShoes' => $patinaShoes]);
    }
    public function detail(Request $request)
    {
        $selectShoes = DB::table('patina_shoes')->where('key',$request->get('model'))->first();
        return view('patina.patinadetail', ['shoes' => $selectShoes]);
    }
    
}
