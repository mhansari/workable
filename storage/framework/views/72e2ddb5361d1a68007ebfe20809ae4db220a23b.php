<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="col-md-12 text-center">
    <ul class="nav nav-pills">
      <li><a href="<?php echo e(asset('seekers/dashboard')); ?>">Job Seekers</a></li>
      <li class="active"><a href="<?php echo e(asset('employers/dashboard')); ?>">Employers</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12 list-col ">
      <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $__env->make('employers::nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
              <?php echo e(Form::open(array('url'=> route('emp.savejob',array('id'=>$job->id)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

            <div class="col-md-10 col-md-offet-1">
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Title</label>
                <?php echo e(Form::input('text', 'title', $job->job_title,['data-error'=>'Required','id'=>'title', 'placeholder'=>'Title', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="DepartmentID" class="col-sm-3 control-label">Department</label>
                <?php echo Form::select('DepartmentID', $depts, $job->department_id, ['data-error'=>'Required', 'id'=>'DepartmentID','class'=>'input-width form-control','placeholder'=>'Select Department','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="CategoryID" class="col-sm-3 control-label">Category</label>
                <?php echo Form::select('CategoryID', $categories,  $job->category_id, ['data-error'=>'Required', 'id'=>'CategoryID','class'=>'input-width form-control','placeholder'=>'Select Category','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="CareerLevelID" class="col-sm-3 control-label">Career Level</label>
                <?php echo Form::select('CareerLevelID', $career_level,  $job->career_level_id, ['data-error'=>'Required', 'id'=>'CareerLevelID','class'=>'input-width form-control','placeholder'=>'Select Career Level','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="ExperianceLevelID" class="col-sm-3 control-label">Experiance Level</label>
                  <?php echo Form::select('ExperianceLevelID', $experiance_level,  $job->experiance_level_id, ['data-error'=>'Required', 'id'=>'ExperianceLevelID','class'=>'input-width form-control','placeholder'=>'Select Experiance Level','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="NoVac" class="col-sm-3 control-label">Vacancies</label>
                  <?php echo Form::input('text','NoVac',  $job->number_of_positions, ['data-error'=>'Required', 'id'=>'NoVac','class'=>'input-width form-control','placeholder'=>'No. of Vacancies','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group"> 
                <label for="details" class="col-sm-3 control-label">Details</label>
                 <div class="col-md-9 professional-summary">
                    <?php echo e(Form::textArea('details', $job->description,['data-error'=>'Required','id'=>'details', 'required'=>'required', 'class'=>'input-width-currency form-control'])); ?>

                    <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group"> 
                <label for="skills" class="col-sm-3 control-label">Required Skills</label>
                 <div class="col-md-9 professional-summary">
                    <?php echo e(Form::textArea('skills', $job->required_skills,['data-error'=>'Required','id'=>'skills', 'required'=>'required', 'class'=>'input-width-currency form-control'])); ?>

                    <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="Qualification" class="col-sm-3 control-label">Qualifications</label>
                  <?php echo Form::input('text','Qualification', $job->qualifications, ['data-error'=>'Required', 'id'=>'Qualification','class'=>'input-width form-control','placeholder'=>'Qualification','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="type" class="col-sm-3 control-label">Type</label>
                <?php echo Form::select('type', $type, $job->job_type_id, ['data-error'=>'Required', 'id'=>'type','class'=>'input-width form-control','placeholder'=>'Select Job Type','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="shift" class="col-sm-3 control-label">Shift</label>
                  <?php echo Form::select('shift', $shift, $job->shift_timings_id, ['data-error'=>'Required', 'id'=>'shift','class'=>'input-width form-control','placeholder'=>'Select Shift','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <label for="traveling" class="col-sm-3 control-label">Required Traveling?</label>
              <div class="checkbox checkbox-success checkbox-circle">

                  <input id="traveling" name="traveling" value="1" type="checkbox" <?php echo e(Input::old('traveling')==1?'checked':''); ?> <?php echo e($job->required_travelling==1?'checked':''); ?>>
                  <label for="traveling" style="    margin-left: 20px;"></label>
              </div>
              <div class="form-group">
                <label for="salary_min" class="col-sm-3 control-label">Salary</label>
                  <?php echo Form::input('text','salary_min', $job->currency_min, ['data-error'=>'Required', 'id'=>'salary_min','class'=>'form-control  input-width-salary-min col-md-2','placeholder'=>'Min','required'=>'required']); ?>

                  <?php echo Form::input('text','salary_max', $job->salary_max, ['data-error'=>'Required', 'id'=>'salary_max','class'=>' form-control input-width-salary-max ','placeholder'=>'Max','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="salary_currency" class="col-md-3 control-label">Currency</label>
                  <?php echo Form::select('salary_currency', $currency, $job->salary_currency_id, ['data-error'=>'Required', 'id'=>'salary_currency','class'=>'input-width form-control','placeholder'=>'Select Currency','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
               <div class="form-group">
                <label for="benefits[]" class="col-md-3 control-label">Benefits</label>
                  <div class="col-md-9 benefits-checkbox-margin">
                     <?php /**/ $sep = 0 /**/ ?> 
                    <?php foreach($benefits as $benefit): ?>
                    <?php /**/ $b = '' /**/ ?> 

                    <?php for($i =0; $i<count($benefits); $i++): ?>
                        <?php if(Input::old('benefits.' . $i) == $benefit->id): ?>
                          <?php /**/ $b = 'checked' /**/ ?>
                        <?php elseif(\App\JobBenefits::checkBenefit($benefit->id,$job->id)): ?>
                          <?php /**/ $b = 'checked' /**/ ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <div class="checkbox checkbox-success checkbox-circle">
                        <input id="A<?php echo e($benefit->id); ?>" name="benefits[]" value="<?php echo e($benefit->id); ?>" <?php echo e($b); ?> type="checkbox" class="col-md-3" >
                        <label for="A<?php echo e($benefit->id); ?>" class="col-md-3 benefits-font" style="    margin-left: 20px;"><?php echo e($benefit->name); ?></label>
                    </div>
                    <?php /**/ $sep = $sep + 1 /**/ ?> 
                    <?php endforeach; ?>
                  </div>
                <div class="help-block with-errors"></div>
              </div><br/><br/>
              <div class="form-group">
                  <label for="CountryID" class="col-sm-3 control-label">Country</label>
                  <?php echo Form::select('CountryID', $countries, $job->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']); ?>

                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                  <?php echo Form::select('StateID[]', $states, '', ['data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required','multiple'=>"multiple"]); ?>

                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="CityID" class="col-sm-3 control-label">City</label>
                  <?php echo Form::select('CityID[]', $cities, '', ['multiple'=>'multiple','data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']); ?>

                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="last_date" class="col-sm-3 control-label">Completion Date</label>
                  <?php echo e(Form::input('text', 'last_date',date("m/d/Y",strtotime($job->job_expiry)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'date_of_completion','placeholder'=>'Date of Completion', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="after_expiry_actions" class="col-sm-3 control-label">After Expiry</label>
                <?php echo Form::select('after_expiry_actions', $after_expiry_actions, $job->after_expiry_actions_id, ['data-error'=>'Required', 'id'=>'after_expiry_actions','class'=>'input-width form-control','placeholder'=>'Select After Expiry','required'=>'required']); ?>

                <div class="help-block with-errors"></div>
              </div>
              <label for="traveling" class="col-sm-3 control-label">Email resume</label>
              <div class="checkbox checkbox-success checkbox-circle">
                  <input id="email_resume" name="email_resume" type="checkbox" value="1" <?php echo e(Input::old('email_resume')==1?'checked':''); ?>  <?php echo e($job->email_resume==1?'checked':''); ?>>
                  <label for="email_resume" style="    margin-left: 20px;"></label>
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
</div>
<script type="text/javascript">
function loadStates(CountryId, StateId)
{
  var s = (StateId+'').split(",");

   if(CountryId >0 && CountryId != ""){
       $.get("<?php echo e(asset('/admin/states/getbycountry/')); ?>/" + CountryId, function(data){
            $('#StateID').empty();
            $('#StateID').append('<option value>Please select State/Province</option>');
            $('#CityID').empty();
            $('#CityID').append('<option value>Please select City</option>');
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
  $.get("<?php echo e(asset('/admin/cities/getbystate/')); ?>/" + StateId, function(data){
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
<?php if(old('CountryID')>0): ?>
  loadStates(<?php echo e(old('CountryID')); ?>,"<?php echo e(implode(',',old('StateID'))); ?>");
<?php elseif($job->country_id >0): ?>
  loadStates(<?php echo e($job->country_id); ?>,"<?php echo e($job->state_ids); ?>");
<?php endif; ?>
<?php if(count(old('StateID'))>0): ?>
  loadCities("<?php echo e(implode(',',old('StateID'))); ?>","<?php echo e(implode(',',old('CityID'))); ?>");
<?php elseif($job->state_ids !=''): ?>

loadCities("<?php echo e($job->state_ids); ?>","<?php echo e($job->city_ids); ?>");
<?php endif; ?>

  $('input[name="last_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 

 $('#CountryID').on('change', function(e){
            var CountryId = e.target.value;
            loadStates(CountryId,0);
        });
  $('#CityID').multiselect({
    enableCaseInsensitiveFiltering:true,
  });

  $('#StateID').multiselect({
    enableCaseInsensitiveFiltering:true,
        onChange : function(option, checked) {
            if($(option).val() >0 && $(option).val() != "" && checked){
              $.get("<?php echo e(asset('/admin/cities/getbystate/')); ?>/" + $(option).val(), function(data){
                 $.each(data, function(index, stateObj){
                     $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
                 });
                 $('#CityID').multiselect('rebuild'); 
              });
            }
            if($(option).val() >0 && $(option).val() != "" && (!checked)){
              $.get("<?php echo e(asset('/admin/cities/getbystate/')); ?>/" + $(option).val(), function(data){
                 $.each(data, function(index, stateObj){
                      $("#CityID option[value='"+ stateObj.id+ "']").remove();
                 });
                 $('#CityID').multiselect('rebuild'); 
              });
            }
        }
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