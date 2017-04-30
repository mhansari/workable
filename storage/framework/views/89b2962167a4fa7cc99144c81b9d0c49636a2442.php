<?php $__env->startSection('content'); ?>
<div class="">
    <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
  <div class="col-md-12 list-col ">
      <?php echo $__env->make('employers::nav', array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Privacy Settings</h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::open(array('url'=> route('update.privacy',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

                    <?php foreach($privacy_options as $pv): ?>
                        <div class="col-md-12"> 
                            <div class="row">
                                <div class="col-md-1" >
                                    <div class="checkbox checkbox-success checkbox-circle text-right">
                                        <input name="pv[]" id="qualification" type="checkbox" value="<?php echo e($pv->options[0]->id); ?>" <?php echo e($pv->visible?'checked':''); ?>>
                                        <label for="qualification"></label>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <strong>Make <?php echo e($pv->options[0]->privacy_option); ?> visible</strong>
                                </div>
                                
                            </div>
                        </div>
                    <?php endforeach; ?>
                        
<div class="form-group">
    <div class="col-md-5 col-md-offset-4">
    <button type="submit" class="btn btn-primary">Update</button>
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