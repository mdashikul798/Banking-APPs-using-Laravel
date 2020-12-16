@section('assets')
    <style>
        .progress-bar {
            width: 0;
            animation: progress 30.5s ease-in-out forwards;
        }
        .title {
            opacity: 0;
            animation: show 2.0s forwards ease-in-out 15.0s;
        }


        @keyframes progress {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }
        @keyframes show  {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
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
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                        <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            <h2>Vérification</h2>


                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>

                            <div  class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 " >

                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="max-width: 50%">
                                        <span class="title">50%</span>
                                    </div>
                                </div>
                            </div>

                            <div  style="display:none" class="fade_me col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 " >

                                <div class="" style="text-align: center;">
                                    <div><i class="fa fa-exclamation-triangle text-center" style="font-size: 27px;color: #BA2121" aria-hidden="true"></i></div>

                                    <h3>{{$title}}</h3>
                                    <p>{{$message}}</p>
                                </div>
                            </div>


                            <div style="display:none" class="fade_me col-xs-12">

                                <form class="form-horizontal form-label-left input_mask" method="POST" action="{{route("firstverification")}}">
                                    @csrf
                                    <input type="hidden" name="userid" value="{{Auth::user()->id}}">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span> </span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text"  name="code" value="{{ old('code') }}" class="form-control has-feedback-left" placeholder="Entrez le code">
                                    <span style="color: #286090" class="fa fa-hashtag  form-control-feedback left "
                                          aria-hidden="true"></span>
                                        </div>
                                        @if ($errors->has('code'))
                                            <span class="col-md-12 col-md-offset-3" style="color:red;">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                        @endif
                                    </div>



                                    <div class="col-md-offset-5 col-sm-offset-5 " style="padding-bottom: 30px;">
                                        <div class="form-group  ">
                                            <div class="col-md-4 col-sm-4  col-xs-12 ">
                                                <button type="submit" class="btn btn-primary" style="width: 100%">Valider</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@section('scripts')
    <script>
        $("document").ready(function () {

            // animate the progress bar onload

            $('.progress-bar').animate(
                    {width:'50%'},
                    {
                        duration:14200,
                        step: function(now, fx) {
                            var data= Math.round(now);
                            $(this).html(data + '%');

                        },
                         done: function(now, fx) {
                        // Animation complete.
                        console.log("aa2");
                        

$(".fade_me").fadeIn().css("display","inline-block");

                      }
                    }
            );
        });
    </script>
    @endsection
            <!-- /page content -->
    @include('includes.userFooter')