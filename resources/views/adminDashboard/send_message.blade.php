@include('includes.adminHeader', ['some' => $count])
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">


        <div class="col-md-12s " >
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <ul>

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <li style="list-style: none;text-align: center">{!! Session::get('success') !!} </li>
                                </ul>
                            </div>
                            @php
                                session()->forget('success');
                            @endphp
                        @endif
                        @if (Session::has('failed'))
                            <div class="alert alert-danger">
                                <ul>

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <li style="list-style: none;text-align: center">{!! Session::get('failed') !!} </li>
                                </ul>
                            </div>
                            @php
                                session()->forget('failed');
                            @endphp
                        @endif
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{route('send_message')}}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 ">

                                    <div class="col-xs-12 ">
                                        <div class="form-group">
                                           Enter Phone Numbers
                                            <input type="text" name="phone"  class="form-control" >
                                        </div>
                                           <span>Please use this format eg: +923336900980,+33644644587,33644644587</span>


                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 ">

                                    <div class="col-xs-12 ">
                                        Enter  Message
                                        <div class="form-group">
                                            <textarea  name="msg"  class="form-control" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">

                                    <div class="col-xs-12 ">
                                        <div class="form-group">
                                            <input type="submit" value="Envoyer le message" class="btn btn-info btn-block">
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->

</div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')