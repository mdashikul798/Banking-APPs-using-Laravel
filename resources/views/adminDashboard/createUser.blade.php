@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Créer admin</h3>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif


                {{--@if(count($errors) > 0)--}}
                    {{--<div class="row">--}}
                        {{--<div class="alert alert-danger">--}}
                            {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}

                            {{--<ul >--}}
                                {{--@foreach($errors->all() as $error)--}}
                                    {{--<li style="list-style: none;text-align: center">{{$error}}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endif--}}

                <div class="row">

                    <div class="col-md-10 col-md-offset-1" id="profileform" >


                        <!-- PANEL HEADLINE -->

                        <div class="panel panel-headline">
                            <form method="POST" action="{{route('usercreate')}}" >
                                <div class="panel-body" style="padding: 40px">
                                    <div class="row form-group">
                                    <div class="col-md-6 col-sm-6 ">

                                        @csrf

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="name" class="form-control" placeholder="Name"  type="text">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-sm-6" style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input class="form-control" name="email" placeholder="Email" type="email">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    </div>

                                    <div class="row form-group">
                                    <div class="col-md-6 col-sm-6 " style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock "></i></span>
                                            <input name="password" class="form-control" placeholder="Passe"  type="password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                        <div class="col-md-6 col-sm-6 " style="">

                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock "></i></span>
                                                <input id="password-confirm" placeholder="Confirmer le mot de passe" type="password" class="form-control" name="password_confirmation" >
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="" style="color:red;">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row">
                                    <div class="col-md-6 col-sm-6 " style="">

                                        <div class="input-group" style="width: 100%">
                                            <select class="form-control" name="usertype">
                                                <option value="" selected>Sélectionnez le type d'utilisateur</option>
                                                <option value="Superadmin">Super Admin</option>
                                                <option value="Moderator 1">Moderator 1</option>
                                                <option value="Moderator 2">Moderator 2</option>
                                                <option value="Moderator 3">Moderator 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('usertype'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('usertype') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    </div>
                                    <div class="row">
                                    <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-sm-12" style="margin-top: 15px;">
                                        <button  type="submit" class="btn btn-primary" style="width: 100%"> Envoyer</button>

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
        <!-- END MAIN -->

    </div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')