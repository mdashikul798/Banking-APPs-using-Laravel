
@include('includes.header')






<main id="main">

    <!--==========================
      About Section
    ============================-->

    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                    <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                </ul>
            </div>
        @endif



        <div class="row">

            <div class="col-md-8 offset-md-2 " id="profileform" style="margin-bottom: 40px;background-color: white !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <!-- PANEL HEADLINE -->
                <div class="row" style="padding-top: 15px;margin-top: 10px">
                    @if (!isset($failed))
                    <div class="offset-md-5 offset-4">
                    <button class="btn btn-primary" style=" font-size: 17px;padding-bottom: 8px;padding-top: 8px;padding-right: 14px;padding-left: 9px;margin-top: 20px"> &nbsp; Tracked File</button>
                    </div>
                        @endif
                </div>
                @if (isset($failed))
                    <div class="alert alert-danger">
                        <ul>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <li style="list-style: none;text-align: center">{{$failed}}</li>
                        </ul>
                    </div>
                @endif
                <div class="row" style="">
                    <div class="col-md-12" style="padding-left: 10px;margin-top: 15px">
                        @if(isset($track->trackcode))
                            <h1 style="text-align: center">{{$track->trackcode}}</h1>
                        @endif
                    </div>
                    <div class="col-md-12" >
                        @if(isset($track->message))

                        <p style="text-align: center">{{$track->message}}</p>
                        @endif

                    </div>
                </div>


                <div class="row" style="margin-bottom: 60px">
                    <div class="col-md-8 offset-md-2">
                        @if(isset($track->path))

                        <img src="{{asset($track->path)}}" class="img-responsive" width="397" height="458" >
                        @endif

                    </div>

                </div>
                <!-- END PANEL HEADLINE -->
            </div>

        </div>

    </div>




    <!--legal notices-->

    <!--==========================
      Contact Section
    ============================-->

</main>






@include('includes.footer')