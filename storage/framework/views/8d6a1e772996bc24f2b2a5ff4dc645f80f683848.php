<?php $__env->startSection('content'); ?>
<div class="">
    <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        
        <div class="col-md-12 list-col ">
        <?php echo $__env->make('employers::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Update Company</h4></div>
                <div class="panel-body ">
                    <?php if(Session::has('flash_message')): ?>
    <div class="alert alert-success">
        <?php echo e(Session::get('flash_message')); ?>

    </div>
<?php endif; ?>
                    <?php echo e(Form::open(array('url'=> route('updatecompany',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

                        <div class="form-group">                               
                            <label for="company_name" class="col-sm-3 control-label">Company Name</label>
                            <?php echo e(Form::input('company_name', 'company_name', $ci[0]->company_name,['data-error'=>'Required','id'=>'company_name', 'placeholder'=>'Company Name', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="about_company" class="col-sm-3 control-label">Abous Company</label>
                            <?php echo e(Form::textarea('about_company', $ci[0]->about_company,['data-error'=>'Required','id'=>'about_company', 'placeholder'=>'About Company', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="designation" class="col-sm-3 control-label">Designation</label>
                            <?php echo e(Form::input('designation', 'designation', $ci[0]->designation,['data-error'=>'Required','id'=>'designation', 'placeholder'=>'Designation', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">
                            <label for="CountryID" class="col-sm-3  control-label">Country</label>
                            <?php echo Form::select('CountryID', $countries, $ci[0]->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>

                        <div class="form-group">
                            <label for="StateID" class="col-sm-3  control-label">State/Province</label>
                            <?php echo Form::select('StateID', $states, null, ['' => '','data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required']); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">
                            <label for="CityID" class="col-sm-3  control-label">City</label>
                            <?php echo Form::select('CityID', $cities, null, ['data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="phone" class="col-sm-3 control-label">Phone (Landline)</label>
                            <?php echo e(Form::input('phone', 'phone', $ci[0]->phone,['data-error'=>'Required','id'=>'phone', 'placeholder'=>'Phone (Landline)', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="mobile" class="col-sm-3 control-label">Mobile</label>
                            <?php echo e(Form::input('mobile', 'mobile', $ci[0]->mobile,['data-error'=>'Required','id'=>'mobile', 'placeholder'=>'Mobile', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="fax" class="col-sm-3 control-label">Fax</label>
                            <?php echo e(Form::input('fax', 'fax', $ci[0]->fax,['data-error'=>'Required','id'=>'fax', 'placeholder'=>'Fax', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="website" class="col-sm-3 control-label">Website</label>
                            <?php echo e(Form::input('website', 'website', $ci[0]->website,['data-error'=>'Required','id'=>'website', 'placeholder'=>'www.yourwebsite.com', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                            <?php echo e(Form::input('facebook', 'facebook', $ci[0]->facebook,['data-error'=>'Required','id'=>'facebook', 'placeholder'=>'Facebook', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="twitter" class="col-sm-3 control-label">Twitter</label>
                            <?php echo e(Form::input('twitter', 'twitter', $ci[0]->twitter,['data-error'=>'Required','id'=>'twitter', 'placeholder'=>'Twitter', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="linkedin" class="col-sm-3 control-label">LinkedIn</label>
                            <?php echo e(Form::input('linkedin', 'linkedin', $ci[0]->linkedin,['data-error'=>'Required','id'=>'linkedin', 'placeholder'=>'LinkedIn', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="google" class="col-sm-3 control-label">Google</label>
                            <?php echo e(Form::input('google', 'google', $ci[0]->google,['data-error'=>'Required','id'=>'google', 'placeholder'=>'Google', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">
                            <label for="incorporationtype" class="col-sm-3  control-label">Incorporation Type</label>
                            <?php echo Form::select('incorporationtype', $inc, $ci[0]->business_incorporation_type, ['data-error'=>'Required', 'id'=>'incorporationtype','class'=>'input-width form-control','placeholder'=>'Select Incorporation Type','required'=>'required']); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">
                            <label for="CategoryID" class="col-sm-3  control-label">Industry</label>
                            <?php echo Form::select('CategoryID', $categories, $ci[0]->category_id, ['data-error'=>'Required', 'id'=>'CategoryID','class'=>'input-width form-control','placeholder'=>'Select Industry','required'=>'required']); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">
                            <label for="incdate" class="col-sm-3 control-label">Incorporation Date</label>
                            <?php echo e(Form::input('text', 'incdate', date("d/m/Y", strtotime($ci[0]->established_in)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'incdate','placeholder'=>'Incorporation date', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                         <div class="form-group">                               
                            <label for="totalemp" class="col-sm-3 control-label">Total Employees</label>
                            <?php echo e(Form::input('totalemp', 'totalemp', $ci[0]->total_employees,['data-error'=>'Required','id'=>'totalemp', 'placeholder'=>'Total Employees', 'required'=>'required', 'class'=>'input-width form-control'])); ?>

                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <input type="hidden" id="stid" value="<?php echo e($ci[0]->state_id); ?>" />
<input type="hidden" id="cntid" value="<?php echo e($ci[0]->country_id); ?>" />
                        <input type="hidden" id="ctid" value="<?php echo e($ci[0]->city_id); ?>" />
<div class="form-group">
    <div class="col-md-5 col-md-offset-4">
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
        $.get('../admin/cities/getbystate/' + StateId, function(data){
            $('#CityID').empty();
            $('#CityID').append('<option value>Please select City</option>');
            $.each(data, function(index, stateObj){
                $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
            });
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


        jQuery( document ).ready(function( $ ) {
    $('input[name="incdate"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 

    selectState($('#cntid').val(), $('#stid').val());
selectCity($('#stid').val(),$('#ctid').val());
});

 $(document).ready(function() {
        jQuery('#about_company').summernote({
             toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['para', ['ul', 'ol', 'paragraph']],
                       // ['height', ['height']]
                      ]
            
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>