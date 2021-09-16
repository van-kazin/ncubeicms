@extends('layouts.master')
@section('title')
  Church Settings
@endsection
@section('content')
  <div class="container-fluid">
    <div class="card ">
      <div class="card-header">
          <h3 class="text-align-center">Church Profile  Settings</h3>
      </div>
    <!--  church information  -->
    <div class="card-body">
        <form action="{{ route('update-church-profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row form-group col-md-10 justify-content-left ml-5">
                <h2 class="text-left text center"> <i class="fas fa-home"></i> Church Details</h2>
            </div>
            <!--  church name  -->
            <div class="form-row justify-content-center">
                <div class="form-group col-md-5">
                    <label for="church_name">Church Name</label>
                    <input type="text" name="church_name" id="church_name" class="form-control" value="{{ $churchSettings->church_name }}" placeholder="Enter Church Name">
                </div>
                <!--  assembly name  -->
                <div class="form-group col-md-5">
                    <label for="assembly_name">Church Assembly Name</label>
                    <input type="text" name="assembly_name" id="assembly_name" class="form-control" value="{{ $churchSettings->assembly_name }}" placeholder="Enter Church Assembly Name">
                </div>
            </div>
            <!--  church logo  -->
            <div class="form-row justify-content-center">
                <div class="form-group col-md-10">
                    <label for="church_logo">Church Logo</label>
                    <input type="file" name="church_logo" id="church_logo" class="form-control">
                </div>
            </div>
            <hr>
            <!--  Church Address  -->
            <div class="form-row form-group col-md-10 justify-content-left ml-5">
                <h2 class="text-left text center"> <i class="fas fa-address-book"></i> Church Address</h2>
            </div>
            <!--  church box no.  -->
            <div class="form-row justify-content-center">
                <div class="form-group col-md-5">
                    <label for="church_box_no">Church Box Number</label>
                    <input type="text" name="church_box_no" id="church_box_no" class="form-control" value="{{ $churchSettings->church_box_no }}" placeholder="Enter Church Box Number">
                </div>
                <!--  church location  -->
                <div class="form-group col-md-5">
                    <label for="church_location">Church Location</label>
                    <input type="text" name="church_location" id="church_location" class="form-control" value="{{ $churchSettings->church_location }}" placeholder="Enter City or Town of Church">
                </div>
            </div>
            <!--  Church Phone Number  -->
            <div class="form-row justify-content-center">
                <div class="form-group col-md-5">
                    <label for="church_phone">Church Phone Number</label>
                    <input type="text" name="church_phone" id="church_phone" class="form-control" value="{{ $churchSettings->church_phone }}" placeholder="Enter Church Phone Number">
                </div>
                <!--  church Email  -->
                <div class="form-group col-md-5">
                    <label for="church_email">Church Email</label>
                    <input type="text" name="church_email" id="church_email" class="form-control" value="{{ $churchSettings->church_email }}" placeholder="Enter Church Email Address">
                </div>
            </div>
            <!--  church website  -->
            <div class="form-row justify-content-center">
                <div class="form-group col-md-10">
                    <label for="church_logo">Church Website URL</label>
                    <input type="text" name="church_website" id="church_website" class="form-control" value="{{ $churchSettings->church_website }}" placeholder="Enter link to Church Website i.e (https://www.peekay.dev)">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-5">
                    <button type="submit" class="btn btn-success ml-5">
                      <i class="fas fa-check"></i>  Update Profile
                    </button>
                </div>
            </div>
        </form>
    </div>
  </div>
  </div>
@endsection
