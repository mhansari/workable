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
                         <?php foreach($j as $list): ?> 

                        <li class="media col-md-4  mt0">
                            <div onclick="r('<?php echo e($list->id); ?>');" class="box" style="cursor: pointer;">
                                <div class="media-left pt0 pr10">
                                    <a href="<?php echo e(asset($country . '/jobs/' . $list->id)); ?>" title="Job in <?php echo e($list->companies->company_name); ?>">                                                        
                                        <div class="thumb-latest " style="width:50px;height:50px;line-height:inherit;background-color:transparent;font-size:25px;">
                                            <span class="helper"></span>
                                            <img style="max-width:auto" src="<?php echo e(asset($list->companies->company_logo)); ?>" alt="Jobs in <?php echo e($list->companies->company_name); ?>">
                                        </div>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="item-actions autohide pull-right">                                    
                                    </div>
                                    <div class="media-heading b" style="height:16px;overflow:hidden;">
                                        <a href="<?php echo e(asset($country . '/jobs/' . $list->id)); ?>" title="<?php echo e($list->job_title); ?> job in <?php echo e($list->companies->company_name); ?>"><?php echo e($list->job_title); ?></a>
                                    </div>
                                    <div class="small">
                                        <div style="height:16px;overflow:hidden;"><?php echo e($list->companies->company_name); ?></div>
                                        <div style="height:16px;overflow:hidden;">
                                            <?php if(count($list->cities)>0): ?>
                                                <?php echo e($list->cities[0]->Name); ?>, 
                                            <?php endif; ?>
                                            <?php echo e($list->countries->Name); ?></div>
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
<script>
    function r(i)
    {
        location.href="<?php echo e(asset($country . '/jobs/')); ?>/" + i;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>