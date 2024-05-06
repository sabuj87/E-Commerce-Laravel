@extends('front.layouts.master')


@section('content')

 
 <h4 class="mainColor ms-3" >{{$maincategory->name}}</h4>
<div class="row p-3">
    @foreach($subcategories as $child)
    <div class="col-md-2 col-6 p-2">
      
        <div class="shadow-card text-center " >
          <a href="{{route('subcategory',$child->id)}}">
            <img src="{{asset('image/category/'.$child->image)}}" height="40px" width="40px" alt="">
             <p>{{$child->name}}</p>
          </a>
        </div>


    </div>
    @endforeach
  
</div> 





  @endsection
