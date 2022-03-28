<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Etfabric;
use App\FabricGroup;
use App\MeasurementsFabric;

class Cart extends Model
{
	 protected $table = 'carts'; 
	 
	 
	  public static function groupinfo($id,$field)
		{       
				 
				 $fabricdata = FabricGroup::select($field)->where('id', '=' , $id)->value($field);
				 return $fabricdata;
		}
		
		public static function allinfodes($table,$id,$fieldname)
		{
	
		  $slugname = DB::table($table)->where('id','=',$id)->value($fieldname);  
		  return $slugname;
		}
		
		public static function cartdescnfo($id,$field)
		{       
				 $des = Cart::select('item_description')->where('id', '=' , $id)->value('item_description');
				 try{
					$description=unserialize($des);
				}
				catch(\Throwable $e)
				{
					return "";
				}
				 if(!isset($description[$field]) || empty($description[$field])){
					return "";
				 }
				 return $description[$field];
		}
		
		public static function fabdeduct($cartid,$catid)
		{       
				 $osizePattern = Cart::cartdescnfo($cartid,'osizePattern');
				$osizeFit = Cart::cartdescnfo($cartid,'osizeFit');
				$ofabric = Cart::cartdescnfo($cartid,'ofabric');
				
				$fabmes = MeasurementsFabric::select('*')->where('id', '=' , 1)->first();
				$fabinfo = Etfabric::select('fabric_qty','fabric_total_qty')->where('id', '=' , $ofabric)->first();
				$fdata['totalqty']='';
				$fdata['fabqty']='';
				
				if($catid==1){
					if($osizePattern=='Body'){
						$fdata['totalqty']=$fabmes->shirt_body+$fabinfo->fabric_total_qty;
						$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->shirt_body;
					
					}else{
						if($osizeFit=='S'){
							$fdata['totalqty']=$fabmes->shirt_s+$fabinfo->fabric_total_qty;
							$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->shirt_s;
						}elseif($osizeFit=='M'){
							$fdata['totalqty']=$fabmes->shirt_m+$fabinfo->fabric_total_qty;
							$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->shirt_m;
						}elseif($osizeFit=='L'){
							$fdata['totalqty']=$fabmes->shirt_l+$fabinfo->fabric_total_qty;
							$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->shirt_l;
						}elseif($osizeFit=='XL'){
							$fdata['totalqty']=$fabmes->shirt_xl+$fabinfo->fabric_total_qty;
							$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->shirt_xl;
						}elseif($osizeFit=='XXL'){
							$fdata['totalqty']=$fabmes->shirt_xll+$fabinfo->fabric_total_qty;
							$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->shirt_xll;
						}elseif($osizeFit=='3XL'){
							$fdata['totalqty']=$fabmes->shirt_xxxl+$fabinfo->fabric_total_qty;
							$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->shirt_xxxl;
						}elseif($osizeFit=='4XL'){
							$fdata['totalqty']=$fabmes->shirt_xxxxl+$fabinfo->fabric_total_qty;
							$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->shirt_xxxxl;
						}
						
					}
				}elseif($catid==2){
					if($osizePattern=='Body'){
						$fdata['totalqty']=$fabmes->jacket_body+$fabinfo->fabric_total_qty;
						$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->jacket_body;
					}else{
						$fdata['totalqty']=$fabmes->jacket_stand+$fabinfo->fabric_total_qty;
						$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->jacket_stand;
					}
					
				}elseif($catid==3){
					if($osizePattern=='Body'){
						$fdata['totalqty']=$fabmes->vest_body+$fabinfo->fabric_total_qty;
						$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->vest_body;
					}else{
						$fdata['totalqty']=$fabmes->vest_stand+$fabinfo->fabric_total_qty;
						$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->vest_stand;
					}
				}elseif($catid==CONST_CATEGORY_ID_SHOES || $catid==CONST_CATEGORY_PATINASHOES || $catid==CONST_CATEGORY_SHOESCRE){
					$fdata['totalqty']= 0;
					$fdata['fabqty']  = 0;
				}else{
					if($osizePattern=='Body'){
						$fdata['totalqty']=$fabmes->pant_body+$fabinfo->fabric_total_qty;
						$fdata['fabqty']=$fabinfo->fabric_qty-$fabmes->pant_body;
					}else{
						$fdata['totalqty']= $fabinfo->fabric_total_qty + $fabmes->pant_stand;
						$fdata['fabqty']  = $fabinfo->fabric_qty 		  - $fabmes->pant_stand;
					}
					
				}
				 
				 return $fdata;
		}
		
		
    
}
