@extends('layouts.app')

@section('content')
<div class="container">
@include('seeker::dashboard-links',array('country'=>$country))
  <div class="row">
    <div class="col-md-12 list-col ">
      <div class="panel panel-default">
        <div class="panel-heading">
            @include('employers::nav',array('country'=>$country))
        </div>        
        <div class="panel-body ">
        
          <div class="col-md-12">
            @if(Session::has('flash_message'))
              <div class="alert alert-success">
                  {{ Session::get('flash_message') }}
              </div>
            @endif
            @if($errors->has())
               @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
            @endif
            <div class="col-md-12">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Contact Person</th>
                <th>Contact Details</th>
                <th>Location</th>
                <th>Active</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        
    </table>
            </div>
          </div>
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
        ajax: '{{ asset("/pk/employers/myvanuesajax") }}',
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: 'title', name: 'title' },
            { data: 'contact_person', name: 'contact_person' },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                
                return data.phone + ', ' + data.mobile+ ', ' + data.email;
            } },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                
                return data.city.Name + ', ' + data.country.Name;
            } },
           
            { data: 'active', name: 'status' },
             { data: 'created_at', name: 'date_posted' },
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