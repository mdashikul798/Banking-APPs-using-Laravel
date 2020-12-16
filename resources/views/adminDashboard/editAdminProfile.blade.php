@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Editer Admin</h3>
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
                        <form method="POST" action="{{route('updateadmin')}}" >
                            @csrf
                            <input type="hidden" name="userid" value="{{$adminData->id}}">
                            <div class="panel-body" style="padding: 40px">
                                <div class="row ">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 form-group ">

                                        @csrf

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="name" class="form-control"  value="{{ $adminData->name }}"  type="text">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 form-group" style="" >

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input class="form-control" name="email" value="{{ $adminData->email }}"  type="email">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                {{--<div class="row form-group">--}}
                                    {{--<div class="col-md-6 col-sm-6 " style="">--}}

                                        {{--<div class="input-group">--}}
                                            {{--<span class="input-group-addon"><i class="fa fa-lock "></i></span>--}}
                                            {{--<input name="password" class="form-control"  value="{{ $adminData->password }}"  type="password">--}}
                                        {{--</div>--}}
                                        {{--@if ($errors->has('password'))--}}
                                            {{--<span class="" style="color:red;">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}

                                    {{--<div class="col-md-6 col-sm-6 " style="">--}}

                                        {{--<div class="input-group">--}}
                                            {{--<span class="input-group-addon"><i class="fa fa-lock "></i></span>--}}
                                            {{--<input id="password-confirm"  value="{{ $adminData->password }}" type="password" class="form-control" name="password_confirmation" required>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}
                                {{--</div>--}}


                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12  " >

                                        <div class="input-group" style=" width: 100% !important;">
                                            <select class="form-control" name="account_type">
                                                <option value="" >Select User Type</option>
                                                <option value="Superadmin" @if($adminData->account_type == 'Superadmin'){{'selected'}} @endif>Super Admin</option>

                                                <option value="Moderator 1" @if($adminData->account_type == 'Moderator 1'){{'selected'}} @endif>Moderator 1</option>
                                        <option value="Moderator 2" @if($adminData->account_type == 'Moderator 2'){{'selected'}} @endif>Moderator 2</option>
                                        <option value="Moderator 3" @if($adminData->account_type == 'Moderator 3'){{'selected'}} @endif>Moderator 3</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('account_type'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12" style="margin-top: 15px">
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
    </div>
    <!-- END MAIN -->

<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')