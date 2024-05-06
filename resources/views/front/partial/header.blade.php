<!-- Header start-->

<header>
   <div class="p-2" >
     <!-- header top -->
     <div class="px-3" >





        <div class=" float-start" >
 
         <a class="colorGray  " href="tel:01710121630"><i class="fa-solid fa-phone"></i> Call: 01710121630</a>
        

        </div>

        <div class=" float-end" >
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
          
                  <a class="mainColor me-lg-3" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
     
            @endif

            @if (Route::has('register'))
       
                  <a class="mainColor" href="{{ route('register') }}"><i class="fa-solid fa-file-import"></i> Register</a>
           
            @endif
        @else
          
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->first_name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
         
        @endguest
         
         
      
        </div>
        <div class="clearfix"></div>
        <hr>
     </div>
     <!-- Header main -->
    <div  >
       <div class="row px-3 " >
          <div class="col-md-2" >
          <!-- logo -->

            <h3 class="mainColor " style="font-weight: 700;" >ECOM</h3>
     
        
          </div>
          <div class="col-md-8 px-2" >
          <!-- Search -->

          <div  class="searchBox borderMain" >
            <div class="search px-3 py-2 whitebg" >
          

              <div  class="d-inline pl-3 float-left" >

                <form id="searchForm" class="d-inline " action="{{route('search')}}" method="GET" >
                   <div class="row" >
                      <div class="col-lg-3">

                        <select style="width: 100%;" class="commonSelectFront" name="categoryid" id="">

                           <option value="">Select a category</option>
                @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
       
                <option value="{{$parent->id}}">{{$parent->name}}</option>
     
    
     
       
     
               @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
               <option value="{{$child->id}}">----{{$child->name}}</option>
       
      
        
    
    
     
       @endforeach
    
    
    
       @endforeach
    
                   
                
    
    
                           </select>
                           
                      </div>

                      <div class="col-lg-9">
                        <input name="search" style="width:80%" id="searchInput" type="text" placeholder="Search what you need.." >
                        <button class="btn mainColor" ><i class="fa-solid fa-magnifying-glass"></i></button>
                        
                     </div>

                   </div>
                    
                  
                </form>
              </div>


         </div>

          </div>
          
      
          </div>
          <div class="col-md-2 "   >
             <div style="padding: 15px 15px;" >

                <div style="display:inline-block;position:relative" >
                <a href="{{route('carts')}}"><i style="font-size: 170%;" class="fa-solid fa-cart-arrow-down mainColor "></i></a>
                <div style="position:absolute;border-radius:50%;background-color:yellow;height:20px;width:20px;top:-10px;right:-10px" >
                   <p class="mp0 text-center mt-1" style="font-size:70%" >{{App\Models\Cart::totalItems()}}</p>
                </div>
                </div>
               
                <a style="float: right;" id="heart" href=""><i style="font-size: 170%;margin-left: 20px;" class="fa-solid fa-heart mainColor"></i></a>
             </div>
           
          </div>

       </div>


       <div class=" mainMenu row px-md-3" >
         

          <div class="col-4 " >
           <!-- category -->
           <ul >

            <li><a href="{{route('maincategory')}}">Categories</a></li>
       
           </ul>

          </div>
          <div class="col-8  " >
           <!-- Menu -->
          
            <ul >

               <li><a href="{{route('home')}}">Home</a></li>
               <li><a href="">About</a></li>
               <li><a href="">Contact</a></li>
            

            </ul>

           
          

         </div>

        


       </div>


    </div>

   

   </div>
  
</header>

<!-- Header end -->