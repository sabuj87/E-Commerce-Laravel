<!-- Header -->
<div class="" >
  <div class="row p-3">
      <!-- logo -->
    <div class="col-md-2 mt-2">
        <h4 class="mainColor" >ADMIN PANEL</h4> 
    </div>
     <!-- Search -->
    <div class="col-md-7">

         <div class="search px-3 py-2 whitebg" >
              <div id="searchIcon" class="d-inline float-left" >
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>

              <div  class="d-inline pl-3 float-left" >
                <form id="searchForm" class="d-inline " action="">
                    <input id="searchInput" type="text" placeholder="Search.." >
                </form>
              </div>


         </div>

    </div>
    <!-- Notification -->
    <div class="col-md-3 ">
        <div id="NoficationIcon" class="d-inline float-left mt-2" >
          <i style="font-size: 120%;" class="fa-regular fa-bell"></i>
        </div>

      <a title="Logout" href="{{route('admin.logout')}}"><i  style="font-size: 120%;margin-left: 20px;" class="fa-solid fa-arrow-right-from-bracket mt-2"></i></a>  

       <a href="{{route('admin.product.create')}}"><button style="margin-left: 40px;" class="theme-btn px-3 py-2 "  > <i class="fa-solid fa-plus"></i> Add Product</button></a> 
    </div>

  </div>
 
</div>