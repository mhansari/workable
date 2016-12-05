<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1 text-center">
        <img src="<?php echo e(asset('images/map.gif')); ?>" class="img-responsive"/>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>