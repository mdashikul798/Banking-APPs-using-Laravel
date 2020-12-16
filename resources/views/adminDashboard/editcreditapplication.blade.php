@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Modifier l'application</h3>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            <div class="row">

                <div class="col-md-10 col-md-offset-1" id="profileform" >

                    <!-- PANEL HEADLINE -->

                    <div class="panel panel-headline">
                        <form method="POST" action="{{route('updatecreditapplication')}}" >
                            <div class="panel-body" style="padding: 40px">
                                <input type="hidden" name="application_id" value="{{$application->id}}">


                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon fainput" ><i class="fa fa-user"></i></span>
                                            <input id="name" type="text" class="form-control" value="{{ $application->name }}" name="name" placeholder="Entrez votre nom et prénom">
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
                                            <input id="email" type="text" class="form-control" value="{{ $application->email }}" name="email" placeholder="Entrez votre Email">
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
                                            <input id="phone" type="text" class="form-control" value="{{ $application->phone }}" name="phone" placeholder="Numéro de téléphone">
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
                                            <input id="loan" type="text"  class="form-control" value="{{ $application->amount }}" name="loan" placeholder="Montant de prêt">
                                        </div>
                                        @if ($errors->has('loan'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('loan') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group"  style="margin-top:14px">
                                    <div class="input-medium bfh-selectbox bfh-countries" data-country="{{$application->country}}" data-flags="true" data-name="country">
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
                                            <textarea class="form-control" rows="5" id="comment" name="address" placeholder="Adresse et code postal">{{ $application->address }}</textarea>
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" name="message" id="comme" placeholder="Message">{{ $application->message }}</textarea>
                                        </div>
                                        @if ($errors->has('message'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>


                                <div class="row" style="padding-bottom: 30px">
                                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-offset-3"><input style="color:white;font-size: 16px;padding-top: 11px;padding-bottom: 11px;;letter-spacing: 2px;" type="submit" value="VALIDER" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
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
    <!-- END MAIN -->
</div>
<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')