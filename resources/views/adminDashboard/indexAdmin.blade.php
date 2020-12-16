@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title" style="font-weight: 600">Admins et sous-admins</h3>
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
                        <th>Email</th>
                        <th>Name</th>
                        <th>Type de compte</th>
                        <th>Editer</th>
                        <th>Bloc</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; ?>
                    @foreach($users as $user)

                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->account_type}}</td>


                            <td>
                                <a href="{{route('editadmins', $user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Editer</a>
                            </td>
                            <td>
                                {{--@if($user->blocked == 1)--}}
                                {{--<p style="color: firebrick">User Blocked</p>--}}
                                {{--@else--}}
                                {{--<a href="{{route('blockuser', $user->id)}}" class="btn btn-danger"><i class="fa fa-ban"></i> Bloc</a>--}}
                                {{--@endif--}}
                                <form  method="POST" action="{{route('blockuser')}}">
                                    @csrf
                                    <input name="block" type="hidden" value="@if($user->blocked == 1){{0}}@endif @if($user->blocked == 0){{1}}@endif">
                                    <input name="userid" type="hidden" value="{{$user->id}}">
                                    <button type="submit" class="btn @if($user->blocked == 1) btn-danger @endif @if($user->blocked == 0) btn-primary @endif"><i class="fa fa-ban"></i> @if($user->blocked == 1)Débloquer @endif @if($user->blocked == 0) Bloc @endif</button>

                                </form>
@if($user->account_type!="Superadmin")
                                <a href="{{route('deleteuser', $user->id)}}" style="margin-top: 5px" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
@endif

                            </td>
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