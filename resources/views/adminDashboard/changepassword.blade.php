@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Change Password</h3>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

  @if (Session::has('failed'))
                <div class="alert alert-danger">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center">{!! Session::get('failed') !!}</li>
                    </ul>
                </div>
            @endif


            <div class="row">

                <div class="col-md-10 col-md-offset-1" id="profileform" >


                    <!-- PANEL HEADLINE -->

                    <div class="panel panel-headline">
                        <form method="POST" action="{{route('postadminchangepassword')}}" >
                            @csrf
                            <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                            <div class="panel-body" style="padding: 40px">
                                <div class="row form-group">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

                                        @csrf

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input name="old_password" class="form-control"  type="password" placeholder="Old Password">
                                        </div>
                                        @if ($errors->has('old_password'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 form-group" style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input class="form-control" name="new_password"  type="password" placeholder="New Password">
                                        </div>
                                        @if ($errors->has('new_password'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 form-group" style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input class="form-control" name="new_password_confirmation"  type="password" placeholder="Confirm Password">
                                        </div>
                                        @if ($errors->has('new_password_confirmation'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12" style="margin-top: 15px">
                                        <button  type="submit" class="btn btn-primary" style="width: 100%"> Submit</button>

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