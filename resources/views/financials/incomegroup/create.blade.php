@extends('layouts.master')

@section('title')
 {{ isset($incomegroup)? 'Edit-Income group' : 'Create-Income group' }}
@endsection

@section('content')
  <div class="conatiner-fluid">
    <div class="card">
      <div class="card-header">
        {{  isset($incomegroup)? 'Edit Income Group' : 'Add Income Group' }}
        <a href="{{ route('incomegroups') }}" class="btn btn-secondary btn-sm float-right mb-2"> <i class="fas fa-arrow-left"></i>Back to Income Groups</a>
      </div>
      <!-- CardBody -->
      <div class="card-body">
        <div class="col-md-8 container-fluid">
          <form action="{{ isset($incomegroup) ? route('update-incomegroup', $incomegroup->id) : route('store-incomegroup') }}" method="POST" class="form-group">
                 @csrf
                 @if(isset($incomegroup))
                  @method('PUT')
                 @endif
                 <div class="form-group">
                    <label for="name">Income group Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Income Group Here" value="{{ isset($incomegroup)? $incomegroup->name : '' }}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                 </div>

                 <div class="form-group">
                   <label for="name">Income Group Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Income Group Description Here" value="{{ isset($incomegroup)? $incomegroup->description : '' }}">
                    @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                 </div>

                 <hr>
                <button type="submit" class="btn btn-success">
                    {{isset($incomegroup)? 'Edit Income Group' : 'Add Income Group'}}
                </button>

                 </div>
             </form>
        </div>
      </div>
    </div>
  </div>

@endsection
