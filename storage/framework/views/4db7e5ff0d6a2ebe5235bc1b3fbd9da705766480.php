  <?php $__env->startSection('content'); ?>
    <div class="container">
      <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="row">
        <div class="col-md-12 list-col ">
          <?php echo $__env->make('seeker::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
      <div class="col-md-2">
        <?php echo $__env->make('seeker::google-left',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <div class="col-md-8">
        <div class="panel panel-default">  
          <div class="panel-heading">
            <h4>Request to Re-schedule Interview</h4>
          </div>
          <div class="panel-body ">
            <div class="row">
              <?php if($errors->has()): ?>
                <?php foreach($errors->all() as $error): ?>
                <div class="alert alert-danger"><?php echo e($error); ?></div>
                <?php endforeach; ?>
              <?php endif; ?>
              <?php echo e(Form::open(array('url'=>route('reschedule.update',array('country'=>$country, 'id'=>$id)),'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator'))); ?>

              <div class="col-md-10 col-md-offet-1">
                <div class="form-group">
                  <label for="job_title" class="col-sm-3 control-label">Job Title</label>
                  <?php echo e(Form::input('text','job_title',$interviews->jobs->job_title,['data-error'=>'Required','id'=>'job_title', 'placeholder'=>'Job Title', 'required'=>'required', 'class'=>'input-width form-control', 'readonly'=>'readonly'])); ?>

                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <label for="interviewer" class="col-sm-3 control-label">Company</label>
                  <?php echo e(Form::input('text','company',$interviews->jobs->companies->company_name,['data-error'=>'Required','id'=>'company', 'placeholder'=>'Company', 'required'=>'required', 'class'=>'input-width form-control', 'readonly'=>'readonly'])); ?>

                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Interview Date</label>
                  <?php echo e(Form::input('text','date',date('m/d/Y',strtotime($interviews->interview_date)),['data-error'=>'Required','id'=>'interviewer', 'placeholder'=>'Interview Date', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <label for="time" class="col-sm-3 control-label">Interview Time</label>
                  <?php echo e(Form::select('time', $slot,date('g:i A',strtotime($interviews->interview_time)),['data-error'=>'Required','id'=>'time', 'placeholder'=>'Select Time', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              <?php echo Form::token(); ?>

              <?php echo e(Form::close()); ?>

            </div>              
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <?php echo $__env->make('seeker::google-right',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>  
    </div>
    <script type="text/javascript">
      jQuery( document ).ready(function( $ ) {
        $('input[name="date"]').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true
        });
      });
    </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>