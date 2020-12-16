@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Message de contact</h3>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            <div class="row">

                <div class="col-md-8 col-md-offset-2" id="profileform" style="background-color: white !important; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                    <!-- PANEL HEADLINE -->
                    <div class="row" style="padding-top: 30px">

                        <p style="text-align: center;font-size: 22px; font-weight:600;color: #00a0f0 ">Message</p>

                    </div>

                    <div class="row" style="">
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">
                            <label>Name</label>
                            <p>{{$contact->name}}</p>
                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >
                            <label>Email</label>
                            <p>{{$contact->email}}</p>
                        </div>
                    </div>



                    <div class="row" >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">
                            <label>Pays</label>
                            <p><span class="bfh-countries" data-country="{{$contact->country}}" data-flags="true"></span></p>
                        </div>
                        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2" >
                            <label>Adresse</label>
                            <p>{{$contact->address}}</p>
                        </div>
                    </div>

                    <div class="row"  style="padding-bottom: 30px" >
                        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1" style="padding-left: 10px;">
                            <label>Message</label>
                            <p>{{$contact->message}}</p>
                        </div>

                    </div>

                    <!-- END PANEL HEADLINE -->
                </div>

            </div>

        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
</div>
<!-- END WRAPPER -->
<!-- Javascript -->


@include('includes.adminFooter')