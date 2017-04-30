<?php $__env->startSection('content'); ?>
<div class="">
    <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                <div class="panel-heading"><h4>Update Academics</h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>

                   <?php echo e(Form::open(array('class'=>'form-vertical','url'=> route('academics.save', array('country'=>$country,'id' => $id,'resumeid'=>$resumeid)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

                    <div class="form-group">
                        <label for="degree_level" class="col-sm-3 control-label">Degree Level</label>
                        <?php echo Form::select('degree_level', $degrees, $academic->degree_level_id, ['data-error'=>'Required', 'id'=>'degree_level','class'=>'input-width form-control','placeholder'=>'Select Degree','required'=>'required']); ?>

                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="degree" class="col-sm-3 control-label">Degree</label>
                        <?php echo e(Form::input('text', 'degree', $academic->degree,['data-error'=>'Required','id'=>'degree', 'placeholder'=>'Degree', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                        <div class="help-block with-errors"></div>
                    </div>
                   
                    <div class="form-group">
                        <label for="date_of_completion" class="col-sm-3 control-label">Completion Date</label>
                        <?php echo e(Form::input('text', 'date_of_completion',date("m/d/Y",strtotime($academic->completion_date)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'date_of_completion','placeholder'=>'Date of Completion', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="grade" class="col-sm-3 control-label">Grade</label>
                        <?php echo e(Form::input('text', 'grade', $academic->grade,['data-error'=>'Required','id'=>'grade', 'placeholder'=>'Grade', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="institute" class="col-sm-3 control-label">Institute</label>
                        <?php echo e(Form::input('text', 'institute', $academic->institute,['data-error'=>'Required','id'=>'institute', 'placeholder'=>'Institute', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                        <div class="help-block with-errors"></div>
                    </div>       
                    
                    <div class="form-group">
                        <label for="CountryID" class="col-sm-3 control-label">Country</label>
                        <?php echo Form::select('CountryID', $countries, $academic->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']); ?>

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                        <?php echo Form::select('StateID', $states, $academic->state_id, ['' => '','data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required']); ?>

                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="CityID" class="col-sm-3 control-label">City</label>
                        <?php echo Form::select('CityID', $cities, $academic->city_id, ['data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']); ?>

                        <div class="help-block with-errors"></div>
                    </div>
                    

                    <div class="form-group"> 
                        <label for="professional_summary" class="col-sm-3 control-label">Details</label>
                         <div class="col-md-9 professional-summary">
                            <?php echo e(Form::textArea('details', $academic->details,['data-error'=>'Required','id'=>'details', 'placeholder'=>'Details', 'required'=>'required', 'class'=>'input-width-currency form-control'])); ?>

                            <div class="help-block with-errors"></div>
                        </div>
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
<script type="text/javascript">
function selectState(CountryID, StateId)
{
    loadStates(CountryID,StateId);
  
}
function selectCity(StateId,CityId)
{
    loadcities(StateId, CityId)
  
}
function loadStates(CountryId, StateId)
{
   if(CountryId >0 && CountryId != ""){
       $.get("<?php echo e(asset('/admin/states/getbycountry/')); ?>/" + CountryId, function(data){
            $('#StateID').empty();
            $('#StateID').append('<option value>Please select State/Province</option>');
            $('#CityID').empty();
            $('#CityID').append('<option value>Please select City</option>');
            $.each(data, function(index, countryObj){
                console.log(countryObj.Name);
                $('#StateID').append('<option value="'+ countryObj.id+'">'+ countryObj.Name + '</option>');
            });    
            //$("#StateID").multiselect('rebuild');
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
function loadcities(StateId, CityId)
{
    if(StateId >0 && StateId != ""){
        $.get("<?php echo e(asset('/admin/cities/getbystate/')); ?>/" + StateId, function(data){
            $('#CityID').empty();
            $('#CityID').append('<option value>Please select City</option>');
            $.each(data, function(index, stateObj){
                $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
            });
    console.log(data[0].Name);
    console.log(data[0].Name);
    console.log(data[0].Name);
            $('#CityID > [value="'+CityId+'"]').attr("selected", "true");
        });
    }
    else
    {
        $('#CityID').empty();
        $('#CityID').append('<option value>Please select City</option>');
    }    
}
        $('#CountryID').on('change', function(e){
            var CountryId = e.target.value;
            loadStates(CountryId,0);
        });

        $('#StateID').on('change', function(e){
            var StateId = e.target.value;
            loadcities(StateId, 0);
        });
             </script>

<script type="text/javascript">
 jQuery( document ).ready(function( $ ) {

<?php if($id!= 0): ?>
selectState(<?php echo e($academic->country_id); ?>, <?php echo e($academic->state_id); ?>);
selectCity(<?php echo e($academic->state_id); ?>,<?php echo e($academic->city_id); ?>);
<?php endif; ?>
     $("#cnic").mask("99999-9999999-9"); 
     CKEDITOR.replace( 'details' , {
        width:450,
    toolbar: [
    
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList'] },
    { name: 'clipboard', groups: [ 'undo' ], items: ['Undo', 'Redo' ] }
]
});
    $('input[name="date_of_completion"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 


/*
$('#StateID').multiselect({
        enableCaseInsensitiveFiltering:true,
        onChange : function(option, checked) {

            if($(option).val() >0 && $(option).val() != "" && checked){
                       $.get('../admin/cities/getbystate/' + $(option).val(), function(data){

                              //success data
                         //  $('#CityID').empty();



                           $.each(data, function(index, stateObj){
                                console.log(stateObj.Name);
                               $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');


                           });
                       });
                    }
                    

            if($(option).val() >0 && $(option).val() != "" && (!checked)){
                       $.get('../admin/cities/getbystate/' + $(option).val(), function(data){

                              //success data
                         //  $('#CityID').empty();



                           $.each(data, function(index, stateObj){
                                console.log(stateObj.Name);
                                $("#CityID option[value='"+ stateObj.id+ "']").remove();
                             //  $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');


                           });
                       });
                    }
                    
            
        }
    });
*/

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>