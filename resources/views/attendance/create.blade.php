@extends('layouts.master')

@section('title')
attendance
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      Mark attendance
    </div>

    <div class="card-body small">
      <form class="" action="{{ route('store-attendance') }}" method="post">
        @csrf
          <table class="table table-sm table-striped table-bordered">
            <thead>
              <th>Name</th>
              <th>Date- <input type="date" name="date" value=""> </th>
            </thead>
            <tbody>
              @foreach($memberships as $mb)
              <tr>
                <td>
                  {{ $mb->name }}
                </td>
                <td>
                  <span>Present</span>
                  <input type="checkbox" name="attendance[{{ $mb->id }}]" value="present">
                  &nbsp;&nbsp;&nbsp;
                  <span>Absent</span>
                  <input type="checkbox" name="attendance[{{ $mb->id }}]" value="absent">
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <button type="submit" name="button" class="btn btn-sm btn-success"> <i class="fas fa-check"></i> Add</button>
      </form>
    </div>
  </div>
</div>
@endsection
