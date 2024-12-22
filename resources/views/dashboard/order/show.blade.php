@extends('layouts.dashboard_master')


@section('content')
<div class="card">
<div class="card-body" style="border: 1px solid #e7dee9;">
        
        <p align="center" style="margin-top: 50px;"><strong>{{ $order->id }}</strong> </p>

   

        


        <div class="accordion" id="accordionFlushExample" style="margin-bottom:30px;">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
               User Information
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><strong>User name:</strong> {{$order->user->Fname}} {{$order->user->Lname}}</div>
              <div class="accordion-body"><strong>Email:</strong> {{ $order->email }}</div>
              <div class="accordion-body"><strong>Mobile number:</strong> {{ $order->mobile }}</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Location
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><strong>City:</strong> {{ $order->city }} </div>
              <div class="accordion-body"><strong>Street:</strong>  {{ $order->street }} </div>
              <div class="accordion-body"><strong>Building number:</strong>   {{ $order->building_number }}</div>

            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Order information
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              
              <div class="accordion-body"> <strong>Order status:</strong>  {{ $order->order_status }} </div>
              <div class="accordion-body"><strong>Note:</strong>  {{ $order->note }} </div>
              <div class="accordion-body"><strong>Total price:</strong>  {{ $order->total_price }} </div>
            </div>
          </div>
        </div><!-- End Accordion without outline borders -->




        <table class="table datatable" >
            <thead>
              <tr>
                <th>Id</th>
                <th>Product name</th>
                <th>Image</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>price</th>
                <th>discount</th>
                <th>Total price</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach($orderDetails as $orderDetail)
              <tr>
                <td>{{$orderDetail->id}}</td>

                <td> {{$orderDetail->product->name}} </td>

                <td>
                  @if($orderDetail->product->product_images->isNotEmpty())
      
                  <img src="{{ asset($orderDetail->product->product_images[0]->image) }}"  style="width: 50px; height: 40px; " />
              @else
                  <span>No image available</span>
              @endif
              </td> 

                <td>{{$orderDetail->product->subCategory->category->name}} - {{$orderDetail->product->subCategory->name}}</td> 

                <td>{{$orderDetail->quantity}}</td>
                
                <td>{{$orderDetail->price}}</td>

                <td>{{$orderDetail->discount}}</td>

                <td>{{$orderDetail->total_price}}</td>

              </tr>
              @endforeach
            </tbody>
          </table>

       
          <div class="modal-footer">

            <form action="{{ route('order.update', $order->id) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('PUT')
              <input type="hidden" name="order_status" value="Processing">
              <button type="submit" class="btn btn-info btn-fw">Set to Processing</button>
          </form>
          
          <form action="{{ route('order.update', $order->id) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('PUT')
              <input type="hidden" name="order_status" value="Completed">
              <button type="submit" class="btn btn-info btn-fw">Set to Completed</button>
          </form>
          

        <a href="{{ route('order.index') }}" class="btn btn-info btn-fw" style="margin-top:30px;">Back to list</a>
      </div>
    </div>
</div>
@endsection