@extends('layouts.master')

@section('title')
 {{ isset($association)? 'Edit-Association' : 'Create-Association' }}
@endsection

@section('content')
  <div class="conatiner-fluid">
    <div class="card">
      <div class="card-header">
        {{  isset($association)? 'Edit Association' : 'Add Association' }}
        <a href="{{ route('associations') }}" class="btn btn-secondary btn-sm float-right mb-2"> <i class="fas fa-user"></i>Back to Associations</a>
      </div>
      <!-- CardBody -->
      <div class="card-body">
        <div class="col-md-8 container-fluid">
          <form action="{{ isset($association) ? route('update-association', $association->id) : route('store-association') }}" method="POST" class="form-group">
                 @csrf
                 @if(isset($association))
                  @method('PUT')
                 @endif
                 <div class="form-group">
                    <label for="name">Association Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Association Here" value="{{ isset($association)? $association->name : '' }}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                 </div>

                 <div class="form-group">
                   <label for="name">Association Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Association Description Here" value="{{ isset($association)? $association->description : '' }}">
                    @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                 </div>

                 <hr>
                <button type="submit" class="btn btn-success">
                    {{isset($association)? 'Edit Association' : 'Add Association'}}
                </button>

                 </div>
             </form>
        </div>
      </div>
    </div>
  </div>

@endsection
