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
        'serials',           
        'sale_price',              
    ];
    
    public function category() {
        return $this->hasOne(\App\Models\MenuCategory::class, 'model_id', 'id');
    }
   
    public function maintbl() {
        return $this->belongsTo(\App\Models\Leather::class, 'main');
    }
    public function backtbl() {
        return $this->belongsTo(\App\Models\Leather::class,  'back');
    }
    public function soletbl() {
        return $this->belongsTo(\App\Models\Sole::class,  'sole');
    }
    public function fronttbl() {
        return $this->belongsTo(\App\Models\Leather::class,  'front');
    }
    public function sidetbl() {
        return $this->belongsTo(\App\Models\Leather::class,  'side');
    }
    public function accessorytbl() {
        return $this->belongsTo(\App\Models\Accessory::class,  'accessory');
    }
    public function lacetbl() {
        return $this->belongsTo(\App\Models\Lace::class,  'lace');
    }
    public function liningtbl() {
        return $this->belongsTo(\App\Models\Lining::class,  'lining');
    }
   
}
