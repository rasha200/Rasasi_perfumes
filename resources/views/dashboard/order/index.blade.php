@extends('layouts.dashboard_master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

  <div class="pagetitle" style="margin-top: 30px;">
    <h1><i class="bi bi-cart "></i> Orders</h1>
  </div>
  
        
</div>

    
 
    
@if(session('error'))
  
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="bi bi-exclamation-octagon me-1"></i>
  {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    @if(session('success'))
   
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <!-- Table with stripped rows -->
          <table class="table datatable">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>User Name</th>
                          <th>Mobile</th>
                          <th>Total price</th>
                          <th>Order status</th>
                          <th>Date</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)
                        <tr>
                          <td>{{$order->id}}</td>

                          <td title="view">
                            <a href="{{ route('order.show', $order->id) }}"
                              style="color:#000000;"
                              onmouseover="this.style.color='#10db8c';" 
                             onmouseout="this.style.color='#000000';"  
                            title="View">
                            {{$order->user->Fname}} {{$order->user->Lname}}
                            </a>
                          </td>


                          <td>{{$order->mobile}}</td> 

                          <td>{{$order->total_price}} JOD</td>
                          
                          <td>
                            <span 
                                class="badge" 
                                style="background-color: 
                                    {{ $order->order_status == 'Pending' ? '#FFA500' : 
                                       ($order->order_status == 'Processing' ? '#007BFF' : 
                                       ($order->order_status == 'Completed' ? '#28A745' : '#000')) }};
                                    color: white; 
                                    padding: 5px 10px; 
                                    border-radius: 5px;"
                            >
                                {{ $order->order_status }}
                            </span>
                        </td>

                        <td>{{ $order->created_at->format('Y-m-d') }}</td>

                          <td> 

                            
                         

                          
                      
                          
                         


                          
                          <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline;" title="Delete" >
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger"  onclick="confirmDeletion(event, '{{ route('order.destroy', $order->id) }}')">
                              <i class="bi bi-archive"></i>
                          </button>
                        </form>
                                           
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </section>

<!-- Custom Confirmation Modal -->
<div id="confirmationModal"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div style="background: #fff; padding: 20px; border-radius: 5px; text-align: center;">
        <p>Are you sure you want to delete this order?</p>
        <button id="confirmButton" class="btn btn-outline-danger">Delete</button>
        <button id="cancelButton" class="btn btn-outline-secondary">Cancel</button>
    </div>
</div>

<script>
    function confirmDeletion(event, url) {
        event.preventDefault(); // Prevent the default form submission -. تريد منع نموذج من الإرسال عند النقر على زر الإرسال
        var modal = document.getElementById('confirmationModal');
        var confirmButton = document.getElementById('confirmButton');
        var cancelButton = document.getElementById('cancelButton');

        // Show the custom confirmation dialog
        modal.style.display = 'flex';

        // Set up the confirm button to submit the form
        confirmButton.onclick = function () {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = url;

            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            // "hidden" يُستخدم للإشارة إلى طرق مختلفة لجعل العناصر غير مرئية أو مخفية
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}'; // Laravel CSRF token
            form.appendChild(csrfToken);

            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            document.body.appendChild(form);
            form.submit();
        };

        // Set up the cancel button to hide the modal
        cancelButton.onclick = function () {
            modal.style.display = 'none';
        };
    }
</script>

@endsection