<?php

namespace App\Http\Controllers\Shoes;

use App\Http\Controllers\ShoesController;
use Illuminate\Http\Request;

class libController extends ShoesController
{
    public function __construct()
    {
    }
    public function index()
    {
        // return view('designshoes');
    }
    public function canvasImg()
    {
        return view('canvasimg');
    }
}
