<?php $__env->startSection('content'); ?>
<div class="">
    <div class="row">
     <div class="col-md-12">
        <div class="col-md-3 list-col">
           <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body search-ul-padding">
                    <?php echo e(Form::open(array('url'=>route('advsearch',array('country'=>$cntry->seo)),'id'=>'demo-form', 'data-parsley-validate'=>'parsley-validate'))); ?>

                     <ul class="list-group ">
                        <li class="col-sm-12 list-group-item form-list"><?php echo Form::select('category_id', $obj2, null, ['id'=>'category_id','class'=>'form-control','placeholder'=>'Category']); ?></li>
                        <li class="col-sm-12 list-group-item form-list"><?php echo Form::select('experiance_id', $el, null, ['id'=>'experiance_id','class'=>'form-control','placeholder'=>'Experiance']); ?></li>
                        
                        <li class="col-sm-6 list-group-item form-list form-sm search-li-padding-right"><?php echo Form::input('text','MinS', null, ['id'=>'MinS','class'=>'form-control col-md-6','placeholder'=>'Min Salary']); ?></li>
                        <li class="col-sm-6 list-group-item form-list form-sm search-li-padding-left"><?php echo Form::input('text','MaxS',  null, ['id'=>'MaxS','class'=>'form-control col-md-6','placeholder'=>'Max Salary']); ?></li>                       
                        <li class="col-sm-12 list-group-item form-list text-center"><button type="submit" id="submit" class="btn btn-primary">Search</button></li>
                    </ul>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div> 
         <div class="col-md-9 list-col">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Search Jobs in <?php echo e($cntry->Name); ?> </h4></div>
                <div class="panel-body ">
                    <?php if(count($j)<1): ?>
                        <span class="col-md-12 alert alert-danger text-center">There is no job available in the selected category.</span>
                    <?php endif; ?> 

                    <?php foreach($j as $job): ?>
             
                    <div class="panel panel-default"><div class="panel-body ">
                         <ul class="list-group box-search">
                            <li class="col-md-10 list-group-item result "><a href="<?php echo e(asset($cntry->seo .'/jobs/' . $job->id)); ?>"><strong><?php echo e($job->job_title); ?></strong></a></li>
                            <li class="col-md-2 list-group-item result text-right">
                                    <?php if(floor((time() - strtotime($job->created_at)) /  (60 * 60 * 24))<=$config['SHOW_NEW_OLD_DAYS']->v): ?>
                                        <span class="label label-default">New</span>
                                    <?php endif; ?> 
                                </li>
                            <li class="col-md-12 list-group-item result">
                                <a href="<?php echo e(asset($cntry->seo .'/company/'.$job->user_id)); ?>" title="Full-Time Jobs in Pakistan"><?php echo e($job->companies->company_name); ?></a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Job Type</div>
                                <a href="<?php echo e(asset($cntry->seo .'/jobs/job-type/'. $job->jobtype['seo'] )); ?>" title="<?php echo e($job->jobtype['name']); ?> Jobs in Pakistan"><?php echo e($job->jobtype['name']); ?></a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Shift</div>
                                <a href="<?php echo e(asset($cntry->seo .'/jobs/shift/'. $job->shift['seo'] )); ?>" title="<?php echo e($job->shift['name']); ?> Jobs in Pakistan"><?php echo e($job->shift['name']); ?></a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Experiance</div>
                                <a href="<?php echo e(asset($cntry->seo .'/jobs/experiance/'. $job->experiance['seo'] )); ?>" title="<?php echo e($job->experiance['name']); ?> Jobs in Pakistan"><?php echo e($job->experiance['name']); ?></a>
                            </li>
                            <li class="col-md-3 list-group-item result">
                                <div class="text-muted">Salary</div>
                                <?php echo e($job->currency_min); ?> - <?php echo e($job->salary_max); ?>

                            </li>
                            <li class="col-md-12 list-group-item result"><?php echo strlen($job->description)>255?substr($job->description,0,255) . "..." : $job->description; ?></li>
                            <li class="col-md-5 list-group-item result"><span class="glyphicon glyphicon-map-marker"></span>    
                             <?php /**/ $sep = '' /**/ ?>
                                <?php foreach($job->cities as $c): ?>
                                
                                    <?php if($sep != ''): ?>
                                        <?php /**/ $sep = $sep . '<span>,</span> ' /**/ ?>
                                        
                                    <?php endif; ?>
                                    <?php /**/ $sep =  $sep . '<a href="'. asset($cntry->seo .'/jobs/city'). '/'. $c->seo . '">' . $c->Name. '</a>' /**/ ?>
                                  
                                
                                <?php endforeach; ?>
                                <?php echo $sep; ?> - Pakistan
                            </li>
                            <li class="col-md-3 list-group-item result text-left "><span class="glyphicon glyphicon-time"></span> <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($job->created_at))->diffForHumans()); ?></li>

                            <li class="col-md-4 list-group-item result text-right"><a href="<?php echo e(url($cntry->seo . '/seekers/apply/' . $job->id )); ?>" class="btn btn-primary btn-empty btn-xs">Apply</a> <button type="button" class="btn btn-primary btn-empty btn-xs save" value="<?php echo e($job->id); ?>">Save</button></li>
                            
                        </ul>
                    </div></div>
                    <?php endforeach; ?>
                    <div class="pagination"> <?php echo e($j->links()); ?> </div>
                   
                </div>
            </div>
        </div>
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