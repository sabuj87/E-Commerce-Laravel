


@extends('back.layouts.master')


@section('content')
  
   <!-- Product Create start -->

    <div class="whitebg radius5 p-3" >
      <h4 class="d-inline-block float-start" >Manage slider</h4>
      <a href="#addslider"  data-toggle="modal" class="btn theme-btn d-inline-block float-end" >Add slider</a>
      <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data" >
      <div class="modal fade" id="addslider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new slider</h5>
              <button type="button" class=" btn close" data-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>

            <div class="p-3"  >
              @csrf

              <label>Slider title*</label>
              <input class="inputCommon @error('title') errorinput @enderror "   name="title" type="text">
              
              @error('title')
          
                  <p class="mainColor" >{{ $message }}</p>
              
              @enderror
    
              
                <label for="title">Slider image</label>
                <input type="file" class="form-control mt-1" name="image" id="title"  >
                <label>Button Text</label>
                <input class="inputCommon @error('button_text') errorinput @enderror "  name="button_text" type="text">
                <label>Button Link</label>
                <input class="inputCommon @error('button_link') errorinput @enderror "   name="button_link" type="text">
                <label>Slider Priority</label>
                <input class="inputCommon @error('priority') errorinput @enderror "   name="priority" type="text">


            </div>
          
     
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

           
              
                <button type="submit" class="btn theme-btn">Add</button>
           
           
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
            <th>Slider Title</th>
            <th>Slider Image</th>
            <th>Slider Priority</th>
            <th>Action</th>
          </tr>

      
        </thead>
        <tbody>
        @foreach($sliders as $slider)
      
          <tr class="whitebg"   >
            <td>{{$slider->id}}</td>
            <td>{{$slider->title}}</td>
            <td>
             
           
            <img height="50px"  width="50px" src="{{asset('image/slider/'.$slider->image)}}"  alt="">
       
          

            </td>
            <td> {{$slider->priority}} </td>

             
            <td>
              <a href="#deleteModal{{$slider->id}}" data-toggle="modal" class="btn theme-btn"  >Delete</a>
              <div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                      <form action="{{route('admin.slider.delete',$slider->id)}}" method="post" >
                        @csrf
                        <button type="submit" class="theme-btn">Delete</button>
                      </form>
                   
                    </div>
                  </div>
                </div>
              </div>
              <a href="#editSliderModal{{$slider->id}}" data-toggle="modal" class="btn gray-btn"  >Edit</a>
              <form action="{{route('admin.slider.update',$slider->id)}}" method="post" enctype="multipart/form-data" >
              
              <div class="modal fade" id="editSliderModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                      <button type="button" class=" btn close" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                      </button>
    
                    </div>
                    
                  <div class="p-3  " style="text-align: left;">
              
                      @csrf

                      <label>Slider title*</label>
                      <input class="inputCommon @error('title') errorinput @enderror " value="{{$slider->title}}"  name="title" type="text">
                      
                      @error('title')
                  
                          <p class="mainColor" >{{ $message }}</p>
                      
                      @enderror
            
                      
                        <label for="title">Slider image</label>
                        <input type="file" class="form-control mt-1" name="image" id="title"  >
                        <label>Button Text</label>
                        <input class="inputCommon @error('button_text') errorinput @enderror " value="{{$slider->button_text}}"  name="button_text" type="text">
                        <label>Button Link</label>
                        <input class="inputCommon @error('button_link') errorinput @enderror " value="{{$slider->button_link}}"  name="button_link" type="text">
                        <label>Slider Priority</label>
                        <input class="inputCommon @error('priority') errorinput @enderror " value="{{$slider->priority}}"  name="priority" type="text">
                   
                    
                  
    
                  </div>
                 
                    <div class="modal-footer">
    
                      
                      
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn theme-btn">Update slider</button>
           
               
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

