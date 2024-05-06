@extends('front.layouts.master')

@section('content')

<div>
    <div class="row p-3">
        <div class="col-md-5 ">
            <div id="bigview" class="row">
                <div class="col-md-2">
                @foreach($product->images as $imaget)
            @php

              $as=$imaget->image;

              @endphp
            <img  class="responsive2 imgview" class="mt-2 border "  src="{{asset('image/product/'.$as)}}"  alt="">
         

       
            @endforeach



                
                </div>
                <div class="col-md-10">
                    @foreach($product->images as $imaget)
                    @php
        
                      $as=$imaget->image;
        
                      @endphp
                    <img id="imgbig" class="mt-2 border ms-lg-3 responsive2"  src="{{asset('image/product/'.$as)}}"  alt="">
                 
                     @break
               
                    @endforeach
                   
                </div>
            </div>
            <div id="smallview" class="row">
              
                <div class="col-md-10 owl-carousel owl-theme" >
                    
                    @foreach($product->images as $imaget)
                    @php
        
                      $as=$imaget->image;
        
                      @endphp


                      <div>
                        <img   id="imgbig" class="mt-2 border ms-lg-3 responsive4"  src="{{asset('image/product/'.$as)}}"  alt="">


                      </div>
                 
                
               
                    @endforeach
                   
                </div>
            </div>

        </div>

        <div class="col-md-7  px-lg-5">
            <h3 style="font-weight: 100;" >{{$product->title}}</h3>
            <h4 class="mainColor" style="font-weight: 100;" >&#2547; {{$product->price}}</h4>
            <div style="color:gray" >
                <p  > <strong> Brand :</strong>
                     @if($product->brand !=null)

                        {{$product->brand->name}}
                     
                    @else
                       {{"No Brand"}}

                     @endif
                
                
                </p>
                <p  > <strong> Category :</strong> 
                    
                    @if($product->category !=null)

                    {{$product->category->name}}
                 
                @else
                   {{"No category"}}

                 @endif
                </p> 
                <p  > <strong> Seller :</strong> 
                         
                    @if($product->seller !=null)

                    {{$product->seller->name}}
                 
                @else
                   {{"No Seller"}}

                 @endif
                
                </p> 
            </div>
           <form action="{{route('cart.store')}}" method="post">
             @csrf
            <div style="color:gray" >
                
                Quantity : 
                <i class="fa-solid  ms-2 fa-minus"></i>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                   <input value="1" name="product_quantity" type="number" class="inputCommon" style="display: inline-block;width: 100px;">
                <i class="fa-solid fa-plus"></i>
            </div>
            <div style="margin-top:20px">
                <!-- Add Cart Btn -->
                <button type="submit" class="btn-strock" ><p style="font-size: 20px" class="mp0" > <i  class="fa-solid fa-cart-arrow-down mainColor "></i> Add to cart</p></button>
                <button class="btn-strock ms-3 border-0" ><p  class="mp0" ><i  class="fa-solid fa-heart mainColor"></i> Add to Wishlist</p></button>

            </div>

           </form>
       

            <hr class="mt-5" >
        <div class="mt-4">
        Share : <i class="fa-brands border p-3 fa-facebook-f"></i>
        <i class="fa-brands border p-3 ms-2 fa-instagram"></i>
        <i class="fa-brands border p-3 ms-2 fa-twitter"></i>
        <i class="fa-brands border p-3 ms-2 fa-pinterest"></i>

        </div>

        
        </div>

    </div>
    <div class="row p-3 ">
       <div class="shadow-card" >
       <h5 class="mainColor" >Description</h5>

       <p>

        @php
           echo ($product->description);
        @endphp
       </p>
       </div>
    </div>

    <div class="row p-3 ">
        <div class="shadow-card" >
        <h5 class="mainColor" >Product Review</h5>
        <hr>
 
        <form action="{{route('review.product.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
          <input class="inputCommon" name="details" type="text" placeholder="Drop your review.." >
          <input style="width: 300px;" class="form-control " type="file" name="image" >
          <input type="hidden" value="{{$product->id}}" name="product_id">
          <button type="submit" class="btn btn-solid mt-2" >Submit</button>

        </form>
        <h5 class="mainColor mt-3" >Reviews</h5>
        <hr>
        @foreach($product->reviews as $review)
        
        <p class="mainColor mp0"  >{{$review->user->first_name}} {{$review->user->last_name}}</p>
        <p class="mostFontsize " >{{$review->details}}   @if(auth()->check())

            @if(auth()->user()->id == $review->user->id)
             <a href="{{route('review.product.delete',['id'=>$review->id,'uid'=>$review->user->id])}}"> <i class="fa-solid fa-trash mainColor"></i></a>
            @endif
            
            @endif</p>
      
        
        

        @endforeach

    
       
     
        </div>
     </div>

</div>
@include('front.pages.products.related')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
$('.imgview').click(function(){
  var image = $(this).attr('src');
  
   $('#imgbig').attr('src',image);
    
});


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    center: true,
    items:1,
    loop:true,
    autoPlaySpeed: 5000,
    autoPlayTimeout: 5000,
    autoplayHoverPause: true,
    nav:true
   
   
});

$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
 $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
});
</script>


@endsection