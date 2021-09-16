@extends('layouts.master')

@section('title')
User-profile
@endsection

@section('content')
<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset($user->profile->avatar)}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
              <p class="text-muted text-center">{{$user->role}}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#profile" data-toggle="tab">
                    <i class="fas fa-user"></i>
                  Profile
                </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#timeline" data-toggle="tab">
                    <i class="fas fa-user-cog"></i>
                    Edit Profile
                  </a>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <!-- Profile Tab Content -->
                  <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">About  {{ Auth::user()->name }} </h3>
                  </div>
                  <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Name</strong>
                <p class="text-muted">
                  {{$user->name}}
                </p>

                <hr>

                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                <p class="text-muted">{{$user->email}}</p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                <p class="text-muted">{{ $user->profile->phone }}</p>

                <hr>

                <strong><i class="fas fa-calendar mr-1"></i> Date of Birth</strong>
                <p class="text-muted">{{ $user->profile->dob }}</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> About</strong>
                <p class="text-muted">{{ $user->profile->about }}</p>
              </div>
              <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.tab-pane -->
                <!-- Edit Profile Tab Pane -->
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <form class="form-horizontal" action="{{ route('user-profile-update') }}" method="post" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')

                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $user->name }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="avatar" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="avatar" id="avatar">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="{{ $user->profile->phone }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="about" class="col-sm-2 col-form-label">About</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="about" id="about" placeholder="About">{{ $user->profile->about }}</textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="dob" id="dob" value="{{ $user->profile->dob }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password" id="password" autocomplete="new-password">
                        </div>
                      </div>

                    <hr>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-secondary">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
@endsection
