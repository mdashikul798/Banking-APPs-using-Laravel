@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title" style="font-weight: 600">Gestions des utilisateurs</h3>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <ul>
                            <li style="list-style: none;text-align: center">{!! Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <div class="row" style="    background-color: white;padding: 26px;">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Sr no</th>
                            <th>N° DE COMPTE</th>
                            @if(Auth::user()->account_type == "Superadmin")
                            <th>Email</th>
                            @endif
                            <th>Name</th>

                            <th>Profil d'image</th>
                            <th>SOLDE	</th>
                            <th>Type de compte</th>
                            <th>Gestion Operation</th>
                            <th>Gestion Operation 2</th>
                              @if(Auth::user()->account_type != "Superadmin")



                            <th>Modifier</th>

                        @endif


                            @if(Auth::user()->account_type == "Superadmin")



                            <th>Bloc</th>
<th></th>
                        @endif

                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=1; ?>
                            @foreach($users as $user)

                                    <tr>
                            <td>{{$count}}</td>
                            <td>{{$user->account_no}} <br />
                                <a href="{{route('trackuser', ['id' => $user->id])}}"> Track Activities </a>
                            </td>
                                        @if(Auth::user()->account_type == "Superadmin")

                                        <td>{{$user->email}}</td>
                                        @endif
                                <td>{{$user->name}}</td>

                                <td style="text-align: center"><img src="{{asset($user->profile_image)}}" class="img-rounded" width="70" height="70" ></td>
                                        @if($user->account != null)
                                        <td>{{$user->account->balance}}</td>
                                        @else
                                            <td>{{'-'}}</td>

                                        @endif
                            <td>{{$user->account_type}}</td>
                            <td>
                                <a href="{{route('manageoperations',$user->id)}}" class="btn btn-success"><i class="fa fa-cog"></i> Gestion Operation</a>
                            </td>
                            <td>
                                <a  href="{{route('manageoperations2',$user->id)}}" class="btn btn-primary"><i class="fa fa-cog"></i> Gestion Operation 2</a>
                            </td>
                            <td>
                                <a href="{{route('editprofileadmin', $user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Editer</a>
                            </td>
                                        @if(Auth::user()->account_type == "Superadmin")

                                <td>
                                    <form  method="POST" action="{{route('blockuser')}}">

                                    @csrf
                                    <input name="block" type="hidden" value="@if($user->blocked == 1){{0}}@endif @if($user->blocked == 0){{1}}@endif">
                                    <input name="userid" type="hidden" value="{{$user->id}}">
                                    <button type="submit" class="btn @if($user->blocked == 1) btn-danger @endif @if($user->blocked == 0) btn-primary @endif"><i class="fa fa-ban"></i> @if($user->blocked == 1)Unblock @endif @if($user->blocked == 0) Bloc @endif</button>

                                    </form>
                                    {{--@if(Auth::user()->account_type == "Superadmin")--}}

                                    <a href="{{route('deleteuser', $user->id)}}" style="margin-top: 5px" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
                                        {{--@endif--}}


                            </td>

                                            @endif
                        </tr>
                            <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        </div>
        <!-- END MAIN -->
      @include('includes.adminFooter')