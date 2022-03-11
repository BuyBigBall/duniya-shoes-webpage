<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class libController extends Controller
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
