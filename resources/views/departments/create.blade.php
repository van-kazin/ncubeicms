@extends('layouts.master')

@section('title')
 {{ isset($department)? 'Edit-Department' : 'Create-Department' }}
@endsection

@section('content')
  <div class="conatiner-fluid">
    <div class="card">
      <div class="card-header">
        {{  isset($department)? 'Edit Department' : 'Add Departments' }}
        <a href="{{ route('departments') }}" class="btn btn-secondary btn-sm float-right mb-2"> <i class="fas fa-user"></i>Back to Departments</a>
      </div>
      <!-- CardBody -->
      <div class="card-body">
        <div class="col-md-8 container-fluid">
          <form action="{{ isset($department) ? route('update-department', $department->id) : route('store-department') }}" method="POST" class="form-group">
                 @csrf
                 @if(isset($department))
                  @method('PUT')
                 @endif
                 <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Department Here" value="{{ isset($department)? $department->name : '' }}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                 </div>

                 <div class="form-group">
                   <label for="name">Department Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Department Description Here" value="{{ isset($department)? $department->description : '' }}">
                    @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                 </div>

                 <hr>
                <button type="submit" class="btn btn-success">
                    {{isset($department)? 'Edit Department' : 'Add Department'}}
                </button>

                 </div>
             </form>
        </div>
      </div>
    </div>
  </div>

@endsection
