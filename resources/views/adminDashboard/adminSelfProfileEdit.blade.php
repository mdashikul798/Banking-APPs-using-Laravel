@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Modifier le profil</h3>
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
                            <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                            <div class="panel-body" style="padding: 40px">
                                <div class="row form-group">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

                                        @csrf

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="name" class="form-control"  value="{{ Auth::user()->name }}"  type="text">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 form-group" style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input class="form-control" name="email" value="{{ Auth::user()->email }}"  type="email">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
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
    <!-- END MAIN -->

</div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')