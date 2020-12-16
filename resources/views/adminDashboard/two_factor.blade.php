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
                        <p>Two Factor Authentication </p>
                        @if($f->status==1)
                        <a href="two_factor_change/0" class="btn btn-danger"> Disabled Two Authentication </a>
                        @else
                            <a href="two_factor_change/1"class="btn btn-success"> Enabled Two Authentication </a>

                        @endif
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