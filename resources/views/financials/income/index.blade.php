@extends('layouts.master')

@section('title')
Incomes
@endsection

@section('content')
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        Income Management

        <a href="{{ route('create-income') }}" class="btn btn-secondary btn-sm float-right"> <i class="fas fa-plus"></i> Add New </a>

        <a class="btn btn-sm float-right mr-2 btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-download"></i> Export As
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Excel file</a>
          <a class="dropdown-item" href="#">Pdf file</a>
        </div>
      </div>
      <!-- CardBody -->
      <div class="card-body">
        @if($incomes->count() > 0)
        <table class="table table-striped table-sm table-bordered">
          <thead>
              <th>No</th>
              <th>Member Name</th>
              <th>Income group</th>
              <th>Pament Date</th>
              <th>Amount</th>
              <th>Actions</th>
          </thead>
          <tbody>
            @foreach($incomes as $key => $icm)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $icm->membership->name }} [ {{ $icm->membership->member_id }} ]</td>
                <td>{{ $icm->incomegroup->name }}</td>
                <td>{{ $icm->date }}</td>
                <td>{{ $icm->amount }}</td>
                <td>
                  <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                  <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                  <a href="#" class="btn btn-sm btn-success"><i class="fas fa-arrow-down"></i></a>
                  <a onclick="handleDelete({{ $icm->id }})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @else
          No Income Records created yet
        @endif
        <!-- Modal -->
        <form action="" method="POST" id="deleteIncomeForm">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
             <div class="modal-header">
             <h5 class="modal-title" id="deleteModalLabel">Delete Income Record</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <p class="text-center text-bold">Are you sure you want to delete this Income record?</i> </p>
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
          var form = document.getElementById('deleteIncomeForm')
          form.action = '/income/' + id
      }
  </script>
@endsection
