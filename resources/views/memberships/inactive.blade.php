@extends('layouts.master')
@section('title')
inactive Members
@endsection
@section('content')

    <div class="card card-default">
        <div class="card-header font-weight-bolder">
            Deactivated Members
            <a href="{{ route('create-member') }}" class="btn btn-success btn-sm float-right mb-2">
              Add Member
            </a>
                <a href="{{ route('members') }}" class="btn btn-success btn-sm float-right mb-2 mr-2">
                  Active members
                </a>
        </div>
        <div class="card-body">
            @if ($memberships->count() > 0)

            <table class="table table-striped table-sm">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Member ID</th>
                    <th>Display Pic</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($memberships as $mb )
                        <tr>
                            <td>
                                {{ $mb->id }}
                            </td>
                            <td>
                                {{ $mb->name }}
                            </td>
                            <td>
                                {{ $mb->member_id }}
                            </td>
                            <td>
                                 <img src="{{ asset($mb->image) }}" alt="Member Image" style="width: 40px; height:40px; border-radius: 50%;">
                            </td>
                            <td class="d-flex">
                                @if($mb->trashed())
                                     <form action="{{ route('activate-member', $mb->id) }}" method="POST">
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
                                    <button type="submit" class="btn btn-danger fas fa-trash" data-toggle="tooltip" data-placement="right" title="{{ $mb->trashed() ? 'Delete': 'Deactivate' }}" >
                                    </button>
                                </form>
                            </td>
                        </tr>
                         @endforeach
                </tbody>
            </table>
            @else
                <h3 class="text-center">No Members Added Yet</h3>
            @endif
        </div>
    </div>
    {{-- @if ($memberships->trashed)

    @else
        {{ $memberships->appends(['search'=>request()->query('search')])->links() }}
    @endif --}}
@endsection
