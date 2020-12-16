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
                        <h2>Effectuer un transfert</h2>

                        <p style="font-size: 20px" class="pull-right">Solde du compte: <b></b>
                            @if(!empty($info['totalbalance']))

                                {{$info['currency'].$info['totalbalance']}}
                            @else
                                $0
                            @endif
                        </p>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        @if (Session::has('failed'))
                            <div class="alert alert-danger">
                                <ul>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <li style="list-style: none;text-align: center">{!! Session::get('failed') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route("usertransfer")}}">
                            @csrf
                            <input type="hidden" name="userid" value="{{Auth::user()->id}}">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span>Code IBAN </span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <input type="text"  name="code_iban" value="{{ old('code_iban') }}"
                                           class="form-control has-feedback-left" >
                                    <span style="color: #286090" class="fa fa-hashtag  form-control-feedback left "
                                          aria-hidden="true"></span>
                                </div>
                                @if ($errors->has('code_iban'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('code_iban') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span>Code BIC</span></label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="code_bic" value="{{ old('code_bic') }}"
                                           class="form-control has-feedback-left">
                                    <span style="color: #286090" class="fa fa-hashtag form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                                @if ($errors->has('code_bic'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('code_bic') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">Numero de compte *</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="account_number" value="{{ old('account_number') }}"
                                           class="form-control has-feedback-left" >
                                    <span style="color: #286090" class="fa fa-credit-card form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                                @if ($errors->has('account_number'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">Banque *</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="bank" value="{{ old('bank') }}"
                                           class="form-control has-feedback-left" >
                                    <span style="color: #286090" class="fa  fa-university form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                                @if ($errors->has('bank'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">Adresse Banque *</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="bank_address" value="{{ old('bank_address') }}"
                                           class="form-control has-feedback-left">
                                    <span style="color: #286090" class="fa fa-address-card-o form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                                @if ($errors->has('bank_address'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('bank_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">Titulaire (Nom complet) *</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="holder_name" value="{{ old('holder_name') }}"
                                           class="form-control has-feedback-left"
                                         >
                                    <span style="color: #286090" class="fa fa-user form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                                @if ($errors->has('holder_name'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('holder_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">Montant du transfert *</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="amount" value="{{ old('amount') }}"
                                           class="form-control has-feedback-left">
                                    <span style="color: #286090" class="fa fa-money form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>

                                @if ($errors->has('amount'))
                                    <span class="" style="color:red;">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div >
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-12 ">
                                        <button type="submit" class="btn btn-primary" >Valider</button>
                                        <button  class="btn btn-success" type="reset">Effacer</button>
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