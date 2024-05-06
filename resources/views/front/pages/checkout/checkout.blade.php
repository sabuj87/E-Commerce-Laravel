@extends('front.layouts.master')
<!-- sidebar+content -->



@section('content')
<div class='container margin-top-20' >
 <h4>Confirm Items</h4>
 <hr>

 <div class="shadow-card">
     <div class="row" >
        <div class="col-md-6">

            
            @foreach(App\Models\Cart::totalCarts()  as $cart)
    <p>{{$cart->product->title}} - <strong>{{$cart->product->price}}</strong>-{{$cart->product_quantity}} </p>

  @endforeach
  <p>
        <a class="btn theme-btn" href="{{route('carts')}}">Change cart item</a> 

  </p>

        </div>
        <div class="col-md-6">
            @php
            $totalprice=0;
          @endphp
          @foreach(App\Models\Cart::totalCarts()  as $cart)
          @php 
          $totalprice +=  $cart->product->price  * $cart->product_quantity
          @endphp
      
  
        @endforeach
         Total Price :   <strong>{{  $totalprice}}</strong>   
           <br>
          <p>Total price with Shipping Cost : <strong class="mainColor" > {{  $totalprice + App\Models\Setting::first()->shipping_cost}}</strong></p>     

        </div>

     </div>



 </div>
 <h4 class="mt-4" >Shipping address</h4>
 <hr>

 <div class="shadow-card">

    <form method="POST" action="{{ route('checkouts.store') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name*') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="inputCommon @error('name') errorinput @enderror " name="name" value="{{Auth::check() ?  Auth ::user()->first_name :''}}" required autocomplete="name" autofocus>

                @error('name')
    
                    <p class="mainColor" >{{ $message }}</p>

               @enderror
            </div>
        </div>
     
        <div class="row mb-3">
            <label for="phone_no" class="col-md-4 col-form-label text-md-end">{{ __('Phone No*') }}</label>

            <div class="col-md-6">
                <input id="phone_no" type="text" class="inputCommon @error('phone_no') errorinput @enderror" name="phone_no" value="{{Auth::check() ?  Auth ::user()->phone_no :''}}" required autocomplete="phone_no" autofocus>

                @error('phone_no')
    
                   <p class="mainColor" >{{ $message }}</p>

              @enderror
            </div>
        </div>
     
        <div class="row mb-3">
            <label for="shipping_address" class="col-md-4 col-form-label text-md-end">{{ __('Shpping address*') }}</label>

            <div class="col-md-6">
                <input id="shipping_address" type="text" class="inputCommon @error('shipping_address') errorinput @enderror" name="shipping_address" value="{{Auth::check() ?  Auth ::user()->shipping_address :''}}"  autocomplete="street_address" autofocus>

                @error('shipping_address')
    
                    <p class="mainColor" >{{ $message }}</p>

                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="message" class="col-md-4 col-form-label text-md-end">{{ __('Aditional Message(optional) ') }}</label>

            <div class="col-md-6">
                <input id="message" type="text" class="inputCommon @error('message') errorinput @enderror" name="message" value=""  autocomplete="street_address" >

            @error('message')
    
               <p class="mainColor" >{{ $message }}</p>

            @enderror
            </div>
        </div>

        
        <div class="row mb-3">
            <label for="payment_method" class="col-md-4 col-form-label text-md-end">{{ __('Payment method') }}</label>

            <div class="col-md-6">

                @foreach(App\Models\Payment::get() as $payment)
                       <img height="50px" width="50px" src="{{asset('image/payment/'.$payment->image)}}" alt="">
               

                @endforeach
                <select class="commonSelect" name="payment_method_id" id="payments" required >
                        <option value="" >Select a payment method</option> 
                      
                        @foreach(App\Models\Payment::get() as $payment)
                       
                        <option value="{{$payment->short_name}}" style="background-image:url('image/payment/$payment->image');" >{{$payment->name}}</option> 

                        @endforeach

                </select>
                @foreach(App\Models\Payment::get() as $payment)
                
                    @if($payment->short_name == "cash_in")
                     <div id="payment-{{ $payment->short_name}}" class="d-none" >
                      <h5 class="mt-2" >For cash in threre is nothing necessary.Just click  finish Order </h5>
               
                      <small>
                      You will get your product  in two or three days.
                      </small>
                     </div>

                     @else
                         <div id="payment-{{ $payment->short_name}}" class="d-none" >
                              <h4>{{$payment->name}} Payment</h4>
                     
                              {{$payment->name}} No:  <strong>{{$payment->no}}</strong>

                             <br>
                              
                              Account Type: <strong>{{$payment->type}}</strong>
                             
                         </div>
                      
                    @endif
 
                


                @endforeach

                <div id="transaction_id" class="litebg p-3 d-none" >
                    Please send the above money to this Bkash No and write your transaction code below there
                    <input type="text" name="transaction_id" id="" placeholder="Transaction Id" class="form-control  " >
                  </div>

              
              <script  src="https://code.jquery.com/jquery-3.6.0.js"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
                <script type="text/javascript" >
                   $("#payments").change(function(){
                      $payment_method= $("#payments").val();
                     if( $payment_method=="cash_in"){
                        $("#payment-cash_in").removeClass('d-none');
                        $("#payment-bkash").addClass('d-none');
                        $("#payment-roket").addClass('d-none');
                        $("#transaction_id").addClass('d-none');

                         
                     }else if($payment_method=="bkash"){
                        $("#payment-bkash").removeClass('d-none');
                        $("#payment-cash_in").addClass('d-none');
                        $("#payment-roket").addClass('d-none');
                        $("#transaction_id").removeClass('d-none');

                     }else if($payment_method=="roket"){
                        $("#payment-roket").removeClass('d-none');
                        $("#payment-bkash").addClass('d-none');
                        $("#payment-cash_in").addClass('d-none');
                        $("#transaction_id").removeClass('d-none');


                     }else{
                        $("#payment-roket").addClass('d-none');
                        $("#payment-bkash").addClass('d-none');
                        $("#payment-cash_in").addClass('d-none');
                        $("#transaction_id").addClass('d-none');

                     }


                   })

                </script>
             
            </div>
        </div>
     
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="inputCommon @error('email') errorinput @enderror" name="email" value="{{Auth::check() ?  Auth ::user()->email :''}}" required autocomplete="email">

                @error('email')
                <p class="mainColor" >{{ $message }}</p>
                @enderror
            </div>
        </div>

       

      

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn theme-btn">
                    {{ __('Place Order') }}
                </button>
            </div>
        </div>
    </form>
  </p>

 </div>



</div>







@endsection