@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Configurer Email</h3>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif




            <div class="row">

                <div class="col-md-10 col-md-offset-1" id="profileform" >


                    <!-- PANEL HEADLINE -->

                    <div class="panel panel-headline">
                        <form method="POST"  action="{{route('configureemail')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="panel-body" style="padding: 40px">
                                <div class="row">

                                    <div class="form-group">
                                        <label for="email">French</label>
                                        <input required type="text" class="form-control" name="French" value="<?php echo $data[0]->email ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">English</label>
                                        <input required type="text" class="form-control" name="English"  value="<?php echo $data[1]->email ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Spanish</label>
                                        <input required type="text" class="form-control" name="Spanish"  value="<?php echo $data[2]->email ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Italian</label>
                                        <input required type="text" class="form-control" name="Italian"  value="<?php echo $data[3]->email ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">German</label>
                                        <input required type="text" class="form-control" name="German"  value="<?php echo $data[4]->email ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Finland</label>
                                        <input required type="text" class="form-control" name="Finland"  value="<?php echo $data[5]->email ?>">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 form-group" >
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
</div>
<!-- END MAIN -->
@include('includes.adminFooter')