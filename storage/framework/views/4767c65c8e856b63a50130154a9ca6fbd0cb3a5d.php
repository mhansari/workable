<?php $__env->startSection('content'); ?>
<div class="container">
<?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-12 list-col ">
      <?php echo $__env->make('seeker::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<div class="row">
        <div class="col-md-12 list-col ">
dfgdfg
        </div>

    </div>


</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>