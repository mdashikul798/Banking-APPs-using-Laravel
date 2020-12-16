@section('assets')
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">


@endsection
@include('includes.header')





<div class="container" style="padding-bottom: 40px">

    <div class="row" style="margin-top: 75px; margin-bottom: 50px">
        <div class=" col-md-8 offset-md-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            @if (Session::has('failed'))
                <div class="alert alert-danger" style="margin-top: 15px">
                    <ul>
                        <li style="list-style: none;text-align: center;font-size: 14px">{!! Session::get('failed') !!}</li>
                    </ul>
                </div>
            @endif
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class=" loginlogo" style="margin-top: 30px;position: relative  ">
                    <!--<img style="margin: 0;background: yellow; position: absolute; top: 20%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)" src="img/cadilogo1.png" class="img-responsive">-->
                    <div class="">COBAAN FC</div>
                </div>
                <div  >

                    <h2 style="color: #337AB7;text-align: center;margin-top: 5px;letter-spacing: 1px;">Acceder a votre compte</h2>
                    <hr class="colorgraph">

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                         <label>Numéro de compte</label>
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-hashtag"></i></span>
                            <input id="" type="text" value="{{ old('account_number') }}" class="form-control {{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" placeholder="Account Number" >
                        </div>
                        @if ($errors->has('account_number'))
                            <span class="" style="color: red;">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="row" style="margin-top:14px;margin-bottom:5px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                           <label>Mot de passe</label>

                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-lock"></i></span>
                            <input id="password" type="password"  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="" style="color: red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>




                <div class="pull-right" style="margin-right: 15px"><a style="font-size: 16px;margin-right: 5px" href="http://groep-financien.com/forgot">Mot de passe oublié??</a><a style="font-size: 16px;"  href="http://groep-financien.com/signup">Inscription?</a></div>
                <br>

                <hr class="colorgraph">
                <div class="row" style="padding-bottom: 30px">
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <input  style="color:white;font-size: 16px;padding-top: 11px;padding-bottom: 11px;;letter-spacing: 2px;" type="submit" value="Connexion au compte" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
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





@include('includes.footer')