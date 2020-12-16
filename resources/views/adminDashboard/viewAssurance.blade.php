@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Assurance </h3>
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

                        <p style="text-align: center;font-size: 22px; font-weight:600;color: #00a0f0 ">Renseignements sur l'assurance</p>

                    </div>

                    <div class="row" style="">
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">

                            <label>Name</label>
                                @if(!empty($assurance->name))
                            <p>{{$assurance->name}}</p>
                                    @else
                                    <p>---</p>
                            @endif
                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >


                            <label>Email</label>
                            @if(!empty($assurance->email))
                            <p>{{$assurance->email}}</p>
                                @else
                                <p>---</p>
                            @endif
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">


                            <label>Date Of Birth</label>
                            @if(!empty($assurance->dob))
                            <p>{{$assurance->dob}}</p>
                                @else
                                <p>---</p>
                            @endif
                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >


                            <label>Demande de crédit</label>
                            @if(!empty($assurance->credit_apply))
                            <p>{{$assurance->credit_apply}}</p>
                                @else
                                <p>---</p>
                            @endif
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">


                            <label>Type de prêt</label>
                            @if(!empty($assurance->loan_type))
                            <p>{{$assurance->loan_type}}</p>
                                @else
                                <p>---</p>
                            @endif
                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >


                            <label>Connaître le taux de prêt</label>
                            @if(!empty($assurance->loan_rate))
                            <p>{{$assurance->loan_rate}}</p>
                                @else
                                <p style="">---</p>
                        @endif
                        </div>
                    </div>

                    <div class="row"   >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">


                            <label>Type de taux</label>
                            @if(!empty($assurance->rate_type))
                            <p>{{$assurance->rate_type}}</p>
                                @else
                                <p>---</p>
                       @endif
                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >


                            <label>Activité professionnelle</label>
                            @if(!empty($assurance->occupational_activity))
                            <p>{{$assurance->occupational_activity}}</p>
                                @else
                                <p>---</p>
                        @endif
                        </div>
                    </div>

                    <div class="row"  >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">


                            <label>Statut proffessional</label>
                            @if(!empty($assurance->proffessional_status))
                            <p>{{$assurance->proffessional_status}}</p>
                            @else
                                <p>---</p>
                        @endif
                        </div>

                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >


                            <label>Envoyer une copie</label>
                                @if(!empty($assurance->sendcopy))
                            <p>{{$assurance->sendcopy}}</p>
                                    @else
                                    <p>---</p>
                        @endif
                        </div>
                    </div>


                    <div class="row"  style="padding-bottom: 30px" >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">
                            @if(!empty($assurance->id_passport_path))

                            <label>Passeport ou ID</label>
                            <img src="{{asset($assurance->id_passport_path)}}" class="img-responsive" width="397" height="458" >
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