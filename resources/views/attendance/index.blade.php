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
           @foreach($attendances as $att)
           <th> {{ $att->date }} </th>
           @endforeach
        </thead>
        <tbody>
          @foreach($memberships as $mb)
            <tr>
              <td>
                  {{ $mb->name }}
              </td>
              @foreach($attendances as $at)
                  <td>
                    {{ $mb->attendances->att }}
                  </td>
                @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
