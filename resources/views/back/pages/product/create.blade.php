


@extends('back.layouts.master')


@section('content')
  
   <!-- Product Create start -->

    <div class="whitebg radius5 p-3" >
      <h4>Create Products</h4>
    </div>
 
    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data" >

     @csrf
   <div class="whitebg radius5 p-3 mt-3 " >
   
        <label>Product Title*</label>
        <input class="inputCommon @error('title') errorinput @enderror "  name="title" type="text">
        
        @error('title')
    
            <p class="mainColor" >{{ $message }}</p>
        
        @enderror


        <label>Price* (BDT)</label>
        <input class="inputCommon @error('price') errorinput @enderror " name="price" type="number">  
        @error('price')
    
        <p class="mainColor" >{{ $message }}</p>
    
       @enderror
       <div class="row">
          <div class="col-md-6">

          <label> Category</label>

            <select class="commonSelect" name="categoryid" id="">
              <option value="">Select a category</option>
            @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
   
            <option value="{{$parent->id}}">{{$parent->name}}</option>

            @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
            
           <option value="{{$child->id}}">----{{$child->name}}</option>
   
  
    


 
   @endforeach



   @endforeach

               
            
    
    
            </select>
            @error('categoryid')
    
            <p class="mainColor" >{{ $message }}</p>
        
        @enderror
            
          </div>
          <div class="col-md-6">

<label>Place</label>
  <select class="commonSelect" name="place" id="">
    <option value="">Select a place</option>
     <option value="trandy">Trandy</option>
     <option value="popular">Popular</option>
     <option value="other">other</option>


  </select>
  
</div>
        </div>
         
           

      


        <div class="row">
          <div class="col-md-6">
           <label> Offer</label>
           <select class="commonSelect" name="offer" id="">
              <option value="0">OFF</option>
              <option value="1">ON</option>
            
   
           </select>

          </div>

          <div class="col-md-6">
            <label>Offer Price (BDT)</label>
            <input class="inputCommon" name="offerprice" type="number">
           
         </div>

       </div>

       <div class="row">
        <div class="col-md-6">
         <label> Brand</label>
         <select class="commonSelect" name="brandid" id="">
          <option value="">Select brand</option>
          @foreach(App\Models\Brand::orderBy('name','asc')->get() as $brand)
   
          <option value="{{$brand->id}}">{{$brand->name}}</option>



 

  



 @endforeach
 
 
         </select>

        </div>

        <div class="col-md-6">
         <label>Seller</label>
         <select class="commonSelect" name="sellerid" id="">
          <option value="">Select seller</option>
          @foreach(App\Models\Seller::orderBy('name','asc')->get() as $seller)
   
          <option value="{{$seller->id}}">{{$seller->name}}</option>



 

  



 @endforeach
 
 
         </select>
         
       </div>

     </div>
   
        <label>Description</label>
        <textarea class="commontextarea" name="description" id="editor" rows="5"></textarea>
        @error('description')
    
        <p class="mainColor" >{{ $message }}</p>
    
        @enderror



        <label>Slug</label>
        <input class="inputCommon" name="slug" type="text">
      

        @error('slug')
    
        <p class="mainColor" >{{ $message }}</p>
    
        @enderror
     

 


   </div>

   <div class="whitebg radius5 p-3 mt-3"  >
    
      <h5  >Product Images</h5>

      <label for="pimage1">
        <div style="position: relative; display: inline-block">
            <img id="pimg1"  onerror="this.src='{{asset('image/other/default.png')}}'" style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

          <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
           <i class="fa-solid fa-folder-open"></i>
          </div>
          <input onchange="pimg1.src=window.URL.createObjectURL(this.files[0])" name="image[]" id="pimage1" class="show" type="file">

        </div>

      </label>
      <label for="pimage2">
        <div style="position: relative; display: inline-block;margin-left: 10px;">
            <img  id="pimg2" onerror="this.src='{{asset('image/other/default.png')}}'" style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

          <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
           <i class="fa-solid fa-folder-open"></i>
          </div>
          <input onchange="pimg2.src=window.URL.createObjectURL(this.files[0])" name="image[]" id="pimage2" class="show" type="file">

        </div>

      </label>
      <label for="pimage3">
        <div style="position: relative; display: inline-block;margin-left: 10px;">
            <img id="pimg3"  onerror="this.src='{{asset('image/other/default.png')}}'" style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

          <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
           <i class="fa-solid fa-folder-open"></i>
          </div>
          <input onchange="pimg3.src=window.URL.createObjectURL(this.files[0])" name="image[]" id="pimage3" class="show" type="file">

        </div>

      </label>
      <label for="pimage4">
        <div style="position: relative; display: inline-block;margin-left: 10px;">
            <img id="pimg4" onerror="this.src='{{asset('image/other/default.png')}}'" style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

          <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
           <i class="fa-solid fa-folder-open"></i>
          </div>
          <input onchange="pimg4.src=window.URL.createObjectURL(this.files[0])" name="image[]"  id="pimage4" class="show" type="file">

        </div>

      </label>

      <label  for="pimage5">
        <div style="position: relative; display: inline-block;margin-left: 10px;">
            <img id="pimg5"    onerror="this.src='{{asset('image/other/default.png')}}'" style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

          <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
           <i class="fa-solid fa-folder-open"></i>
          </div>
          <input onchange="pimg5.src=window.URL.createObjectURL(this.files[0])" name="image[]"  id="pimage5" class="show" type="file">

        </div>

      </label>

      

   </div>
   <input type="submit" class="theme-btn mt-3" value="Add product"  >
  
  </form>


@endsection

