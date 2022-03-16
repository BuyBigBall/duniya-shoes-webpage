<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'name',            
        'gender',          
        'type',            
        'shape',           
        'style',           
        'desc',            
        'monoIn',          
        'monoOut',         
        'statusPreDesign', 
        'unit',            
        'length',          
        'width',           
        'quantity',        
        'coupon_status',   
        'size_type_name',  
        'size_type',       
        'size',            
        'lastitem',        
        'token',           
        'session',         
        'checkout',        

    ];
}
