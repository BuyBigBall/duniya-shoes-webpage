<?php

use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

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
