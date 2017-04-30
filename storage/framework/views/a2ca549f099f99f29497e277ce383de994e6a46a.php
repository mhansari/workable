  <?php $__env->startSection('content'); ?>
    <div class="">
      <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="row">
        <div class="col-md-12 list-col ">
          <?php echo $__env->make('employers::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            
            <h4>Interviews </h4>
            
          </div>
          <div class="panel-body ">
            <?php if(Session::has('flash_message')): ?>
              <div class="alert alert-success">
                <?php echo e(Session::get('flash_message')); ?>

              </div>
            <?php elseif(Session::has('error_message')): ?>
            <div class="alert alert-danger">
                <?php echo e(Session::get('error_message')); ?>

              </div>
            <?php endif; ?>
            <div class="col-md-12">
              <ul class="media-list row list-compact">

                <?php foreach($interviews as $obj): ?>
                  <li class="media mt0">
                    <div class="col-md-6">
                      <div class="media-body">
                        <div>
                            <i class="text-sm glyphicon glyphicon-time "></i>&nbsp;
                                <?php echo e(date('M d, Y',strtotime($obj->interview_date))); ?>

                                <?php echo e(date('h:i A',strtotime($obj->interview_time))); ?>

                            <?php if($obj->status_id==2): ?>
                              &nbsp;&nbsp;&nbsp;| 
                              <span class="text-sm">
                                <i class="fa fa-refresh"></i>&nbsp;&nbsp;Reschedule Requested
                              </span>
                            <?php endif; ?>
                          </div>

                          <div class="text-sm"><i class="glyphicon glyphicon-map-marker"></i> 
                            <?php echo e($obj->vanue->title); ?>, <?php echo e($obj->vanue->city->Name); ?>, <?php echo e($obj->vanue->country->Name); ?>                          </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-sm text-warning">
                    <?php if($obj->status_id==2): ?>
                      The applicant has requested to reschedule interview at <?php echo e(date('M d, Y',strtotime($obj->re_interview_date))); ?>

                                <?php echo e(date('h:i A',strtotime($obj->re_interview_time))); ?>

                    <?php endif; ?>
                    </div>
                    <div class="col-md-2 text-sm">
                      <a href="<?php echo e(asset($country . '/employers/interview/reschedule/'. $obj->id)); ?>">Reschedule</a> | <a href="<?php echo e(asset($country . '/employers/interview/delete/'. $obj->id)); ?>">Delete</a>
                    </div>

                  </li>
                      <hr/>
                    
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
 
    </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>