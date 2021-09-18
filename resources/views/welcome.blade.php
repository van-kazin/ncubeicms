<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>nCube Concepts</title>

        <style media="screen">

           body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(to right, #b92b27, #1565c0)
          }
          .card {
            margin-bottom: 20px;
            border: none
            }
            .label {
              color: white;
              font-family: sans-serif;
            }
          .box {
            width: 500px;
            padding: 40px;
            position: absolute;
            top: 2%;
            left: 25%;
            background: #191919;
            ;
            text-align: center;
            transition: 0.25s;
            margin-top: 100px
          }

          p{
            color: white;
            font-family: cursive;
            font-size: 18px;
          }

          .login {
            font-family: cursive;
          }

          .box input[type="email"],
          .box input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 10px 10px;
            width: 250px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s
          }

          .box h1 {
            color: white;
            text-transform: uppercase;
            font-weight: 500
          }

          .box input[type="email"]:focus,
          .box input[type="password"]:focus {
            width: 300px;
            border-color: #2ecc71
          }

          .box button[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #2ecc71;
            padding: 14px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer
          }

          .box input[type="submit"]:hover {
            background: #2ecc71
          }

        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <form class="box" >
                            <h1 class="login">Go to Dashboard</h1>
                              <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline label">Home</a>
                        </form>
                    @else
                    <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="card">
                                  <form class="box" method="POST" action="{{ __('login') }}" >
                                    @csrf
                                      <h1 class="login">Login</h1>
                                      <p class="fs-3"> Please enter your email and password!</p>
                                      <label class="label">Email</label>
                                      <input type="email" id="email" class="@error('email') is-invalid @enderror form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                                      <label class="label">{{ __('Password') }}</label>
                                      <input type="password" name="password" id="password" placeholder="Password" class="@error('password') is-invalid @enderror form-control" required autocomplete="current-password">
                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Login') }}
                                      </button>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
                    @endauth
                </div>
            @endif
        </div>

        <!-- Design Login Page Here -->

    </body>
</html>
