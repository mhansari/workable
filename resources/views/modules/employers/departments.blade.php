@extends('layouts.app')

@section('content')
<div class="">
    @include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
  <div class="col-md-12 list-col ">
      @include('employers::nav', array('country'=>$country))
  </div>
</div>
    <div class="row">
    
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Departments</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    <a href="{{asset($country . '/employers/departments/new')}}">Add new department</a>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Location</th>
                            <th>Date Posted</th>
                            <th>Status</th>
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
        ajax: '{{ asset($country . "/employers/mydepartmentsajax") }}',
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: 'name', name:'name' },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                
                return data.cities.Name+', '+data.countries.Name;
            } },
            { data: 'created_at', name: 'date_posted' },

            { data: 'active', name: 'status' },
           
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