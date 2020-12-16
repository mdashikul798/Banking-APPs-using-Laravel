
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadi Bank | Transfert</title>

    <!-- Bootstrap -->
    <link href="http://localhost:8000/userdashboard/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="http://localhost:8000/userdashboard/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="http://localhost:8000/userdashboard/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="http://localhost:8000/userdashboard/plugins/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="http://localhost:8000/userdashboard/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8000/userdashboard/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8000/userdashboard/plugins/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8000/userdashboard/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8000/userdashboard/plugins/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost:8000/css/bootstrap-formhelpers.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="http://localhost:8000/userdashboard/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>CADI BANK</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="http://localhost:8000/userdashboard/images/img.jpg" alt="..." class="img-circle profile_img">
                        <button class="btn btn-xs" style="margin-left: 22px;margin-top: 2px">Edit</button>

                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Compte </a></li>
                            <li><a><i class="fa fa-object-group"></i> Operations </a></li>
                            <li><a><i class="fa fa-exchange"></i> Transfert </a></li>
                            <li><a><i class="fa fa-sign-out"></i> Outter </a></li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://localhost:8000/userdashboard/images/img.jpg" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="row tile_count">
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Credit</span>
                        <div class="count">$2500</div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i> Recent Transaction</span>
                        <div class="count">$123.50</div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Transaction</span>
                        <div class="count green">$5,000</div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>
                Last Login</span>
                        <div class="count">1.198.47.47</div>
                    </div>


                </div>
                <div class="clearfix"></div>

                <div class="row">




                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Operations</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Direction</th>
                                        <th>Montant</th>
                                        <th>N° de Compte	</th>
                                        <th>Banque</th>
                                        <th>Obsevation</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>15-09-2017</td>
                                        <td>Transfert en cours sur votre compte</td>
                                        <td style="text-align: center;color: red"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000$</td>
                                        <td>5969874578970046</td>
                                        <td>SGBB</td>
                                        <td>Votre opération est actuellement en cours sur votre compte</td>
                                    </tr>
                                    <tr>
                                        <td>15-09-2017</td>
                                        <td>Transfert en cours sur votre compte</td>
                                        <td style="text-align: center;color: red"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000$</td>
                                        <td>5969874578970046</td>
                                        <td>SGBB</td>
                                        <td>Votre opération est actuellement en cours sur votre compte</td>
                                    </tr>
                                    <tr>
                                        <td>15/09/2017</td>
                                        <td>Transfert</td>
                                        <td style="text-align: center;color: limegreen"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000</td>
                                        <td>458986724600</td>
                                        <td>SGBB</td>
                                        <td>Echec du transfert</td>
                                    </tr>

                                    <tr>
                                        <td>05/03/2018</td>
                                        <td>Transfert</td>
                                        <td style="text-align: center;color: limegreen"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>111</td>
                                        <td>1111111111111</td>
                                        <td>1111111111111</td>
                                        <td>Echec du transfert</td>
                                    </tr>
                                    <tr>
                                        <td>15-09-2017</td>
                                        <td>Transfert en cours sur votre compte</td>
                                        <td style="text-align: center;color: red"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000$</td>
                                        <td>5969874578970046</td>
                                        <td>SGBB</td>
                                        <td>Votre opération est actuellement en cours sur votre compte</td>
                                    </tr>
                                    <tr>
                                        <td>15-09-2017</td>
                                        <td>Transfert en cours sur votre compte</td>
                                        <td style="text-align: center;color: red"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000$</td>
                                        <td>5969874578970046</td>
                                        <td>SGBB</td>
                                        <td>Votre opération est actuellement en cours sur votre compte</td>
                                    </tr>
                                    <tr>
                                        <td>15/09/2017</td>
                                        <td>Transfert</td>
                                        <td style="text-align: center;color: limegreen"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000</td>
                                        <td>458986724600</td>
                                        <td>SGBB</td>
                                        <td>Echec du transfert</td>
                                    </tr>

                                    <tr>
                                        <td>05/03/2018</td>
                                        <td>Transfert</td>
                                        <td style="text-align: center;color: limegreen"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>111</td>
                                        <td>1111111111111</td>
                                        <td>1111111111111</td>
                                        <td>Echec du transfert</td>
                                    </tr>
                                    <tr>
                                        <td>15-09-2017</td>
                                        <td>Transfert en cours sur votre compte</td>
                                        <td style="text-align: center;color: red"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000$</td>
                                        <td>5969874578970046</td>
                                        <td>SGBB</td>
                                        <td>Votre opération est actuellement en cours sur votre compte</td>
                                    </tr>
                                    <tr>
                                        <td>15-09-2017</td>
                                        <td>Transfert en cours sur votre compte</td>
                                        <td style="text-align: center;color: red"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000$</td>
                                        <td>5969874578970046</td>
                                        <td>SGBB</td>
                                        <td>Votre opération est actuellement en cours sur votre compte</td>
                                    </tr>
                                    <tr>
                                        <td>15/09/2017</td>
                                        <td>Transfert</td>
                                        <td style="text-align: center;color: limegreen"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>45000</td>
                                        <td>458986724600</td>
                                        <td>SGBB</td>
                                        <td>Echec du transfert</td>
                                    </tr>

                                    <tr>
                                        <td>05/03/2018</td>
                                        <td>Transfert</td>
                                        <td style="text-align: center;color: limegreen"><i class="fa fa-arrow-right" aria-hidden="true"></i></td>
                                        <td>111</td>
                                        <td>1111111111111</td>
                                        <td>1111111111111</td>
                                        <td>Echec du transfert</td>
                                    </tr>





                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                All Rights Reserved By <a href="">Cadi Bank</a>
            </div>
            <div class="clearfix"></div>

        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<!-- jQuery -->
<script src="http://localhost:8000/userdashboard/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="http://localhost:8000/userdashboard/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="http://localhost:8000/userdashboard/plugins/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="http://localhost:8000/userdashboard/plugins/nprogress/nprogress.js"></script>
<!-- morris.js -->
<script src="http://localhost:8000/userdashboard/plugins/raphael/raphael.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/morris.js/morris.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="http://localhost:8000/userdashboard/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="http://localhost:8000/userdashboard/plugins/moment/min/moment.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/iCheck/icheck.min.js"></script>
<script src="http://localhost:8000/js/bootstrap-formhelpers.min.js"></script>
<script src="http://localhost:8000/js/bootstrap-formhelpers-countries.js"></script>


<script src="http://localhost:8000/userdashboard/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/jszip/dist/jszip.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/pdfmake/build/pdfmake.min.js"></script>
<script src="http://localhost:8000/userdashboard/plugins/pdfmake/build/vfs_fonts.js"></script>
<!-- Custom Theme Scripts -->
<script src="http://localhost:8000/userdashboard/build/js/custom.min.js"></script>


</body>
</html>