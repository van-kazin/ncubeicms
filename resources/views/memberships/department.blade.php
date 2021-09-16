@extends('layouts.master')
@section('title')
{{ $department->name }} Members
@endsection
@section('content')

    <div class="card card-default">
        <div class="card-header font-weight-bold">
            Members in "<strong> <em>{{ $department->name }}</em> </strong>" Department
        </div>
        <div class="card-body">
            @if ($department->memberships->count() > 0)
            <table class="table table-striped table-sm">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Member ID</th>
                    <th>Display Pic</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($memberships as $key => $mb )
                        <tr>
                            <td>
                                {{ $key + 1}}
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
        {{ $memberships->appends(['search'=>request()->query('search')])->links() }}
@endsection
