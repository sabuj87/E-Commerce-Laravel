<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
   <!-- Bootstrap CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- font-awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Google Font -->

   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
       <!-- External  CSS -->
   <link rel="stylesheet" href="{{asset('css/admin-style.css')}}">

   <!-- Data Table -->

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.4/datatables.min.css"/>
</head>
<body>
    <div id="content" >
        <!-- Header -->
    @include('back.partial.header')
         <!-- Header end           -->
          <!-- side -->
    <div id="content-body" >

    <div class="row">
         <!-- Sidebar -->
       <div class="col-md-3">
          
           <div id="sidebar" class="p-3 " >
              <!-- profile -->
              <div class="whitebg radius5 p-3" >
                 <img src="{{asset('image/other/user.png')}}" height="50px" width="50px" alt="">
                       <div style=" vertical-align: middle;margin-left:10px" class="d-inline-block" >
                         <h6 class="mainColor mp0 bold " > Abu Saeed Sabuj</h6>
                         <h6  class="gray mostSmall   " > Admin manager</h6>
             

                        </div>
                      
              </div>


            <!-- Side Menu -->

        
                <ul id="sidemenu" >
                    <li><a href="{{route('admin.index')}}"><i style="margin-right: 20px;" class="fa-solid fa-signal"></i>Dashboard  </a></li>
                    <li onclick="dropdown('product')" ><a><i style="margin-right: 20px;" class="fa-solid fa-dolly"></i>Products</a><i style="font-size:80%;margin-left:20px" class="fa-solid fa-angle-down"></i>
                       <ul id="product" class=" cp mt-3 
                       @if(Route::is('admin.products') or Route::is('admin.product.create') )
                       
                  
                        oc
                  
                  
                      @endif
                       "style="list-style: none;" >
                        <li class=" 
                        @if(Route::is('admin.products'))
                       
                  
                        activemenu
                  
                  
                      @endif
                        "
                         ><a class="ps-2" href="{{route('admin.products')}}"> All Products </a></li>
                        <li class=" 
                        @if(Route::is('admin.product.create'))
                       
                  
                        activemenu
                  
                  
                      @endif
                        " ><a class="ps-2" href="{{route('admin.product.create')}}"> Create Products</a></li>
                       

                       </ul>
                    </li>
                    <li onclick="dropdown('order')" ><a><i style="margin-right: 20px;" class="fa-solid fa-circle-left"></i>Orders</a><i style="font-size:80%;margin-left:20px" class="fa-solid fa-angle-down"></i>
                      <ul id="order" class=" cp mt-3 
                      @if(Route::is('admin.orders')  )
                      
                 
                       oc
                 
                 
                     @endif
                      "style="list-style: none;" >
                       <li  class=" 
                       @if(Route::is('admin.orders'))
                      
                 
                       activemenu
                 
                 
                     @endif
                       " ><a class="ps-2" href="{{route('admin.orders')}}">Orders</a></li>
                   
                      

                      </ul>
                   </li>
                    
                       <li onclick="dropdown('category')" ><a><i style="margin-right: 20px;" class="fa-solid fa-layer-group"></i>Category</a><i style="font-size:80%;margin-left:20px" class="fa-solid fa-angle-down"></i>
                        <ul id="category" class=" cp mt-3 
                        @if(Route::is('admin.category.manage'))
                        
                   
                         oc
                   
                   
                       @endif
                        " style="list-style: none;" >
                   
                         <li class="
                         @if(Route::is('admin.category.manage'))
                        
                   
                         activemenu
                   
                   
                       @endif
                         "><a class="ps-2" href="{{route('admin.category.manage')}}">Manage Category</a></li>
                        
 
                        </ul>
                     
                     
                     </li>
                     <li onclick="dropdown('brand')"  ><a><i style="margin-right: 20px;" class="fa-solid fa-circle-check"></i>Brands</a><i style="font-size:80%;margin-left:20px" class="fa-solid fa-angle-down"></i>
                      <ul id="brand"  class=" cp mt-3 
                      @if(Route::is('admin.brand.manage'))
                      
                 
                       oc
                 
                 
                     @endif
                      " style="list-style: none;" >
                 
                       <li class="
                       @if(Route::is('admin.brand.manage'))
                      
                 
                       activemenu
                 
                 
                     @endif
                       " ><a class="ps-2"  href="{{route('admin.brand.manage')}}">Manage Brand</a></li>
                      

                      </ul>
                   
                   
                   </li>
                   <li onclick="dropdown('seller')" ><a><i style="margin-right: 20px;" class="fa-solid fa-user"></i>Sellers</a><i style="font-size:80%;margin-left:20px" class="fa-solid fa-angle-down"></i>
                    <ul id="seller" class=" cp mt-3 
                    @if(Route::is('admin.seller.manage'))
                    
               
                     oc
               
               
                   @endif
                    " style="list-style: none;" >
               
                     <li class=" 
                     @if(Route::is('admin.seller.manage'))
                    
               
                     activemenu
               
               
                   @endif
                     " ><a class="ps-2" href="{{route('admin.seller.manage')}}">Manage Seller </a> </li>
                    

                    </ul>
                 
                 
                 </li>
                 <li onclick="dropdown('slider')" ><a><i style="margin-right: 20px;" class="fa-solid fa-sliders"></i>Sliders</a><i style="font-size:80%;margin-left:20px" class="fa-solid fa-angle-down"></i>
                  <ul id="slider" class=" cp mt-3 
                  @if(Route::is('admin.sliders'))
                  
             
                   oc
             
             
                 @endif
                  " style="list-style: none;" >
             
                   <li class=" 
                   @if(Route::is('admin.sliders'))
                  
             
                   activemenu
             
             
                 @endif
                   " ><a class="ps-2" href="{{route('admin.sliders')}}">Manage Slider</a> </li>
                  

                  </ul>
               
               
               </li>
               <li onclick="dropdown('banner')" ><a><i style="margin-right: 20px;" class="fa-solid fa-square-caret-up"></i>Banners</a><i style="font-size:80%;margin-left:20px" class="fa-solid fa-angle-down"></i>
                <ul id="banner" class=" cp mt-3 
                @if(Route::is('admin.banners'))
                
           
                 oc
           
           
               @endif
                " style="list-style: none;" >
           
                 <li class=" 
                 @if(Route::is('admin.banners'))
                
           
                 activemenu
           
           
               @endif
                 " ><a class="ps-2" href="{{route('admin.banners')}}">Manage banner</a> </li>
                

                </ul>
             
             
             </li>
             
                 
                  
              

                </ul>
            

          
               

           </div>
       </div>

       <div class="col-md-9">
          
          <div id="mainContent" class="p-2" >
            @yield('content')
          </div>
      </div>

    </div>


    
    
    </div>
    </div>

    


<!-- Script with CDN -->


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.4/datatables.min.js"></script>

<script>
 $(document).ready( function () {
  $('#datatTable').DataTable();
} );


</script>
<script>
 function dropdown(id){

  var oj=id;

$('#'+oj).toggleClass('oc');



 }

    $('.parentmenu').click(function(){

$('.parentmenu>.childmenu').toggleClass('show');

});
  ClassicEditor
                 .create( document.querySelector( '#editor' ) )
                 .then( editor => {
                   console.log( editor );
                                } )
                 .catch( error => {
                  console.error( error );
                        } );
</script>



</body>




</html>