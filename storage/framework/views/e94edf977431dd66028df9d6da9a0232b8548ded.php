<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    <?php echo e(Form::open(array('url'=>route('search',array('country'=>$country)),'id'=>'demo-form', 'data-parsley-validate'=>'parsley-validate'))); ?>

                     <ul class="list-group">
                        <li class="col-md-7 list-group-item form-list"><?php echo Form::input('text','keywords', '', ['id'=>'keywords','class'=>'form-control','placeholder'=>'Job Title, Skills or Company']); ?></li>
                        <li class="col-md-3 list-group-item form-list"><?php echo Form::select('category_id', $obj2, null, ['id'=>'category_id','class'=>'form-control','placeholder'=>'Select Category']); ?></li>
                        <li class="col-md-2 list-group-item form-list text-center"><button type="submit" id="submit" class="btn btn-success">Search</button></li>
                    </ul>
                    <?php echo Form::close(); ?>

                </div>
            </div>

            <!--div class="panel panel-default">
                <div class="panel-heading panel-height">
                    <div class="col-md-12">    Categories</div>
                </div>
                <div class="panel-body">               
                    <ul class="list-group">
                        <?php foreach($obj as $key => $value): ?>                                                      
                            <li class="col-md-4 col-sm-6 col-xs-12 list-group-item list"><a href="jobs/<?php echo e($config['DEFAULT_COUNTRY']->v); ?>/<?php echo e($key); ?>"><?php echo e($value); ?></a></li>
                        <?php endforeach; ?>
                    </ul>               
                </div>
            </div-->
            <div class="panel panel-default">
                <div class="panel-heading panel-height">
                    <div class="col-md-12">Latest Jobs</div> 
                </div>

                <div class="panel-body">                    
                    <ul class="media-list row list-compact">
                        
                        <?php foreach($j as $job): ?>
                            <li class="media col-md-4 mt0">
                            <div class="box">
                                <div class="media-left pt0 pr10">
                                    <a href="/jobs/job/164375">
                                        <thumb>
                                            <div class="thumb-latest" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                                                <span class="helper"></span>
                                                <img src="<?php echo e($job->companies->company_logo); ?>">
                                            </div>
                                        </thumb>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading b" style="height:16px;overflow:hidden;"><a href="/jobs/job/164375"><?php echo e($job->job_title); ?></a></div>
                                    <div class="text-sm">
                                        <div style="height:16px;overflow:hidden;"><?php echo e($job->companies->company_name); ?></div>
                                        <div style="height:16px;overflow:hidden;"><?php echo e((count($job->cities)>0?$job->cities[0]->Name . ', ':'')); ?>

                                        <?php echo e($job->countries->Name); ?></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-height">
                    <div class="col-md-12">Job Seekers</div> 
                </div>

                <div class="panel-body">                    
                    <ul class="media-list row list-compact">
                        
                        <?php foreach($s as $seeker): ?>
                            <li class="media col-md-4 mt0">
                            <div class="box">
                                <div class="media-left pt0 pr10">
                                    <a href="<?php echo e(asset($country . '/seekers/profile/' . $seeker->id)); ?>">
                                        <thumb>
                                            <div class="thumb-latest-profile" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                                                <span class="helper"></span>
                                                <img src="<?php echo e($seeker->pp==''?'pp/placeholder.png':$seeker->pp); ?>">
                                            </div>
                                        </thumb>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading b" style="height:16px;overflow:hidden;"><a href="<?php echo e(asset($country . '/seekers/profile/' . $seeker->resume_id)); ?>"><?php echo e($seeker->first_name); ?> <?php echo e($seeker->last_name); ?></a></div>
                                    <div class="text-sm">
                                        <div style="height:16px;overflow:hidden;"><?php echo e($seeker->experiance->last()['job_title']); ?></div>
                                        <div style="height:16px;overflow:hidden;">
                                        <?php echo e($seeker->city->Name); ?>, 
                                        <?php echo e($seeker->country->Name); ?></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>