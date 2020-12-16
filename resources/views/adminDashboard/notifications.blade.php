@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Notifications</h3>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @if(empty($notifications))
                <p style="text-align: center">Pas de notification
                </p>
                @else
                @foreach($notifications as $notification)
                    <div class="row" style="margin-bottom: 10px">

                        <div class="col-md-8 col-md-offset-2" id="profileform" style="background-color: white !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                            <!-- PANEL HEADLINE -->


                            <div class="row" style="">
                                <div class="col-md-12" style="padding-left: 10px;">

                                    <p style="padding:20px;text-align: left">{{$notification->message}} </p>

                                </div>

                            </div>



                            <!-- END PANEL HEADLINE -->
                        </div>

                    </div>

                @endforeach
                @endif


            <div class="row" style="margin-bottom: 10px">

                <div class="col-md-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-2">

            {{ $notifications->links() }}
                    </div>
            </div>

        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
</div>
<!-- END WRAPPER -->
<!-- Javascript -->

@section('scripts')
    <script>
        function refresh(){
            location.reload();
        }
        setInterval(refresh, 35000);
    </script>
    @endsection
@include('includes.adminFooter')