<!doctype html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admindashboard/assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('}admindashboard/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::asset('admindashboard/assets/img/favicon.png')}}">

    <link href="{{URL::asset('userdashboard/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('userdashboard/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('userdashboard/plugins/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('userdashboard/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('userdashboard/plugins/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap-formhelpers.min.css')}}" rel="stylesheet">

    @yield('styles')

<style>
    .badge {
        margin-top: 2px;
    }
    @media screen and (max-width: 767px){
        .navbar-nav > li > a span:not(.badge), .navbar-nav > li > a .icon-submenu {
            display: block !important;
        }


    }
</style>

</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="index.html" style="font-size: 16px;font-weight: 600">COBAAN WALLETS</a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>


            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">


                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{Auth::user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('updatemyprofile')}}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                            <li><a href="{{url('adminLogout')}}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <audio id="audio" src="img/to-the-point.mp3" preload="auto"  ></audio>
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">

            <nav>
                <ul class="nav">
                    {{--<li><a href="#" class=""><i class="lnr lnr-home"></i> <span>Ajouter Utilisateurs</span></a></li>--}}
                    <li><a href="{{route('indexusers')}}" class=""><i class="lnr lnr-home"></i> <span>Gestions des utilisateurs</span></a></li>
                    <li><a href="{{route('trackfile')}}" class=""><i class="fa fa-file"></i> <span>créer un fichier de suivi</span></a></li>
                    <li><a href="{{route('indextrackfiles')}}" class=""><i class="fa fa-file-picture-o"></i> <span>Suivi des fichiers</span></a></li>
                    @if(Auth::user()->account_type == "Superadmin")

                    <li><a href="{{route('indexcreditapplication')}}" class=""><i class="fa fa-vcard"></i> <span>Demandes de crédit</span></a></li>
                                     <li><a href="{{route('Configure')}}" class=""><i class="fa fa-gear"></i> <span>Configure</span></a></li>

                    <li><a href="{{route('indexassurances')}}" class=""><i class="fa fa-cog"></i> <span>Assurances</span></a></li>
 @endif

                    @if(Auth::user()->account_type == "Superadmin")

                    <li><a href="{{route('indexcontacts')}}" class=""><i class="fa fa-newspaper-o"></i> <span>Messages de contact</span></a></li>
                   @endif

                    <!--<li><a href="{{route('viewnotifications')}}" class=""><i class="fa fa-eye"></i> <span>Notifications</span>  <span class="badge badge-notify pull-right" style="background-color: @if($some > 0){{'green'}}@else{{'#F9354C'}} @endif">{{$some}}</span></a>-->

                    <!--</li>-->

                    @if(Auth::user()->account_type == "Superadmin")

                    <li><a href="{{route('indexadmins')}}" class=""><i class="fa fa-users"></i> <span>Admins</span></a></li>

                    @endif
                    @if(Auth::user()->account_type == "Superadmin")

                    <li><a href="{{route('usercreateform')}}" class=""><i class="fa fa-user-plus"></i> <span>Créer Admin</span></a></li>
                    @endif
                    @if(Auth::user()->account_type == "Superadmin")

                        <li><a href="{{route('two_factor')}}" class=""> <i class="fa fa-lock"></i><span>Two Factor </span></a></li>

                    @endif
                    @if(Auth::user()->account_type == "Superadmin")
                    <li><a href="{{route('send_message')}}" class=""> <i class="fa fa-newspaper-o"></i>  <span>Envoyer des messages </span></a></li>
                     @endif
                    <li><a href="{{route('updatemyprofile')}}" class=""><i class="fa fa-user"></i> <span>Modifier le profil</span></a></li>
                    <li><a href="{{route('getadminchangepassword')}}" class=""><i class="fa fa-lock"></i> <span>Changer mot de passe</span></a></li>

                    <li><a href="{{url('adminLogout')}}" class=""><i class="fa fa-sign-out"></i> <span>Déconnexion</span></a></li>


                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->