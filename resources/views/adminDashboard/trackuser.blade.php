@include('includes.adminHeader', ['some' => $count])
        <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            @if (count($track)!=0)
         <div class="col-sm-12">
             <a class="btn btn-info btn-lg btn-block"> Activity report of {{$track[0]->user->name}}</a></div>
           <table class="table table-striped">
    <thead>
      <tr>
        <th>User Who changed </th>
        <th>Browser and Operating system </th>
        <th> change </th>
        <th>Date </th>
      </tr>
    </thead>
    <tbody>
   
         @foreach($track as $op)
         
           @if ($op->trackme->account_type != "Superadmin" ) 
      
      <tr>
        <td>{{$op->trackme->email}}</td>
        <td><a class="btn btn-danger btn-xs">{{$op->b_name}}</a></td>
        <td>{{$op->b_version}}</td>
        <td><a class="btn btn-info btn-xs">{{$op->created_at}}</a></td>
      
      </tr>
            @endif
          @endforeach
    </tbody>
  </table>
            <!-- END MAIN CONTENT -->
        </div>
      @else
        <div class="col-md-12">
            <a class="btn btn-warning btn-block">No  Activity tracked yet</a>
        </div>
        @endif
        </div>
        <!-- END MAIN -->
      @include('includes.adminFooter')