


@extends('back.layouts.master')


@section('content')
  
   <!-- Product Create start -->

    <div class="whitebg radius5 p-3" >
      <h4 class="d-inline-block float-start" >Manage Banner</h4>
      <a href="#addbanner"  data-toggle="modal" class="btn theme-btn d-inline-block float-end" >Add banner</a>
      <form action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data" >
      <div class="modal fade" id="addbanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new banner</h5>
              <button type="button" class=" btn close" data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>

            <div class="p-3"  >
              @csrf

              <label>Banner title*</label>
              <input class="inputCommon @error('title') errorinput @enderror "   name="title" type="text">
              
              @error('title')
          
                  <p class="mainColor" >{{ $message }}</p>
              
              @enderror
              <select class="commonSelect " name="type" id="" >
              <option value="" >Select Banner type</option>
              <option value="Horizantal" >Horizantal</option>
              <option value="Horizantal" >Vertical</option>
              
             </select>
             <select class="commonSelect " name="position" id="" >
                <option value="" >Select Banner position</option>
                <option value="top"  >Top</option>
                <option value="left" >left</option>
                <option value="Middle" >Middle</option>
                <option value="Right" >Right</option>
                <option value="Bottom" >Bottom</option>
                
               </select>
                <label for="title">Banner image</label>
                <input type="file" class="form-control mt-1" name="image" id="title"  >
                <label>Button Text</label>
                <input class="inputCommon @error('button_text') errorinput @enderror "  name="button_text" type="text">
                <label>Button Link</label>
                <input class="inputCommon @error('button_link') errorinput @enderror "   name="button_link" type="text">
                <label>Bannar Priority</label>
                <input class="inputCommon @error('priority') errorinput @enderror "   name="priority" type="text">


            </div>
          
     
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

           
              
                <button type="submit" class="btn theme-btn">Add  Bannar</button>
           
           
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
    </div>
    <div >  
   </form>
        <div class ="whitebg radius5 p-3 mt-3" >
            
      <table style=" border-collapse:separate;border-spacing:0 15px;" id="datatTable" class="table table-borderless text-center" >

        <thead>

        <tr class="whitebg" >
      
            <th>ID</th>
            <th>Bannar Title</th>
            <th>Bannar Image</th>
            <th>Bannar type</th>
            <th>Bannar Position</th>
            <th>Bannar Priority</th>
            <th>Action</th>
          </tr>

      
        </thead>
        <tbody>
        @foreach($banners as $banner)
      
          <tr class="whitebg"   >
            <td>{{$banner->id}}</td>
            <td>{{$banner->title}}</td>
            <td>
             
           
              <img height="50px"  width="50px" src="{{asset('image/banner/'.$banner->image)}}"  alt="">
         
            
  
              </td>
            <td>{{$banner->type}}</td>
            <td>{{$banner->position}}</td>
           
            <td> {{$banner->priority}} </td>

             
            <td>
              <a href="#deleteModal{{$banner->id}}" data-toggle="modal" class="btn theme-btn"  >Delete</a>
              <div class="modal fade" id="deleteModal{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you want to delete?</h5>
                      <button type="button" class=" btn close" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                      </button>
                    </div>

                 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                      <form action="{{route('admin.banner.delete',$banner->id)}}" method="post" >
                        @csrf
                        <button type="submit" class="theme-btn">Delete</button>
                      </form>
                   
                    </div>
                  </div>
                </div>
              </div>
              <a href="#editSliderModal{{$banner->id}}" data-toggle="modal" class="btn gray-btn"  >Edit</a>
              <form action="{{route('admin.banner.update',$banner->id)}}" method="post" enctype="multipart/form-data" >
              
              <div class="modal fade" id="editSliderModal{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Banner</h5>
                      <button type="button" class=" btn close" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                      </button>
    
                    </div>
                    
                  <div class="p-3  " style="text-align: left;">
              
                    @csrf

                    <label>Banner title*</label>
                    <input class="inputCommon @error('title') errorinput @enderror "  value="{{$banner->title}}" name="title" type="text">
                    
                    @error('title')
                
                        <p class="mainColor" >{{ $message }}</p>
                    
                    @enderror
                    <select class="commonSelect " name="type" id="" >
                    <option value="" >Select Banner type</option>
                    <option value="Horizantal"  @if($banner->type == "Horizantal") selected @endif >Horizantal</option>
                    <option value="Vertical"  @if($banner->type == "Vertical") selected @endif >Vertical</option>
                    
                   </select>
                   <select class="commonSelect " name="position" id="" >
                      <option value="" >Select Banner position</option>
                 <option value="top" @if($banner->position == "top") selected @endif >Top</option>
                <option value="left"  @if($banner->position == "left") selected @endif  >left</option>
                <option value="Middle"  @if($banner->position == "Middle") selected @endif  >Middle</option>
                <option value="Right" @if($banner->position == "Right") selected @endif  >Right</option>
                <option value="Bottom"  @if($banner->position == "Bottom") selected @endif  >Bottom</option>
                
                      
                     </select>
                      <label for="title">Banner image</label>
                      <input type="file" class="form-control mt-1"  name="image" id="title"  >
                      <label>Button Text</label>
                      <input class="inputCommon @error('button_text') errorinput @enderror " value="{{$banner->button_text}}"  name="button_text" type="text">
                      <label>Button Link</label>
                      <input class="inputCommon @error('button_link') errorinput @enderror "  value="{{$banner->button_link}}"  name="button_link" type="text">
                      <label>Bannar Priority</label>
                      <input class="inputCommon @error('priority') errorinput @enderror "  value="{{$banner->priority}}" name="priority" type="text">
      
                    
                  
    
                  </div>
                 
                    <div class="modal-footer">
    
                      
                      
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn theme-btn">Update Banner</button>
           
               
                    </div>
                  </div>
                </div>
              </div>
            </form>
            </td>
            
          </tr>
       
          @endforeach
        </tbody>
        
        <tfooter>
     
        </tfooter>
        </table>   
        
        </div>
     

    </div>
   

@endsection

