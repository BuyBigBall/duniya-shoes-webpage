<?php

use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;
use App\Models\ColorMain;
use App\Models\ColorFront;
use App\Models\ColorBack;
use App\Models\ColorSole;
use App\Models\StyleFront;
use App\Models\StyleBack;
use App\Models\StyleSide;
use App\Models\ColorAccessory;
use App\Models\MainCategory;
use App\Models\StyleSole;
use App\Models\StyleAccessory;
use App\Models\ColorLining;
use App\Models\ColorLace;

function StyleFolder($style)
{
    if( strtolower($style)=='oxford' || strtolower($style)=='derby' )
    {
        return ucfirst($style) . 'Shoes';
    }
    else
    {
        return ucfirst($style);
    }
}
function standardSize()
{
    $standardSize = DB::table('size_country_name')
        ->select('name', 'size')
        ->leftJoin('size_shoes', 'size_country_name.id', '=', 'size_shoes.country_no')
        ->get();
    $result = array();
    foreach ($standardSize as $key => $item) {
        $standardSize[$key]->size = array_map('doubleval', explode(',', $item->size));
        $result[$item->name] = $item->size;
    }
    return json_encode($result);
}

function getLanguage($param = null)
{
    if (!isNull($param)) $language = $param;
    else $language = isset($_COOKIE['set_lang']) ? $_COOKIE['set_lang'] : 'English';
    $languages = DB::table('languages')
        ->select('texts', $language)
        ->get();
    $returnLang = [];
    foreach ($languages as $lan) {
        $returnLang[$lan->texts] = $lan->$language;
    }
    return json_encode($returnLang);
}




function getLaces($lthKey)
{
     $lth_color = ColorLace::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    return $lth_color;
}
function getLining($lthKey)
{
     $lth_color = ColorLining::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    return $lth_color;
}

function getLeather($lthKey)
{

    $lth_color = ColorMain::where('pkey', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    
    return $lth_color;
}

function getAccessory($lthCategoryName, $lthKey)
{
    $lth_type = StyleAccessory::where('pkey', $lthCategoryName)->first();
    if($lthCategoryName=='none')    $lth_type = 0;    
    elseif( !empty($lth_type) )     $lth_type = $lth_type->id;
    else                            $lth_type = 0;
    

    $lth_color = ColorAccessory::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    
    return [$lth_type , $lth_color];
}

function getBack($lthCategoryName, $lthKey)
{
    $lth_type = StyleBack::where('pkey', $lthCategoryName)->first();
    if( !empty($lth_type) )  $lth_type = $lth_type->id;
    else                     $lth_type = 0;

    $lth_color = ColorBack::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;

    return [$lth_type, $lth_color];
}


function getSole($lthCategoryName, $lthKey)
{
    $lth_type = StyleSole::where('pkey', $lthCategoryName)->first();
    if( !empty($lth_type) )  $lth_type = $lth_type->id;
    else                     $lth_type = 0;

    $lth_color = ColorSole::where('pkey', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    
    return [$lth_type , $lth_color];
}

function getFront($lthCategoryName, $lthKey)
{
    $lth_type = StyleFront::where('pkey', $lthCategoryName)->first();
    if( !empty($lth_type) )  $lth_type = $lth_type->id;
    else                     $lth_type = 0;

    $lth_color = ColorFront::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;

    return [$lth_type, $lth_color];
}

function getSide($lthCategoryName, $lthKey)
{
    $lth_type = StyleSide::where('pkey', $lthCategoryName)->first();
    if( !empty($lth_type) )  $lth_type = $lth_type->id;
    else                     $lth_type = 0;

    $lth_color = ColorFront::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;

    return [$lth_type, $lth_color];
}

function getMixGroup($lthKey)
{
    $mixgroup = ColorMain::where('pkey', $lthKey)->first();
    if( !empty($mixgroup) )  $mixgroup = $mixgroup->mixgroup;
    else                     $mixgroup = 0;
    
    return $mixgroup;
}

function does_url_exists($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($code == 200) {
        $status = true;
    } else {
        $status = false;
    }
    curl_close($ch);
    return $status;
}

const CONST_CATEGORY_3PIECE_SUIT    = 18;
const CONST_CATEGORY_2PIECE_SUIT    = 19;
const CONST_CATEGORY_ID_SHOES       = 99;
const CONST_CATEGORY_SHOESCRE       = 98;