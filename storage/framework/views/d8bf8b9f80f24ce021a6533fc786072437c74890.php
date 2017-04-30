<div class="panel panel-default">
    <div class="panel-body ">
        <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Applicant</th>
                            <th>Job Title</th>
                            <th>Applied On</th>
                    
                        </tr>
                    </thead>
        
                </table>
    </div>
</div>
<script>
$(document).ready(function() {
    $(function() {
    if ( $.fn.dataTable.isDataTable( '#example1' ) ) {

  var t =   $('#example1').DataTable({
        processing: true,
        serverSide: false,
        ajax: '<?php echo e(asset($country . "/jobs/applicantsajax")); ?>',
        columns: [
           { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                      return '<a href="<?php echo e(route('emp.view.resume',array('country'=>$country))); ?>/' + data.resume_id + '/'+ data.application_id +'">'+data.first_name + ' ' + data.last_name +'</a>';
            } },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field

                return '<a href="<?php echo e(asset($country . "/jobs/")); ?>/' + data.job_id + '">'+data.job_title  +'</a>';
            } },
            
            { data: 'created_at', name: 'date_posted' }
        ]
    });

t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).draw();
}
 else {
  var t =   $('#example1').DataTable({
        processing: true,
        serverSide: false,
        ajax: '<?php echo e(asset($country . "/jobs/applicantsajax")); ?>',
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                      return '<a href="<?php echo e(route('emp.view.resume',array('country'=>$country))); ?>/' + data.resume_id + '/'+ data.application_id +'">'+data.first_name + ' ' + data.last_name +'</a>';
            } },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field

                return '<a href="<?php echo e(asset($country . "/jobs/")); ?>/' + data.job_id + '">'+data.job_title  +'</a>';
            } },
            
            { data: 'created_at', name: 'date_posted' }
            

        ]
    });

t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).draw();
 }
});
} );
</script>