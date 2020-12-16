
@section('assets')
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">


@endsection
@include('includes.header')





<div class="container" style="padding-bottom: 30px">

    <div class="row" style="margin-top: 50px; margin-bottom: 50px">
        <div class="col-xs-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            @if (Session::has('success'))
                <div class="alert alert-success" style="margin-top:12px">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center;font-size:12px">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            <div style="padding-top: 30px;margin-bottom: 0px !important;">
                <p style="font-size: 17px;font-weight: 800;text-align: center;color: #337ab7">Trova l'OFFERTA DI FINANZIAMENTI PER LE TUE ESIGENZE.</p>
            </div>
            <div style="padding-bottom: 5px;margin-top: -20px !important;">
                <p style="font-size: 17px;font-weight: 800;text-align: center">
                    Chiedere   <span style="color: firebrick">€3000</span> to
                    <span style="color: firebrick">€2,000,000</span></p>
            </div>

            <form role="form" method="POST" action="{{route('creditapplication')}}">
                <input type="hidden" name="type" value="3">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-user"></i></span>
                            <input id="name" type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Inserisci il tuo nome e cognome">
                        </div>
                        @csrf
                        @if ($errors->has('name'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row" style="margin-top:14px;margin-bottom:5px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-envelope"></i></span>
                            <input id="email" type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="Inserisci il tuo indirizzo email">
                        </div>
                        @if ($errors->has('email'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row" style="margin-top:14px;margin-bottom:5px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-phone"></i></span>
                            <input id="phone" type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Inserisci il tuo telefono">
                        </div>

                        @if ($errors->has('phone'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row" style="margin-top:14px">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-money"></i></span>
                            <input id="loan" type="text" class="form-control" value="{{ old('loan') }}" name="loan" placeholder="Ammontare del prestito">
                        </div>
                        @if ($errors->has('loan'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('loan') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="form-group"  style="margin-top:14px">
                    <div class="input-medium bfh-selectbox bfh-countries" data-country="@if(old('country')!=''){{old('country')}}@else{{'US'}}@endif" data-flags="true" data-name="country">
                        <input type="hidden" value="">
                        <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                            <span class="bfh-selectbox-option input-medium" data-option=""></span>
                            <b class="caret"></b>
                        </a>
                        <div class="bfh-selectbox-options">
                            <input type="text" class="bfh-selectbox-filter">
                            <div role="listbox">
                                <ul role="option">
                                </ul>
                            </div>
                        </div>
                        @if ($errors->has('country'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment" name="address" placeholder="Indirizzo">{{ old('address') }}</textarea>
                        </div>
                        @if ($errors->has('address'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="message" id="comme" placeholder="Messaggio">{{ old('message') }}</textarea>
                        </div>
                        @if ($errors->has('message'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>


                <div class="row" style="padding-bottom: 30px">
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-offset-3"><input style="color:white;font-size: 16px;padding-top: 11px;padding-bottom: 11px;;letter-spacing: 2px;" type="submit" value="Sottoscrivi" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                </div>
                <marquee align="left" class="image-slide col-md-12 col-xs-12" style=" font-size:13px; padding:10px">
                    <img src="img/m.png" height="30">
                    <img style="margin-left:50px" height="30" src="img/w.png">
                    <img style="margin-left:50px" height="30" src="img/R.png">
                </marquee>
            </form>
        </div>
    </div>


    <!-- Modal -->
    <!--<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <!--<div class="modal-dialog modal-lg">-->
    <!--<div class="modal-content">-->
    <!--<div class="modal-header">-->
    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
    <!--<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>-->
    <!--</div>-->
    <!--<div class="modal-body">-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>-->
    <!--</div>-->
    <!--<div class="modal-footer">-->
    <!--<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>-->
    <!--</div>-->
    <!--</div>&lt;!&ndash; /.modal-content &ndash;&gt;-->
    <!--</div>&lt;!&ndash; /.modal-dialog &ndash;&gt;-->
    <!--</div>&lt;!&ndash; /.modal &ndash;&gt;-->
</div>





@include('includes.footerInter')