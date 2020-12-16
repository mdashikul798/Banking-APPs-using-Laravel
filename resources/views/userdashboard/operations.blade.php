@include('includes.userHeader')

        <!-- page content -->
<div class="right_col" role="main">
    <div class="">

            <div class="row tile_count">
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top" style="color: saddlebrown"><i class="fa fa-user" ></i>  Crédit total</span>

                        <div class="count" style="color: saddlebrown">
                            @if(!empty($info['totalbalance']))

                                {{$info['currency'].Session::get('balance')}}
                            @else
                                {{$info['currency']}}0

                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i>  Transaction récente</span>
                        <div class="count">

                            @if(!empty($info['recenttransaction']))
                                {{$info['currency'].$info['recenttransaction']}}
                            @else
                                {{$info['currency']}}0
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total des transactions</span>
                        <div class="count green">
                            @if(!empty($info['totaltransaction']))
                                {{$info['currency'].$info['totaltransaction']}}
                            @else
                                {{$info['currency']}}0

                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>
                 Dernière connexion</span>
                        <div class="count">{{$info['ip']}}</div>
                    </div>


                </div>
        <div class="clearfix"></div>

        <div class="row">




            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Operations</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        @if(!empty($operations))
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Direction</th>
                                    <th>Montant</th>
                                    <th>N째 de Compte	</th>
                                    <th>Banque</th>
                                    <th>Obsevation</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($operations as $operation)

                                    <tr>
                                    <td>{{$operation->date}}</td>
                                    <td>{{$operation->description}}</td>



                                                                       <td style="text-align: center;color: @if($operation->direction == 0){{"blue"}}@endif @if($operation->direction == 1){{"green"}}@endif"><i class="fa @if($operation->direction == 1){{"fa-arrow-right"}}@endif  @if($operation->direction == 0){{"fa-arrow-left"}}@endif @if($operation->direction == 2){{"fa-arrow-left"}}@endif" style="color:@if($operation->direction == 1){{"green"}}@endif  @if($operation->direction == 0){{"blue"}}@endif @if($operation->direction == 2){{"red"}}@endif"  aria-hidden="true"></i></td>

                                    <td>{{$info['currency'].$operation->amount}}</td>
                                    <td>{{$operation->account_to}}</td>
                                    <td>{{$operation->bank}}</td>
                                    <td>{{$operation->comment}}</td>
                                </tr>
                                    @endforeach






                                </tbody>
                            </table>


                        @else
                        <p>No Operations Yet</p>

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- footer content -->
@include('includes.userFooter')


































