@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Ajouter une opération</h3>
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
                        <form method="POST" action="{{route('postaddoperation')}}" >
                            <div class="panel-body" style="padding: 40px">
                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 ">

                                        @csrf
                                        <input type="hidden" name="userid" value="{{$user->id}}">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                            <input name="description" value="{{ old('description') }}" class="form-control" placeholder="Description*"  type="text">
                                        </div>
                                        @if ($errors->has('description'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 " style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-money "></i></span>
                                            <input name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Montant*"  type="text" >
                                        </div>
                                        @if ($errors->has('amount'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 " style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hashtag "></i></span>
                                            <input name="account_number" value="{{ old('account_number') }}" class="form-control" placeholder="Numéro de compte*"  type="text" >
                                        </div>
                                        @if ($errors->has('account_number'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 " style="">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-university "></i></span>
                                            <input name="bank_name" value="{{ old('bank_name') }}" class="form-control" placeholder="Nom de la Banque*"  type="text">
                                        </div>
                                        @if ($errors->has('bank_name'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>


                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 " style="">
                                        <div class="input-group" style="width:100%;">
                                            <select class="form-control" name="direction" >
                                                <option value="" selected >Select Direction</option>
                                                <option value="1" @if(old('direction')== 1){{"selected"}}@endif >Yes (Green)</option>
                                                <option value="0" @if(old('direction')== 0){{"selected"}}@endif >No (Blue)</option>
                                            
                                                <option value="2" @if(old('direction')== 2){{"selected"}}@endif >No (Red)</option>

                                            </select>
                                        </div>
                                        @if ($errors->has('direction'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('direction') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 col-sm-12 " style="">

                                        <div class="input-group" style="width: 100%">
                                            <span class=""></span>
                                            <textarea name="comment"  class="form-control" rows="5" id="comment">{{ old('comment') }}</textarea>
                                        </div>
                                        @if ($errors->has('comment'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('comment') }}</strong>
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
