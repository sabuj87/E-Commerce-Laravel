<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    use HasFactory;
    public $fillable=[
        'user_id',
        'order_id',
        'product_id',
        'ip_address',
        'product_quantity'
    


    ];
    public function user(){

        return $this->belongsTo(User::class);
    }
    public function product(){

        return $this->belongsTo(Product::class);
    }
    public function order(){

        return $this->belongsTo(Order::class);
    }

    
    public static function totalItems(){

      if(Auth::check()){
        $carts= Cart::
        where(function ($query) {
          $query->where('user_id',Auth::id())
                ->orWhere('ip_address',request()->ip());
      })
        
        ->where('order_id',NULL)
    
        ->get();
            
      }else{

        $carts= Cart::
        where('ip_address',request()->ip())
      ->where('order_id',NULL)
      ->get();

      }
      $total_item = 0;

      foreach($carts  as $cart){


        $total_item +=$cart->product_quantity;


      }
   
      
   return $total_item;



    }

      
    public static function totalCarts(){

      if(Auth::check()){
        $carts= Cart:: where(function ($query) {
          $query->where('user_id',Auth::id())
                ->orWhere('ip_address',request()->ip());
      })
        
        ->where('order_id',NULL)
        
        ->get();
            
      }else{

        $carts= Cart::
      where('ip_address',request()->ip())
      ->where('order_id',NULL)
      
        ->get();

      }
   
   
      
   return $carts;



    }
}
