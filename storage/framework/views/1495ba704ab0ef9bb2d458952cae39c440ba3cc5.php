<?php $__env->startSection('content'); ?>
<div class="">
    <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Login
                </h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('msg')): ?>
                    <div class="alert alert-danger">
                          <strong>Error!</strong> <?php echo e(Session::get('msg')); ?>

                        </div>
                    <?php endif; ?>
                    
                   <?php echo e(Form::open(array('url'=> route('emp.dologin',array('country'=>$country)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

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
                <div class="col-md-12">
                    <div style="text-align: -webkit-center; padding:5px">
                        <a href="redirect/facebook"><img style="    padding: 2px;" class="img-responsive" src="<?php echo e(asset('/images/fb-login.png')); ?>" alt="Connect with Facebook" /></a>
                        <a href="redirect/google"><img style="    padding: 2px;" class="img-responsive" src="<?php echo e(asset('/images/google-login.png')); ?>" alt="Connect with Google" /></a>
                        <a href="redirect/linkedIn"><img style="    padding: 2px;" class="img-responsive" src="<?php echo e(asset('/images/linkedin-login.png')); ?>" alt="Connect with LinkedIn" /></a>
                        <a href="redirect/twitter"><img style="    padding: 2px;" class="img-responsive" src="<?php echo e(asset('/images/twitter-login.png')); ?>" alt="Connect with Twitter" /></a>
                    </div>
                </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>         
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>