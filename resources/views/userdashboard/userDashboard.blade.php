@include('includes.userHeader')

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="row tile_count">
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top" style="color: saddlebrown"><i class="fa fa-user" ></i>  Crédit total</span>

                        <div class="count" style="color: saddlebrown">
                            @if(!empty($info['totalbalance']))

                            {{$info['currency'].Session::get('balance')}}
                            @else
                                {{$info['currency']}}0

                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i>  Transaction récente</span>
                        <div class="count">

                            @if(!empty($info['recenttransaction']))
                                {{$info['currency'].$info['recenttransaction']}}
                            @else
                                {{$info['currency']}}0

                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total des transactions</span>
                        <div class="count green">
                            @if(!empty($info['totaltransaction']))
                                {{$info['currency'].$info['totaltransaction']}}
                            @else
                                {{$info['currency']}}0

                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>
                 Dernière connexion</span>
                        <div class="count">{{$info['ip']}}</div>
                    </div>


                </div>

                <div class="clearfix"></div>
                @if(count($errors) > 0)
                    <div class="row">
                        <div class="alert alert-danger">
                            <ul >
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            @foreach($errors->all() as $error)
                                    <li style="list-style: none;text-align: center">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if (Session::has('transfer'))
                    <div class="alert alert-success">
                        <ul>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <li style="list-style: none;"><p style="text-align: center">Transfert réussi. Veuillez cliquer <a href="{{url('operations')}}">Ici</a> pour revenir au menu transaction et vérifier votre solde</p></li>
                        </ul>
                    </div>
                @endif
                @if (Session::has('failed'))
                    <div class="alert alert-danger">
                        <ul>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <li style="list-style: none;text-align: center">{!! Session::get('failed') !!}</li>
                        </ul>
                    </div>
                @endif 

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <div class= "col-md-3"> 
                                <h2>Profil utilisateur <span style="margin-left:100px"> 
                                </h2>
                                </div>
                                <div class= "col-md-3">
                                                                <span style="color:#3B465F"> COMPTE N°: </span> {{Auth::user()->account_no}} </span>

                                </div>
                                  <div class= "col-md-3"> 
                                <span class="" > {{$info['notice1']}}</span>
                                </div>
                                <div class= "col-md-3"> 
                                <span class="">{{$info['notice2']}}</span>  
                                </div> 
                              
                                <div class="clearfix">

                                </div>
                            </div>
                            <div class="x_content">

                                <div class="col-md-3 col-sm-3 col-xs-12 profile_left" id="profilediv">
                                    <div class="profile_img">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="img-responsive avatar-view" src="{{Auth::user()->profile_image}}" alt="Avatar" width="300" height="200" title="Change the avatar">
                                        </div>
                                    </div>
                                    <h3>{{Auth::user()->name}}</h3>

                                    <ul class="list-unstyled user_data">
                                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{Auth::user()->address}}, {{Auth::user()->country}}
                                        </li>

                                        <li>
                                            <i class="fa fa-briefcase user-profile-icon"></i> {{Auth::user()->account_type}}
                                        </li>

                                        <li class="m-top-xs">
                                            <i class="fa fa-external-link user-profile-icon"></i>
                                             {{Auth::user()->email}}
                                        </li>  <li class="m-top-xs">
                                            <i class="fa fa-calendar user-profile-icon"></i>
                                            {{Auth::user()->age}}
                                        </li>
                                    </ul>

                                    <a href="{{ route('editProfile',Auth::user()->id)}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Modifier le profil</a>
                                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn imagemodalbutton " style="margin-left: 22px;margin-top: 2px">Modifier l'image</button>

                                    <br />



                                </div>

                                

                                <div class="col-md-9 col-sm-9 col-xs-12" >
                                    <div class="row">
                                    <div class=" col-md-12 " style="padding-right: 0px">
                                        <div class="card col-md-4 col-sm-12 col-xs-12 " id="card1" style="margin-left: -10px;margin-right: 6px">

                                            <div class=" col-md-offset-1 col-sm-offset-4 col-xs-offset-4 cardbtn2" style="padding-top: 53px; padding-bottom: 53px;">
                                                <a href="{{url('operations')}}" class="btn btn-lg cardbtn " style="font-size: 13px;padding-left: 32px;padding-right: 32px">&nbsp; &nbsp;<i class="fa fa-server"></i>  Operations &nbsp; &nbsp;</a>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 col-sm-12 col-xs-12 ">
                                            <div class=" col-md-offset-1 col-sm-offset-4 col-xs-offset-4 cardbtn2" style="padding-top: 53px;padding-bottom: 53px">
                                                <a href="{{url('transfer')}}" class="btn btn-lg cardbtn cardbbb" style=" padding-left: 28px;padding-right: 28px;font-size: 13px "><i class="fa fa-exchange"style="margin-right: 2px" ></i>Transférer vos Fonds</a>
                                            </div>
                                        </div>

                                        <div class=" col-md-4 col-sm-12 col-xs-12" style="padding-right: 0px" >

                                            <div id="creditcardicon" class=" col-md-offset-0 col-xs-offset-2 col-sm-offset-2 " style="font-size: 110px;color: #26B99A;">
                                                @if(Auth::user()->account_type == "corporate")
                                                <img class="img-responsive avatar-view" src="{{URL::asset('userdashboard/images/silver.gif')}}" width="100%" style="height:157px" >
                                                    @endif
                                                    @if(Auth::user()->account_type == "personal")

                                                    <img class="img-responsive avatar-view" src="{{URL::asset('userdashboard/images/Vector-Visa-Credit-Card_1.gif')}}" alt="Avatar" title="Change the avatar">
                                                        @endif
                                            </div>
                                        </div>

                                    </div>

                                    </div>

                                    <!-- start of user-activity-graph -->
                                    <!--<div id="graph_bar" style="width:100%; height:280px;"></div>-->
                                    <!-- end of user-activity-graph -->

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 " id="userdashboardtableheading" style="border: 1px solid lightgray;margin-top: 15px;background-color: #F5F7FA;padding-top: 7px;padding-bottom: 7px">
                                            <p style="font-size: 17px;text-align: center;font-weight: bold;" >    Bienvenue à votre banque en ligne</p>
                                        </div>
                                        <table class="data table table-striped no-margin " style="border: 1px solid lightgray;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>DATE</th>
                                                <th>RÉFÉRENCE</th>
                                                <th class="hidden-phone">CRÉDIT</th>
                                                <th>DEBIT</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count=1; ?>
                                            @foreach($operation2 as $operation)

                                                <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$operation->date}}</td>
                                                <td>{{$operation->comment}}</td>
                                                <td class="hidden-phone">
                                                    @if(!empty($operation->credit))
                                                        {{$operation->credit}}
                                                    @else
                                                        {{"-"}}
                                                    @endif
                                                </td>
                                                <td >
                                                    @if(!empty($operation->debit))
                                                        {{$operation->debit}}
                                                    @else
                                                        {{"-"}}
                                                    @endif
                                                </td>
                                            </tr>
                                                <?php $count++ ?>
                                           @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form method="POST" action="{{route('updateProfileImage')}}" enctype="multipart/form-data" >

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Image</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-offset-3">
                <img src="{{URL::asset(Auth::user()->profile_image)}}" width="230" height="250" class="img-responsive img-rounded" alt="">
                </div>
                    @csrf
                <div class="col-xs-offset-4" style="margin-top: 15px">
                <label for="file-upload" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Upload Image
                </label>
                <input id="file-upload" name='Updated_Image' type="file" style="display:none;">
                <label id="file-name"></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
</div>
        </form>

    </div>
</div>
        <!-- /page content -->

        <!-- footer content -->
        @section('scripts')
            <script>
                $("#file-upload").change(function(){
                    $("#file-name").text(this.files[0].name);
                });
            </script>
            @stop
     @include('includes.userFooter')
