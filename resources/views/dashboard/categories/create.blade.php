@extends('layouts.dashboard_master')



@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">

  <div class="pagetitle" style="margin-top: 30px;">
    <h1><i class="bi bi-grid"></i> Add new category</h1>
  </div>
  
      
      
</div>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif


<div class="card">
  <div class="card-body">
    
    <h5 class="card-title"></h5>
                   
                    <form class="row g-3" action="{{ route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="col-12">
                        <label for="exampleInputName1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}" required>
                      </div>

                      <div class="col-12">
                            <label for="image" class="form-label">Choose Category Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                      </div>

                      <div class="text-center">
                      <button type="submit" class="btn btn-info">Create</button>
                      <a href="{{route('categories.index')}}" class="btn btn-secondary">Cancel</a>
                      </div>
                    </form>
                  </div>
                </div>
              

@endsection