<?php $__env->startSection('content'); ?>
<div class="">
  <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="row">
    <div class="col-md-12 list-col ">
      <?php echo $__env->make('seeker::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
  </div>
    <div class="row">
        <div class="col-md-3 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Manage Resume</h4>
                </div>
                <div class="panel-body ">
                    <?php echo $__env->make('seeker::left_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-9 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Skills</h4>
                </div>
                <div class="panel-body ">
                  <a href="../update_skill/<?php echo e($resumeid); ?>/0" class="btn btn-success">Add new</a>
                  <br/><br/>
                    <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
<div class="table-responsive">
  <table class="table">
   <tr>
      <th>#</th>
      <th>Name</th>
      <th>Level</th>
      <th>Actions</th>
   </tr>
   <?php foreach($skill as $a): ?>
   <tr>
      <td>#</td>
      <td><?php echo e($a->name); ?></td>
      <td><?php echo e($a->skilllevel->name); ?></td>
      <td><a href="../update_skill/<?php echo e($a->resume_id); ?>/<?php echo e($a->id); ?>" class="fa fa-edit"></a> | <a onclick="return confirm('Are you sure you want to delete?')" href="../delete_skill/<?php echo e($a->resume_id); ?>/<?php echo e($a->id); ?>" class="fa fa-remove"></a></td>
   </tr>
   <?php endforeach; ?>
  </table>
</div>
                </div>
            </div>
        </div>
         
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>