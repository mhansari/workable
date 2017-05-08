@extends('layouts.app')

@section('content')
<div class="">
@include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
        <div class="col-md-12 list-col ">
          @include('employers::nav',array('country'=>$country))
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-col">
            <div class="panel  panel-default">
                <div class="panel-heading">
                    <h4>My Jobs</h4>
                </div>
                <div class="panel-body">
                     @if($errors->has())
                         @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                      @endif
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
        serverSide: false,
        ajax: '{{ asset("jobs/myjobsajax") }}',
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="{{ asset($country . "/jobs/") }}/' + data.id + '">'+data.job_title  +'</a>';
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
                if(data.applications.length>0){
                    return '<a href="{{ asset($country ."/jobs/applications/") }}/' + data.id + '/applied">('+data.applications.length  +')</a>';
                }
                else
                {
                    return '('+data.applications.length  +')';
                }
            } },
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