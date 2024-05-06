<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;

class CheckoutController extends Controller
{
    public function  index(){

        return view('front.pages.checkout.checkout');
 
     }
 
     public function  store(Request $request){
         $this->validate($request,[
            'name' => 'required',
            'phone_no' =>'required',
            'shipping_address' =>'required',
            'payment_method_id' =>'required'
 
 
         ]);
          $order =new Order();
 
          //check transaction id given or not
           if($request->payment_method_id !='cash_in' ){
 
           if($request->transaction_id == NULL || empty($request->transaction_id)){
 
               session()->flash('s_error','Please give transaction ID  for your Payments');
               return back();
 
           }else{
             $order->transaction_id=$request->transaction_id;
 
           }
 
           }
          $order->name=$request->name;
          $order->email=$request->email;
          $order->phone_no=$request->phone_no;
          $order->ip_address=request()->ip();
          $order->shipping_address=$request->shipping_address;
          $order->message=$request->message;
          if(Auth::check()){
             $order->user_id = Auth::id();
            
          }
 
         $order->payment_id = Payment::where('short_name',$request->payment_method_id)->first()->id;
 
         session()->flash('success','Your order has kaken suceessfully !!! Please wait admin will soon confirm it');
 
       
         $order->save();
 
 
      foreach(Cart::totalCarts() as $cart ){
 
        $cart->order_id=$order->id;
        $cart->save();
 
      }
      
         return redirect()->route('home');
     
 
            
      }
}
