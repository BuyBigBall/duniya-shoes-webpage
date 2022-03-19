<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ColorsGroup;
use App\Models\Type;
use App\Models\ModelSerial;
use App\Models\OptionSele;
use App\Models\MainCategory;
use App\Models\ColorMain;
use App\Models\ColorBack;
use App\Models\ColorSole;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Selector;
use File;

class DesignerIdeaController extends Controller
{
    public $gender = 'male';
    public $data  = '';
    public $category;
    public $style;
    public $colorGrp;
    public $optionSele;

    public function createDesignImages(Request $request)
    {
         # for image creating test
         $newModel = ModelSerial::find($request->id);
         if(empty($newModel))
         {
            return json_encode(['STATUS'=>'false', 'ID'=>$request->id]);    
         }
         ModelCreateController::createNewModelImages($newModel, $request->img);
         return json_encode(['STATUS'=>'true', 'ID'=>$request->id]);
         # <--------------

    }
    public function savePreDesign(Request $request)
    {
        if($request->type==='check')
        {

        }
        # save design on cart
        elseif(!empty($request->id))
        {
            if( !! empty(auth()->user() ) )
            {
                return json_encode(['STATUS'=>'login']);
            }
            //$newModel   = new ModelSerial();
            $cart_item = Cart::find($request->id);
            
            if( !empty($cart_item) )
            {
                $prefix = ( $cart_item->gender=="M" ) ? "DS_" : "DSW_";
                $gender = ( $cart_item->gender=="M" ) ? "man" : "women";
                $max_model = ModelSerial::where('sex', $gender)->orderBy('modelno', 'DESC')->first();

                // dd($max_model);
                $max_num        = intval(substr($max_model->modelno, strlen($prefix)));
                $new_model_no   = sprintf($prefix . "%03d", $max_num + 1 );
                $shoeDesignInfo = json_decode(base64_decode($cart_item->desc));
                
                // dd($shoeDesignInfo);
                if( !empty($cart_item->key) )
                {
                    $new_model_no = $cart_item->key;
                }

                $main           = $shoeDesignInfo->getLeatherGroup;
                $main_color     = getLeather($shoeDesignInfo->getLeatherNo );
                $mixGroup       = getMixGroup($shoeDesignInfo->getLeatherNo );

                [$front,$front_color]   = getFront($shoeDesignInfo->getFront,   $shoeDesignInfo->getFrontNo );
                [$side,$side_color]     = getSide($shoeDesignInfo->getSide,     $shoeDesignInfo->getSideNo );
                [$back,$back_color]     = getBack($shoeDesignInfo->getBack,     $shoeDesignInfo->getBackNo );
                [$sole,$sole_color]     = getSole($shoeDesignInfo->sole,        $shoeDesignInfo->getSole );
                [$accessory, $access_color]= getAccessory($shoeDesignInfo->getAccessory, $shoeDesignInfo->getAccessoryNo);
                $laces                  = getLaces($shoeDesignInfo->getLacesNo);
                $lining                 = getLining($shoeDesignInfo->getLiningNo);
                $sale_price             = $shoeDesignInfo->getShoePrice;
               
                $newModel = ModelSerial::updateOrCreate(
                            [
                                    'modelno'   => $new_model_no,           
                            ]
                            ,
                            [
                                'mixgroup'  => $mixGroup,      
                                'style'     => ucfirst($shoeDesignInfo->shoeType),       
                                'shape'     => $shoeDesignInfo->getShape,       
                                'sex'       => $cart_item->gender =="M" ? "man" : "women",       
                                'price'     => $shoeDesignInfo->getShoePrice,
                                'main'      => $main,
                                'main_color'=> $main_color,
                                'front'      =>$front,
                                'front_color'=>$front_color,
                                'side'      => $side,
                                'side_color'=> $side_color,
                                'back'      => $back,
                                'back_color'=> $back_color,
                                'sole'      => $sole,
                                'sole_color'=> $sole_color,
                                'accessory'   => $accessory,
                                'access_color'=> $access_color,
                                'laces'     => $laces,
                                'lining'    => $lining,
                                'sale_price'=> $sale_price,
                            ]);
                

                Cart::where('id', $request->id)
                    ->update(['key'   => $new_model_no]);

            }

        }
        else{
            return json_encode(['STATUS'=>'false', 'ID'=>$request->id]);
        }
        
        return json_encode(['STATUS'=>'true', 'ID'=>$newModel->id]);
    }
    

    public function index(Request $request)
    {
        if(!empty($request->cat)) $this->optionSele= $request->cat;
        if(!empty($request->cat)) $this->optionSele= $request->cat;
        if(!empty($request->cat)) $this->optionSele= $request->cat;
        if(!empty($request->cat)) $this->optionSele= $request->cat;
        
        $data = [ ];
        $data['category'] = $this->category;
        $data['style'] = $this->style;
        $data['colorGrp'] = $this->colorGrp;
        $data['optionSele'] = $this->optionSele;

        $categories     = MainCategory::get();
        $colorgroup     = ColorsGroup::get();
        $styles         = Type::get();
        $optionSeles    = OptionSele::get();

        $menuObject = [];
        $menuObject['category']   = [];foreach($categories as $item)    $menuObject['category'][]    = ['ID'=>$item->id, 'NAME'=>$item->name];
        $menuObject['style']      = [];foreach($styles as $item)        $menuObject['style'][]       = ['ID'=>$item->id, 'NAME'=>$item->type];
        $menuObject['colorGrp']   = [];foreach($colorgroup as $item)    $menuObject['colorGrp'][]    = ['ID'=>$item->id, 'NAME'=>$item->name];
        $menuObject['optionSele'] = [];foreach($optionSeles as $item)   $menuObject['optionSele'][]  = ['ID'=>$item->id, 'NAME'=>$item->name];

        $data['menuObject'] = $menuObject;
        
        $data['designObject'] = []; 

        if(stripos(Route::currentRouteName(), 'women')!==false) 
        {
            $models = ModelSerial::where('sex', 'women')->get();$this->gender = 'female';
            //$json = '{"category":"","style":"","colorGrp":"","optionSele":"","menuObject":{"CATEGORY":[{"ID":"9","NAME":"PREMIUM LEATHER"},{"ID":"10","NAME":"FASHION LEATHER"},{"ID":"11","NAME":"SHEEPSKIN LEATHER"},{"ID":"12","NAME":"BURNISHED LEATHER"},{"ID":"13","NAME":"FABRIC"},{"ID":"14","NAME":"Suede Leather"},{"ID":"15","NAME":"Thread Accessory"},{"ID":"16","NAME":"Leather Chamois"},{"ID":"17","NAME":"SEAM EDGE"},{"ID":"18","NAME":"Leather Dye"},{"ID":"19","NAME":"Laces"}],"STYLE":[{"ID":"Boot","NAME":"Boot"},{"ID":"Derby","NAME":"Derby"},{"ID":"Loafers","NAME":"Loafers"},{"ID":"Monk","NAME":"Monk"},{"ID":"Oxford","NAME":"Oxford"}],"COLORGRP":[{"ID":"4","NAME":"TAN BROWN                     "},{"ID":"5","NAME":"WARM TONE                     "},{"ID":"6","NAME":"Red-Pink TONE                 "},{"ID":"7","NAME":"NAVY Violet TONE              "},{"ID":"8","NAME":"GREEN TONE                    "},{"ID":"9","NAME":"ORANGE-Y TONE                 "},{"ID":"10","NAME":"BLACK-GREY TONE               "},{"ID":"11","NAME":"YELLOW TONE                   "},{"ID":"12","NAME":"BLUE TONE                     "}]},"designObject":[{"ID":"452","ROW":"1","NO":"DSW_006","NEW_TAG":"Y","MODELSTYLE":"Oxford","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"12","MAIN_COLORFRP":"6","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"404","ROW":"2","NO":"DSW_004","NEW_TAG":"Y","MODELSTYLE":"Monk","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"5","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"9","BACK_COLORGRP":"9","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"89"},{"ID":"457","ROW":"3","NO":"DSW_007","NEW_TAG":"Y","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"12","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"Black","SALE":"149"},{"ID":"410","ROW":"4","NO":"DSW_005","NEW_TAG":"Y","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"18","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"259","SALE_STATUS":"N","SERIES":"red","SALE":"159"},{"ID":"408","ROW":"5","NO":"DSW_005","NEW_TAG":"Y","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"18","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"259","SALE_STATUS":"N","SERIES":"","SALE":"159"},{"ID":"453","ROW":"6","NO":"DSW_007","NEW_TAG":"Y","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"12","MAIN_COLORFRP":"6","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"455","ROW":"7","NO":"DSW_009","NEW_TAG":"Y","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"10","MAIN_COLORFRP":"4","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"N","SERIES":"","SALE":"149"},{"ID":"456","ROW":"8","NO":"DSW_010","NEW_TAG":"Y","MODELSTYLE":"Derby","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"10","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"15","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"N","SERIES":"","SALE":"149"},{"ID":"409","ROW":"9","NO":"DSW_005","NEW_TAG":"Y","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"18","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"259","SALE_STATUS":"N","SERIES":"purple","SALE":"159"},{"ID":"407","ROW":"10","NO":"DSW_004","NEW_TAG":"N","MODELSTYLE":"Monk","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"9","BACK_COLORGRP":"5","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"Greay_Cream","SALE":"89"},{"ID":"400","ROW":"11","NO":"DSW_003","NEW_TAG":"N","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"129","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"401","ROW":"12","NO":"DSW_003","NEW_TAG":"N","MODELSTYLE":"Boot","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"4","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"129","SALE_STATUS":"N","SERIES":"brown","SALE":"0"},{"ID":"394","ROW":"13","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"6","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"6","PRICE":"129","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"396","ROW":"14","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"5","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"4","PRICE":"129","SALE_STATUS":"N","SERIES":"purple","SALE":"0"},{"ID":"397","ROW":"15","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"6","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"6","PRICE":"129","SALE_STATUS":"N","SERIES":"pink","SALE":"0"},{"ID":"398","ROW":"16","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"8","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"8","PRICE":"129","SALE_STATUS":"N","SERIES":"Green","SALE":"0"},{"ID":"399","ROW":"17","NO":"DSW_001","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"10","MAIN_COLORFRP":"5","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"Cream","SALE":"89"},{"ID":"395","ROW":"18","NO":"DSW_002","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"16","MAIN_COLORFRP":"11","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"16","ACCESSORY_COLORGRP":"11","PRICE":"129","SALE_STATUS":"N","SERIES":"Yellow_green","SALE":"0"}],"sign":"&euro;"}';
        }
        else
        {
            $models = ModelSerial::where('sex', 'man')->get();  $this->gender = 'male';
            //$json = '{"category":"","style":"","colorGrp":"","optionSele":"","menuObject":{"CATEGORY":[{"ID":"9","NAME":"PREMIUMLEATHER"},{"ID":"10","NAME":"FASHIONLEATHER"},{"ID":"11","NAME":"SHEEPSKINLEATHER"},{"ID":"12","NAME":"BURNISHEDLEATHER"},{"ID":"13","NAME":"FABRIC"},{"ID":"14","NAME":"SuedeLeather"},{"ID":"15","NAME":"ThreadAccessory"},{"ID":"16","NAME":"LeatherChamois"},{"ID":"17","NAME":"SEAMEDGE"},{"ID":"18","NAME":"LeatherDye"},{"ID":"19","NAME":"Laces"}],"STYLE":[{"ID":"Boot","NAME":"Boot"},{"ID":"Derby","NAME":"Derby"},{"ID":"Fashion","NAME":"Fashion"},{"ID":"Loafers","NAME":"Loafers"},{"ID":"Monk","NAME":"Monk"},{"ID":"Oxford","NAME":"Oxford"},{"ID":"Sneaker","NAME":"Sneaker"}],"COLORGRP":[{"ID":"4","NAME":"TANBROWN"},{"ID":"5","NAME":"WARMTONE"},{"ID":"6","NAME":"Red-PinkTONE"},{"ID":"7","NAME":"NAVYVioletTONE"},{"ID":"8","NAME":"GREENTONE"},{"ID":"9","NAME":"ORANGE-YTONE"},{"ID":"10","NAME":"BLACK-GREYTONE"},{"ID":"11","NAME":"YELLOWTONE"},{"ID":"12","NAME":"BLUETONE"}]},"designObject":[{"ID":"440","ROW":"1","NO":"DS_107","NEW_TAG":"Y","MODELSTYLE":"Oxford","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"18","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"259","SALE_STATUS":"N","SERIES":"","SALE":"159"},{"ID":"464","ROW":"2","NO":"DS_114","NEW_TAG":"Y","MODELSTYLE":"Monk","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"12","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"black","SALE":"149"},{"ID":"196","ROW":"3","NO":"DS_042","NEW_TAG":"Y","MODELSTYLE":"Derby","FRONT_CATEGORY":"11","FRONT_COLORGRP":"10","MAIN_CATEGORY":"","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"N","SERIES":"","SALE":"179"},{"ID":"80","ROW":"4","NO":"DS_018","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"13","MAIN_COLORFRP":"","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"219","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"188","ROW":"5","NO":"DS_038","NEW_TAG":"N","MODELSTYLE":"Derby","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"12","MAIN_COLORFRP":"4","SIDE_CATEGORY":"12","SIDE_COLORGRP":"4","BACK_CATEGORY":"12","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"Y","SERIES":"","SALE":"179"},{"ID":"7","ROW":"6","NO":"DS_002","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"10","MAIN_COLORFRP":"5","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"Y","SERIES":"","SALE":"179"},{"ID":"201","ROW":"7","NO":"DS_046","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"9","FRONT_COLORGRP":"10","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"9","BACK_COLORGRP":"10","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"129","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"170","ROW":"8","NO":"DS_030","NEW_TAG":"N","MODELSTYLE":"Derby","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"14","MAIN_COLORFRP":"10","SIDE_CATEGORY":"9","SIDE_COLORGRP":"5","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"grey_suede","SALE":"149"},{"ID":"23","ROW":"9","NO":"DS_011","NEW_TAG":"N","MODELSTYLE":"Derby","FRONT_CATEGORY":"9","FRONT_COLORGRP":"4","MAIN_CATEGORY":"9","MAIN_COLORFRP":"4","SIDE_CATEGORY":"9","SIDE_COLORGRP":"4","BACK_CATEGORY":"9","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"169","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"177","ROW":"10","NO":"DS_032","NEW_TAG":"N","MODELSTYLE":"Derby","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"11","SIDE_COLORGRP":"10","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"N","SERIES":"","SALE":"149"},{"ID":"16","ROW":"11","NO":"DS_007","NEW_TAG":"N","MODELSTYLE":"Fashion","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"12","MAIN_COLORFRP":"4","SIDE_CATEGORY":"12","SIDE_COLORGRP":"4","BACK_CATEGORY":"12","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"12","ACCESSORY_COLORGRP":"4","PRICE":"169","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"29","ROW":"12","NO":"DS_002","NEW_TAG":"","MODELSTYLE":"Oxford","FRONT_CATEGORY":"12","FRONT_COLORGRP":"6","MAIN_CATEGORY":"10","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"Y","SERIES":"ItalyBlack-Red","SALE":"179"},{"ID":"18","ROW":"13","NO":"DS_008","NEW_TAG":"N","MODELSTYLE":"Monk","FRONT_CATEGORY":"12","FRONT_COLORGRP":"10","MAIN_CATEGORY":"12","MAIN_COLORFRP":"10","SIDE_CATEGORY":"12","SIDE_COLORGRP":"10","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"79"},{"ID":"152","ROW":"14","NO":"DS_024","NEW_TAG":"N","MODELSTYLE":"Oxford","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"9","MAIN_COLORFRP":"10","SIDE_CATEGORY":"9","SIDE_COLORGRP":"10","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"159","SALE_STATUS":"Y","SERIES":"BlackShoes","SALE":"89"},{"ID":"31","ROW":"15","NO":"DS_012","NEW_TAG":"","MODELSTYLE":"Loafers","FRONT_CATEGORY":"9","FRONT_COLORGRP":"4","MAIN_CATEGORY":"9","MAIN_COLORFRP":"4","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"9","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"9","ACCESSORY_COLORGRP":"4","PRICE":"129","SALE_STATUS":"N","SERIES":"","SALE":"0"},{"ID":"228","ROW":"16","NO":"DS_055","NEW_TAG":"N","MODELSTYLE":"Boot","FRONT_CATEGORY":"9","FRONT_COLORGRP":"4","MAIN_CATEGORY":"9","MAIN_COLORFRP":"4","SIDE_CATEGORY":"9","SIDE_COLORGRP":"4","BACK_CATEGORY":"9","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"269","SALE_STATUS":"N","SERIES":"","SALE":"179"},{"ID":"24","ROW":"17","NO":"DS_008","NEW_TAG":"","MODELSTYLE":"Monk","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"12","MAIN_COLORFRP":"4","SIDE_CATEGORY":"12","SIDE_COLORGRP":"6","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"","ACCESSORY_COLORGRP":"","PRICE":"169","SALE_STATUS":"Y","SERIES":"Red","SALE":"149"},{"ID":"81","ROW":"18","NO":"DS_019","NEW_TAG":"N","MODELSTYLE":"Loafers","FRONT_CATEGORY":"","FRONT_COLORGRP":"","MAIN_CATEGORY":"13","MAIN_COLORFRP":"12","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"9","ACCESSORY_COLORGRP":"4","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"79"},{"ID":"9","ROW":"19","NO":"DS_004","NEW_TAG":"","MODELSTYLE":"Loafers","FRONT_CATEGORY":"12","FRONT_COLORGRP":"4","MAIN_CATEGORY":"12","MAIN_COLORFRP":"4","SIDE_CATEGORY":"12","SIDE_COLORGRP":"4","BACK_CATEGORY":"12","BACK_COLORGRP":"4","ACCESSORY_CATEGORY":"12","ACCESSORY_COLORGRP":"4","PRICE":"159","SALE_STATUS":"Y","SERIES":"","SALE":"149"},{"ID":"57","ROW":"20","NO":"DS_014","NEW_TAG":"","MODELSTYLE":"Loafers","FRONT_CATEGORY":"11","FRONT_COLORGRP":"10","MAIN_CATEGORY":"11","MAIN_COLORFRP":"10","SIDE_CATEGORY":"","SIDE_COLORGRP":"","BACK_CATEGORY":"","BACK_COLORGRP":"","ACCESSORY_CATEGORY":"11","ACCESSORY_COLORGRP":"10","PRICE":"269","SALE_STATUS":"N","SERIES":"Black_Black_SheepSkin","SALE":"179"}],"sign":"&euro;"}';
        }
        
        $ENV_PAGECOUNT = setting('site.display_itemscount_perpage');
        //$ENV_PAGECOUNT = env('ITEMS_COUNT_PER_PAGE');
        //dd($ENV_PAGECOUNT);


        $designObject = [];
        foreach($models as $item)
        {
            if(count($designObject)>=$ENV_PAGECOUNT-0)    break;
            $designObject[] = [
                "ID"=>$item->id,
                "ROW"=>$item->id,
                "NO"=>$item->modelno,
                "NEW_TAG"=>$item->coupons,
                "MODELSTYLE"=>$item->style,
                "FRONT_CATEGORY"=>$item->front ?? 0,
                "FRONT_COLORGRP"=>$item->front_color ?? 0,
                "MAIN_CATEGORY"=>$item->main ??  0,
                "MAIN_COLORFRP"=>$item->main_color ?? 0,
                "SIDE_CATEGORY"=>$item->side ?? 0,
                "SIDE_COLORGRP"=>$item->side_color ?? 0,
                "BACK_CATEGORY"=>$item->back ?? 0,
                "BACK_COLORGRP"=>$item->back_color ??  0,
                "ACCESSORY_CATEGORY"=>$item->accessory ?? 0,
                "ACCESSORY_COLORGRP"=>$item->access_color?? 0,
                "PRICE"=>       $item->price ?? '',
                "SALE_PRICE"=>       $item->sale_price ?? '',
                "SALE_STATUS"=> $item->sale_status,
                "SERIES"=>      $item->serials ?? '',
                "SALE"=>        $item->price,
            ];

        }
        $data['designObject'] = $designObject;
        //dd($designObject);
        $json = json_encode($data);
        
        return view('designidea.designidea')
                    ->with('dataObject', $json)
                    ->with('category',  $categories)
                    ->with('style',     $styles)
                    ->with('colorgroup',$colorgroup)
                    ->with('gender', $this->gender);
    }


    public function designerShoes(Request $request)
    {
        $modelno = $request->model;
        $modelInfo = ModelSerial::where('modelno', $modelno)->first();
        if( !!empty($modelInfo) )   redirect( route('/') );

        $resultInfo = [];
        $resultInfo['modelpkey']    = $modelInfo->id;
        $resultInfo['model']        = $modelInfo->modelno;
        $resultInfo['model_style']  = $modelInfo->style;
        $resultInfo['model_series'] = $modelInfo->series;
        $resultInfo['coupons']      = $modelInfo->coupons;
        $resultInfo['model_shape']  = $modelInfo->shape;
        $resultInfo['model_sex']    = ucfirst ( $modelInfo->sex );
        $resultInfo['mixgroup']     = $modelInfo->mixgroup;
        $resultInfo['defaults']     = [];

        $resultInfo['defaults']['accessory']    = $modelInfo->access_color;
        $resultInfo['defaults']['main']         = $modelInfo->main_color;
        $resultInfo['defaults']['side']         = $modelInfo->side_color;
        $resultInfo['defaults']['front']        = $modelInfo->front_color;
        $resultInfo['defaults']['back']         = $modelInfo->back_color;
        $resultInfo['defaults']['sole']         = $modelInfo->sole_color;

        $resultInfo['defaults']['laces']        = $modelInfo->laces;
        $resultInfo['defaults']['backstitch']   = $modelInfo->backstitch;
        $resultInfo['defaults']['lining']       = !!empty($modelInfo->liningclr) ? "false" : $modelInfo->liningclr->name;
        $resultInfo['defaults']['theme']        = $modelInfo->theme;
        $resultInfo['defaults']['model_sex']    = $modelInfo->sex;
        $resultInfo['defaults']['backstitch_price'] = $modelInfo->backstitch_price ?? 0;
        $resultInfo['defaults']['main_name']    = !!empty($modelInfo->mainclr) ? "false" : $modelInfo->mainclr->name;
        $resultInfo['defaults']['sole_name']    = !!empty($modelInfo->soleclr) ? "false" : $modelInfo->soleclr->path;
        $resultInfo['defaults']['back_name']    = !!empty($modelInfo->backclr) ? "false" : $modelInfo->backclr->name;
        $resultInfo['defaults']['lining_name']  = !!empty($modelInfo->liningclr) ? "false" : $modelInfo->liningclr->name;

        $resultInfo['defaults']['selector']     = "main";
        $resultInfo['defaults']['product']      = "shoe";


        //############## select gender
        if(stripos(Route::currentRouteName(), 'women')!==false) 
        {
            $this->gender = 'female';
            $sel_gender = 'W';
        }
        else
        {
            $this->gender = 'male';
            $sel_gender = 'M';
        }

        #######################  back ################
        $resultInfo['back']         = [];
        $item = [];
        $backLeathers = ColorBack::where('mixgroup', $modelInfo->mixgroup)->distinct()->groupBy('key')->get();
        foreach($backLeathers as $backs)
        {
            $item[] = [ 'pid'   => $backs->id,
                        'id'    => $backs->key,
                        'name'  => $backs->name,
                        'path'  => $backs->path,
                        'price' => $backs->price ?? 0
                    ];
        }
        $resultInfo['back']['type'] = 'leather';
        $resultInfo['back']['item'] = $item;

        
        #######################  sole ################
        $resultInfo['sole']         = [];
        $item = []; //where('shape', $modelInfo->shape)->
        $shoeInfo = ColorSole::find($modelInfo->sole_color);
        
        
        if( !empty($shoeInfo) && $shoeInfo->mixgroup==8) $sole_items = ColorSole::where('mixgroup', $shoeInfo->mixgroup);
        else                   $sole_items = ColorSole::where('shape', $modelInfo->shape);
        
        //dd($sole_items->toSql());
        // var_dump($modelInfo->shape);
        // var_dump($shoeInfo->mixgroup);
        $sole_items = $sole_items->distinct()->groupBy('pkey')->get();
//        dd($sole_items);
        foreach($sole_items as $sole)
        {
            $item[] = [ 'pid'   => $sole->id,
                        'id'    => $sole->pkey,
                        'name'  => $sole->name,
                        'path'  => $sole->path,
                        'price' => $sole->price ?? 0];
        }
        $resultInfo['sole']['type'] = 'leather';
        $resultInfo['sole']['item'] = $item;

        #######################  leathers ################
        $resultInfo['leather']         = [];
        $resultInfo['leather']['type'] = 'leather';
        $resultInfo['leather']['item'] = $item;     

        $item = [];
        $mains = ColorMain::where('mixgroup', $modelInfo->mixgroup)->distinct()->groupBy('pkey')->get();
        foreach($mains as $main)
        {
            $item[] = [ 'pid'   => $main->id,
                        'id'    => $main->pkey,
                        'name'  => $main->name,
                        'path'  => $main->pkey,
                        'price' => $main->price ?? 0];
        }
        $resultInfo['main']         = [];
        $resultInfo['main']['type'] = 'leather';
        $resultInfo['main']['item'] = $item;
        $resultInfo['leather']         = [];
        $resultInfo['leather']['type'] = 'leather';
        $resultInfo['leather']['item'] = $item;     

        #######################  monogram,selector  ################
        $resultInfo['monogram']     = ["inside"=>"Y", "outside"=>"Y"];

        
        $selectors = Selector::where('model_id', $modelInfo->id)->orderBy('pageno', 'ASC')->orderBy('id', 'ASC')->get();
        $idx = 0;$last = -1;
        foreach($selectors as $item)
        {
            if($last!=-1 && $last != $item->pageno)  $idx++;
            $last = $item->pageno;
            $resultInfo['selector'][$idx][$item->posname] = 
                [
                    "location"  => $item->location,
                    "style"     => $item->style,
                    "x"         => $item->x,
                    "y"         => $item->y,
                    "pos"       => $item->labelpos,
                ];
        }

        $this->data = json_encode($resultInfo);
        //print_r(json_decode($this->data));exit;
        return view('designidea.index')->with('gender', $this->gender)->with('data', $this->data);
    }

    }
