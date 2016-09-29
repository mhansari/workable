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
                            <h3>Ad Types</h3>
                          {{ Html::link('/admin/ad-type/create', 'Add new Ad Type',array())}}
                        </div>
                    </div>
                   
                </div>

              <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Duration</th>
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
        ajax: 'ad-type/all',
        columns: [
            { data: 'sno', name: 'sno', 'orderable': true, 'searchable': false },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'duration_unit', name: 'duration_unit' },
            { data: 'active', name: 'active' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
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
