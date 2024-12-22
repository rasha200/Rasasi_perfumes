@extends('layouts.dashboard_master')


@section('content')
<div class="card">
<div class="card-body" style="border: 1px solid #e7dee9;">
        
        <p align="center" style="margin-top: 50px;"><strong>{{ $order->id }}</strong> </p>

   

        


        <div class="accordion accordion-flush" id="accordionFlushExample" style="margin-bottom:30px;">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
               User Information
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><p><strong>User name:</strong> {{$order->user->Fname}} {{$order->user->Lname}}</p></div>
              <div class="accordion-body"><p><strong>Email:</strong> {{ $order->email }}</p></div>
              <div class="accordion-body"> <p><strong>Mobile number:</strong> {{ $order->mobile }}</p></div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Location
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><p><strong>City:</strong> {{ $order->city }} </p></div>
              <div class="accordion-body"><p><strong>Street:</strong>  {{ $order->street }} </p></div>
              <div class="accordion-body"><p><strong>Building number:</strong>   {{ $order->building_number }}</p></div>

            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Order information
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"><p><strong>Total price:</strong>  {{ $order->total_price }} </p></div>
              <div class="accordion-body"> <p><strong>Order status:</strong>  {{ $order->order_status }} </p></div>
              <div class="accordion-body"><p><strong>Note:</strong>  {{ $order->note }} </p></div>
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
              @foreach($orderDetails as $order)
              <tr>
                <td>{{$order->id}}</td>

                <td> {{$order->product->name}} </td>

                <td>
                  @if($order->product->product_images->isNotEmpty())
      
                  <img src="{{ asset($order->product->product_images[0]->image) }}"  style="width: 50px; height: 40px; " />
              @else
                  <span>No image available</span>
              @endif
              </td> 

                <td>{{$order->product->subCategory->category->name}} - {{$order->product->subCategory->name}}</td> 

                <td>{{$order->quantity}}</td>
                
                <td>{{$order->price}}</td>

                <td>{{$order->discount}}</td>

                <td>{{$order->total_price}}</td>

              </tr>
              @endforeach
            </tbody>
          </table>

       
    
        <a href="{{ route('order.index') }}" class="btn btn-info btn-fw" style="margin-top:30px;">Back to list</a>
       
    </div>
</div>
@endsection