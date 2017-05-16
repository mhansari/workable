@extends('layouts.home')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Signup
                    
                </h4></div>
                <div class="panel-body ">
                    @if (Session::has('msg'))
                    <div class="alert alert-danger">
                          <strong>Error!</strong> {{ Session::get('msg') }}
                        </div>
                    @endif
                    
                   {{ Form::open(array('onload'=>'javascript:alert("hi")','url'=> route('emp.signup',array('country'=>$country)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                    <div class="col-md-12">
 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname" class="control-label">First Name</label>
                                {{Form::input('text', 'firstname', '',['data-error'=>'Required','id'=>'firstname', 'placeholder'=>'First Name', 'required'=>'required', 'class'=>'form-control'])}}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="lastname" class="control-label">Last Name</label>
                                {{Form::input('text', 'lastname', '',['data-error'=>'Required','id'=>'lastname', 'placeholder'=>'Last Name', 'required'=>'required', 'class'=>'form-control'])}}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender" class="control-label">Gender</label>
                                {!! Form::select('gender', array('M'=>'Male','F'=>'Female'), null, ['data-error'=>'Required', 'id'=>'gender','class'=>'form-control','placeholder'=>'Gender','required'=>'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob" class="control-label">Date of Birth</label>
                                {{Form::input('text', 'dob', '',['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'dob','placeholder'=>'Date of Birth', 'required'=>'required', 'class'=>'form-control'])}}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="CountryID" class="control-label">Country</label>
                                {!! Form::select('CountryID', $countries, null, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="StateID" class="control-label">State/Province</label>
                                {!! Form::select('StateID', $states, null, ['' => '','data-error'=>'Required', 'id'=>'StateID','class'=>'form-control','placeholder'=>'Select State/Province','required'=>'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="CityID" class="control-label">City</label>
                                {!! Form::select('CityID', $cities, null, ['data-error'=>'Required', 'id'=>'CityID','class'=>'form-control','placeholder'=>'Please select City','required'=>'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                   
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mobile_number" class="control-label">Mobile</label>
                                {{Form::input('text', 'mobile_number', '',['data-error'=>'Required','id'=>'mobile_number', 'placeholder'=>'Mobile Number', 'required'=>'required', 'class'=>'form-control'])}}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                       
            
                        <div class="col-md-12">
                            <div class="form-group">
                               
                                <label for="email" class="control-label">Email</label>
                                {{Form::input('email', 'email', '',['type'=>'email','data-error'=>'Invalid email address','id'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'class'=>'form-control'])}}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                                {{Form::input('password', 'password', '',['data-minlength'=>'6','data-error'=>'Required','id'=>'password', 'placeholder'=>'Password', 'required'=>'required', 'class'=>'form-control'])}}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm_password" class="control-label">Confirm Password</label>
                                {{Form::input('password', 'confirm_password', '',['data-error'=>'Password does not match','id'=>'confirm_password', 'data-match'=>'#password', 'placeholder'=>'Confirm Password', 'required'=>'required', 'class'=>'form-control'])}}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="QuestionID" class="control-label">Security Question</label>
                                {!! Form::select('QuestionID', $questions, null, ['data-error'=>'Required', 'id'=>'QuestionID','class'=>'form-control','placeholder'=>'Select Security Question','required'=>'required']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="security_answer" class="control-label">Security Answer</label>
                                {{Form::input('text', 'security_answer', old('security_answer'),['data-error'=>'Required','id'=>'security_answer', 'placeholder'=>'Your Security Answer', 'required'=>'required', 'class'=>'form-control'])}}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::checkbox('newsletter', '1', '',['id'=>'newsletter'])}} Subscribe to daily job alerts?
                            </div>
                        </div>

                        <div class="col-md-12">
                            By clicking on <b>Submit</b> button you are agreeing to the (TOS).
                        </div>{!! Form::token() !!}
                      
                </div>
                 <div class="col-md-6 col-md-offset-5">
                           <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
                        </div>
<input type="hidden" id="stid" value="{{old('StateID')}}" />
<input type="hidden" id="cntid" value="{{old('CountryID')}}" />
                        <input type="hidden" id="ctid" value="{{old('CityID')}}" />
                    {{Form::close()}}
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
             </script>

<script type="text/javascript">
 jQuery( document ).ready(function( $ ) {
    $('input[name="dob"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 
selectState($('#cntid').val(), $('#stid').val());
selectCity($('#stid').val(),$('#ctid').val());

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
@endsection