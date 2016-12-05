<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-md-12 text-center">
		<ul class="nav nav-pills">
		  <li><a href="<?php echo e(asset('seekers/dashboard')); ?>">Job Seekers</a></li>
		  <li class="active"><a href="<?php echo e(asset('employers/dashboard')); ?>">Employers</a></li>
		</ul>
    </div>
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
      <?php echo $__env->make('employers::nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</nav></div>
                <div class="panel-body ">
                     <?php if($errors->has()): ?>
                         <?php foreach($errors->all() as $error): ?>
                            <div class="alert alert-danger"><?php echo e($error); ?></div>
                        <?php endforeach; ?>
                      <?php endif; ?>
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
        ajax: '<?php echo e(asset("jobs/myjobsajax")); ?>',
        columns: [
            { data: null, name: 'sno', 'orderable': true, 'searchable': false },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
               
                return '<a href="<?php echo e(asset("jobs/")); ?>/' + data.id + '">'+data.job_title  +'</a>';
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
               
                return '<a href="<?php echo e(asset("jobs/applications/")); ?>/' + data.id + '">('+data.applications.length  +')</a>';
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>