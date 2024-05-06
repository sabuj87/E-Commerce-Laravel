@extends('back.layouts.master')


@section('content')
<h3>Dashboard</h3>
<div class="row">
    <div class="col-lg-3">
        <div class="whitebg radius5 p-3" >
              <img style="float:left;margin-top:10px" src="{{asset('image/other/taka.png')}}" height="30px" width="30px" alt="">

              <div style="display:inline;float:left" class="ms-3 " >
               <p style="color:gray" class="mp0">Total Sells</p>

               <h6 style="font-weight:bold" class="mp0" >160567</h6>
                
              </div>

              <div class="clearfix" ></div>
     


        </div>


    </div>
    <div class="col-lg-3">
        <div class="whitebg radius5 p-3" >
            <i style="margin-top: 10px;float:left;font-size:150%;color:coral" class="fa-solid fa-dolly"></i>
              <div style="display:inline;float:left" class="ms-3 " >
               <p style="color:gray" class="mp0">Total Products</p>

               <h6 style="font-weight:bold" class="mp0" >160567</h6>
                
              </div>

              <div class="clearfix" ></div>
     


        </div>


    </div>
    <div class="col-lg-3">
        <div class="whitebg radius5 p-3" >
            <i style="margin-top: 10px;float:left;font-size:150%;color:coral" class="fa-solid fa-layer-group"></i>
            <div style="display:inline;float:left" class="ms-3 " >
             <p style="color:gray" class="mp0">Total category</p>

             <h6 style="font-weight:bold" class="mp0" >16</h6>
              
            </div>

            <div class="clearfix" ></div>
     


        </div>


    </div>
    <div class="col-lg-3">
        <div class="whitebg radius5 p-3" >
            <i style="margin-top: 10px;float:left;font-size:150%;color:coral" class="fa-solid fa-circle-left"></i>
            <div style="display:inline;float:left" class="ms-3 " >
             <p style="color:gray" class="mp0">Total order</p>

             <h6 style="font-weight:bold" class="mp0" >1604</h6>
              
            </div>

            <div class="clearfix" ></div>
     


        </div>


    </div>




</div>

<h5 class="mt-3" >Recent Order</h5>

<table style=" border-collapse:separate;border-spacing:0 15px;"  class="table table-borderless text-center" >

    <thead>

    <tr class="whitebg" >
        <th>Order ID</th>
        <th>Order name</th>
        <th>Phone no</th>
        <th>Order status</th>
    
        <th>Action</th>
      </tr>

  
    </thead>
    <tbody>
    @foreach(App\Models\Order::orderBy('id','desc')->take(4)->get() as $order)
  
      <tr class="whitebg"   >
        <td>{{$order->id}}</td>
        <td>{{$order->name}}</td>
        <td>{{$order->phone_no}}</td>
        <td>
            <p>
                @if($order->is_seen_by_admin)
                 <button class="btn greenBtn" >Seen</button>
                 @else
                 <button class="btn theme-btn" >Unseen</button>

                 @endif
                </p>
                <p>
                @if($order->is_completed)
                 <button class="btn greenBtn" >Completed</button>
                 @else
                 <button class="btn theme-btn" >Not Complated</button>

                 @endif
                </p>
                <p>
                 @if($order->is_paid)
                 <button class="btn greenBtn" >Paid</button>
                 @else
                 <button class="btn theme-btn" >Upaid</button>

                 @endif

               </p> 
           
          
        </td>
        <td>
        <a href="{{route('admin.order.view',$order->id)}}"  class="btn gray-btn"  >View</a>
        <a href="#deleteModal{{$order->id}}" data-toggle="modal" class=" btn theme-btn"  >Delete</a>
          <div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                  <form action="{{route('admin.order.delete',$order->id)}}" method="post" >
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


















