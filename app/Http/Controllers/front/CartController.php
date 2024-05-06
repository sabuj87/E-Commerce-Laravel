<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
class CartController extends Controller
{
    public function index(){
  
        return view('front.pages.cart.show');
 
    }
      
     public function store(Request $request){
         $this->validate($request ,[
              'product_id' =>'required'
         ],
         [
              'product_id.required'=>"Please give a product"
         ]
     );
 
     if(Auth::check()){
 
         $cart= Cart:: where(function ($query) {
            $query->where('user_id',Auth::id())
                  ->orWhere('ip_address',request()->ip());
        })
          
         ->where('product_id',$request->product_id)
         ->where('order_id',NULL)
         ->first();
 
     }else{
 
         $cart= Cart::
         where('ip_address',request()->ip())
         ->where('product_id',$request->product_id)
         ->where('order_id',NULL)
         ->first();
 
     }
 
     if(!is_null($cart)){
        if($request->has('product_quantity')){
            if($request->product_quantity > 1 ){
            
                $cart->product_quantity = $request->product_quantity;
             
            }else{

                if(Auth::check()){
           
                    $cart->user_id = Auth::id();
                 
                  
            
                 }
         
                $cart->increment('product_quantity');
            }


     }else{
        if(Auth::check()){
           
            $cart->user_id = Auth::id();
         
          
    
         }
        $cart->increment('product_quantity');
     }
       
     $cart->save();
 
     }else{
 
         $cart=new Cart();
         if(Auth::check()){
           
            $cart->user_id = Auth::id();
         
          
    
         }
    
         $cart->ip_address = request()->ip();
         if($request->has('product_quantity')){
                if($request->product_quantity > 1 ){
                
                    $cart->product_quantity = $request->product_quantity;
                 
                }

         }
         $cart->product_id = $request->product_id;
         $cart->save();
       
    
       
 
     }
 
   
     session()->flash('success','Product has added to cart');
     return back();
 
 
     }
 
     public function update(Request $request ,$id ){
          $cart=Cart::find($id);
          if(!is_null( $cart)){
             $cart->product_quantity=$request->product_quantity;
 
             $cart->save();
 
 
          }else{
 
             return redirect()->route('carts');
          }
          session()->flash('success','Cart has updated');
          return back();
 
     }
     public function delete(Request $request ){
         $cart=Cart::find($request->cart_id);
 
         
         if(!is_null( $cart)){
         
 
            $cart->delete();
 
 
         }else{
 
            return redirect()->route('carts');
         }
         session()->flash('success','Cart has Delete');
         return back();
 
    }
}
