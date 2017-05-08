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
                <div class="panel-heading"><h4>Manage Resume</h4></div>
                <div class="panel-body ">
                    <?php echo $__env->make('seeker::left_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-9 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Update Profile Picture</h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::open(array('url'=> route('uploadpp',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form','files'=>'true'))); ?>

                    <div class="form-group"> 
                    <label for="logo" class="col-md-3 control-label"></label>
                    <div class="col-md-9" style=" padding-left: inherit;">
                    <thumb>
                                            <div class="thumb-latest-profile" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                                                <span class="helper"></span>
                                                <img src="../../<?php echo e($user->pp==''?'pp/placeholder.png':$user->pp); ?>">
                                            </div>
                                        </thumb>
                                        </div>
                         </div>
                        <div class="form-group">                               
                        <label for="logo" class="col-md-3 control-label">Select Picture</label>
                        <div class="col-md-9" style=" padding-left: inherit;">
                            <?php echo e(Form::file('logo', ['data-show-remove'=>'false','data-show-upload'=>'false','data-allowed-file-extensions'=>'["png", "gif","jpeg","jpg"]','data-show-preview'=>'false','data-validate'=>'true','data-error'=>'Required', 'placeholder'=>'Select Logo', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                        </div>
                        <div class="help-block with-errors error-label col-md-3"></div>
                    </div>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 upload-margin">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
         
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>