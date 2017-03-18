<?php $__env->startSection('content'); ?>
<div class="container">
<?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="row">
    <div class="col-md-12 list-col ">

            <?php echo $__env->make('employers::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        
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
   
              <?php echo e(Form::open(array('url'=> route('emp.savevanue',array('country'=>$country)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

            <div class="col-md-10 col-md-offet-1">
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Title</label>
                <?php echo e(Form::input('text', 'title', $obj->title,['data-error'=>'Required','id'=>'title', 'placeholder'=>'Title', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Address</label>
                <?php echo e(Form::textarea('address', $obj->address,['data-error'=>'Required','id'=>'address', 'placeholder'=>'Address', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              
              <div class="form-group">
                  <label for="CountryID" class="col-sm-3 control-label">Country</label>
                  <?php echo Form::select('CountryID', $countries, $obj->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']); ?>

                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                  <?php echo Form::select('StateID', $states, $obj->state_id, ['data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required']); ?>

                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="CityID" class="col-sm-3 control-label">City</label>
                  <?php echo Form::select('CityID', $cities, $obj->city_id, ['data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']); ?>

                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Contact Person</label>
                <?php echo e(Form::input('text', 'contact_person', $obj->contact_person,['data-error'=>'Required','id'=>'contact_person', 'placeholder'=>'Contact Person', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Phone</label>
                <?php echo e(Form::input('text', 'phone', $obj->phone,['data-error'=>'Required','id'=>'phone', 'placeholder'=>'Phone', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Mobile</label>
                <?php echo e(Form::input('text', 'mobile', $obj->mobile,['data-error'=>'Required','id'=>'mobile', 'placeholder'=>'Mobile', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Fax</label>
                <?php echo e(Form::input('text', 'fax', $obj->fax,['data-error'=>'Required','id'=>'fax', 'placeholder'=>'Fax', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Email</label>
                <?php echo e(Form::input('text', 'email', $obj->email,['data-error'=>'Required','id'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Instructions</label>
                <?php echo e(Form::textarea('instructions', $obj->instructions,['data-error'=>'Required','id'=>'instructions', 'placeholder'=>'Instructions', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
<input type="hidden" id="vanue_id" name="vanue_id" value="<?php echo e($obj->id); ?>">
            </div>
            <?php echo Form::token(); ?>


                           
                    <?php echo e(Form::close()); ?>

          </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
function loadStates(CountryId, StateId)
{
   if(CountryId >0 && CountryId != ""){
       $.get("<?php echo e(asset('/admin/states/getbycountry/')); ?>/" + CountryId, function(data){
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
  $.get("<?php echo e(asset('/admin/cities/getbystate/')); ?>/" + StateId, function(data){
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
<?php elseif($obj->country_id >0): ?>
loadStates(<?php echo e($obj->country_id); ?>,"<?php echo e($obj->state_id); ?>");
<?php endif; ?>
<?php if(count(old('StateID'))>0): ?>
  loadCities("<?php echo e(old('StateID')); ?>","<?php echo e(old('CityID')); ?>");
<?php elseif($obj->state_id >0): ?>
loadCities("<?php echo e($obj->state_id); ?>","<?php echo e($obj->city_id); ?>");
<?php endif; ?>


 $('#CountryID').on('change', function(e){
            var CountryId = e.target.value;
            loadStates(CountryId,0);
        });
$('#StateID').on('change', function(e){
            var StateID = e.target.value;
            loadCities(StateID,0);
        });

  CKEDITOR.replace( 'details' , {
          width:450,
      toolbar: [
      
      { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
      { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList'] },
      { name: 'clipboard', groups: [ 'undo' ], items: ['Undo', 'Redo' ] }
  ]
  });
  CKEDITOR.replace( 'skills' , {
          width:450,
      toolbar: [
      
      { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
      { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList'] },
      { name: 'clipboard', groups: [ 'undo' ], items: ['Undo', 'Redo' ] }
  ]
  });
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>