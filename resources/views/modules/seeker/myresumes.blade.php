@extends('layouts.app')

@section('content')
<div class="">
@include('seeker::dashboard-links',array('country'=>$country))
<div class="row">
        <div class="col-md-12 list-col ">
            @include('seeker::nav',array('country'=>$country))
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
               
     <h4>My Resumes</h4>
  </div>

                <div class="panel-body ">
                     @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                
                <th>Date Created</th>
               

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
        ajax: '{{ route("resumeajax",array("country"=>$country)) }}',
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return data.title;
            } },
           
            { data: 'created_at', name: 'date_posted' },

            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                if(data.applications.length>0)
                    return '<a href="{{asset( $country . '/seekers/my-application-on-jobs')}}/'+data.id+'">('+data.applications.length +')</a>';
                else
                    return '('+data.applications.length +')';
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