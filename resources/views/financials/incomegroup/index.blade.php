@extends('layouts.master')

@section('title')
Income Groups
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      Income Groups
      <a href="{{ route('create-incomegroup') }}" class="btn btn-sm btn-secondary float-right"> <i class="fas fa-plus" ></i> Add New </a>
  
    </div>

    <div class="card-body">
       @if($incomegroups->count() > 0)
      <table class="table table-striped table-sm table-bordered">
       <thead>
           <th>No.</th>
           <th>Name</th>
           <th>Number of records</th>
           <th>Actions</th>
       </thead>
       <tbody>
         @foreach($incomegroups as $key => $icmgrp)
         <tr>
            <td>{{$key + 1}}</td>
             <td>
              {{ $icmgrp->name }}
             </td>
             <td>
                Number
             </td>
             <td>
               <a href="{{ route('edit-incomegroup', $icmgrp->id) }}" class="btn-sm btn-primary mr-2"> <i class="fas fa-edit "></i> </a>
               <a onclick="handleDelete({{ $icmgrp->id }})" class="btn-sm btn-danger mr-2"> <i class="fas fa-trash "></i> </a>
             </td>
         </tr>
         @endforeach
        </tbody>
     </table>
     @else
     <h3 class="text-center">No Income groups Added Yet</h3>
     @endif
     <!-- Modal -->
      <form action="" method="POST" id="deleteIncomegroupForm">
        @csrf
        @method('DELETE')
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                   <div class="modal-header">
                   <h5 class="modal-title" id="deleteModalLabel">Delete Income group</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <p class="text-center text-bold">Are you sure you want to delete this income group ?</p>
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
@endsection


<script>
    function handleDelete(id){
        $('#deleteModal').modal('show')
        var form = document.getElementById('deleteIncomegroupForm')
        form.action = '/incomegroup/' + id
    }
</script>
