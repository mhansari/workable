<?php $__env->startSection('content'); ?>
<div class="container">
<?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
               
      <?php echo $__env->make('seeker::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</nav></div>

                <div class="panel-body ">
                     <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
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

t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
             
            cell.innerHTML = i+1;
        } );
    } ).fnDraw();
});
} );
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>