@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Add Operation 2</h3>
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
                        <form method="POST" action="{{route('updateoperation2')}}">
                            <div class="panel-body" style="padding: 40px">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 " style="">
                                        <input name="operationid" type="hidden" value="{{$operation->id}}">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-money "></i></span>
                                            <input name="credit_amount" value="{{ $operation->credit  }}" class="form-control" placeholder="Credit Amount*"  type="text">
                                        </div>
                                        @if ($errors->has('credit_amount'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('credit_amount') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 " style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-money "></i></span>
                                            <input name="debit_amount" value="{{ $operation->debit  }}"  class="form-control" placeholder="Debit Amount*"  type="text">
                                        </div>
                                        @if ($errors->has('debit_amount'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('debit_amount') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 " style="">

                                        <div class="input-group" style="width: 100%">
                                            <span class=""></span>
                                            <textarea name="description" class="form-control" rows="5" placeholder="Référence vers table d'opération*" id="comment">{{ $operation->comment }}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-12 col-sm-12" style="margin-top: 15px">
                                        <button  type="submit" class="btn btn-primary"> Valider</button>

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
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
        </div>
    </footer>
</div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')