@extends('layouts.master')

@section('title')
Members
@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header font-weight-bolder">
        Members
      <a href="{{ route('create-member') }}" class="btn btn-secondary btn-sm float-right mb-2">
        <i class="fas fa-user fa-fw"></i>
        Add Member
      </a>
        <a href="{{ route('inactive-members') }}" class="btn btn-secondary btn-sm float-right mb-2 mr-2">
          <i class="fas fa-user-times fa-fw"></i>
          Inactive members
        </a>
      </div>
    <!-- card Body -->
      <div class="card-body">
        @if ($memberships->count() > 0)
            <table class="table table-striped table-bordered table-hover thead-dark table-sm">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Member ID</th>
                    <th>Display Pic</th>
                    <th>Actions</th>
                    <th>More</th>
                </thead>
                <tbody>
                    @foreach($memberships as $key =>$mb )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mb->name }}</td>
                            <td>{{ $mb->member_id }}</td>
                            <td>
                                 <img src="{{ asset($mb->image) }}" alt="Member Image" style="width: 30px; height:25px; border-radius: 50%;">
                            </td>
                            <td>
                              @if($mb->trashed())
                                   <form action="" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <button type="submit" class="btn btn-primary btn-sm mr-1" data-toggle="tooltip" data-placement="right" title="Restore Member"><i class="fas fa-window-restore"></i></button>
                                   </form>
                              @else
                                <form action="{{ route('delete-member', $mb->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <a href="{{ route('show-member', $mb->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="More Info"> <i class="fas fa-info"></i> </a>
                                         <a href="{{ route('edit-member', $mb->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"> <i class="fas fa-edit"></i> </a>
                                  @endif
                                    <button type="submit" class="btn btn-danger fas fa-toggle-off" data-toggle="tooltip" data-placement="right" title="{{ $mb->trashed() ? 'Delete': 'Deactivate' }}" >
                                    </button>
                                </form>
                            </td>
                            <td></td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
            @else
                <h3 class="text-center">No Members Added Yet</h3>
            @endif
      </div>
  </div>
</div>
@endsection
