@extends('layouts.master')
@section('title')
  Conversations
@endsection

@section('content')
<meta name="friendId" content="{{ $friend->id }}">
<div class="col-md-10">

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
@endsection
