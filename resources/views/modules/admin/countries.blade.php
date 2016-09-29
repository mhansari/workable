@extends('admin::layouts.master')

@section('content')
@include('admin::left')
@include('admin::footer')
</div>
            </div>
@include('admin::top')

            <!-- page content -->
            <div class="right_col" role="main">

                <div class=""><br/>
                     @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Countries</h3>
                          {{ Html::link('/admin/countries/create', 'Add new Country',array())}}
                        </div>
                    </div>
                   
                </div>

              <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Active</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
            </div>
            <!-- /page content -->
@stop
@push('scripts1')
<script>

$(function() {
    
  var t =   $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'countries/all',
        columns: [
            { data: 'sno', name: 'sno', 'orderable': true, 'searchable': false },
            { data: 'Name', name: 'Name' },
            { data: 'Active', name: 'Active' },
            { data: 'Created_At', name: 'Created_At' },
            { data: 'Updated_At', name: 'Updated_At' },
            { data: 'Actions', name: 'Actions', 'orderable': false, 'searchable': false }
        ]
    });

t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).fnDraw();
});
</script>
@endpush
