@extends('layouts.master')

@section('title')
 {{ isset($user)? 'Edit-User' : 'Create-User' }}
@endsection

@section('content')
  <div class="conatiner-fluid">
    <div class="card">
      <div class="card-header">
        {{  isset($user)? 'Edit User' : 'Add User' }}
        <a href="{{ route('users') }}" class="btn btn-secondary btn-sm float-right mb-2"> <i class="fas fa-users"></i>Back to Users</a>
      </div>
      <!-- CardBody -->
      <div class="card-body">
        <div class="col-md-8 container-fluid">
          <form action="{{ isset($user) ? route('update-user', $user->id) : route('store-user') }}" method="POST" class="form-group">
                 @csrf
                 @if(isset($user))
                  @method('PUT')
                 @endif
                 <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter User Name Here" value="{{ isset($user)? $user->name : '' }}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                 </div>

                 <div class="form-group">
                   <label for="name">User Email</label>
                    <input type="email" class="form-control" name="email" id="emal" placeholder="Enter User Email Here" value="{{ isset($user)? $user->email : '' }}">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                 </div>

                 <div class="form-group">
                   <label for="name">User Role</label>
                   <select class="form-control" name="role" id="role" value="">
                     <option>{{ isset($user) ? $user->role : 'Select user role' }}</option>
                     <option value="Admin">Admin</option>
                     <option value="Supervisor">Supervisor</option>
                     <option value="User">User</option>
                   </select>
                 </div>

                 <div class="form-group">
                     <label for="permissions">Assign Permission</label>
                     <select name="permissions[]" id="permissions" class="form-control permission-selector" multiple>
                       @foreach ($permissions as $perm)
                            <option value="{{ $perm->id }}"
                              @if(isset($user))
                                 @if($user ->hasPermissions($perm->id))
                                     selected
                                 @endif
                               @endif
                               >
                                {{ $perm->name }}
                            </option>
                       @endforeach
                     </select>
                 </div>

                 <!-- Password Update (Only for edit Mode) -->
                 @if(isset($user))
                   <div class="form-group">
                     <label for="name">Change Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Click only if you want to change user password" autocomplete="new-password">
                   </div>
                   @error('password')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                   @enderror
                 @endif

                 <hr>
                <button type="submit" class="btn btn-success">
                    {{isset($user) ? 'Edit User' : 'Add User'}}
                </button>

                 </div>
             </form>
        </div>
      </div>
    </div>
  </div>
@endsection
