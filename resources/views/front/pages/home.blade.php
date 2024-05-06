@extends('front.layouts.master')

@section('content')
<div class="row px-3" >
  <div id="categoryMain"  class="col-md-2 pt-3" >
   <!-- Category -->
   <div class="list-group">
   @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
   <a class="parent mostFontsize2" href="#main-{{$parent->id}}"  data-bs-toggle="collapse" aria-expanded="false" aria-controls="main-{{$parent->id}}" >
      <img src="{{asset('image/category/'.$parent->image)}}" height="20px" width="20px" alt="">
   
   {{$parent->name}} <i style="font-size:80%;" class="fa-solid fa-angle-down ms-2"></i> </a>

   <div class=" ml-2 collapse
   
   
   
   
   
   " id="main-{{$parent->id}}" >
   @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
  <div class="mt-2" > <a class="child" href="{{route('category.product',$child->id)}}"   >
       
   <img src="{{asset('image/category/'.$child->image)}}" height="10px" width="10px" alt="">
   
   {{$child->name}}
    

   </a>
  </div>
   @endforeach


   </div>
   @endforeach

  
  </div>



  </div>
  <div class="col-md-8" >
    <!-- slider -->

<div id="frontSlider" class="owl-carousel owl-theme">
  @foreach($sliders as $slider)



  <div class="slideItem" >
   <img height="100%" width="100%" src="image/slider/{{$slider->image}}" alt="">
   <div class="info" >
     <h4 class="text-white title" >{{$slider->title}}</h4>
     @if($slider->button_text !=null)
     <a  class="btn btn theme-btn" href="{{$slider->button_link}}">{{$slider->button_text}}</a>
    @endif
     
     
   </div>

  </div>


  @endforeach

</div>

  </div>
  <div id="bannertop" class="col-md-2 banner " >
  <!-- Banar top -->
  @foreach($banners as $banner)
  @if($banner->type == 'Vertical' and $banner->position =='top')

  <div class="relativebox" >
       <img src="image/banner/{{$banner->image}}" height="399px" width="100%"  alt="">
       <div class="info" >
     <h4 class="text-white title" >{{$banner->title}}</h4>
     @if($banner->button_text !=null)
     <a  class="btn btn theme-btn" href="{{$banner->button_link}}">{{$banner->button_text}}</a>
     @endif
     
       </div>
   </div>
       @break
  @endif
  @endforeach


  </div>




</div>

<div class="row  px-3 ">
  <div id="bannerleft" class="col-md-2 banner  " >
    @foreach($banners as $banner)
    @if($banner->type == 'Vertical' and $banner->position =='left')
  
    <div class="relativebox" >
         <img src="image/banner/{{$banner->image}}" height="399px" width="100%"  alt="">
         <div class="info" >
       <h4 class="text-white title" >{{$banner->title}}</h4>
       @if($banner->button_text !=null)
       <a  class="btn btn theme-btn" href="{{$banner->button_link}}">{{$banner->button_text}}</a>
       @endif
       
         </div>
     </div>
         @break
    @endif
    @endforeach

    <div class="seller p-3 border mt-3" >
       <h5 class="mainColor" >Sellers</h5>
       <hr>
      @foreach(App\Models\Seller::orderBy('name','asc')->get() as $seller)
      <img height="50px" width="50px" src="{{asset('image/seller/'.$seller->image)}}" alt="">  <a href="">{{$seller->name}}</a>
      
       
      @endforeach






    </div>
    
    <div class="brand p-3 border mt-3" >
      <h5 class="mainColor" >Brands</h5>
      <hr>
     @foreach(App\Models\Brand::orderBy('name','asc')->get() as $brand)
      <img height="50px" width="50px" src="{{asset('image/brand/'.$brand->image)}}" alt="">  <a href="">{{$brand->name}}</a>
      
     @endforeach






   </div>
  
  </div>
  <div class="col-md-10" >
  
    @include('front.pages.products.newproduct')

    <div class="banner-hori 
     mt-3 px-3
    " >
      <div class="row" >
        <div class="col-lg-6 mt-2">
         @foreach($banners as $banner)
         @if($banner->type == 'Horizantal' and $banner->position =='left')
       
         <div class="relativebox" >
              <img src="image/banner/{{$banner->image}}" height="100px" width="100%"  alt="">
              <div class="info" style="bottom: 10px;" >
            <h5 class="text-white title" >{{$banner->title}}</h5>
            @if($banner->button_text !=null)
            <a style="padding: 5px;"  class="theme-btn" href="{{$banner->button_link}}">{{$banner->button_text}}</a>
            @endif
            
              </div>
          </div>
              @break
         @endif
         @endforeach
        </div>
        <div class="col-lg-6 mt-2">
          @foreach($banners as $banner)
          @if($banner->type == 'Horizantal' and $banner->position =='Right')
        
          <div class="relativebox" >
               <img src="image/banner/{{$banner->image}}" height="100px" width="100%"  alt="">
               <div class="info" style="bottom: 10px;" >
             <h5 class="text-white title" >{{$banner->title}}</h5>
             @if($banner->button_text !=null)
             <a style="padding: 5px;"  class="theme-btn" href="{{$banner->button_link}}">{{$banner->button_text}}</a>
             @endif
             
               </div>
           </div>
               @break
          @endif
          @endforeach
       </div>
 
      </div>
 
   

    
    </div>
    @include('front.pages.products.trandy')
    @include('front.pages.products.popular')
    @include('front.pages.products.category')


  </div>




 
</div>

@endsection