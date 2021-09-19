@extends('layouts.master')

@section('title')
{{ isset($membership)? 'Edit-Member' : 'Register-Member' }}
@endsection

@section('content')
  <div class="container-fluid small">
    <div class="card">
      <div class="card-header">
        <div class="form-row">
          <div class="d-block col-md-9">
             <h5 class="">{{ $churchSetting->church_name }}</h5>
             <h6 class="">{{ $churchSetting->assembly_name }}</h6>
          </div>
          <div class="col-md-3">
             <img
                 src="{{ asset('img/mh.jpg') }}"
                 class="rounded float-right"
                 alt="Church logo"
                 style="height:50px;">
          </div>
         </div>
         <h5 class="text-center">{{ isset($membership) ? 'Edit Member Data' : 'Register Member' }}</h5>
      </div>
      <!-- cardBody -->
      <div class="card-body">
        <form action="{{ isset($membership) ? route('update-member', $membership->id) :
          route('store-member') }}" method="POST" class="form-group" enctype="multipart/form-data">
          @csrf
          @if(isset($membership))
            @method('PUT')
          @endif
           <div class="">
               <div class="row no-gutters">
                 <div class="col-md-10">
                   <div class="form-row form-group col-md-10 justify-content-left pl-5">
                       <h5 class="text-left text center"> <i class="fas fa-user"></i> Basic & Personal Information</h5>
                   </div>
                 </div>
                <!-- member-image preview after upload -->
                 <div class="col-md-2">
                   <canvas style="height: 40px; width: 50px; border-radius: 30%;"
                     class="card-img float-right">
                   </canvas>
                 </div>
               </div>
           </div>
           <!-- full name  -->
            <div class="form-row justify-content-center">
                <div class="form-group col-md-3">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Full Name" value="{{isset($membership) ?$membership->name: old('name')}}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
               <!-- gender  -->
                <div class="form-group col-md-3">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror"
                     value="{{isset($membership) ? $membership->gender: old('gender')}}">
                        <option value="{{isset($membership) ? $membership->gender: ''}}">{{isset($membership) ? $membership->gender: 'Choose gender'}}</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Custom">Custom</option>
                        <option value="Unknown">Unknown</option>
                    </select>
                    @error('gender')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <!-- dob -->
                <div class="form-group col-md-3">
                    <label for="birthdate">Date of Birth</label>
                    <input type="date" name="birthdate" id="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{isset($membership) ? $membership->birthdate: old('birthdate')}}">
                    @error('birthdate')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
            </div>
            <div class="form-row justify-content-center">
              <!-- member id  -->
                  <div class="form-group col-md-3">
                      <label for="member_id">Member ID</label>
                      <input type="text" name="member_id" id="member_id" class="form-control @error('member_id') is-invalid @enderror" placeholder="Enter Member ID" value="{{isset($membership) ?$membership->member_id: old('member_id')}}">
                      @error('member_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <!-- language -->
                <div class="form-group col-md-3 checkbox">
                    <label for="language">Language</label>
                    <select id="language" name="language[]" class="form-control permission-selector
                      @error('language') is-invalid @enderror" multiple>
                      @if(isset($membership))
                        @foreach($membership->language as $lang)
                            <option value="{{$lang}}" selected> {{ $lang }} </option>
                        @endforeach
                      @endif
                        <option value="English">English</option>
                        <option value="Akan">Akan</option>
                        <option value="Ewe">Ewe</option>
                        <option value="Fante">Fante</option>
                        <option value="Ga">Ga</option>
                        <option value="Dangme">Dangme</option>
                        <option value="Hausa">Hausa</option>
                        <option value="French">French</option>
                    </select>
                    @error('language')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
            <!-- Display Pic  -->
              <div class="form-group col-md-3">
                <label for="image">Display Picture</label>
                <input type="file" accept="image/*" capture="camera" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <!-- Contact Information  -->
           <div class="form-row form-group col-md-10 justify-content-left ml-5">
               <h5 class="text-left text center"> <i class="fas fa-phone"></i> Contact & Educational Information</h5>
           </div>
           <!-- residential address  -->
           <div class="form-row justify-content-center">
               <div class="form-group col-md-3">
                   <label for="houseaddress">Residential Address</label>
                   <input type="text" name="houseaddress" id="houseaddress" class="form-control
                    @error('houseaddress') is-invalid @enderror" placeholder="Resident Address" value="{{isset($membership) ?
                     $membership->houseaddress: old('houseaddress')}}">
                   @error('houseaddress')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                   @enderror
               </div>
           <!-- hometown  -->
               <div class="form-group col-md-3">
                   <label for="hometown">Hometown</label>
                   <input type="text" name="hometown" id="hometown" class="form-control @error('hometown') is-invalid @enderror" placeholder="Enter Hometown" value="{{isset($membership) ? $membership->hometown: old('hometown')}}">
                   @error('hometown')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                   @enderror
               </div>
               <!-- PhoneNumber -->
               <div class="form-group col-md-3">
                   <label for="phone">Phone Number</label>
                   <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                      placeholder="Enter Phone Number" value="{{isset($membership) ?
                        $membership->phone: old('phone')}}">
                   @error('phone')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                   @enderror
               </div>
           </div>
            <div class="form-row justify-content-center">
              <!-- email address  -->
                <div class="form-group col-md-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                      placeholder="Your Email Address" value="{{isset ($membership) ?
                        $membership->email: old('email')}}">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <!-- educational information -->
                <div class="form-group col-md-3">
                    <label for="educational_level">Educational Level</label>
                    <select name="educational_level" id="educational_level" class="form-control
                    @error('educational_level') is-invalid @enderror" value="{{isset($membership) ? $membership->educational_level: old('educational_level')}}">
                        <option value="{{isset($membership) ? $membership->educational_level:
                           ''}}">{{isset($membership) ? $membership->educational_level:
                          'Choose educational level'}}</option>
                        <option>Student</option>
                        <option>Primary</option>
                        <option>Secondary</option>
                        <option>Tertiary</option>
                        <option>None</option>
                    </select>
                    @error('educational_level')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <!-- Name of School  -->
                <div class="form-group col-md-3">
                    <label for="school">Name of School</label>
                    <input type="text" name="school" id="school" class="form-control @error('school') is-invalid @enderror"
                      placeholder="Enter school name" value="{{isset($membership) ?
                        $membership->school: old('school')}}">
                        @error('school')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                </div>
            </div>
            <!-- Family Information  -->
           <div class="form-row form-group col-md-10 justify-content-left ml-5">
               <h5 class="text-left text center"> <i class="fas fa-users"></i> Family Information</h5>
           </div>
           <!-- father name  -->
           <div class="form-row justify-content-center">
               <div class="form-group col-md-3">
                   <label for="father_name">Name of father</label>
                   <input type="text" name="father_name" id="father_name" class="form-control @error('father_name') is-invalid @enderror"
                      placeholder="Enter name of father" value="{{isset($membership) ?
                         $membership->father_name: old('father_name')}}">
                   @error('father_name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                   @enderror
               </div>
                <!-- mother name  -->
               <div class="form-group col-md-3">
                   <label for="mother_name">Name of Mother</label>
                   <input type="text" name="mother_name" id="mother_name" class="form-control @error('mother_name') is-invalid @enderror" placeholder="Enter name of mother" value="{{isset($membership) ? $membership->mother_name: old('mother_name')}}">
                   @error('mother_name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                   @enderror
               </div>
                <!-- marital_status -->
               <div class="form-group col-md-3">
                   <label for="marital_status">Marital Status</label>
                   <select name="marital_status" id="marital_status" class="form-control  @error('marital_status') is-invalid @enderror" value="{{isset($membership) ? $membership->marital_status: old('marital_status')}}">
                       <option value="{{isset($membership) ? $membership->marital_status:
                          ''}}">{{isset($membership) ? $membership->marital_status:
                         'Choose marital status'}}</option>
                       <option>Single</option>
                       <option>Married</option>
                       <option>Divorced</option>
                       <option>Widowed</option>
                   </select>
                   @error('marital_status')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                   @enderror
               </div>
           </div>

           <div class="form-row justify-content-center">
              <!-- spouseName -->
              <div class="form-group col-md-3">
                  <label for="spouse_name">Name of Spouse</label>
                  <input type="text" name="spouse_name" id="spouse_name" class="form-control @error('spouse_name') is-invalid @enderror"
                      placeholder="Enter Spouse's name" value="{{isset($membership) ?
                        $membership->spouse_name: old('spouse_name')}}">
                  @error('spouse_names')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <!-- children -->
              <div class="form-group col-md-3">
                    <label for="children">Children</label>
                    <input  type="text" name="children" id="children" class="form-control @error('children') is-invalid @enderror"
                        placeholder="Enter Names or number of children" value="{{isset($membership) ?
                           $membership->children: old('children')}}">
                    @error('children')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                   @enderror
                </div>
              <!-- Next of Kin  -->
              <div class="form-group col-md-3">
                <label for="nextofkin">Next of kin</label>
                <input type="text" name="nextofkin" id="nextofkin" class="form-control @error('nextofkin') is-invalid @enderror"
                    placeholder="next of kin" value="{{isset($membership) ? $membership->nextofkin: old('nextofkin')}}">
                @error('nextofkin')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <!-- Occupational Information  -->
           <div class="form-row form-group col-md-10 justify-content-left ml-5">
               <h5 class="text-left text center"> <i class="fas fa-briefcase"></i> Occupational Information</h5>
           </div>
               <!-- employment status  -->
              <div class="form-row justify-content-center">
                 <div class="form-group col-md-3">
                     <label for="employment_status">Employment Status</label>
                     <select name="employment_status" id="employment_status" class="form-control @error('employment_status') is-invalid @enderror"
                        value="{{isset($membership) ? $membership->employment_status: old('employment_status')}}">
                         <option value="{{isset($membership) ? $membership->employment_status:
                            ''}}">{{isset($membership) ? $membership->employment_status:
                           'Choose employment status'}}</option>
                         <option>Employed</option>
                         <option>Self Employed</option>
                         <option>Retired</option>
                         <option>Unemployed</option>
                     </select>
                     @error('employment_status')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                     @enderror
                 </div>
                 <!-- Profession  -->
                 <div class="form-group col-md-3">
                     <label for="profession">Occupation</label>
                     <select name="profession" id="profession" class="form-control @error('profession') is-invalid @enderror"
                        value="{{isset($membership) ? $membership->profession: old('profession')}}">
                         <option value="{{isset($membership) ? $membership->profession:
                            ''}}">{{isset($membership) ? $membership->profession: 'Choose Occupation'}}
                          </option>
                         <option>Civil Servant</option>
                         <option>Publc Servant</option>
                         <option>Business owner</option>
                         <option>Artisan</option>
                         <option>Trader</option>
                     </select>
                     @error('profession')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                     @enderror
                 </div>
                 <!-- placeofwork -->
                 <div class="form-group col-md-3">
                   <label for="placeofwork">Current Work Place</label>
                   <input type="text" name="placeofwork" id="placeofwork" class="form-control @error('placeofwork') is-invalid @enderror"
                       placeholder="Enter place of work" value="{{isset($membership) ?
                         $membership->placeofwork: old('placeofwork')}}">
                 @error('placeofwork')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                 @enderror
               </div>
              </div>
            <!-- Church Information  -->
         <div class="form-row form-group col-md-10 justify-content-left ml-5">
             <h5 class="text-left text center"> <i class="fas fa-home"></i> Church Information</h5>
         </div>
         <!-- date entered church  -->
         <div class="form-row justify-content-center">
             <div class="form-group col-md-3">
                 <label for="date_enteredchurch">Date enterd church</label>
                 <input type="date" name="date_enteredchurch" id="date_enteredchurch"
                     class="form-control @error('date_enteredchurch') is-invalid @enderror" value="{{isset($membership) ?
                       $membership->date_enteredchurch:
                        old('date_enteredchurch')}}">
                @error('date_enteredchurch')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
             </div>
             <!-- date of baptism  -->
             <div class="form-group col-md-3">
                 <label for="baptism_date">Date of baptism</label>
                 <input type="date" name="baptism_date" id="baptism_date" class="form-control @error('baptism_date') is-invalid @enderror"
                    value="{{isset($membership) ? $membership->baptism_date: old('baptism_date')}}">
                 @error('baptism_date')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                 @enderror
             </div>
             <!-- PreviusChurch -->
             <div class="form-group col-md-3">
                 <label for="former_church">Previous Church Attended</label>
                 <input type="text" name="former_church" id="former_church" class="form-control
                  @error('former_church') is-invalid @enderror"
                     placeholder="Enter previous church attended" value="{{isset($membership) ?
                        $membership->former_church: old('former_church')}}">
                @error('former_church')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
             </div>
         </div>
         <div class="form-row justify-content-center">
                <!-- Resident Pastor  -->
                <div class="form-group col-md-3">
                    <label for="pastor">Resident Pastor</label>
                    <input type="text" name="pastor" id="pastor"class="form-control @error('pastor') is-invalid @enderror"
                        placeholder="Enter name of resident pastor" value="{{isset($membership) ? $membership->pastor: old('pastor')}}">
                  @error('pastor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!-- Association -->
                <div class="form-group col-md-3">
                    <label for="association">Associations</label>
                    <select name="association[]" id="association" class="form-control
                      permission-selector" multiple>
                        @foreach ($associations as $ass)
                             <option value="{{ $ass->id }}"
                                @if (isset($membership))
                                    @if ($membership->hasDepartment($ass->id))
                                         selected
                                    @endif
                                @endif
                                >
                                 {{ $ass->name }}
                             </option>
                        @endforeach
                    </select>
                </div>
                <!-- Department -->
                <div class="form-group col-md-3">
                    <label for="department">Departments</label>
                    <select name="department[]" id="department" class="form-control permission-selector"
                      multiple>
                        @foreach ($departments as $dep)
                             <option value="{{ $dep->id }}"
                                @if (isset($membership))
                                    @if ($membership->hasDepartment($dep->id))
                                         selected
                                    @endif
                                @endif
                                >
                                 {{ $dep->name }}
                             </option>
                        @endforeach
                      </select>
                </div>
         </div>
            <hr>
           <div class="col-6 mb-pb-3">
                 <button type="submit" class="btn btn-success ml-5">
                   <i class="fas fa-user-plus"></i>  {{ isset($membership) ? 'Update Member' : 'Register Member' }}
                 </button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        var input = document.querySelector('input[type=file]');
        input.onchange = function () {
          var file = input.files[0];
          //upload(file);
          drawOnCanvas(file);
          //displayAsImage(file);
        };
        function upload(file) {
          var form = new FormData(),
              xhr = new XMLHttpRequest();

          form.append('image', file);
          xhr.open('post', 'server.php', true);
          xhr.send(form);
        }
        function drawOnCanvas(file) {
          var reader = new FileReader();
          reader.onload = function (e) {
            var dataURL = e.target.result,
                c = document.querySelector('canvas'),
                ctx = c.getContext('2d'),
                img = new Image();

            img.onload = function() {
              c.width = img.width;
              c.height = img.height;
              ctx.drawImage(img, 0, 0);
            };

            img.src = dataURL;
          };

          reader.readAsDataURL(file);
        }
        function displayAsImage(file) {
          var imgURL = URL.createObjectURL(file),
              img = document.createElement('img');

          img.onload = function() {
            URL.revokeObjectURL(imgURL);
          };

          img.src = imgURL;
          document.body.appendChild(img);
        }
    </script>
@endsection
