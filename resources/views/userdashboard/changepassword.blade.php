@include('includes.userHeader')
        <!-- /top navigation -->

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
                                $0
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i>  Transaction récente</span>
                        <div class="count">

                            @if(!empty($info['recenttransaction']))
                                {{$info['currency'].$info['recenttransaction']}}
                            @else
                                $0
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total des transactions</span>
                        <div class="count green">
                            @if(!empty($info['totaltransaction']))
                                {{$info['currency'].$info['totaltransaction']}}
                            @else
                                $0
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
        <div class="row">

            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <h2>Changer le mot de passe</h2>


                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>

                        <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route("postchangepassword")}}">
                            @csrf
                            <input type="hidden" name="userid" value="{{Auth::user()->id}}">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span> </span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="old_password" class="form-control has-feedback-left" placeholder="Mot de passe ol">
                                    <span style="color: #286090" class="fa fa-lock  form-control-feedback left "
                                          aria-hidden="true"></span>
                                    @if ($errors->has('old_password'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span></span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="new_password" class="form-control has-feedback-left" placeholder="N mot de passe">
                                    <span style="color: #286090" class="fa fa-lock form-control-feedback left"
                                          aria-hidden="true"></span>
                                    @if ($errors->has('new_password'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required"></span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="new_password_confirmation" class="form-control has-feedback-left" placeholder="Confirmer le mot de passe">
                                    <span style="color: #286090" class="fa fa-lock form-control-feedback left"
                                          aria-hidden="true"></span>
                                    @if ($errors->has('new_password_confirmation'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>



                            <div >
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                                        <button type="submit" class="btn btn-primary" style="width: 100%" >Valider</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@include('includes.userFooter')