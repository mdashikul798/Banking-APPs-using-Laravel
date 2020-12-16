@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Paramètres de vérification
</h3>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif


            @if(count($errors) > 0)
                <div class="row">
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <ul >
                            @foreach($errors->all() as $error)
                                <li style="list-style: none;text-align: center">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="row">

                <div class="col-md-10 col-md-offset-1" id="profileform" >


                    <!-- PANEL HEADLINE -->

                    <div class="panel panel-headline">
                        <form method="POST" action="{{route("postverificationsettings")}}" >
                            @csrf
                            <div class="panel-body" style="padding: 40px">
                                <div class="row form-group">
                                    <div class="col-md-6 col-sm-6 ">
                                                        <input type="hidden" name="userid" value="{{$userid}}">

                                        <div class="form-group">
                                            <label style="font-weight: 300">Code 1</label>
                                            <div class="input-group">
                                                  <span class="input-group-addon "><i class="fa fa-lock"></i></span>
                                                     <input name="code1" class="form-control" value="{{ isset($userdata->code1) ? $userdata->code1 : ''}}"  placeholder="Entrez le code 3"  type="text">
                                            </div>
                                        </div>
                                        @if ($errors->has('code1'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('code1') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <!--<div class="col-md-6 col-sm-6"  style="display:none;">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label style="font-weight: 300">Code 2</label>-->
                                    <!--    <div class="input-group">-->
                                    <!--        <span class="input-group-addon"><i class="fa fa-lock"></i></span>-->
                                    <!--        <input name="code2" class="form-control" value="{{ isset($userdata->code2) ? $userdata->code2 : ''}}"   placeholder="Entrez le code 2"  type="hidden">-->
                                    <!--    </div>-->
                                    <!--        </div>-->
                                    <!--    @if ($errors->has('code2'))-->
                                    <!--        <span class="" style="color:red;">-->
                                    <!--    <strong>{{ $errors->first('code2') }}</strong>-->
                                    <!--</span>-->
                                    <!--    @endif-->
                                    <!--</div>-->
                                </div>
                                <!--<div class="row form-group">-->
                                <!--    <div class="col-md-6 col-sm-6 "  style="display:none;">-->

                                <!--        <div class="form-group" style="margin-top: -17px;">-->
                                <!--            <label style="font-weight: 300;">Code 3</label>-->
                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-lock"></i></span>-->
                                <!--            <input name="code3" class="form-control" value="{{ isset($userdata->code3) ? $userdata->code3 : ''}}"   placeholder="Entrez le code 3"  type="hidden">-->
                                <!--        </div>-->
                                <!--            </div>-->
                                <!--        @if ($errors->has('code3'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('code3') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->

                                <!--    <div class="col-md-6 col-sm-6" style="">-->
                                <!--        <div class="form-group" style="margin-top: -17px;">-->
                                <!--            <label style="font-weight: 300">Devise</label>-->
                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>-->
                                <!--            <input class="form-control" name="currency" value="{{ isset($userdata->currency) ? $userdata->currency : ''}}"  placeholder="Entrez le devis"  type="text">-->
                                <!--        </div>-->
                                <!--            </div>-->
                                <!--        @if ($errors->has('currency'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('currency') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--<div class="row form-group" >-->
                                <!--    <div class="col-md-6 col-sm-6 ">-->

                                <!--        <div class="form-group" style="margin-top: -17px;">-->
                                <!--            <label style="font-weight: 300">Titre 1</label>-->

                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>-->
                                <!--            <input name="title1" class="form-control" value="{{ isset($userdata->title1) ? $userdata->title1 : ''}}"  placeholder="Entrez le titre 1"    type="text">-->
                                <!--        </div>-->
                                <!--            </div>-->
                                <!--        @if ($errors->has('title1'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('title1') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->

                                <!--    <div class="col-md-6 col-sm-6" style="">-->
                                <!--        <div class="form-group" style="margin-top: -17px;">-->
                                <!--            <label style="font-weight: 300">Message 1</label>-->
                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>-->
                                <!--            <input class="form-control" name="message1" value="{{ isset($userdata->message1) ? $userdata->message1 : ''}}" placeholder="Entrez le message 1" type="text">-->
                                <!--        </div>-->
                                <!--            </div>-->
                                <!--        @if ($errors->has('message1'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('message1') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--<div class="row form-group" >-->
                                <!--    <div class="col-md-6 col-sm-6 ">-->

                                <!--        <div class="form-group" style="margin-top: -17px;"  >-->
                                <!--            <label style="font-weight: 300">Titre 2</label>-->

                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>-->
                                <!--            <input name="title2" class="form-control" value="{{ isset($userdata->title2) ? $userdata->title2 : ''}}" placeholder="Entrez le titre 2"    type="text">-->
                                <!--        </div>-->
                                <!--            </div>-->
                                <!--        @if ($errors->has('title2'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('title2') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->

                                <!--    <div class="col-md-6 col-sm-6" style="">-->
                                <!--        <div class="form-group" style="margin-top: -17px;">-->
                                <!--            <label style="font-weight: 300">Message 2</label>-->
                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>-->
                                <!--            <input class="form-control" name="message2" value="{{ isset($userdata->message2) ? $userdata->message2 : ''}}" placeholder="Entrez le message 2" type="text">-->
                                <!--        </div>-->
                                <!--            </div>-->
                                <!--        @if ($errors->has('message2'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('message2') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--</div>-->

                                <!--<div class="row form-group">-->
                                <!--    <div class="col-md-6 col-sm-6 ">-->


                                <!--        <div class="form-group" style="margin-top: -17px;">-->
                                <!--            <label style="font-weight: 300">Titre 3</label>-->
                                <!--        <div class="input-group">-->

                                <!--            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>-->
                                <!--            <input name="title3" class="form-control" value="{{ isset($userdata->title3) ? $userdata->title3 : ''}}" placeholder="Entrez le titre 3"    type="text">-->
                                <!--        </div>-->
                                <!--            </div>-->
                                <!--        @if ($errors->has('title3'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('title3') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->

                                <!--    <div class="col-md-6 col-sm-6" style="">-->
                                <!--        <div class="form-group" style="margin-top: -17px;">-->
                                <!--            <label style="font-weight: 300">Message 3</label>-->
                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>-->
                                <!--            <input class="form-control" name="message3" value="{{ isset($userdata->message3) ? $userdata->message3 : ''}}" placeholder="Entrez le message 3" type="text">-->
                                <!--        </div>-->
                                <!--            </div>-->
                                <!--        @if ($errors->has('message3'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('message3') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--</div>-->

                                <!--<div class="row form-group">-->
                                <!--    <div class="col-md-6 col-sm-6" style="    margin-top: -16px;">-->
                                <!--            <label style="font-weight: 300">Régler le solde minimum</label>-->

                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-hashtag "></i></span>-->
                                <!--            <input name="minimum_balance" value="{{ isset($userdata->minimum_balance) ? $userdata->minimum_balance : ''}}" class="form-control" placeholder="Solde minimum*"  type="text">-->
                                <!--        </div>-->
                                <!--        @if ($errors->has('minimum_balance'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('minimum_balance') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->

                                <!--    <div class="col-md-6 col-sm-6" style="    margin-top: -16px;">-->
                                <!--        <label style="font-weight: 300">Notice 1</label>-->

                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>-->
                                <!--            <input name="notice1" value="{{ isset($userdata->notice1) ? $userdata->notice1 : ''}}" class="form-control" placeholder="Notice 1"  type="text">-->
                                <!--        </div>-->
                                <!--        @if ($errors->has('notice1'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('notice1') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--</div>-->


                                <!--<div class="row form-group">-->
                                <!--    <div class="col-md-6 col-sm-6" style="    margin-top: -16px;">-->
                                <!--        <label style="font-weight: 300">notice 2</label>-->

                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="fa fa-hashtag "></i></span>-->
                                <!--            <input name="notice2" value="{{ isset($userdata->notice2) ? $userdata->notice2 : ''}}" class="form-control" placeholder="Notice 2"  type="text">-->
                                <!--        </div>-->
                                <!--        @if ($errors->has('notice2'))-->
                                <!--            <span class="" style="color:red;">-->
                                <!--        <strong>{{ $errors->first('notice2') }}</strong>-->
                                <!--    </span>-->
                                <!--        @endif-->
                                <!--    </div>-->


                                <!--</div>-->

                                <div class="row">
                                    <div class="col-md-12 col-sm-12" style="margin-top: 15px">
                                        <button  type="submit" class="btn btn-primary"> Envoyer</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- END PANEL HEADLINE -->
                </div>

            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
</div>
<!-- END MAIN -->

<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')