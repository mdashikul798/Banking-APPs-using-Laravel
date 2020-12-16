
        @section('styles')

            <style>
                .custom-file-upload {
                    border: 1px solid #ccc;
                    display: inline-block;
                    padding: 6px 12px;
                    cursor: pointer;
                }
                .btn-file {
                    position: relative;
                    overflow: hidden;
                }
                .btn-file input[type=file] {
                    position: absolute;
                    top: 0;
                    right: 0;
                    min-width: 100%;
                    min-height: 100%;
                    font-size: 100px;
                    text-align: right;
                    filter: alpha(opacity=0);
                    opacity: 0;
                    outline: none;
                    background: white;
                    cursor: inherit;

             .custom-file-upload {
                 border: 1px solid #ccc;
                 display: inline-block;
                 padding: 6px 12px;
                 cursor: pointer;
             }
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

    </style>

    @endsection

    @include('includes.adminHeader', ['some' => $count])
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Modifier le profil</h3>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif


                @if(count($errors) > 0)
                    <div class="row">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <ul >
                                @foreach($errors->all() as $error)
                                    <li style="list-style: none;text-align: center">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="row" style="margin-bottom: 15px">
                    <div class=" pull-right">
                        <div class="col-md-12">
                            @if(Auth::user()->account_type == "Superadmin" || Auth::user()->account_type == "Moderator 1" || Auth::user()->account_type == "Moderator 2" || Auth::user()->account_type == "Moderator 3")

                    <a href="{{route('verificationsettings', $profileData->id)}}"  class="btn btn-primary"><i class="fa fa-gear"></i> Paramètres de vérification</a>
                            @endif
                    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#setamount"><i class="fa fa-money"></i> Définir le montant</button>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->account_type == "Superadmin")
                <div class="row">
                    <div class="col-md-3">
                        <!-- PANEL NO PADDING -->
                        <div >

                                <div class="  col-md-offset-1">
                                    <p style="text-align: center"><img src="{{URL::asset($profileData->profile_image)}}" class="img-rounded img-responsive"> </p>
                                </div>
                            <div class="col-md-offset-4 col-xs-offset-1 col-sm-offset-1">
                            <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success"><i class="fa fa-edit"></i> Changer</button>
                            </div>

                        </div>
                        <!-- END PANEL NO PADDING -->
                    </div>

                    <div class="col-md-9" id="profileform" >


                        <!-- PANEL HEADLINE -->

                        <div class="panel panel-headline">
                            <form  method="POST" action="{{route('updateprofileadmin')}}">
                            <div class="panel-body" style="padding: 40px">

                                <div class="col-md-6 col-sm-6 ">

                                    @csrf
                                    <input type="hidden" name="userid" value="{{$profileData->id}}">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="name" class="form-control" placeholder="Name" value="{{$profileData->name}}" type="text">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6 " id="admineditformfield">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input name="age" class="form-control" placeholder="Age" value="{{ $profileData->age}}" type="text">
                                    </div>
                                    @if ($errors->has('age'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                @if(Auth::user()->account_type == "Superadmin")
                                <div class="col-md-6 col-sm-6" style="margin-top: 15px">
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input class="form-control" placeholder="Phone" name="phone" value="{{ $profileData->phone }}" type="text">
                                    </div>
                                                      
                                    @if ($errors->has('phone'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                @endif
  					 <?php
                                        if(Auth::user()->account_type == "Superadmin" || Auth::user()->account_type == "Moderator 1" || Auth::user()->account_type == "Moderator 2" || Auth::user()->account_type == "Moderator 3"){
                                            $type="email";

                                        }
                                        if(Auth::user()->account_type == "Moderator 1" || Auth::user()->account_type == "Moderator 2" || Auth::user()->account_type == "Moderator 3"){
                                            $type="hidden";

                                        }

                                        ?>
                                   
                                <div class="col-md-6 col-sm-6" @if(Auth::user()->account_type == "Superadmin")  style="margin-top: 15px" @endif>

                                    <div class="input-group">
                                    @if(Auth::user()->account_type == "Superadmin")
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        @endif
                                        
                                        <input class="form-control" name="email" placeholder="Email" value="{{ $profileData->email }}" type="<?php echo $type; ?>">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                               

                                <div class="col-md-6 col-sm-6 " style="margin-top: 15px">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-address-card "></i></span>
                                        <input name="address" class="form-control" placeholder="Address" value="{{ $profileData->address }}" type="text">
                                    </div>
                                    @if ($errors->has('address'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6" style="margin-top: 15px">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                        <input name="postalcode" class="form-control" placeholder="Postal Code" value="{{ $profileData->postalcode }}" type="text">
                                    </div>
                                    @if ($errors->has('postalcode'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('postalcode') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-6" style="margin-top: 15px">
                                    <div class="input-medium bfh-selectbox bfh-countries" data-country="{{ $profileData->country }}" data-flags="true" data-name="country">



                                        <input type="hidden" name="country"   >
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
                                    @if ($errors->has('country'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class=" col-md-6 col-sm-6" style="margin-top: 15px">
                                    <div class="input-group">
                                        <div id="radioBtn" class="btn-group">
                                            <a class="btn btn-primary btn-sm  @if($profileData->account_type =='personal'  ){{'active '}}@else{{'notActive'}} @endif tooglebutton" data-toggle="account_type" data-title="personal">Compte Personnel</a>
                                            <a class="btn btn-primary btn-sm    @if($profileData->account_type =='corporate'  ){{'active '}}@else{{'notActive'}} @endif" data-title="corporate"  data-toggle="account_type">Entreprise</a>
                                        </div>

                                        <input type="hidden" name="account_type" value="{{ $profileData->account_type }}"  id="account_type">
                                    </div>
                                    @if ($errors->has('account_type'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-12 col-sm-6" style="margin-top: 15px">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                                        <input name="account_number" class="form-control" placeholder="Account No" value="{{ $profileData->account_no }}" type="text">
                                    </div>
                                    @if ($errors->has('account_number'))
                                        <span class="" style="color:red;">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-12 col-sm-12" style="margin-top: 15px">
                                    <button  type="submit" class="btn btn-primary"> Envoyer</button>

                                </div>

                            </div>
                            </form>
                        </div>

                        <!-- END PANEL HEADLINE -->
                    </div>
                        @endif
                </div>

            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->

    </div>

<!-- END WRAPPER -->
<!-- Javascript -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form method="POST" action="{{route('adminUpdateProfileImage')}}" enctype="multipart/form-data" >

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Télécharger l'image</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-offset-3">
                        <img src="{{URL::asset($profileData->profile_image)}}" width="230" height="250" class="img-responsive img-rounded" alt="">
                    </div>
                    <input type="hidden" name="userid" value="{{$profileData->id}}">
                    @csrf
                    <div class="col-xs-offset-4" style="margin-top: 15px">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Télécharger l'image
                        </label>
                        <input id="file-upload" name='Updated_Image' type="file" style="display:none;" enctype="multipart/form-data">
                        <label id="file-name"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Télécharger</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Proche</button>

                </div>
            </div>
        </form>

    </div>
</div>

    <div id="setamount" class="modal fade" role="dialog" style="margin-top: 30px">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Définir le montant</h4>
                </div>
                <form method="POST" action="{{route('setamount')}}">
                    @csrf
                    <input type="hidden" name="userid" value="{{$profileData->id}}">
                <div class="modal-body">
                    <div class="row" style="padding-bottom: 20px">
                        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <input name="amount" class="form-control" placeholder="Définir le montant" value="{{ isset($profileData->account->balance) ? $profileData->account->balance : ''}}" type="text">
                            </div>
                             <div class="input-group" style="margin-top:10px">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <input name="c" class="form-control" placeholder="Devise" value="{{ isset($profileData->account->currency) ? $profileData->account->currency : ''}}" type="text">
                            </div>
                            <button style="margin-top: 8px" type="submit" class="btn btn-primary">Sauver</button>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>



@section('scripts')
        <script>

            $('#radioBtn a').on('click', function(){
                var sel = $(this).data('title');
                var tog = $(this).data('toggle');
                $('#'+tog).prop('value', sel);

                $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
                $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
            })

            $("#file-upload").change(function(){
                $("#file-name").text(this.files[0].name);
            });

        </script>
@endsection


@include('includes.adminFooter')






