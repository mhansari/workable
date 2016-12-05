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
                    
                </div>
            </div>
        </div>
         
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>