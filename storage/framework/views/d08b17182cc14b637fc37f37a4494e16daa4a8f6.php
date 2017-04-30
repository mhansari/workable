<div class="panel panel-default">

    <div class="panel-body ">
        <?php if(Session::has('flash_message')): ?>
            <div class="alert alert-success">
             <?php echo e(Session::get('flash_message')); ?>

            </div>
        <?php endif; ?>
        <table id="example1" class="display table table-striped table-bordered" cellspacing="0" width="100%">
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


<script>
$(document).ready(function() {
    $(function() {
        if ( $.fn.dataTable.isDataTable( '#example1' ) ) {
        table = $('#example1').DataTable({
            processing: true,
            serverSide: false,
            ajax: '<?php echo e(route("resumeajax",array("country"=>$country))); ?>',
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
                        return '<a href="<?php echo e(asset( $country . '/seekers/my-application-on-jobs')); ?>/'+data.id+'">('+data.applications.length +')</a>';
                    else
                        return '('+data.applications.length +')';
                } },
                { data: 'Actions', name: 'Actions', 'orderable': false, 'searchable': false }
            ]
        });
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                 
                cell.innerHTML = i+1;
            } );
        } ).draw();
     
        }
        else {
        table = $('#example1').DataTable({
            processing: true,
            serverSide: false,
            ajax: '<?php echo e(route("resumeajax",array("country"=>$country))); ?>',
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
                        return '<a href="<?php echo e(asset( $country . '/seekers/my-application-on-jobs')); ?>/'+data.id+'">('+data.applications.length +')</a>';
                    else
                        return '('+data.applications.length +')';
                } },
                { data: 'Actions', name: 'Actions', 'orderable': false, 'searchable': false }
            ]
        } );
        table.on( 'order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                 
                cell.innerHTML = i+1;
            } );
        } ).draw();
   
    }

 });
} );
</script>

