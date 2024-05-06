<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   public function orders(){
      $orders = Order::orderBy('id','desc')->get();
      return view('back.pages.order.show',compact('orders'));
   }



   public function view($id){
    $order=Order::find($id);
    $order->is_seen_by_admin=1;
    $order->save();
    return view('back.pages.order.view',compact('order'));
   }
   public function delete($id){
    $order=Order::find($id);
    $order->delete();
  
    return back();
   }

   public function paid($id){


    $order = Order::find($id);
    if($order->is_paid){
          
        $order->is_paid=0;
    }else{

        $order->is_paid=1;
    }
    $order->save();

    return back();


}
public function completed($id){


    $order = Order::find($id);
    if($order->is_completed){
          
        $order->is_completed=0;
    }else{

        $order->is_completed=1;
    }
    $order->save();

  


}

public function chargeUpdate(Request $request, $id){


    $order = Order::find($id);

    $order->shipping_charge=$request->shipping_cost;
    $order->custom_discount=$request->custom_discount;
    $order->save();
    session()->flash('success','Order charge and discount has changed...!');
    return back();




}

public function generateInvoice($id){




    $order = Order::find($id);

    $pdf = PDF::loadView('admin.pages.order.invoice',compact('order'));
    return $pdf->stream('Invoice$order->id.pdf');

 



}
}
