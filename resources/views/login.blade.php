<!DOCTYPE html>
<html lang="en">
<head>
  <title>Babeshop - Admin Panel</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('img/logo.png')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/main-login.css')}}">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-t-50 p-b-90">
        <form class="login100-form validate-form flex-sb flex-w" action="{{url('admin/auth')}}" method="POST">
          {{csrf_field()}}
          {{method_field('POST')}}
          <span class="login100-form-title p-b-51">
            Login
          </span>

          
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
          </div>
          
          
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
          @if(session()->has('error'))
             <div style="margin: 0 auto; margin-top: 1em;" class="alert alert-danger">
                  <ul>
                       <li>{{session()->get('error')}}</li>
                  </ul>
              </div>
          @endif
          @if (count($errors) > 0)
              <div style="margin: 0 auto; margin-top: 1em;" class="alert alert-danger">
                  <ul>
                       @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                       @endforeach
                  </ul>
              </div>
          @endif
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('js/main.js')}}"></script>

</body>
</html>