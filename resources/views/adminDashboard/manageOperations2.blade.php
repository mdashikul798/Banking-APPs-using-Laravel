@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <h3 class="page-title" style="font-weight: 500">Gérer les opérations 2</h3>
            </div>
            <div class="row" style="margin-bottom: 15px">
                <a href="{{route('addoperation2',$userid)}}" class="btn btn-primary pull-left" ><i class="fa fa-plus-circle"></i> Ajouter un nouveau</a>
            </div>
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
                        <th>Date</th>
                        <th>Libellé</th>
                        <th>Crédit</th>
                        <th>Débit</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($operations2))
                        <?php $count=1; ?>
                        @foreach($operations2 as $operation)

                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$operation->date}}</td>

                        <td>{{$operation->comment}}</td>

                        <td>
                            @if(!empty($operation->credit))
                                {{$operation->credit}}
                            @else
                                {{"-"}}
                            @endif

                        </td>
                        <td>
                            @if(!empty($operation->debit))
                                {{$operation->debit}}
                            @else
                                {{"-"}}
                            @endif
                        </td>
                        <td style="text-align: center">
                            <a href="{{route('editoperation2',$operation->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Editer</a>
                            <a href="{{route('deleteoperation2',$operation->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</a>
                        </td>

                    </tr>
                    <?php $count++; ?>
                        @endforeach

                    @else
                        <h3>No Operation</h3>
                    @endif




                    </tbody>
                </table>

            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
</div>
<!-- END MAIN -->
@include('includes.adminFooter')