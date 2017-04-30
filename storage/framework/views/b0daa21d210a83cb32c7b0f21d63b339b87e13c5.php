<div class="panel panel-default">
    <div class="panel-body ">
        <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
<script>
$(document).ready(function() {
    $(function() {
        if ( $.fn.dataTable.isDataTable( '#example2' ) ) {
            table2 = $('#example2').DataTable({
        processing: true,
        serverSide: false,
        ajax: "<?php echo e(route('applicationsajax', array('country'=>$country))); ?>",
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="<?php echo e(asset($country . "/jobs/")); ?>/' +data.job_id+'">'+data.jobs.job_title  +'</a>';
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
            table2.on( 'order.dt search.dt', function () {
        table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).draw();
        }
        else
        {
            table2 = $('#example2').DataTable({
        processing: true,
        serverSide: false,
        ajax: "<?php echo e(route('applicationsajax', array('country'=>$country))); ?>",
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="<?php echo e(asset($country . "/jobs/")); ?>/' +data.job_id+'">'+data.jobs.job_title  +'</a>';
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
            table2.on( 'order.dt search.dt', function () {
        table2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).draw();
        }



});
} );
</script>