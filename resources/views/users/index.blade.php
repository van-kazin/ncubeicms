@extends('layouts.master')

@section('title')
Users
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
      <div class="card-header">
        Users
         <a href="{{ route('create-user') }}" class="btn btn-secondary btn-sm float-right mb-2"> <i class="fas fa-user-plus"></i> Add User</a>

          <a href="{{ route('roles') }}" class="btn btn-secondary btn-sm float-right mb-2 mr-2"> <i class="fas fa-tasks"></i> Roles & Permissions </a>

      </div>

      <div class="card-body">
         @if($users->count() > 0)
        <table class="table table-striped table-sm table-bordered">
         <thead>
             <th>No.</th>
             <th>Image</th>
             <th>Name</th>
             <th>Email</th>
             <th>Role</th>
             <th>Actions</th>
         </thead>
         <tbody>
           @foreach($users as $key => $user)
           <tr>
              <td>{{$key + 1}}</td>
               <td>
                 <img src="img/mh.jpg" alt="User Avatar" style="width: 30px; height: 30px; border-radius: 50%">
               </td>
               <td>
                  {{$user->name}}
               </td>
               <td>
                   {{$user->email}}
               </td>
               <td>
                  {{$user->role}}
               </td>
               <td>
                 <a href="#" class="btn-sm btn-secondary mr-2"> <i class="fas fa-eye "></i> </a>
                 <a href="{{ route('edit-user', $user->id) }}" class="btn-sm btn-primary mr-2"> <i class="fas fa-edit "></i> </a>
                 <a onclick="handleDelete({{ $user->id  }})" class="btn-sm btn-danger mr-2"> <i class="fas fa-trash "></i> </a>
               </td>
           </tr>
           @endforeach
          </tbody>
       </table>
       @else
       <h3 class="text-center">No Users Added Yet</h3>
       @endif
       <!--Delete Modal -->
               <form action="" method="POST" id="deleteUserForm">
                   @csrf
                   @method('DELETE')
                   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                   <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                     <p class="text-center text-bold">Are you sure you want to delete <i>{{$user->name}}?</i> </p>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                   </div>
               </div>
               </div>
               </form>
      </div>
  </div>
</div>

<script>
  function handleDelete(id){
      $('#deleteModal').modal('show')
      var form = document.getElementById('deleteUserForm')
      form.action = '/user/' + id
  }
</script>
@endsection
