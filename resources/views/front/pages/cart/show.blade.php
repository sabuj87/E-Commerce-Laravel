@extends('front.layouts.master')
<!-- sidebar+content -->



@section('content')
<div class='container-fluid mt-4' >
  <h4>My Cart Items</h4>
 <table class="table table-bordered text-center mt-4 " >
  <thead>
      <tr>
           <th>No.</th>
           <th>Product Title</th>
           <th>Product Image</th>
           <th>Product quantity</th>
           <th>Unit Price</th>
           <th>Total Price</th>
           <th>Delete</th>
        


   
      </tr>
  </thead>
  <tbody>
      @php
        $totalprice=0;
      @endphp


      @foreach(App\Models\Cart::totalCarts() as $cart )
      <tr>
          <td>
            {{$loop->index+1}}

          </td>
          <td>

          <a class="mainColor" href="{{route('product.show',$cart->product->slug)}}">{{$cart->product->title}}</a>
          

          </td>
          <td>

          @if($cart->product->images->count()>0)
          <img src="{{asset('image/product/'.$cart->product->images->first()->image)}}" alt="" height="50px" width="50px" >
          @endif
         

          </td>
      <td>
      <form class="form-inline" action="{{route('carts.update',$cart->id)}}" method="post" >
      @csrf
       <input style="display:inline-Block;width:80px" type="number" name="product_quantity" value="{{$cart->product_quantity}}" class="form-control" >
       <button style="display:inline-Block;width:80px" type="submit" class="btn theme-btn form-control" >
         Update

       </button>


    </form>

           
      </td>
      <td>
       {{$cart->product->price}}


      </td>
      <td>
        @php 
        $totalprice +=  $cart->product->price  * $cart->product_quantity
        @endphp
       {{ $cart->product->price  * $cart->product_quantity}}


      </td>

      <td>
      <form class="form-inline" action="{{route('carts.delete')}}" method="post" >
      @csrf
       <input type="hidden" value="{{$cart->id}}" name="cart_id" class="form-control" >
       <button  type="submit" class="btn theme-btn" >
         Delete

       </button>


    </form>

           
      </td>

      </tr>
      
      @endforeach

      <tr>
        <td colspan="4" ></td>
        <td>
          Total Amount :
        </td>
        <td colspan="2" >
      <strong>  {{  $totalprice}} </strong>
        </td>
      </tr>

  </tbody>



 </table>

 <div class="float-right">
  <a class="btn gray-btn" href="{{route('products')}}">Continue Shopping</a>
  <a class="btn theme-btn" href="{{route('checkouts')}}"">Checkout</a>
   
 </div>

</div>



@endsection