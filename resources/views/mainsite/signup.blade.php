@section('assets')
    <link href="{{URL::asset('css/signup.css')}}" rel="stylesheet">


@endsection
@include('includes.header')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.2/css/intlTelInput.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.2/js/intlTelInput.min.js"></script>
<style>
.intl-tel-input {
  display: table-cell;
}
.intl-tel-input .selected-flag {
  z-index: 99999;
}
.intl-tel-input .country-list {
  z-index: 99999;
}
.input-group .intl-tel-input .form-control {
  border-top-left-radius: 4px;
  border-top-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 0;
}
.iti.iti--allow-dropdown {
    height: 35px !important;
}
ul#country-listbox {
    z-index: 999999;
}
.iti__selected-flag {
    z-index: 99999; }
    input#phone {
    width: 275px !important;
    height: 40px;
}
</style>



<div class="container" style="padding-bottom: 30px">


 

    <div class="row" style="margin-top: 50px; margin-bottom: 50px">
        <div class=" col-md-8  offset-md-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          @if (Session::has('success'))
                    <div class="alert alert-success" style="margin-top:12px">
                        <ul>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <li style="list-style: none;text-align: center;font-size:12px">{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class>
                    <div class="loginlogo" style="margin-top: 30px;position: relative  ">
                        COBAAN FC
                        <!--<img style="margin: 0;background: yellow; position: absolute; top: 20%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%)" src="img/cadilogo1.png" class="img-responsive">-->
                    </div>
                    <h2 style="text-align: center;color: #337AB7;margin-top: 5px;">Pour vous inscrire, remplir ci-dessous les détails
                    </h2>
                    <hr class="colorgraph">

                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">

                             <label>Entrez nom et prenom</label>                       
                            <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-user"></i></span>
                            <input id="name" type="text" value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" >
                        </div>
                        @if ($errors->has('name'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                             <label>Âge</label>                       
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-calendar"></i></span>
                            <input id="age" type="number"  value="{{ old('age') }}" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" >
                        </div>

                        @if ($errors->has('age'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('age') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row" >
                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                             <label>Téléphone (Ex : +33698745697) </label>   
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-phone"></i></span>
                            <input id="phone" type="tel" value="{{ old('phone') }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" >
                        </div>
                       
                        @if ($errors->has('phone'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                             <label>Email</label>                       
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-envelope"></i></span>
                            <input id="email" type="text" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" >
                        </div>
                        @if ($errors->has('email'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row" >
                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                             <label>Adresse de résidence</label>                       
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-address-card "></i></span>
                            <input id="address" type="text" value="{{ old('address') }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" >
                        </div>
                        @if ($errors->has('address'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                             <label>Code postal</label>                       
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-hashtag"></i></span>
                            <input id="postalcode" value="{{ old('postal_code') }}" type="text" class="form-control{{ $errors->has('postalcode') ? ' is-invalid' : '' }}" type="text"   name="postal_code">
                        </div>
                        @if ($errors->has('postal_code'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>
                <div class="form-group"  style="margin-top:14px">
            
                             <label>Pays</label>                       



                        <input type="text" name="country"    class="form-control">
                   
                  
             
                </div>
                <div class="row">
                <div class="col-sm-7 col-md-7">
                    <div class="input-group">
                        <div id="radioBtn" class="btn-group">
                            <a class="btn btn-primary btn-sm  @if(old('account_type')!='' && old('account_type') == 'personal' ){{'active personal'}}@endif @if(old('account_type') == ''){{'active'}}@endif @if(old('account_type') == 'corporate'){{'notActive'}}@endif tooglebutton" data-toggle="account_type" data-title="personal">Compte Personnel</a>
                            <a class="btn btn-primary btn-sm @if(old('account_type')!='' && old('account_type') == 'corporate' ){{'active corporate'}}@endif @if(old('account_type') == ''){{'notActive'}}@endif @if(old('account_type') == 'personal'){{'notActive'}}@endif " data-toggle="account_type" data-title="corporate">Compte Entreprise</a>
                        </div>

                        <input type="hidden" name="account_type"  value="@if(old('account_type') == '') {{'personal'}} @else {{ old('account_type') }} @endif" id="account_type">
                    </div>
                    @if ($errors->has('account_type'))
                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                    @endif
                </div>
                </div>
                <div class="row" >
                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                             <label>Mot de passe</label>                       
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-lock"></i></span>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                             <label>Confirmer le mot de passe</label>                       
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-lock"></i></span>
                            <input id="confirmpassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation">
                        </div>
                    </div>

                </div>

                <div style="margin-top:14px">

                    <input type="file" name="profile_image" value="{{ old('profile_image') }}"  id="imageUpload" class="hide {{ $errors->has('password') ? ' is-invalid' : '' }}"  enctype="multipart/form-data" />
                    <label for="imageUpload" class="btn btn-large ">Télécharger Image Profile</label>
                    <span id="file-name"></span>

                    <br/><br/><br/>
                    @if ($errors->has('profile_image'))
                        <span  style="color:red;">
                                        <strong>{{ $errors->first('profile_image') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="pull-right" style="margin-right: 15px">
                    <a style="font-size: 16px;" href="{{url('login')}}">Avez-vous déjà un compte?</a></div>
                <br>

                <hr class="colorgraph">
                <div class="row" style="padding-bottom: 30px">
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-offset-3"><input style="color:white;font-size: 16px;padding-top: 13px;padding-bottom: 13px;;letter-spacing: 2px;" type="submit" value="Valider" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>


                </div>
                <marquee align="left" class="image-slide col-md-12 col-xs-12" style=" font-size:13px; padding:10px">
                    <img src="img/m.png" height="30px">
                    <img style="margin-left:50px" height="30" src="img/w.png">
                    <img style="margin-left:50px" height="30" src="img/R.png">
                </marquee>
            </form>
        </div>
    </div>

</div>
<script>
  var input = document.querySelector("#phone");
  window.intlTelInput(input);
</script>



@include('includes.footer')
