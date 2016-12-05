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

            <div class="panel panel-default">
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
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-height">
                    <div class="col-md-12">Latest Jobs</div> 
                </div>

                <div class="panel-body">                    
                    <ul class="media-list row list-compact">

                        <li class="col-md-4 list-group-item latest-jobs-box"></li>
                        <li class="col-md-4  list-group-item latest-jobs-box"></li>
                        <li class="col-md-4  list-group-item latest-jobs-box"></li>
                        <li class="col-md-4  list-group-item latest-jobs-box"></li>
                        <li class="col-md-4  list-group-item latest-jobs-box"></li>
                        <li class="col-md-4  list-group-item latest-jobs-box"></li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>