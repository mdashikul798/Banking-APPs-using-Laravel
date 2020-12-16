@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Fichier de suivi cretae</h3>
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
                        <form method="POST" action="{{route('createtrackfile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="panel-body" style="padding: 40px">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Message">{{old('message')}}</textarea>
                                        </div>
                                        @if ($errors->has('message'))
                                            <span class="" style="color:red;">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                        @endif
                                    </div>



                                </div>
                                <div class="row form-group">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" >

                                    <input type="file" name="image" id="file-upload"   class="hide"  />
                                    <label for="file-upload" style="width: 100%" class="btn btn-large ">Télécharger l'image</label>
                                    <span id="file-name"></span>
                                    @if ($errors->has('image'))
                                        <span  style="color:red;">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
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
    <!-- END MAIN -->

</div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
@section('scripts')
    <script>

        $("#file-upload").change(function(){
            $("#file-name").text(this.files[0].name);
        });

    </script>
@endsection

@include('includes.adminFooter')