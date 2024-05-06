<!-- new product -->

<div>

    <div class="row newproduct p-2 ">
     <h4 class="mainColorBg text-white round5" >New Products</h4>
        @foreach(App\Models\Product::orderBy('id','desc')->take(6)->get() as $product)
    
        <div class="col-md-2 px-3 col-6 " >
            <a  href="{{route('product.show',$product->slug)}}">
            <div class="productCard" >
                @foreach($product->images as $imaget)
            @php

              $as=$imaget->image;

              @endphp
              <div class="imagebox" >


              </div>
            <img class="responsive" src="{{asset('image/product/'.$as)}}"  alt="">
            @break

       
            @endforeach

            <p class="productTitle text-center mostFontsize mp0" >{{$product->title}}</p>
            <p class=" productPrice mp0 text-center " >&#2547; {{$product->price}}</p>

            <form   action="{{route('cart.store')}}" method="post" >
                @csrf
             <input type="hidden" name="product_id" value="{{$product->id}}">
             <button type="submit" class="btn  mt-2 addcartbtn2 mostFontsize"  ><i class="fa-solid fa-cart-arrow-down mainColor "></i> Add to cart</button>
            
            
             </button>
            </form>
          

            </div>
        </a>

        </div>
        
        @endforeach

    </div>


</div>