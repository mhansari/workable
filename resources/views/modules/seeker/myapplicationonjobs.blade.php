@extends('layouts.app')

@section('content')
<div class="container">
@include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
               
      @include('seeker::nav',array('country'=>$country))
  </div>
</nav></div>
                <div class="panel-body ">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Job Title</th>
                <th>Applied on</th>
                <th>Status</th>
                <th>Seen</th>
                <th>Action</th>
            </tr>
        </thead>
        
    </table>
                </div>
            </div>
        </div>
         
    </div>
</div>
<script>
$(document).ready(function() {
    $(function() {
    
  var t =   $('#example').DataTable({
        processing: true,
        serverSide: false,
        ajax: "{{ route('applicationonjobsajax', array('resumeid'=>$resumeid,'country'=>$country)) }}",
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="{{asset($country . "/jobs/")}}/' +data.job_id+'">'+data.jobs.job_title  +'</a>';
            } },
            
            { data: 'created_at', name: 'date_posted' },
            
 { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               return data.status.name;
               // return data.status.name;
            } },
{ data: 'Seen', name: '' },
           
            { data: 'Actions', name: 'Actions', 'orderable': false, 'searchable': false }
        ]
    });

t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).draw();
});
} );
</script>

@endsection