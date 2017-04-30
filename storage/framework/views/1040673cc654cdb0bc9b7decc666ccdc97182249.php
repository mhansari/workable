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
                <div class="panel-heading">
                    <h4>Edit Profile</h4>
                </div>
            <div class="panel-body ">
                <?php if(Session::has('flash_message')): ?>
                    <div class="alert alert-success">
                    <?php echo e(Session::get('flash_message')); ?>

                    </div>
                <?php endif; ?>
                <?php echo e(Form::open(array('url'=> route('update.profile',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">First Name</label>
                    <?php echo e(Form::input('text', 'firstname', $user->first_name,['data-error'=>'Required','id'=>'firstname', 'placeholder'=>'First Name', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Last Name</label>
                    <?php echo e(Form::input('text', 'lastname', $user->last_name,['data-error'=>'Required','id'=>'lastname', 'placeholder'=>'Last Name', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="mobile_number" class="col-sm-3 control-label">Mobile</label>
                    <?php echo e(Form::input('text', 'mobile_number', $user->mobile_phone,['data-error'=>'Required','id'=>'mobile_number', 'placeholder'=>'Mobile Number', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                    <?php echo Form::select('gender', array('Male'=>'Male','Female'=>'Female'), $user->gender, ['data-error'=>'Required', 'id'=>'gender','class'=>'input-width form-control','placeholder'=>'Gender','required'=>'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                    <?php echo e(Form::input('text', 'dob', $user->dob,['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'dob','placeholder'=>'Date of Birth', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="CountryID" class="col-sm-3 control-label">Country</label>
                    <?php echo Form::select('CountryID', $countries, $user->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                    <?php echo Form::select('StateID', $states, null, ['' => '','data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="CityID" class="col-sm-3 control-label">City</label>
                    <?php echo Form::select('CityID', $cities, null, ['data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>
                
                
                
                <?php echo Form::token(); ?>


                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Submit</button>

                        <input type="hidden" id="stid" value="<?php echo e(old('StateID')); ?>" />
                        <input type="hidden" id="cntid" value="<?php echo e(old('CountryID')); ?>" />
                        <input type="hidden" id="ctid" value="<?php echo e(old('CityID')); ?>" />
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function loadStates(CountryId, StateId)
{
   if(CountryId >0 && CountryId != ""){
       $.get("<?php echo e(asset('/' . $country . '/admin/states/getbycountry/')); ?>/" + CountryId, function(data){
            $('#StateID').empty();
            $('#StateID').append('<option value>Please select State/Province</option>');
            $('#CityID').empty();
            $('#CityID').append('<option value>Please select City</option>');
            $.each(data, function(index, countryObj){
                $('#StateID').append('<option value="'+ countryObj.id+'">'+ countryObj.Name + '</option>');
            });   
              $('#StateID > [value="'+StateId+'"]').attr("selected", "true");
       });
    }
    else
    {
        $('#StateID').empty();
        $('#StateID').append('<option value>Please select State/Province</option>');
        $('#CityID').empty();
        $('#CityID').append('<option value>Please select City</option>');
    }
}
function loadCities(StateId, CityId)
{
  $('#CityID').empty();
            $('#CityID').append('<option value>Please select City</option>');
  $.get("<?php echo e(asset('/' . $country . '/admin/cities/getbystate/')); ?>/" + StateId, function(data){
    $.each(data, function(index, stateObj){
      //alert(stateObj.Name);
      $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
    });
    $('#CityID > [value="'+CityId+'"]').attr("selected", "true");
  });
}

jQuery( document ).ready(function( $ ) {
<?php if(old('CountryID')>0): ?>
  loadStates(<?php echo e(old('CountryID')); ?>,"<?php echo e(old('StateID')); ?>");
<?php elseif($user->country_id >0): ?>
loadStates(<?php echo e($user->country_id); ?>,"<?php echo e($user->state_id); ?>");
<?php endif; ?>
<?php if(count(old('StateID'))>0): ?>
  loadCities("<?php echo e(old('StateID')); ?>","<?php echo e(old('CityID')); ?>");
<?php elseif($user->state_id >0): ?>
loadCities("<?php echo e($user->state_id); ?>","<?php echo e($user->city_id); ?>");
<?php endif; ?>


 $('#CountryID').on('change', function(e){
            var CountryId = e.target.value;
            loadStates(CountryId,0);
        });
$('#StateID').on('change', function(e){
            var StateID = e.target.value;
            loadCities(StateID,0);
        });

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>