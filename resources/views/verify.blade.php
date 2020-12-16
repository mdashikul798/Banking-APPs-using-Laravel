<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="favicon.ico">
    <title>COBAAN FC</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Template CSS Files
    ================================================== -->
    <!-- Twitter Bootstrs CSS -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">--}}

    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->

    <!-- Libraries CSS Files -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap/bootstrap.min.css')}}">


    <link href="{{URL::asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{URL::asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/style1.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/bootstrap-formhelpers.min.css')}}" rel="stylesheet">




    @yield('assets')

</head>
<body>


<!--==========================
  Header

============================-->

<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <a class="navbar-brand" href="{{url('/')}}">
        <img src="img/b.png" width="60%" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

            <!--  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                  </div>
              </li>
              -->




</nav>


<!------ Include the above in your HEAD tag ---------->

<div class="container">

    <div class="col-md-6 col-md-offset-3" style="margin-top:50px">

        <h2>
@if ($us->loc_mismatch==1)
  Incompatibilité d'emplacement 
   @else
Vérifiez votre numéro de mobile
 @endif
</h2>
        <p>

       @if ($us->loc_mismatch==1)

            Incompatibilité d'emplacement ! confirme ton identité ! Entrez le code à six chiffres{{$us->phone}}.
         @else
Nous avons envoyé un code de confirmation à six chiffres au {{$us->phone}}.<a href="editProfile/{{$us->id}}" style="color:blue;font-weight:bold;font-size:13px">changement</a>. Entrez-le ci-dessous pour confirmer votre numéro de portable. </p>
 @endif
    </div>
    <div class="col-md-12s " >
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>

                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                <li style="list-style: none;text-align: center">{!! Session::get('success') !!} </li>
                            </ul>
                        </div>
                        @php
                            session()->forget('success');
                        @endphp
                    @endif
                        @if (Session::has('failed'))
                            <div class="alert alert-danger">
                                <ul>

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <li style="list-style: none;text-align: center">{!! Session::get('failed') !!} </li>
                                </ul>
                            </div>
                            @php
                                session()->forget('failed');
                            @endphp
                        @endif
                    <h3 class="panel-title">Veuillez vérifier votre <small> Numéro de portable</small></h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{route('check_code')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 ">

                            <div class="col-xs-12 ">
                                <div class="form-group">
                                    <input type="text" name="code"  class="form-control" placeholder="Enter 6 Digit code ">
                                </div>
                            </div>
                        </div>
                            <div class="col-xs-12 ">

                                <div class="col-xs-12 ">
                                    <div class="form-group">
                                        <input type="submit" value="Confirm" class="btn btn-info btn-block">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 " style="margin-top:10px">

                                <div class="col-xs-6 ">
                                    <div class="form-group">
                                        N'a pas reçu, s'il vous plaît attendez 2 minutes                                        <a  class="btn btn-info " href="{{route('verify_again')}}">Re send </a>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{URL::asset('userdashboard/plugins/jquery/dist/jquery.min.js')}}"></script>

<script src="{{URL::asset('userdashboard/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>

</body>
</html>