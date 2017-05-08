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
                <div class="panel-heading"><h4>Update Skill</h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>

                   <?php echo e(Form::open(array('class'=>'form-vertical','url'=> route('skill.save', array('country'=>$country,'id' => $id,'resumeid'=>$resumeid)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <?php echo e(Form::input('text', 'name', $skill->name,['data-error'=>'Required','id'=>'name', 'placeholder'=>'Skill', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="skill_level" class="col-sm-3 control-label">Skill Level</label>
                        <?php echo Form::select('skill_level', $skilllevels, $skill->skill_level_id, ['data-error'=>'Required', 'id'=>'skill_level','class'=>'input-width form-control','placeholder'=>'Select Skill Level','required'=>'required']); ?>

                        <div class="help-block with-errors"></div>
                    </div>
                    
<input type="hidden" value="<?php echo e($id); ?>" name="resume_id" id="resume_id" />
<?php echo Form::token(); ?>


                           <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
         
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>