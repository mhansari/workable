<div class="panel panel-default">
    <div class="panel-body ">
        <div class="col-md-12">
        <ul class="media-list row list-compact">
        <?php foreach($interviews as $obj): ?>
            <li class="media mt0">
            <div class="col-sm-8">
                <div class="media-left pt0 pr10">
                    <a href="<?php echo e(asset($country . '/company/' . $obj->jobs->companies->user_id)); ?>">
                        <thumb>
                            <div class="thumb-latest" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                                <span class="helper"></span>
                                
                                <img src="<?php echo e(asset($obj->jobs->companies->company_logo)); ?>">
                                
                            </div>
                        </thumb>
                    </a>
                </div>
                <div class="media-body">
                    <div class="media-heading b" style="height:16px;overflow:hidden;"><a href="<?php echo e(asset($country .'/jobs/' . $obj->job_id)); ?>"><?php echo e($obj->jobs->job_title); ?></a></div>
                    <div class="text-sm">
                        <div style="height:16px;overflow:hidden;">
                        <a href="<?php echo e(asset($country . '/company/' . $obj->jobs->companies->user_id)); ?>"><?php echo e($obj->jobs->companies->company_name); ?></a></div>
                        <div style="height:16px;overflow:hidden;">
                            <div><a href="<?php echo e(route('interview.detail',array('country'=>$country,'id'=>$obj->id))); ?>">
                        <i class="  glyphicon glyphicon-calendar"></i>
                            <span>
                            View details</a> &nbsp;|
                            <?php if($obj->status_id == 1): ?>
                                <a href="<?php echo e(url($country . '/seekers/interview/confirm/' . $obj->id )); ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirm Availability</a></span> |
                            <?php elseif($obj->status_id == 3): ?>
                                <span class="text-success"><i class="material-icons"></i>&nbsp;Availability Confirmed</span> |
                            <?php endif; ?>
                            &nbsp;
                            <?php if($obj->status_id==2): ?>
                                <span class="text-warning"><i class="material-icons"></i>&nbsp;Reschedule Requested</span>
                            <?php else: ?>
                                <a href="<?php echo e(url($country . '/seekers/interview/reschedule/' . $obj->id )); ?>"><i class="fa fa-calendar" alt="Request Reschedule" aria-hidden="true"></i>&nbsp;&nbsp;Reschedule</a>
                            <?php endif; ?>                           

                        </span>
                    </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-sm">
                <div>
                    <div>
                        <i class="glyphicon glyphicon-time"></i>
                         <?php echo e(date('M d',strtotime($obj->interview_date))); ?>

                         - <?php echo e(date('h:i A',strtotime($obj->interview_time))); ?>

                        
                    </div>
                    <div><i class="glyphicon glyphicon-map-marker"></i> 
                     <?php echo e($obj->vanue->title); ?>, <?php echo e($obj->vanue->city->Name); ?>, <?php echo e($obj->vanue->country->Name); ?> </div>
                </div>
                </div>
        </li>
        <hr/>
        <?php endforeach; ?>
        </ul>
        </div>
    </div>
</div>
