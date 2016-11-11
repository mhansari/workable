@extends('employers::home')

@section('sub-content')
<div class="row">
    <div class="col-md-6">
        <div class="x_content">
            <!-- start form for validation -->
			{{ route('emp.savejob') }}
            {{ Form::open(array('url'=>route('emp.savejob'),'id'=>'demo-form3', 'data-parsley-validate'=>'parsley-validate')) }}
			
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                        {!! Form::select('AdType', $adtypes, null, ['data-parsley-required-message'=>'Required', 'id'=>'AdType','class'=>'form-control','placeholder'=>'Select Ad Type','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                        {!! Form::input('text','JobTitle', '', ['data-parsley-required-message'=>'Required', 'id'=>'JobTitle','class'=>'form-control','placeholder'=>'Job Title','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('DepartmentID', $depts, null, ['data-parsley-required-message'=>'Required', 'id'=>'DepartmentID','class'=>'form-control','placeholder'=>'Select Department','required'=>'required']) !!}
                    </div>
                </div> <a class="glyphicon glyphicon-plus" id="add_de" href="#" data-toggle="modal" data-target="#myModal3"></a>
            </div>
			
		
			
			
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('CategoryID', $categories, null, ['data-parsley-required-message'=>'Required', 'id'=>'CategoryID','class'=>'form-control','placeholder'=>'Select Category','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('CareerLevelID', $CareerLevel, null, ['data-parsley-required-message'=>'Required', 'id'=>'CareerLevelID','class'=>'form-control','placeholder'=>'Select Career Level','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('ExperianceLevelID', $experiancelevels, null, ['data-parsley-required-message'=>'Required', 'id'=>'ExperianceLevelID','class'=>'form-control','placeholder'=>'Select Experiance Level','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::input('text','NoVac', '', ['data-parsley-required-message'=>'Required', 'id'=>'NoVac','class'=>'form-control','placeholder'=>'No. of Vacancies','required'=>'required']) !!}
                    </div>
                </div>
            </div>
			<!--edit start-->
			<div class="col-md-12">
                    <div class="form-group">
                        <div id="txtSkills" placeholder="Required skills and personal attributes" style="visibility: hidden; display: none;">
                         
                        </div><div id="cke_txtSkills" class="cke_2 cke cke_reset cke_chrome cke_editor_txtSkills cke_ltr cke_browser_webkit" dir="ltr" lang="en" role="application" aria-labelledby="cke_txtSkills_arialbl" style="width: auto;"><span id="cke_txtSkills_arialbl" class="cke_voice_label">Rich Text Editor, txtSkills</span><div class="cke_inner cke_reset" role="presentation"><span id="cke_2_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; -webkit-user-select: none;"><span id="cke_33" class="cke_voice_label">Editor toolbars</span><span id="cke_2_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_33" onmousedown="return false;"><span id="cke_34" class="cke_toolbar" aria-labelledby="cke_34_label" role="toolbar"><span id="cke_34_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_35" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Bold')" title="Bold" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_35_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(22,event);" onfocus="return CKEDITOR.tools.callFunction(23,event);" onclick="CKEDITOR.tools.callFunction(24,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url('http://localhost/workable/public/editor/ckeditor/plugins/icons.png?t=G14E');background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_35_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Bold</span></a><a id="cke_36" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Italic')" title="Italic" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_36_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(25,event);" onfocus="return CKEDITOR.tools.callFunction(26,event);" onclick="CKEDITOR.tools.callFunction(27,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url('http://localhost/workable/public/editor/ckeditor/plugins/icons.png?t=G14E');background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_36_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Italic</span></a><a id="cke_37" class="cke_button cke_button__underline cke_button_off" href="javascript:void('Underline')" title="Underline" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_37_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(28,event);" onfocus="return CKEDITOR.tools.callFunction(29,event);" onclick="CKEDITOR.tools.callFunction(30,this);return false;"><span class="cke_button_icon cke_button__underline_icon" style="background-image:url('http://localhost/workable/public/editor/ckeditor/plugins/icons.png?t=G14E');background-position:0 -144px;background-size:auto;">&nbsp;</span><span id="cke_37_label" class="cke_button_label cke_button__underline_label" aria-hidden="false">Underline</span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_38" class="cke_button cke_button__numberedlist cke_button_off" href="javascript:void('Insert/Remove Numbered List')" title="Insert/Remove Numbered List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_38_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(31,event);" onfocus="return CKEDITOR.tools.callFunction(32,event);" onclick="CKEDITOR.tools.callFunction(33,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url('http://localhost/workable/public/editor/ckeditor/plugins/icons.png?t=G14E');background-position:0 -1368px;background-size:auto;">&nbsp;</span><span id="cke_38_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Insert/Remove Numbered List</span></a><a id="cke_39" class="cke_button cke_button__bulletedlist cke_button_off" href="javascript:void('Insert/Remove Bulleted List')" title="Insert/Remove Bulleted List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_39_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(34,event);" onfocus="return CKEDITOR.tools.callFunction(35,event);" onclick="CKEDITOR.tools.callFunction(36,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url('http://localhost/workable/public/editor/ckeditor/plugins/icons.png?t=G14E');background-position:0 -1320px;background-size:auto;">&nbsp;</span><span id="cke_39_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Insert/Remove Bulleted List</span></a></span><span class="cke_toolbar_end"></span></span></span></span><div id="cke_2_contents" class="cke_contents cke_reset" role="presentation" style="height: 150px;"><span id="cke_43" class="cke_voice_label">Press ALT 0 for help</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" style="width: 100%; height: 100%;" title="Rich Text Editor, txtSkills" aria-describedby="cke_43" tabindex="0" allowtransparency="true"></iframe></div><span id="cke_2_bottom" class="cke_bottom cke_reset_all" role="presentation" style="-webkit-user-select: none;"><span id="cke_2_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Resize" onmousedown="CKEDITOR.tools.callFunction(20, event)">◢</span><span id="cke_2_path_label" class="cke_voice_label">Elements path</span><span id="cke_2_path" class="cke_path" role="group" aria-labelledby="cke_2_path_label"><span class="cke_path_empty">&nbsp;</span></span></span></div></div>
                    </div>
                </div>
				
			<!--
			 <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::input('text','NoVac', '', ['data-parsley-required-message'=>'Required', 'id'=>'Gender','class'=>'form-control','placeholder'=>'Gender','required'=>'required']) !!}
                    </div>
                </div>
            </div>
			
			
			<!-- end edit-->
			
			
			
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
<div id="txtJobDuties" placeholder="Job duties and responsibilities">
         
        </div>
 </div>
                </div>
            </div>
           <!-- edit start-->
		    <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
<div id="txtJobDuties" placeholder="Job duties and responsibilities">

		   <input type="textbox" style="width: 80px; height: 20px;" >
         
        </div>
 </div>
                </div>
            </div>
         
		   <!-- end edit--> <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div id="txtSkills" placeholder="Required skills and personal attributes">
                         
                        </div>
                    </div>
                </div>
            </div>
			

             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::input('text','Qualification', '', ['data-parsley-required-message'=>'Required', 'id'=>'Qualification','class'=>'form-control','placeholder'=>'Qualification','required'=>'required']) !!}
                    </div>
                </div>
				
            </div>
			<div class="row">
                <div class="col-md-3">
                    <div class="form-group">
					
                        {!! Form::input('text','MinimumSalary', '', ['data-parsley-required-message'=>'Required', 'id'=>'MinimumSalary','class'=>'form-control','placeholder'=>'Minimum Salary','required'=>'required']) !!}
                  
				  </div>
                </div> 
				<div class="col-md-3">
                    <div class="form-group">
					
                        {!! Form::input('text','MaximumSalary', '', ['data-parsley-required-message'=>'Required', 'id'=>'MaximumSalary','class'=>'form-control','placeholder'=>'Maximum Salary','required'=>'required']) !!}
                  
				  </div>
                </div> 
            </div>
			
	
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('ShiftID', $shift, null, ['data-parsley-required-message'=>'Required', 'id'=>'ShiftID','class'=>'form-control','placeholder'=>'Select Shift','required'=>'required']) !!}
                    </div>
                </div>
            </div>
			
			
			 <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::checkbox('TravelingID', '1', null, ['data-parsley-required-message'=>'Required', 'id'=>'TravelingID','class'=>'form-control']) !!}
							{!! Form::label('TravelingID', 'Required Traveling?') !!}
						
                    </div>
                </div>
            </div>
			
			
			
			
			<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('CountryID', $countries, null, ['data-parsley-required-message'=>'Required', 'id'=>'CountryID','class'=>'form-control','placeholder'=>'Select CountryID','required'=>'required']) !!}
                    </div>
                </div>
            </div>
			
			 <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('StateID', $states, null, ['multiple'=>'multiple','data-parsley-required-message'=>'Required', 'id'=>'StateID','class'=>'form-control','placeholder'=>'Select StateID','required'=>'required']) !!}
                    </div>
                </div>
            </div>
			 
			 
			 <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('CityID', $cities, null, ['multiple'=>'multiple','data-parsley-required-message'=>'Required', 'id'=>'CityID','class'=>'form-control','placeholder'=>'Select CityID','required'=>'required']) !!}
                    </div>
                </div>
            </div>
			
			 
			 <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::text('JobExpiry', null, ['data-parsley-required-message'=>'Required', 'id'=>'JobExpiryID','class'=>'form-control','placeholder'=>'Select JobExpiryID','required'=>'required']) !!}
                    </div>
                </div>
            </div>
			
			
			
			 <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('AfterExpiryActionsID', $afterexpiryActions, null, ['data-parsley-required-message'=>'Required', 'id'=>'AfterExpiryActionsID','class'=>'form-control','placeholder'=>'Select AfterExpiryActionsID','required'=>'required']) !!}
                    </div>
                </div>
            </div>
			
			
			  <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::checkbox('EmailResumeID', '1', null, ['data-parsley-required-message'=>'Required', 'id'=>'EmailResumeID','class'=>'form-control']) !!}
							{!! Form::label('EmailResumeID', 'Email Resume?') !!}
						
                    </div>
                </div>
            </div>
			
			
			
			

			 
			
			
            <button type="submit" id="submit" class="btn btn-success">Submit</button>
            {!! Form::close() !!}
            <!-- end form for validations -->



</div>
        </div>
    </div>
</div>


<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <!-- Modal content-->
        <div id="modal-content" class="modal-content">
        </div>
    </div>
</div>

 <script src="{{ asset('js/validator/validator.js') }}"></script>
      <script type="text/javascript">
        window.ParsleyConfig = window.ParsleyConfig || {};

 window.ParsleyConfig.validators = window.ParsleyConfig.validators || {};

 window.ParsleyConfig.validators.date = {
        fn: function (value) {
            return /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/.test(value);
        },
        priority: 256
    };
    </script>
     <script type="text/javascript" src="{{ asset('js/parsley/parsley.min.js') }}"></script>

  <script type="text/javascript">
             $('#CountryID').on('change', function(e){

                var CountryId = e.target.value;
                
                   //ajax
                   if(CountryId >0 && CountryId != ""){
                       $.get('../admin/states/getbycountry/' + CountryId, function(data){

                            //success data
                           $('#StateID').empty();

                           $('#StateID').append('<option>Please select State/Province</option>');

 $('#CityID').empty();
                        $('#CityID').append('<option>Please select City</option>');
                           $.each(data, function(index, countryObj){
                                console.log(countryObj.Name);
                               $('#StateID').append('<option value="'+ countryObj.id+'">'+ countryObj.Name + '</option>');
								$('#multistateid').append('<li class="active"><a tabindex="0"><label class="checkbox"><input type="checkbox" value=""> Select StateID</label></a></li>');

                           });
						   
						   $('#StateID').multiselect('rebuild');
						   
						   
                       });
                    }
                    else
                    {
                        $('#StateID').empty();
                        $('#StateID').append('<option>Please select State/Province</option>');
                        $('#CityID').empty();
                        $('#CityID').append('<option>Please select City</option>');
                    }


               });

             $('#StateID').on('change', function(e){

                var StateId = e.target.value;
                
                   //ajax
                   if(StateId >0 && StateId != ""){
                       $.get('../admin/cities/getbystate/' + StateId, function(data){

                              //success data
                           $('#CityID').empty();

                           $('#CityID').append('<option>Please select City</option>');


                           $.each(data, function(index, stateObj){
                                console.log(stateObj.Name);
                               $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');


                           });
						   
						   
						   $('#CityID').multiselect('rebuild');
						   
						   
						   
                       });
                    }
                    else
                    {
                        $('#CityID').empty();
                        $('#CityID').append('<option>Please select City</option>');
                    }


               });

              $(document).ready(function () {
               
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
 
                $('#submit').on('click', function () {
                    $_token = "{{ csrf_token() }}";
                    
                    //$date=strtotime($('#dob').val());
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('emp.signup')}}",
                        data: {
                        'firstname' : $('#firstname').val(), 
         
                        'country': $('#CountryID').val(),
                        'state': $('#StateID').val(),
                        'city': $('#CityID').val(),
                       
                        '_token': $_token},
                        success: function(data) {
                            if(data.error)
                                $("#msg").append('<div class="alert alert-danger" role="alert">' + data.error + '</div>');
                            else
                                $(".modal-body").html('<div class="alert alert-info" role="alert">' + data.success + '</div>');

                        }
                    });
                });
            });
             </script>

               <script type="text/javascript">
            
                 $('#add_de').on('click', function(e){
                      $.ajax({
                        type: "GET",
                        dataType: "html",
                        url: "{{route('emp.department_html')}}",
                       async:true, 
                        success: function(data) {
                            //alert(data);
                             $('#modal-content').html(data);
                            
                        }
                    });


               });
            

        </script>
<script type="text/javascript">
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
	
	
	$('#CityID').multiselect({
        enableCaseInsensitiveFiltering:true,
     
    });
	
	
 
</script>

     <script>

  initSample();
initSample2();
</script>
<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">






@stop
