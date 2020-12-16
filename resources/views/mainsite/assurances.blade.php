@section('assets')
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/checkbox.css')}}" rel="stylesheet">


@endsection
@include('includes.header')





<div class="container" style="padding-bottom: 30px">
    <div class="row" >



    </div>

    <div class="row" style="margin-top: 50px; margin-bottom: 50px">
        <div class=" col-md-8 offset-md-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

            @if (Session::has('success'))
                <div class="alert alert-success" style="margin-top:12px">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center;font-size:12px">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            <form role="form" method="POST" action="{{route('createassurance')}}"  enctype="multipart/form-data">
                <div  style="padding-top: 30px;margin-bottom: 20px !important;">
                    <h3 style="text-align: center;margin-bottom: 5px">Remplissez le formulaire ci-dessous pour vous adhérer à une assurances</h3>
                    <p style="text-align: center;margin: 0px">En remplissant ce contrat nous Honorerons les engagements de l’emprunteur en cas de tout sinistre confirmé par nos experts pouvant empêcher l’emprunteur de respecter son échéancier, exemple : Maladie °Accident °Décès ° Problème du remboursement du crédit °Autre problème dans la période du remboursement du prêt.
                    </p>
                </div>
                <div class="row" >
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-user"></i></span>
                            <input id="name" type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Votre Nom*">
                        </div>
                        @if ($errors->has('name'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    @csrf
                </div>
                {{--<div class="row" style="margin-top:14px;margin-bottom:5px;" >--}}
                    {{--<div class="col-xs-12 col-sm-12 col-md-12 " >--}}
                        {{--<div class="input-group">--}}
                            {{--<span class="input-group-addon fainput" ><i class="fa fa-user"></i></span>--}}
                            {{--<input  type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Votre Prenom*">--}}
                        {{--</div>--}}
                        {{--@if ($errors->has('last_name'))--}}
                            {{--<span class="" style="color:red;">--}}
                                        {{--<strong>{{ $errors->first('last_name') }}</strong>--}}
                                    {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                {{--</div>--}}
                <div class="row" style="margin-top:14px;margin-bottom:5px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon fainput" ><i class="fa fa-envelope"></i></span>
                            <input id="email" type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="Entrez votre Email">
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
                            <span class="input-group-addon fainput" ><i class="fa fa-birthday-cake"></i></span>
                            <input id="phone" type="date" class="form-control" value="{{ old('birthday') }}" name="birthday" placeholder="Date de Naissance">
                        </div>
                        @if ($errors->has('birthday'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                <div class="row" style="margin-top:14px;margin-bottom:5px;padding-left: 3px">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p style="font-weight: 400;margin-bottom: 0px">Ou avez faire votre demande de crédit<span style="color: red">*</span></p>
                        @if ($errors->has('credit_apply'))
                            <span  style="color:red;">
                                        <strong>{{ $errors->first('credit_apply') }}</strong>
                                    </span>
                        @endif
                        <div class="checkbox checkbox-primary input-group">
                            <input id="checkbox1" class="styled" name="credit_apply[cadifinance]" value="CADI FINANCE" type="checkbox" @if(is_array(old('credit_apply')) && in_array('CADI FINANCE', old('credit_apply'))) checked @endif  >
                            <label for="checkbox1">
                                CADI FINANCE
                            </label>
                        </div>
                        <div class="checkbox checkbox-warning input-group">
                            <input id="checkbox2" class="styled" type="checkbox" value="IBKR-GROUP" name="credit_apply[ibkr]" @if(is_array(old('credit_apply')) && in_array('IBKR-GROUP', old('credit_apply'))) checked @endif >
                            <label for="checkbox2">
                                IBKR-GROUP
                            </label>
                        </div>
                        <div class="checkbox checkbox-info input-group">
                            <input id="checkbox3" class="styled" type="checkbox" name="credit_apply[cbanque]" value="CBANQUE" @if(is_array(old('credit_apply')) && in_array('CBANQUE', old('credit_apply'))) checked @endif  >
                            <label for="checkbox3">
                                CBANQUE
                            </label>
                        </div>

                    </div>

                </div>


                <div style="margin-top:14px">

                    <p style="font-weight: 400;margin-bottom: 4px">Télécharger Carte d'identité ou Passeport</p>


                    <input type="file" name="image"  id="imageUpload" class="hide"  enctype="multipart/form-data" />
                    <label for="imageUpload" class="btn btn-large " style="border: solid 1px #ADB2B5;font-size: 16px">Télécharger</label>
                    <span id="file-name"></span>
                    <br/><br/><br/>
                    @if ($errors->has('image'))
                        <span  style="color:red;">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                    @endif
                </div>



                <div class="row" style="margin-top:14px;margin-bottom:5px;padding-left: 3px">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p style="font-weight: 400;margin-bottom: 0px">Type de prêt<span style="color: red">*</span></p>
                        @if ($errors->has('loan_type'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('loan_type') }}</strong>
                                    </span>
                        @endif



                        <div class="checkbox checkbox-primary input-group">
                            <input id="checkbox4" class="styled" type="checkbox" name="loan_type[amortisable]" value="Amortisable" @if(is_array(old('loan_type')) && in_array('Amortisable', old('loan_type'))) checked @endif >
                            <label for="checkbox4">
                                Amortisable
                            </label>


                        </div>
                        <div class="checkbox checkbox-warning input-group">
                            <input id="checkbox5" class="styled" type="checkbox" value="In Fine" name="loan_type[infine]" @if(is_array(old('loan_type')) && in_array('In Fine', old('loan_type'))) checked @endif >
                            <label for="checkbox5">
                                In fine
                            </label>
                        </div>

                    </div>
                </div>



                <div class="row" style="margin-top:14px;margin-bottom:5px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p style=" font-weight: 400;   margin-bottom: 1px;">Connaissez-vous le taux du prêt ? <span style="color: red">*</span></p>
                        <div class="input-group">
                            <input id="" type="text" class="form-control" name="loan_rate" value=" {{old('loan_rate') }}" placeholder="Connaissez-vous le taux du prêt ? *">
                        </div>
                        @if ($errors->has('loan_rate'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('loan_rate') }}</strong>
                                    </span>
                        @endif
                    </div>


                </div>


                <div class="row" style="margin-top:14px;margin-bottom:5px;padding-left: 3px">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p style="font-weight: 400;margin-bottom: 8px">Type de taux<span style="color: red">*</span></p>
                        @if ($errors->has('taux_type'))
                            <div class="" style="color:red;">
                                        <strong>{{ $errors->first('taux_type') }}</strong>
                                    </div>
                        @endif
                        <div class="radio radio-info radio-inline">
                            <input type="radio" id="Fixe" value="Fixe" name="taux_type" @if(old('taux_type') == 'Fixe' ) {{'checked'}} @endif >
                            <label for="Fixe"> Fixe </label>
                        </div>
                        <div class="radio radio-info radio-inline">
                            <input type="radio" id="Variable" value="Variable" name="taux_type" @if(old('taux_type') == 'Variable' ) {{'checked'}} @endif>
                            <label for="Variable"> Variable</label>
                        </div>

                    </div>
                </div>

                <div class="row" style="margin-top:14px;margin-bottom:5px;padding-left: 3px">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p style="font-weight: 400; font-size: 14px ;margin-bottom: 8px">Activité professionnelle impliquant des travaux dangereux* ou à risque**? <span style="color: red">*</span></p>

                        @if ($errors->has('occupational_activity'))
                            <div class="" style="color:red;">
                                <strong>{{ $errors->first('occupational_activity') }}</strong>
                            </div>
                        @endif

                        <div class="radio radio-info radio-inline">
                            <input type="radio" id="inlineRadio3" value="Oui" name="occupational_activity" @if(old('occupational_activity') == 'Oui' ) {{'checked'}} @endif>
                            <label for="inlineRadio3"> Oui </label>
                        </div>
                        <div class="radio radio-info radio-inline">
                            <input type="radio" id="inlineRadio4"  value="Non" name="occupational_activity" @if(old('occupational_activity') == 'Non' ) {{'checked'}} @endif>
                            <label for="inlineRadio4"> Non </label>
                        </div>


                    </div>
                </div>

                <div class="row" style="margin-top:14px;margin-bottom:5px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <p style=" font-weight: 400;   margin-bottom: 1px;">Statut professionnel / Travail etc? <span style="color: red">*</span></p>

                        <div class="input-group">
                            <input id="" type="text" class="form-control" name="professional_status" value=" {{old('professional_status')}}" placeholder="Statut professionnel / Travail etc?">
                        </div>
                        @if ($errors->has('professional_status'))
                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('professional_status') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                <div class="row" style="margin-top:14px;margin-bottom:5px;padding-left: 3px">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="checkbox checkbox-primary input-group">
                            <input id="checkbox6" class="styled" value="Yes" name="send_copy" @if( old('send_copy') == "Yes") {{"checked"}} @endif type="checkbox" >
                            <label for="checkbox6">
                                Send Me Copy
                            </label>
                        </div>
                    </div>
                </div>






                <div class="row" style="padding-bottom: 30px">
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-offset-3"><input style="color:white;font-size: 16px;padding-top: 11px;padding-bottom: 11px;;letter-spacing: 2px;" type="submit" value="Envoyer" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                </div>
                <marquee align="left" class="image-slide col-md-12 col-xs-12" style=" font-size:13px; padding:10px">
                    <img src="img/m.png" height="30">
                    <img style="margin-left:50px" height="30" src="img/w.png">
                    <img style="margin-left:50px" height="30" src="img/R.png">
                </marquee>
            </form>
        </div>
    </div>



</div>





@include('includes.footer')