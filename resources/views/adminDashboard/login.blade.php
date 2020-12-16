<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Cadi Bank | Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('}admindashboard/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('admindashboard/assets/img/favicon.png')}}">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        @if (Session::has('failed'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li style="list-style: none;text-align: center">{!! Session::get('failed') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="header">
                            <div class="logo text-center"><img src="img/b.png" alt=""></div>
                            <p class="lead">Login to your account</p>
                        </div>
                         <form role="form" method="POST" action="{{ route('adminloginauth') }}">
                             @csrf
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="signin-email" name="email"  placeholder="Email">


                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="signin-password" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--<div class="form-group clearfix">-->
                            <!--<label class="fancy-checkbox element-left">-->
                            <!--<input type="checkbox">-->
                            <!--<span>Remember me</span>-->
                            <!--</label>-->
                            <!--</div>-->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            <div class="bottom">
                                <!--<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>-->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">Admin Login</h1>
                        <p>by Cadi Bank</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->

<script src="{{URL::asset('admindashboard/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('admindashboard/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('admindashboard/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{URL::asset('admindashboard/assets/scripts/klorofil-common.js')}}"></script>
</body>

</html>
