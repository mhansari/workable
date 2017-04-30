<?php $__env->startSection('content'); ?>
<div class="">
    <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
       
        <div class="col-md-12 list-col ">
        <?php echo $__env->make('employers::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Change Password</h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::open(array('url'=> route('updatePassword',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

                        <div class="form-group">                               
                            <label for="company_name" class="col-sm-3 control-label">Old Password</label>
                            <?php echo e(Form::input('password', 'opwd', '',['data-error'=>'Required','id'=>'opwd', 'placeholder'=>'Old Password', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="about_company" class="col-sm-3 control-label">Password</label>
                             <?php echo e(Form::input('password', 'npwd', '',['data-error'=>'Required','id'=>'npwd', 'placeholder'=>'New Password', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="designation" class="col-sm-3 control-label">Confirm Password</label>
                             <?php echo e(Form::input('password', 'cpwd', '',['data-error'=>'Required','id'=>'cpwd', 'placeholder'=>'Confirm Password', 'data-match'=>'#npwd','required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        
<div class="form-group">
    <div class="col-md-5 col-md-offset-4">
    <button type="submit" class="btn btn-primary">Change</button>
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