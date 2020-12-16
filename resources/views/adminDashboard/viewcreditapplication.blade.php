@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Demande de crédit</h3>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            <div class="row">

                <div class="col-md-8 col-md-offset-2" id="profileform" style="background-color: white !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                    <!-- PANEL HEADLINE -->
                    <div class="row" style="padding-top: 30px">

                        <p style="text-align: center; ">Demande de crédit utilisateur</p>

                    </div>

                    <div class="row" style="">
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">
                            <label>Name</label>
                            @if($application->name)
                            <p>{{$application->name}}</p>
                                @else
                                <p>---</p>
                                @endif
                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >
                            <label>Email</label>
                            @if($application->email)
                            <p>{{$application->email}}</p>
                            @else
                                <p>---</p>
                            @endif
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">
                            <label>Téléphone</label>
                            @if($application->phone)
                            <p>{{$application->phone}}</p>
                            @else
                                <p>---</p>
                            @endif

                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >
                            <label>Montant</label>
                            @if($application->amount)
                            <p>{{$application->amount}}</p>
                            @else
                                <p>---</p>
                            @endif
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">
                            <label>Pays</label>
                            @if($application->country)
                            <p><span class="bfh-countries" data-country="{{$application->country}}" data-flags="true"></span></p>
                            @else
                                <p>---</p>
                            @endif
                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >
                            <label>Adresse</label>
                            @if($application->address)
                            <p>{{$application->address}}</p>
                            @else
                                <p>---</p>
                            @endif
                        </div>
                    </div>

                    <div class="row"  style="padding-bottom: 30px" >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">
                            <label>Message</label>
                            @if($application->message)
                            <p>{{$application->message}}</p>
                            @else
                                <p>---</p>
                            @endif
                        </div>

                    </div>

                    <!-- END PANEL HEADLINE -->
                </div>

            </div>

        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
</div>
<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')