<?php $__env->startSection('content'); ?>
<?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
  <div class="col-md-12 list-col ">
    <?php echo $__env->make('employers::nav', array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>        
</div>
<div class="row">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Schedule Interview</h4>
    </div>
    <div class="panel-body ">
      <?php if(Session::has('flash_message')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('flash_message')); ?>

        </div>
      <?php endif; ?>
      <?php if($errors->has()): ?>
         <?php foreach($errors->all() as $error): ?>
            <div class="alert alert-danger"><?php echo e($error); ?></div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php echo e(Form::open(array('url'=> route('scheduleinterview',array('country'=>$country,'application_id'=>$application_id)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

        <div class="col-md-10 col-md-offet-1">
          <div class="form-group">
            <label for="vanue" class="col-sm-3 control-label">Vanue</label>
            <?php echo e(Form::select('vanue', $vanues,$obj->vanue_id,['data-error'=>'Required','id'=>'Vanue', 'placeholder'=>'Select Vanue', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="interviewer" class="col-sm-3 control-label">Interviewer(s)</label>
            <?php echo e(Form::input('text','interviewer',$obj->interviewer,['data-error'=>'Required','id'=>'interviewer', 'placeholder'=>'Interviewer(s)', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="date" class="col-sm-3 control-label">Interview Date</label>
            <?php echo e(Form::input('text','date',date('m/d/Y',strtotime($obj->interview_date)),['data-error'=>'Required','id'=>'interviewer', 'placeholder'=>'Interview Date', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="time" class="col-sm-3 control-label">Interview Time</label>
            <?php echo e(Form::select('time', $slot,date('g:i A',strtotime($obj->interview_time)),['data-error'=>'Required','id'=>'time', 'placeholder'=>'Select Time', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="duration" class="col-sm-3 control-label">Interview Duration</label>
            <?php echo e(Form::input('number', 'duration',$obj->duration,['data-error'=>'Required','id'=>'time', 'placeholder'=>'Duration', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

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
<script type="text/javascript">

function select_applications(application_ids)
{

  var s = (application_ids+'').split(",");
  
    for(i=0;i<s.length; i++){

      $('#ApplicationID > [value="'+s[i]+'"]').attr("selected", "true");
    }
    $('#ApplicationID').multiselect('rebuild'); 

}
jQuery( document ).ready(function( $ ) {

   $('input[name="date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
$('#ApplicationID').multiselect({
    enableCaseInsensitiveFiltering:true
  });

select_applications("<?php echo e($application_id); ?>");

});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>