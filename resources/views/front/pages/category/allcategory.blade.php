@extends('front.layouts.master')


@section('content')

 
 <h4 class="mainColor ms-3" >All Category</h4>
<div class="row p-3">
    @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
    <div class="col-md-2 col-6 p-2">
      
        <div class="shadow-card text-center " >
          <a href="{{route('subcategory',$parent->id)}}">
            <img src="{{asset('image/category/'.$parent->image)}}" height="40px" width="40px" alt="">
             <p>{{$parent->name}}</p>
          </a>
        </div>


    </div>
    @endforeach
  
</div> 





  @endsection
