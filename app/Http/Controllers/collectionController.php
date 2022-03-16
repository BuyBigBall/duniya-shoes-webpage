<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MainCategory;
use App\Models\Main;

class collectionController extends Controller
{
    public function index()
    {
        $shoesType = DB::table('types')->where('visible', 1)->get();
        $mixSolePrice = DB::table('mixsoleprices')->get();
        foreach ($mixSolePrice as $price) {
            $mixprices[] = [
                $price->currency => $price->price
            ];
        }

        //$leathers = Maincategory::select("mains.id, main_categories.key")
        $leathers = Maincategory::select( DB::raw("mains.id, main_categories.key, mains.pkey, mains.name, mains.mixgroup, mains.price, mains.gender, mix_groups") )
                ->leftJoin('mains', function($leftJoin) 
                {
                    $leftJoin->on('main_categories.mix_groups', 'LIKE', DB::raw("concat('%,', mains.mixgroup, ',%')") );
                })
                ->where('main_categories.status', 1)
                ->orderBy('main_categories.key')
                ->get();
        // dd($leathers);

        $arrLeathers = [];
        $iNum = 1;
        $colors = [];
        $last_key = "";$leather = "";
        foreach ($leathers as $value)
        {
            if($last_key!="" && $last_key!=$value->key) 
            {
                $leather .= "</ul>";
                $leatherColors[$last_key] = [
                    "leather"   => $leather,
                    "group"     => explode(',', $value->mix_groups),
                    //"price"     => $value->price,
                ];
            }
            if($last_key=="" || $last_key!=$value->key) $leather  = "<ul>";

            $last_key = $value->key;

            $leather .= "<li id='" . $value->key . "_" . $value->pkey . "' class='" . $value->key . "'>";
            $leather .= "<img class='itemList' src='/images/Menu/Leather/" . ($value->gender=="M" ? "M" : "S") . "/" . $value->pkey . ".png' title='" . $value->name . ":" . $value->name . "'>";
            $leather .= "</li>";

            $arrLeathers[$value->id] = [
                "PKEY"      => $value->pkey,
                "NAME"      => $value->name,
                "MIXGROUP"  => $value->mixgroup,
                "COLOR"     => $colors
            ];

        }
        if($last_key!="") 
        {
            $leather .= "</ul>";
            $leatherColors[$last_key] = [
                "leather"   => $leather,
                "group"     => explode(',', $value->mix_groups),
                //"price"     => $value->price,
            ];
        }
        //dd($leatherColors);
        // foreach ($leathers as $value) {
        //     $leather = "";
        //     $_colors = DB::table('colors')->select('key as ID', 'name as NAME', 'group as COLOR_GROUP')->where('leather_id', $value->id)->get();
        //     foreach ($_colors as $item) {
        //         $colors[$iNum++] = $item;
        //         $leather .= "<ul><li id='" . $value->name . "_" . $item->ID . "' class='" . $value->name . "'>";
        //         $leather .= "<img class='itemList' src='../images/Menu/Leather/" . $value->gender . "/" . $item->ID . ".png' title='" . $item->ID . ":" . $item->NAME . "'>";
        //         $leather .= "</li></ul>";
        //     }

        //     $leatherColors[$value->name] = [
        //         "leather"   => $leather,
        //         "group"     => $value->mixgroup
        //     ];

        //     $arrLeathers[$value->id] = [
        //         "PKEY"      => $value->pkey,
        //         "NAME"      => $value->name,
        //         "MIXGROUP"  => $value->mixgroup,
        //         "COLOR"     => $colors
        //     ];
        // }
        $lTH['Leather'] = $arrLeathers;
        $fronts     = DB::table('fronts')->select('key as KEY', 'name as NAME', 'path as PATH')->get();
        $backs      = DB::table('backs')->select('key as KEY', 'name as NAME', 'path as PATH')->get();
        $sides      = DB::table('sides')->select('key as KEY', 'name as NAME', 'path as PATH')->get();
        $linings    = DB::table('linings')->select('key as KEY', 'name as NAME', 'path as PATH')->get();
        $laces      = DB::table('laces')->select('key as KEY', 'name as NAME', 'path as PATH')->get();
        $accessories= DB::table('accessories')->select('key as KEY', 'name as NAME', 'path as PATH')->get();

        $data = [
            'shoesType' => $shoesType,
            'mixSolePrice' => json_encode(call_user_func_array('array_merge', $mixprices)),
            'styles' => json_encode([
                'leather' => $lTH,
                'front' => $fronts,
                'back' => $backs,
                'side' => $sides,
                'lining' => $linings,
                'laces' => $laces,
                'accessory' => $accessories
            ]),
            'leatherColor'  => json_encode($leatherColors)
        ];
        return view('designshoes', $data);
    }
}
