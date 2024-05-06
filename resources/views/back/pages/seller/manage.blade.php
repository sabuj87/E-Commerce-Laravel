


@extends('back.layouts.master')


@section('content')
  
   <!-- Product Create start -->

    <div class="whitebg radius5 p-3" >
      <h4>Manage Seller</h4>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="{{route('admin.seller.store')}}" method="post" enctype="multipart/form-data" >

          @csrf
        <div class="whitebg radius5 p-3 mt-3 " >
        
             <label>Seller name*</label>
             <input class="inputCommon @error('name') errorinput @enderror "  name="name" type="text">
             
             @error('name')
         
                 <p class="mainColor" >{{ $message }}</p>
             
             @enderror
     
            
      
             <label>Description</label>
             <textarea style="height: 100px;" class="commontextarea" name="description" id="editor" rows="2"></textarea>
             @error('description')
         
             <p class="mainColor" >{{ $message }}</p>
         
             @enderror

             <label>Address</label>
             <input class="inputCommon @error('address') errorinput @enderror "  name="address" type="text">
             
             @error('name')
         
                 <p class="mainColor" >{{ $message }}</p>
             
             @enderror
     
              
            
           
     
     
           
   
     
     
     
      
     
     
        </div>
     
        <div class="whitebg radius5 p-3 mt-3"  >
         
           <h5  >Seller Logo</h5>
     
           <label for="pimage1">
             <div style="position: relative; display: inline-block">
                 <img id="pimg1"  onerror="this.src='{{asset('image/other/default.png')}}'" style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">
     
               <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
                <i class="fa-solid fa-folder-open"></i>
               </div>
               <input onchange="pimg1.src=window.URL.createObjectURL(this.files[0])" name="image" id="pimage1" class="show" type="file">
     
             </div>
     
           </label>
       
     
           
     
        </div>
        <input type="submit" class="theme-btn mt-3" value="Add Seller"  >
       
       </form>
     
      </div>
      <div class="col-md-6">
        <div class ="whitebg radius5 p-3 mt-3" >
            
      <table style=" border-collapse:separate;border-spacing:0 15px;" id="datatTable" class="table table-borderless text-center" >

        <thead>

        <tr class="whitebg" >
      
            <th>Seller name</th>
            <th>Icon</th>
            <th>Action</th>
          </tr>

      
        </thead>
        <tbody>
        @foreach($sellers as $seller)
      
          <tr class="whitebg"   >
            <td>{{$seller->name}}</td>
            <td>
             
           
            <img height="50px"  width="50px" src="{{asset('image/seller/'.$seller->image)}}"  alt="">
       
          

            </td>
        
        
            
          </td>
             
            <td>
            <a href="{{route('admin.seller.edit',$seller->id)}}"  class="btn gray-btn"  >Edit</a>
            <a href="#deleteModal{{$seller->id}}" data-toggle="modal" class=" btn theme-btn"  >Delete</a>
              <div class="modal fade" id="deleteModal{{$seller->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete?</h5>
                      <button type="button" class=" btn close" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                      </button>
                    </div>
             
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                      <form action="{{route('admin.seller.delete',$seller->id)}}" method="post" >
                        @csrf
                        <button type="submit" class="theme-btn">Delete</button>
                      </form>
                   
                    </div>
                  </div>
                </div>
              </div>

            </td>
            
          </tr>
       
          @endforeach
        </tbody>
        
        <tfooter>
     
        </tfooter>
        </table>   
        
        </div>
      </div>

    </div>
   

@endsection

