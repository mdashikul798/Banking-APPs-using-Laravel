@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title" style="font-weight: 600">Messages de contact</h3>
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
                        <th>Email ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; ?>
                    @foreach($contacts as $contact)

                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->name}}</td>


                            <td>
                                <a href="{{route('viewcontact', $contact->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Découvre</a>
                                {{--@if(Auth::user()->account_type == "Superadmin")--}}

                                <a href="{{route('deletecontact', $contact->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</a>
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