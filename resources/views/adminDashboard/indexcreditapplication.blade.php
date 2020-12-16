@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title" style="font-weight: 600">demandes de crédit</h3>
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
                        <th>Name</th>
                        <th>Email</th>

                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; ?>
                    @foreach($applications as $application)

                        <tr>
                            <td>{{$count}}</td>
                            <td><a href="{{route('viewcreditapplication',$application->id)}}">{{$application->name}}</a></td>
                            <td>{{$application->email}}</td>



                            <td>
                                <a href="{{route('editcreditapplication',$application->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Editer</a>
                            </td>
                            <td>


                                {{--@if(Auth::user()->account_type == "Superadmin")--}}

                                    <a href="{{route('deletecreditapplication',$application->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i>Supprimer</a>

                                {{--@endif--}}

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