@extends('front.layouts.master')


@section('content')

   
      
         
         
            
               <div class="row p-3">
                <h4><span>Search Result for </span> </h4>
                <p class="mainColor" >{{$search}}</p>
              
               @foreach($products as $product)
    
    <div class="col-md-2 px-3 col-6 " >
        <a  href="{{route('product.show',$product->slug)}}">
        <div class="productCard" >
            @foreach($product->images as $imaget)
        @php

          $as=$imaget->image;

          @endphp
        <img class="responsive" src="{{asset('image/product/'.$as)}}"  alt="">
        @break

   
        @endforeach

        <p class="productTitle text-center mp0 mostfontsize" >{{$product->title}}</p>
        <p class=" productPrice mp0 text-center " >{{$product->price}} tk</p>

        <form   action="{{route('cart.store')}}" method="post" >
            @csrf
         <input type="hidden" name="product_id" value="{{$product->id}}">
         <button type="submit" class="btn theme-btn mt-2 addcartbtn"  ><i class="fa-solid fa-cart-arrow-down text-white "></i> Add to cart</button>
        
        
         </button>
        </form>
      

        </div>
    </a>

    </div>
    
    @endforeach


              
         
    

     
     </div>
@endsection

