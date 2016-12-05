<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 list-col col-md-offset-3">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Login
                </h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('msg')): ?>
                    <div class="alert alert-danger">
                          <strong>Error!</strong> <?php echo e(Session::get('msg')); ?>

                        </div>
                    <?php endif; ?>
                    
                   <?php echo e(Form::open(array('url'=> route('emp.dologin'),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

                    <div class="col-md-12">
 
                       
                <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                               
                                <label for="email" class="control-label">Email</label>
                                <?php echo e(Form::input('email', 'email', '',['type'=>'email','data-error'=>'Invalid email address','id'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'class'=>'form-control'])); ?>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                                <?php echo e(Form::input('password', 'password', '',['data-minlength'=>'6','data-error'=>'Required','id'=>'password', 'placeholder'=>'Password', 'required'=>'required', 'class'=>'form-control'])); ?>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::checkbox('remember', '1', '',['id'=>'remember'])); ?> Remember me
                            </div>
                        </div>

                       <?php echo Form::token(); ?>

                </div>
                 <div class="col-md-12 col-md-offset-5">
                           <div class="form-group">
    <button type="submit" class="btn btn-primary">Login</button>
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