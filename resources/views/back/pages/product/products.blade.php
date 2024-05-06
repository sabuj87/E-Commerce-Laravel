


@extends('back.layouts.master')


@section('content')
  
   <!-- Product Create start -->

    <div style="margin-bottom: 20px;" class="whitebg radius5 p-3" >
      <h4>All Products</h4>
    </div>



      <table style=" border-collapse:separate;border-spacing:0 15px;" id="datatTable" class="table table-borderless text-center" >

        <thead>

        <tr class="whitebg" >
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Offer</th>
            <th>Action</th>
          </tr>

      
        </thead>
        <tbody>
        @foreach($products as $product)
      
          <tr class="whitebg"   >
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>
              @foreach($product->images as $imaget)
            @php

              $as=$imaget->image;

              @endphp
            <img height="50px"  width="50px" src="{{asset('image/product/'.$as)}}"  alt="">
            @break
        @endforeach
          

            </td>
            <td>{{$product->price}}</td>
            <td>
            
               @if($product->offer)
                <button class="btn gray-btn" >ON</button>
                @else
                <button class="btn theme-btn" >OFF</button>

                @endif
               
              
            </td>
            <td>
            <a href="{{route('admin.product.edit',$product->id)}}"  class="btn gray-btn"  >Edit</a>
            <a href="#deleteModal" data-toggle="modal" class=" btn theme-btn"  >Delete</a>
              <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                      <form action="{{route('admin.product.delete',$product->id)}}" method="post" >
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
      
    
 
       
   


@endsection

