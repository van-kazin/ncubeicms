@extends('layouts.master')

@section('title')
Associations
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
      <div class="card-header">
        Associations
         <a href="{{ route('create-association') }}" class="btn btn-secondary btn-sm float-right mb-2"> <i class="fas fa-plus"></i> Add Association</a>
      </div>
      <div class="card-body">
         @if($associations->count() > 0)
        <table class="table table-striped table-sm table-bordered">
         <thead>
             <th>No.</th>
             <th>Name</th>
             <th>Members</th>
             <th>Actions</th>
         </thead>
         <tbody>
           @foreach($associations as $key => $ass)
           <tr>
              <td>{{$key + 1}}</td>
               <td><a href=" {{route('association-members', $ass->id)}} "> {{$ass->name}} </a></td>
               <td>{{ $ass->memberships()->count() }}</td>
               <td>
                 <a href="{{ route('edit-association', $ass->id) }}" class="btn-sm btn-primary mr-2"> <i class="fas fa-edit "></i> </a>
                 <a onclick="handleDelete({{ $ass->id }})" class="btn-sm btn-danger mr-2"> <i class="fas fa-trash "></i> </a>
               </td>
           </tr>
           @endforeach
          </tbody>
       </table>
       @else
       <h3 class="text-center">No Associations Added Yet</h3>
       @endif
       <!-- Modal -->
        <form action="" method="POST" id="deleteAssociationForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                     <div class="modal-header">
                     <h5 class="modal-title" id="deleteModalLabel">Delete Association</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p class="text-center text-bold">Are you sure you want to delete this Association?</p>
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
        var form = document.getElementById('deleteAssociationForm')
        form.action = '/association/' + id
    }
</script>
