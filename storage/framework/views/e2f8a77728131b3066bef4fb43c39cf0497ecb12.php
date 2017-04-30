<?php $__env->startSection('content'); ?>
<div class="">
    <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
      
        <div class="col-md-12 list-col ">
        <?php echo $__env->make('employers::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Alerts</h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::open(array('url'=> route('update.alerts',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

                <div class="col-md-12"> 
                    <div class="form-group">
                        <label for="service_alerts" class="col-sm-3 control-label">Services Alert</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                        <input name="service_alerts" id="service_alerts" type="checkbox" value="1" <?php echo e($notifications->service_alerts?'checked':''); ?>>
                                    <label for="service_alerts"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div> 
                <div class="form-group">
                    <label for="messages" class="col-sm-3 control-label">Messages</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                        <input name="messages" id="messages" type="checkbox" value="1" <?php echo e($notifications->messages?'checked':''); ?>>
                                    <label for="messages"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div> 
                <div class="form-group">
                    <label for="new_applications" class="col-sm-3 control-label">New Applications</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                        <input name="new_applications" id="new_applications" type="checkbox" value="1" <?php echo e($notifications->new_applications?'checked':''); ?>>
                                    <label for="new_applications"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>       
                <div class="form-group">
                    <label for="closing_jobs" class="col-sm-3 control-label">Closing Jobs</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                         <input name="closing_jobs" id="closing_jobs" type="checkbox" value="1" <?php echo e($notifications->closing_jobs?'checked':''); ?>>
                                    <label for="closing_jobs"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="daily_jobs_alerts" class="col-sm-3 control-label">Daily Job Alerts</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                        <input name="daily_jobs_alerts" id="daily_jobs_alerts" type="checkbox" value="1" <?php echo e($notifications->daily_jobs_alerts?'checked':''); ?>>
                        <label for="daily_jobs_alerts"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="CountryID" class="col-sm-3 control-label">Country</label>
                    <?php echo Form::select('CountryID', $countries, $notifications->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                  <?php echo Form::select('StateID[]', $states, '', ['data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','required'=>'required','multiple'=>"multiple"]); ?>

                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="CityID" class="col-sm-3 control-label">City</label>
                  <?php echo Form::select('CityID[]', $cities, '', ['multiple'=>'multiple','data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','required'=>'required']); ?>

                  <div class="help-block with-errors"></div>
              </div>
                 <div class="form-group">
                    <label for="CategoryID" class="col-sm-3 control-label">Categories</label>
                    <?php echo Form::select('CategoryID[]', $industries,'', ['multiple'=>'multiple','data-error'=>'Required', 'id'=>'CategoryID','class'=>'input-width form-control','required'=>'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>

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

<script>

function loadStates(CountryId, StateId)
{
  var s = (StateId+'').split(",");

   if(CountryId >0 && CountryId != ""){
       $.get("<?php echo e(asset($country . '/admin/states/getbycountry/')); ?>/" + CountryId, function(data){
            $('#StateID').empty();
            //$('#StateID').append('<option value>Please select State/Province</option>');
            $('#CityID').empty();
           // $('#CityID').append('<option value>Please select City</option>');
            $.each(data, function(index, countryObj){
                $('#StateID').append('<option value="'+ countryObj.id+'">'+ countryObj.Name + '</option>');
            });   
            $('#CityID').multiselect('rebuild'); 
            for(i=0;i<s.length; i++){
              $('#StateID > [value="'+s[i]+'"]').attr("selected", "true");
            }
          $('#StateID').multiselect('rebuild'); 
       });
    }
    else
    {
        $('#StateID').empty();
        $('#StateID').append('<option value>Please select State/Province</option>');
        $('#CityID').empty();
        $('#CityID').append('<option value>Please select City</option>');
        $('#StateID').multiselect('rebuild'); 
        $('#CityID').multiselect('rebuild'); 
    }
}
function loadCities(StateId, CityId)
{

  var s = (CityId+'').split(",");
  $.get("<?php echo e(asset($country .'/admin/cities/getbystate/')); ?>/" + StateId, function(data){
    $.each(data, function(index, stateObj){
      //alert(stateObj.Name);
      $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
    });
    for(i=0;i<s.length; i++){
      $('#CityID > [value="'+s[i]+'"]').attr("selected", "true");
    }
    $('#CityID').multiselect('rebuild'); 
  });
}
jQuery( document ).ready(function( $ ) {

$('#CategoryID').multiselect('rebuild'); 
  var s = ("<?php echo e($notifications->category_id); ?>"+'').split(',');

    for(i=0;i<s.length; i++){
      $('#CategoryID > [value="'+s[i]+'"]').attr("selected", "true");
    }
    $('#CategoryID').multiselect('rebuild'); 


    <?php if(old('CountryID')>0): ?>
  loadStates(<?php echo e(old('CountryID')); ?>,"<?php echo e(implode(',',old('StateID'))); ?>");
<?php elseif($notifications->country_id >0): ?>
  loadStates(<?php echo e($notifications->country_id); ?>,"<?php echo e($notifications->state_id); ?>");
<?php endif; ?>
<?php if(count(old('StateID'))>0): ?>
  loadCities("<?php echo e(implode(',',old('StateID'))); ?>","<?php echo e(implode(',',old('CityID'))); ?>");
<?php elseif($notifications->state_id !=''): ?>

loadCities("<?php echo e($notifications->state_id); ?>","<?php echo e($notifications->city_id); ?>");
<?php endif; ?>
  $('#CityID').multiselect({
    enableCaseInsensitiveFiltering:true,
  });

  $('#StateID').multiselect({
    enableCaseInsensitiveFiltering:true,
        onChange : function(option, checked) {
            if($(option).val() >0 && $(option).val() != "" && checked){
              $.get("<?php echo e(asset($country .'/admin/cities/getbystate/')); ?>/" + $(option).val(), function(data){
                 $.each(data, function(index, stateObj){
                     $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
                 });
                 $('#CityID').multiselect('rebuild'); 
              });
            }
            if($(option).val() >0 && $(option).val() != "" && (!checked)){
              $.get("<?php echo e(asset($country . '/admin/cities/getbystate/')); ?>/" + $(option).val(), function(data){
                 $.each(data, function(index, stateObj){
                      $("#CityID option[value='"+ stateObj.id+ "']").remove();
                 });
                 $('#CityID').multiselect('rebuild'); 
              });
            }
        }
  });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>