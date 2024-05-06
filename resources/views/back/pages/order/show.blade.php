


@extends('back.layouts.master')


@section('content')
  
   

    <div style="margin-bottom: 20px;" class="whitebg radius5 p-3" >
      <h4>Manage Orders</h4>
    </div>



      <table style=" border-collapse:separate;border-spacing:0 15px;" id="datatTable" class="table table-borderless text-center" >

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
        @foreach($orders as $order)
      
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

