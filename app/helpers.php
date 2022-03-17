<?php

use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;
use App\Models\Main;
use App\Models\Front;
use App\Models\Sole;
use App\Models\Accessory;
use App\Models\MainCategory;
use App\Models\Lace;
use App\Models\Lining;

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
        ->leftJoin('size_shoes', 'size_country_name.id', '=', 'size_shoes.size_country')
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
     $lth_color = Lace::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    
    return $lth_color;
}
function getLining($lthKey)
{
     $lth_color = Lining::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    
    return $lth_color;
}

function getAccessory($lthKey)
{
    $lth_color = Accessory::where('name', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    
    return [$lth_color , $lth_color];
}


function getSole($lthKey)
{
    $lth_color = Sole::where('pkey', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    
    return [$lth_color , $lth_color];
}
function getFront($lthCategoryName, $lthKey)
{
    return getLeather($lthCategoryName, $lthKey);
}
function getSide($lthCategoryName, $lthKey)
{
    return getLeather($lthCategoryName, $lthKey);
}
function getBack($lthCategoryName, $lthKey)
{
    return getLeather($lthCategoryName, $lthKey);
}

function getLeather($lthCategoryName, $lthKey)
{
    $lth = 0;
    $lth_color = 0;
    $lth = MainCategory::where('key', $lthCategoryName)->first();

    if( !empty($lth) )  $lth = $lth->id;
    else                $lth = 0;

    $lth_color = Main::where('pkey', $lthKey)->first();
    if( !empty($lth_color) )  $lth_color = $lth_color->id;
    else                      $lth_color = 0;
    
    if( !!empty($lth_color)) $lth = 0;
    return [$lth , $lth_color];
}

function getMixGroup($lthKey)
{
    $mixgroup = Main::where('pkey', $lthKey)->first();
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
