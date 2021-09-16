@extends('layouts.master')

@section('title')
Chats
@endsection
@section('content')
<meta name="friendId" content="{{ $friend->id }}">
<div class="container-fluid">
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <a class="btn btn-secondary btn-block mb-3">Chat Friends</a>
        <div class="card">
          <div class="card-body p-0">
            @foreach($friends as $frnd)
            <ul class="nav nav-pills flex-column">
              <li class="nav-item active">
                <a href="{{ route('show-chat', $frnd->id) }}" class="nav-link">
                  <img src="{{ asset($frnd->profile->avatar) }}" alt="user-image" style="height: 30px; width: 30px; border-radius: 50%;">
                   &nbsp;&nbsp;&nbsp;&nbsp;{{ $frnd->name }}
                  <span class="badge bg-primary float-right">12</span>
                </a>
              </li>
            </ul>
            @endforeach
          </div>
          <!-- /.card-body -->
        </div>
        <form class="" action="{{ route('add-friend') }}" method="post">
          @csrf
        <a disabled class="btn btn-secondary btn-block mb-3">Select Friend to Add</a>
        <div class="card">
          <div class="card-body p-0">
          <select class="form-control" name="friend_id">
            <option value="">Choose friend to add</option>
             @foreach($users as $u)
              <option value="{{ $u->id }}">{{ $u->name }}</option>
             @endforeach
          </select>
          </div>
          <!-- /.card-body -->
        </div>
        <button type="submit" class="btn btn-success fas fa-user-plus btn-sm pt-mb-3"> Add</button>
      </form>

      </div>
      <!-- /.col -->
      <div class="col-md-9">

        <!-- Set as dynamic Part -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Chats with {{ $friend->name }}</h3>
          </div>
          <div class="card-body p-0">
            <ul class="chat">
                <li class="left clearfix">
                    <div class="chat-body clearfix">
                      <div class="panel-body">
                          <chat-messages :messages="messages"></chat-messages>
                      </div>
                    </div>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
