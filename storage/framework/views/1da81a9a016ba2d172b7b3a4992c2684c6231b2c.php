<?php $__env->startSection('content'); ?>
<div class="container">
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
                <div class="panel-heading"><h4>Manage Resume</h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('flash_message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('flash_message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::open(array('url'=> route('uploadresume'),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form','files'=>'true'))); ?>

                        <div class="form-group">                               
                            <label for="company_name" class="col-sm-3 control-label">Resume Title</label>
                            <?php echo e(Form::input('title', 'title', '',['data-error'=>'Required','id'=>'title', 'placeholder'=>'Resume Title', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               

                            <label for="logo" class="col-md-3 control-label">Select Resume (.doc,.docx,pdf)</label>
                            <div class="col-md-6 upload-margin">
                            <?php echo e(Form::file('cv', ['data-show-remove'=>'false','data-show-upload'=>'false','data-allowed-file-extensions'=>'["doc", "docx","pdf"]','data-show-preview'=>'false','data-validate'=>'true','data-error'=>'Required', 'placeholder'=>'Select Resume', 'required'=>'required', 'class'=>' file form-control input-width upload-margin'])); ?>

                            </div>
                            <div class="help-block with-errors error-label col-md-3"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 upload-margin">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
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
       $.get('../admin/states/getbycountry/' + CountryId, function(data){
            $('#StateID').empty();
            $('#StateID').append('<option>Please select State/Province</option>');
            $('#CityID').empty();
            $('#CityID').append('<option>Please select City</option>');
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
        $('#StateID').append('<option>Please select State/Province</option>');
        $('#CityID').empty();
        $('#CityID').append('<option>Please select City</option>');
    }
}
function loadcities(StateId, CityId)
{
    if(StateId >0 && StateId != ""){
        $.get('../admin/cities/getbystate/' + StateId, function(data){
            $('#CityID').empty();
            $('#CityID').append('<option>Please select City</option>');
            $.each(data, function(index, stateObj){
                $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
            });
            $('#CityID > [value="'+CityId+'"]').attr("selected", "true");
        });
    }
    else
    {
        $('#CityID').empty();
        $('#CityID').append('<option>Please select City</option>');
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


        jQuery( document ).ready(function( $ ) {
    $('input[name="incdate"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 

    selectState($('#cntid').val(), $('#stid').val());
selectCity($('#stid').val(),$('#ctid').val());
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>