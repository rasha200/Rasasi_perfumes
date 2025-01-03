@extends('layouts.dashboard_master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

  <div class="pagetitle" style="margin-top: 30px;">
    <h1><i class="bi bi-stack"></i> Sub Categories</h1>
  </div>
  
        <a href="{{ route('subCategories.create') }}" style="margin-top: 30px;">
            <button type="button" class="btn btn-info">
                <i class="zmdi zmdi-plus"></i> Add new sub category
            </button>
        </a>
      
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
                          <th>Name</th>
                          <th>Category name</th>
                          <th>Image</th>
                          <th>Discount</th>
                          
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($Subcategories as $Subcategory)
                        <tr>
                          <td>{{$Subcategory->id}}</td>
                          <td title="view">
                            <a href="#" 
                            class="view-subcategory" 
                            data-bs-toggle="modal" 
                            data-bs-target="#subcategoryDetailsModal" 
                            data-name="{{ $Subcategory->name }}" 
                            data-image="{{ asset('uploads/subcategory/' . $Subcategory->image) }}"
                            data-category="{{ $Subcategory->category->name }}"
                            data-discount="{{ $Subcategory->discount ?? 'No discount available' }}"
                            style="color:#000000;" 
                            onmouseover="this.style.color='#10db8c';" 
                            onmouseout="this.style.color='#000000';">
                             {{$Subcategory->name}}
                         </a>
                            </td>
                            <td>{{$Subcategory->category->name}}</td>

                          <td>
                          @if($Subcategory->image)
                          
                            <img src="{{ asset('uploads/subcategory/' . $Subcategory->image) }}" alt=" Sub Category Image" style="width: 50px; height: 40px;"></td>
                          @else
                              <span>No Image</span>
                          @endif

                          @if($Subcategory->discount)
                          <td>{{$Subcategory->discount}}%</td>
                          @else
                          <td></td>
                          @endif

                          
                          <td> 

                          


                          
                          <a href="{{ route('subCategories.edit', $Subcategory->id) }}"  title="Edit">
                          <button type="button" class="btn btn-info">
                            <i class="bi bi-pencil"></i>
                          </button>
                          </a>
                          
                          <form action="{{ route('subCategories.destroy', $Subcategory->id) }}" method="POST" style="display:inline;" title="Delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"  onclick="confirmDeletion(event, '{{ route('subCategories.destroy', $Subcategory->id) }}')">
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



  <!-- View modal -->        
  <div class="modal fade" id="subcategoryDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subcategoryModalTitle">Subcategory Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Subcategory Name:</strong> <span id="subcategoryName"></span></p>
                <p><strong>Category:</strong> <span id="subcategoryCategory"></span></p>
                <p><strong>Discount:</strong> <span id="subcategoryDiscount"></span></p>
                <div id="subcategoryImageContainer">
                    <img id="subcategoryImage" src="" alt="Subcategory Image" style="width: 100%; border-radius: 8px; height:400px;">
                </div>
                <span id="noImageText" style="color: #666; font-style: italic; display: none;">No image</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.view-subcategory').forEach(link => {
          link.addEventListener('click', function () {
              // Get subcategory data
              const name = this.getAttribute('data-name');
              const image = this.getAttribute('data-image');
              const category = this.getAttribute('data-category');
              const discount = this.getAttribute('data-discount');

              // Populate modal fields
              document.getElementById('subcategoryName').textContent = name;
              document.getElementById('subcategoryCategory').textContent = category;

              // Check if discount exists and append %
              const discountElement = document.getElementById('subcategoryDiscount');
              if (discount && discount.trim() !== "") {
                  discountElement.textContent = discount + "%";
              } else {
                  discountElement.textContent = "No Discount";
              }

              const subcategoryImage = document.getElementById('subcategoryImage');
              const noImageText = document.getElementById('noImageText');
              const subcategoryImageContainer = document.getElementById('subcategoryImageContainer');

              if (image && !image.includes('No image')) {
                  subcategoryImage.src = image;
                  subcategoryImageContainer.style.display = 'block';
                  noImageText.style.display = 'none';
              } else {
                  subcategoryImageContainer.style.display = 'none';
                  noImageText.style.display = 'block';
              }
          });
      });
  });
</script>





<!-- Custom Confirmation Modal -->
<div id="confirmationModal"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div style="background: #fff; padding: 20px; border-radius: 5px; text-align: center;">
        <p>Are you sure you want to delete this sub category?</p>
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