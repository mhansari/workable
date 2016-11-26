@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12 text-center">
		<ul class="nav nav-pills">
		  <li class="active"><a href="{{ asset('seekers/dashboard') }}">Job Seekers</a></li>
		  <li><a href="{{ asset('employers/dashboard') }}">Employers</a></li>
		</ul>
    </div>
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
               
      @include('seeker::nav')
  </div>
</nav></div>
                <div class="panel-body ">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Job Title</th>
                <th>Posted By</th>
                <th>Date Posted</th>
                <th>Job Type</th>
                <th>Status</th>
                <th>Applications</th>
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
        serverSide: true,
        ajax: '{{ asset("jobs/myjobsajax") }}',
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="#">'+data.job_title  +'</a>';
            } },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                
                return data.users.first_name+' '+data.users.last_name;
            } },
            { data: 'created_at', name: 'date_posted' },
            { data: 'adtype.name', name: 'Job Type' },
            { data: 'active', name: 'status' },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="#">('+data.applications.length  +')</a>';
            } },
            { data: 'Actions', name: 'Actions', 'orderable': false, 'searchable': false }
        ]
    });

t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).fnDraw();
});
} );
</script>

@endsection