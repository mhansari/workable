<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <h3>Messages</h3>

        </div>
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <?php foreach($to as $t): ?>
                <div class="row">
                   <div class="col-md-2">
                   <thumb>
                        <div class="thumb-latest-profile" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                            <span class="helper"></span>
                         <?php echo e($t); ?>

                        </div>
                    </thumb>
                   </div>
                   <div class="col-md-10">
                   d
                   </div>
                </div>
                <?php endforeach; ?>
                </div>
            </div>

        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body">
                   adasd
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>