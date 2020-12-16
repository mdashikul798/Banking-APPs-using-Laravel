@section('assets')
    <link href="{{URL::asset('css/signup.css')}}" rel="stylesheet">


    @endsection
@include('includes.userHeader')
        <!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

               <div class="row tile_count">
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top" style="color: saddlebrown"><i class="fa fa-user" ></i>  Crédit total</span>

                        <div class="count" style="color: saddlebrown">
                            @if(!empty($info['totalbalance']))

                                {{$info['currency'].Session::get('balance')}}
                            @else
                                {{$info['currency']}}0

                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i>  Transaction récente</span>
                        <div class="count">

                            @if(!empty($info['recenttransaction']))
                                {{$info['currency'].$info['recenttransaction']}}
                            @else
                                {{$info['currency']}}0

                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total des transactions</span>
                        <div class="count green">
                            @if(!empty($info['totaltransaction']))
                                {{$info['currency'].$info['totaltransaction']}}
                            @else
                                {{$info['currency']}}0

                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>
                 Dernière connexion</span>
                        <div class="count">{{$info['ip']}}</div>
                    </div>


                </div>

        <div class="clearfix"></div>

        <div class="row">




            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Modifier le profil</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row" style="margin-top: 50px; margin-bottom: 50px">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2" style="padding:30px; border: 2px solid #ededed">
                            <form method="POST" action="{{route('updateProfile')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                                        <div class="input-group">
                                            <span class="input-group-addon fainput" ><i class="fa fa-user"></i></span>
                                            <input id="name" type="text" value="{{ $profileData->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                                        <div class="input-group">
                                            <span class="input-group-addon fainput" ><i class="fa fa-calendar"></i></span>
                                            <input id="age" type="text"  value="{{ $profileData->age }}" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" placeholder="Age">
                                        </div>

                                        @if ($errors->has('age'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('age') }}</strong>
                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                                        <div class="input-group">
                                            <span class="input-group-addon fainput" ><i class="fa fa-phone"></i></span>
                                            <input id="phone" type="text"  value="{{ $profileData->phone }}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Phone">
                                        </div>
                                        @if ($errors->has('phone'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                                        <div class="input-group">
                                            <span class="input-group-addon fainput" ><i class="fa fa-envelope"></i></span>
                                            <input id="email" type="text" value="{{ $profileData->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                                        <div class="input-group">
                                            <span class="input-group-addon fainput" ><i class="fa fa-address-card "></i></span>
                                            <input id="address" type="text" value="{{ $profileData->address }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Home Address">
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6" style="margin-top:14px">
                                        <div class="input-group">
                                            <span class="input-group-addon fainput" ><i class="fa fa-hashtag"></i></span>
                                            <input id="postalcode" value="{{ $profileData->postalcode}}" type="text" class="form-control{{ $errors->has('postalcode') ? ' is-invalid' : '' }}" type="text" placeholder="Postal Code" name="postalcode">
                                        </div>
                                        @if ($errors->has('postalcode'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('postalcode') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group"  style="margin-top:14px">
                                    <div class="input-medium bfh-selectbox bfh-countries" data-country="{{ $profileData->country }}" data-flags="true" data-name="country">



                                        <input type="hidden" name="country"  value="{{ $profileData->country }}" >
                                        <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                                            <span class="bfh-selectbox-option input-medium" data-option=""></span>
                                            <b class="caret"></b>
                                        </a>
                                        <div class="bfh-selectbox-options">
                                            <input type="text"  class="bfh-selectbox-filter">
                                            <div role="listbox">
                                                <ul role="option">
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                       
                               
                                    <input type="hidden" name="account_type"  value="{{ $profileData->account_type }}" id="account_type">


                                {{--<div style="margin-top:14px">--}}

                                    {{--<input type="file" name="profile_image" value="{{ old('profile_image') }}"  id="imageUpload" class="hide {{ $errors->has('password') ? ' is-invalid' : '' }}"  enctype="multipart/form-data" />--}}
                                    {{--<label for="imageUpload" class="btn btn-large ">Upload Image</label><br/><br/><br/>--}}
                                    {{--@if ($errors->has('profile_image'))--}}
                                        {{--<span  style="color:red;">--}}
                                        {{--<strong>{{ $errors->first('profile_image') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}


                                <div class="row" style="padding-bottom: 30px">
                                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-offset-3"><input style="color:white;font-size: 16px;" type="submit" value="Update" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
<!-- /page content -->

 @section('scripts')
            <script>
                 $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })

            </script>
            @stop
@include('includes.userFooter')