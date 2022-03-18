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
   
    public function maintyp() {
        return $this->belongsTo(\App\Models\MainCategory::class, 'main');
    }
    public function backtyp() {
        return $this->belongsTo(\App\Models\StyleBack::class,  'back');
    }
    public function soletyp() {
        return $this->belongsTo(\App\Models\StyleSole::class,  'sole');
    }
    public function fronttyp() {
        return $this->belongsTo(\App\Models\StyleFront::class,  'front');
    }
    public function sidetyp() {
        return $this->belongsTo(\App\Models\StyleSide::class,  'side');
    }

    public function mainclr() {
        return $this->belongsTo(\App\Models\ColorMain::class, 'main_color');
    }
    public function backclr() {
        return $this->belongsTo(\App\Models\ColorBack::class,  'back_color');
    }
    public function soleclr() {
        return $this->belongsTo(\App\Models\ColorSole::class,  'sole_color');
    }
    public function frontclr() {
        return $this->belongsTo(\App\Models\ColorFront::class,  'front_color');
    }
    public function sideclr() {
        return $this->belongsTo(\App\Models\ColorSide::class,  'side_color');
    }
    public function accessoryclr() {
        return $this->belongsTo(\App\Models\ColorAccessory::class,  'accessory_color');
    }
    public function laceclr() {
        return $this->belongsTo(\App\Models\ColorLace::class,  'laces');
    }
    public function liningclr() {
        return $this->belongsTo(\App\Models\ColorLining::class,  'lining');
    }
   
}
