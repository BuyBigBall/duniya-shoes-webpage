<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Controllers\ShoesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatinaController extends ShoesController
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
