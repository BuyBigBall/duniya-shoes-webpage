<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSerial extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelno'    ,
        'style'     , 
        'series'   ,  
        'coupons' ,   
        'shape'  ,    
        'sex'   ,     
        'price',      
        'sale_status',   
//        'model_id',          
        'main',              
        'main_color',        
        'front',             
        'front_color',       
        'side',              
        'side_color',        
        'back',              
        'back_color',        
        'sole',              
        'sole_color',        
        'accessory',         
        'access_color',      
        'laces',             
        'lining',            
        'backstitch',        
        'backstitch_price',  
        'theme',             
        'mixgroup',           
        'serials',           
        'sale_price',              
    ];
    
    public function category() {
        return $this->hasOne(\App\Models\MenuCategory::class, 'model_id', 'id');
    }
   
    public function maintbl() {
        return $this->belongsTo(\App\Models\Main::class, 'main_color');
    }
    public function backtbl() {
        return $this->belongsTo(\App\Models\Back::class,  'back_color');
    }
    public function soletbl() {
        return $this->belongsTo(\App\Models\Sole::class,  'sole_color');
    }
    public function fronttbl() {
        return $this->belongsTo(\App\Models\Front::class,  'front_color');
    }
    public function sidetbl() {
        return $this->belongsTo(\App\Models\Side::class,  'side_color');
    }
    public function accessorytbl() {
        return $this->belongsTo(\App\Models\Accessory::class,  'accessory_color');
    }
    public function lacetbl() {
        return $this->belongsTo(\App\Models\Lace::class,  'laces');
    }
    public function liningtbl() {
        return $this->belongsTo(\App\Models\Lining::class,  'lining');
    }
   
}
