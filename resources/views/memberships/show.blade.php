@extends('layouts.master')

@section('title')
{{ $membership->name }}
@endsection
@section('content')
    <!-- Member Details Dispaly Page -->
        <div class="card">

            <div class="row no-gutters col-md-12 justify-content-center" style="background-color: #DAA520;">
                <!-- church logo -->
                <div class="col-md-8">
                    <div class="">
                        <div class="row no-gutters">
                          <div class="col-md-3">
                            <img src="{{ asset($churchSetting->church_logo) }}" class="card-img" alt="...">
                          </div>
                          <div class="col-md-5">
                            <div class="card-body">
                              <h5 class="tm-title">{{ $churchSetting->church_name }}</h5>
                              <h5 class="tm-title">{{ $churchSetting->assembly_name }}</h5>
                            </div>
                          </div>
                        </div>
                      </div>
            </div>
                <div class="col-md-4 float-right">
                    <!-- Address church info -->
                    <div class="card-body float-right">
                        <h6 class="bold"><i class="fas fa-home"></i> {{ $churchSetting->church_name }}</h6>
                        <h6 class="bold"><i class="fas fa-address-card"></i> {{ $churchSetting->church_box_no }} </h6>
                        <h6 class="bold"><i class="fas fa-map-marker"></i> {{ $churchSetting->church_location }} </h6>
                        <h6 class="bold"><i class="fas fa-phone"></i> {{ $churchSetting->church_phone }}  </h6>
                        <h6 class="bold"><i class="fas fa-envelope"></i> {{ $churchSetting->church_email }}  </h6>
                        <h6 class="bold"><i class="fas fa-link"></i> {{ $churchSetting->church_website }}  </h6>
                    </div>
                </div>
            </div>
            <hr style="border: 1px solid black;">

            <!-- Basic Info & Picture Display -->

            <div class="row no-gutters col-md-10 justify-content-center">
                <div class="col-md-9">
                    <h3 class=" tm-title bold " > <i class="fas fa-user"></i>  Basic Information</h3>
                    <hr>
                </div>
                <div class="col-md-1">
                    <div class="row text-align-right">
                            <img src="{{ asset($membership->image) }}" class="tm-border float-right" alt="Member profile" style="height: 50px; width: 80px; border-radius: 30%;">
                    </div>
                </div>
            </div>

            <div class="row no-gutters col-md-10 justify-content-center">
                <div class="col-md-10">
                    <div class="card-body ml-3" style="text-align: left;">
                      <div class="row no-gutters">
                            <div class="col-md-8">
                                <p class="card-text">Member ID:&nbsp <b>{{ $membership->name }}</b> </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text">Member ID:&nbsp <b>{{ $membership->member_id }}</b> </p>
                            </div>
                        </div>

                        <div class="row no-gutters">
                            <div class="col-md-8">
                                <p class="card-text">Gender:&nbsp <b>{{ $membership->gender }}</b> </p>
                            </div>
                            <div class="col-md-4">
                                <p class="card-text">Date of Birth:&nbsp  <b>{{ $membership->birthdate }}</b> </p>
                            </div>
                        </div>
                        <p class="card-text">Languages Spoken:&nbsp <b class="badge badge-pill">  @foreach($membership->language as
                           $lang)
                                {{ $lang }}
                          @endforeach</b>
                      </p>
                    </div>
                </div>
            </div>

             <!-- Contact Information -->
             <div class="row no-gutters justify-content-center">
                <div class="col-md-10">
                    <div class="card-body ml-3" style="text-align: left;">
                     <h3 class="tm-title bold "><i class="fas fa-phone"></i>  Contact Information</h3>
                     <hr>
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <p class="card-text">Resident Address:&nbsp <b>{{ $membership->houseaddress }}</b> </p>
                            </div>
                             <div class="col-md-5">
                                <p class="card-text">Hometown:&nbsp <b>{{ $membership->hometown }}</b> </p>
                            </div>
                        </div>
                         <div class="row no-gutters">
                            <div class="col-md-5">
                                <p class="card-text">Phone number:&nbsp <b>{{ $membership->phone }}</b> </p>
                            </div>
                             <div class="col-md-5">
                                <p class="card-text">Email Address:&nbsp <b>{{ $membership->email }}</b> </p>
                            </div>
                        </div>
                         <div class="row no-gutters">
                            <div class="col-md-5">
                                <p class="card-text">Marital Status:&nbsp <b>{{ $membership->marital_status }}</b> </p>
                            </div>
                             <div class="col-md-5">
                                <p class="card-text">Name of Spouse:&nbsp <b>{{ $membership->spouse_name }}</b> </p>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <p class="card-text">Children:&nbsp <b>{{ $membership->children }}</b> </p>
                        </div>
                         <div class="row no-gutters">
                            <div class="col-md-5">
                                <p class="card-text">Father's Name:&nbsp <b>{{ $membership->father_name }}</b> </p>
                            </div>
                             <div class="col-md-5">
                                <p class="card-text">Mother's Name:&nbsp <b>{{ $membership->mother_name }}</b> </p>
                            </div>
                        </div>
                         <div class="row no-gutters">
                            <p class="card-text">Next of Kin:&nbsp <b>{{ $membership->nextofkin }}</b> </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Educational Information -->
             <div class="row no-gutters justify-content-center">
                <div class="col-md-10">
                    <div class="card-body ml-3" style="text-align: left;">
                        <h3 class="tm-title bold "><i class="fas fa-graduation-cap"></i> Educational Information</h3>
                        <hr>
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <p class="card-text">Educational Level:&nbsp <b>{{ $membership->educational_level }}</b> </p>
                            </div>

                            <div class="col-md-5">
                                <p class="card-text">School Name:&nbsp <b>{{ $membership->school }}</b> </p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


             <!-- Occupational Information -->
             <div class="row no-gutters justify-content-center">
                <div class="col-md-10">
                    <div class="card-body ml-3" style="text-align: left;">
                        <h3 class="tm-title bold "><i class="fas fa-briefcase"></i> Occupational Information</h3>
                        <hr>
                        <div class="row no-gutters">

                             <div class="col-md-5">
                                <p class="card-text">Employment Status:&nbsp <b>{{ $membership->employment_status }}</b> </p>
                            </div>
                            <div class="col-md-5">
                                <p class="card-text">Occupation:&nbsp <b>{{ $membership->profession }}</b> </p>
                            </div>
                        </div>
                         <div class="row no-gutters">

                            <div class="col-md-10">
                                <p class="card-text">Place of Work :&nbsp <b>{{ $membership->placeofwork }}</b> </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Church Information -->
             <div class="row no-gutters justify-content-center">
                <div class="col-md-10">
                    <div class="card-body ml-3" style="text-align: left;">
                        <h3 class="tm-title bold "><i class="fas fa-home"></i>  Church Information</h3>
                        <hr>
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <p class="card-text">Date entered Church:&nbsp <b>{{ $membership->date_enteredchurch }}</b> </p>
                            </div>
                            <div class="col-md-5">
                                <p class="card-text">Date of Baptism:&nbsp <b>{{ $membership->baptism_date }}</b> </p>
                            </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <p class="card-text">Previous Church Attended:&nbsp <b>{{ $membership->former_church }}</b> </p>
                        </div>
                        <div class="col-md-5">
                            <p class="card-text">Pastor in charge:&nbsp <b>{{ $membership->pastor }}</b> </p>
                        </div>
                    </div>
                </div>
            </div>
             </div>

            <!--  Department & Association  -->
            <div class="row no-gutters justify-content-center">
                <div class="col-md-10">
                    <div class="card-body ml-3" style="text-align: left;">
                        <h3 class="tm-title bold "><i class="fas fa-users-cog"></i> Department & Associations</h3>
                        <hr>
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <p class="card-text">Department:&nbsp
                                    @foreach($membership->departments as $dep)
                                        <h6 class="badge badge-pill">{{ $dep->name }}</h6>
                                    @endforeach
                                </p>
                            </div>
                             <div class="col-md-5">
                                <p class="card-text">Association:&nbsp
                                  @foreach($membership->associations as $ass)
                                    <h6 class="badge badge-pill">{{ $ass->name }}</h6>
                                @endforeach</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection
