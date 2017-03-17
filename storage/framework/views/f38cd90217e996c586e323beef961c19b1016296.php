<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                     <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="col-md-3 text-center">
                        <div class="img-thumbnail">
                            <a href="<?php echo e(asset($country . '/company/' . $j->user_id)); ?>">
                                <div class="thumb " style="width:150px;height:150px;line-height:inherit;background-color:transparent;font-size:75px;">
                                    <img style="max-width:auto;align-items:" class="img" src="<?php echo e(asset($j->companies->company_logo)); ?>">
                                </div>
                            </a>
                        </div> 
                    </div>
                    <div class="col-md-9 mobile-center">
                        <div class="row">
                            <div class="col-md-8 pow1">
                                <h4><?php echo e($j->job_title); ?></h4>
                            </div>
                            <div class="col-md-4 pow1">
                                <div class="col-md-6">

                                    <a href="<?php echo e(url($country . '/seekers/apply/' . $j->id )); ?>"  class="btn btn-primary btn-empty btn-lg">Apply</a> 
                                </div>
                                 <div class="col-md-6">
                                    <button type="button" class="save btn btn-primary btn-empty btn-lg" value="<?php echo e($j->id); ?>">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 pow1">
                                <h5><?php echo e($j->companies->company_name); ?></h5>
                            </div>
                        </div>
                        <br/>
                        <ul class="list-unstyled list-columns mt5 row pow">
                            <li class="col-md-3 col-xs-6 result result-border">
                                <div class="text-muted">Job Type</div>
                                <a href="<?php echo e(asset($country . '/jobs/job-type/' . $j->jobtype['seo'] )); ?>" title="<?php echo e($j->jobtype['name']); ?> Jobs in Pakistan"><?php echo e($j->jobtype['name']); ?></a>
                            </li>
                            <li class="col-md-3 col-xs-6 result result-border">
                                <div class="text-muted">Shift</div>
                                <a href="<?php echo e(asset($country . '/jobs/shift/' . $j->shift['seo'] )); ?>" title="<?php echo e($j->shift['name']); ?> Jobs in Pakistan"><?php echo e($j->shift['name']); ?></a>
                            </li>
                            <li class="col-md-3 col-xs-6 result result-border">
                                <div class="text-muted">Experiance</div>
                                <a href="<?php echo e(asset($country . '/jobs/experiance/' . $j->experiance['seo'] )); ?>" title="<?php echo e($j->experiance['name']); ?> Jobs in Pakistan"><?php echo e($j->experiance['name']); ?></a>
                            </li>
                            <li class="col-md-3 col-xs-6 result">
                                <div class="text-muted">Salary</div>
                                <?php echo e($j->currency_min); ?> - <?php echo e($j->salary_max); ?>

                            </li>
                        </ul>
                       
                    </div>

                    <div class="row ">
                        <div class="col-md-12 ">
                            <div class="hor mbc"></div>
                            <h4>Job Description</h4>
                            <?php echo $j->description; ?>

                        </div>
                    </div>  <br/>
                    <div class="row ">
                        <div class="col-md-12 ">
                            <h4>Skills</h4>
                            <?php echo $j->required_skills; ?>

                        </div>
                    </div>
                    <?php if(count($j->benefits)>0): ?>
                    <br/>
                    <div class="row ">
                        <div class="col-md-12 ">
                            <h4>Benefits</h4>
                            <ul class="list-tags">
                            <?php foreach($j->benefits as $benefit): ?>
                                    <?php echo '<li > ' . $benefit->name . '</li>'; ?>

                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                    <br/>
                    <div class="row ">
                        <div class="col-md-12 ">
                            <h4>Job Details</h4>
                            <div class="table-grid table-grid-bordered mb20">
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Category</div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell">
                            <a href="<?php echo e(asset($country .'/jobs/category/' . $j->categories['seo'] )); ?>" title="<?php echo e($j->categories['name']); ?> Jobs in Pakistan"><?php echo e($j->categories['name']); ?></a>
                        </div>
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active"><span class="hidden-xs">Requires</span> Traveling</div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell"><?php echo e(($j->required_travelling?'Yes':'No')); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Career <span class="hidden-xs">Level</span></div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell">
                            <a href="<?php echo e(asset($country . '/jobs/experiance/'. $j->experiance['seo'] )); ?>" title="<?php echo e($j->experiance['name']); ?> Jobs in Pakistan"><?php echo e($j->experiance['name']); ?></a>
                        </div>
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Qualification</div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell"><?php echo e($j->qualifications); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Posted <span class="hidden-xs">on</span></div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell"><?php echo e(date("M d, Y",strtotime($j->created_at))); ?></div>
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active"><span class="hidden-xs">Total</span> Vacancies</div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell"><?php echo e($j->number_of_positions); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Last Date</div>
                        <div class="col-md-10 col-sm-7 col-xs-7 cell"><?php echo e(date("M d, Y",strtotime($j->job_expiry))); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Location(s)</div>
                        <div class="col-md-10 col-sm-7 col-xs-7 cell">
                             <?php /**/ $sep = '' /**/ ?> 
                                <?php foreach($j->cities as $c): ?>
                                
                                    <?php if($sep != ''): ?>
                                        <?php /**/ $sep = $sep . '<span>,</span> ' /**/ ?>
                                        
                                    <?php endif; ?>
                                    <?php /**/ $sep =  $sep . '<a href="'. asset('/'. $country .'/jobs/'). '/city/'. $c->seo . '">' . $c->Name. '</a>' /**/ ?>
                                  
                                
                                <?php endforeach; ?>
                                <?php echo $sep; ?> - Pakistan
                                
                        </div>
                    </div>


            </div>  
            <div class="hor mbc"></div>
                    <div class="row">

                        <div class="col-md-12 ">
                            <div class="col-md-6 text-center">
                                <div style="border-style:solid; border-width:1px; border-color:#ccc; height:300px;width:300px">

                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div style="border-style:solid; border-width:1px; border-color:#ccc; height:300px;width:300px">

                                </div>
                            </div>
                        </div>
                    </div>
<div class="hor mbc"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?php echo e($j->companies->company_name); ?></h4>
                            <h5><?php echo e($j->companies->city->Name); ?>, <?php echo e($j->companies->country->Name); ?></h5>
                            <?php echo strlen($j->companies->about_company)>255?substr($j->companies->about_company,0,255) . '<br/><a href="'.asset($country .'/company/' . $j->user_id).'">[more]</a>' : $job->description; ?>

                        </div>
                    </div>

                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-md-3">
            Google Ads
        </div>
    </div>
</div>
<script>
$('.save').click(function() {
    $.ajax({
        url: "<?php echo e(url($country . '/seekers/save-job')); ?>",
            data: {
                "job_id" :$(this).val(),
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            error: function(xhr, status, error) {
                if(xhr.status == 401)
                {
                    window.location="<?php echo e(url($country . '/account/login')); ?>";
                }
                else
                {
                    notify('danger','Error while saving Job, try again !!!');
                }
            },
            success: function(data) {
                if(data==-1)
                    notify('success','You already saved this Job.');
                else
                    notify('success','Job Saved Successfully');
            },

        type: 'POST'
    });

});

function notify(t,m){
    $.notify({
            // options
            message: m 
        },{
            // settings
            type: t,
            offset: 250,
            allow_dismiss:false,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },

            placement: {
                from: "top",
                align: "center"
            },
        });
}
</script>

<script src="<?php echo e(asset('js/bootstrap-notify.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>