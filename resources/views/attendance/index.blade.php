@extends('layouts.master')

@section('title')
Attendance
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      Attendance

      <a href="{{ route('create-attendance') }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-plus" ></i> Attendance</a>
    </div>

    <div class="card-body">
      <table class="table table-striped table-sm table-bordered">
        <thead>
          <th>Name</th>
          <th> <input type="date" name="date"> </th>
        </thead>
        <tbody>
          @foreach($memberships as $mb)
            <tr>
              <td>
                  {{ $mb->name }}
              </td>
                  <td>
                    TODO
                  </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
