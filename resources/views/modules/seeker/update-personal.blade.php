
@extends('layouts.app')

@section('content')
<div class="">
    @include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
        <div class="col-md-12 list-col ">
            @include('seeker::nav',array('country'=>$country))
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Manage Resume</h4></div>
                <div class="panel-body ">
                    @include('seeker::left_nav')
                </div>
            </div>
        </div>
        <div class="col-md-9 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Manage Resume</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                   {{ Form::open(array('class'=>'form-vertical','url'=> route('resumeprofile.save', array('id' => $resumeid,'country'=>$country)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">First Name</label>
                        {{Form::input('text', 'firstname', $profile->first_name,['data-error'=>'Required','id'=>'firstname', 'placeholder'=>'First Name', 'required'=>'required', 'class'=>'input-width  form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Last Name</label>
                        {{Form::input('text', 'lastname', $profile->last_name,['data-error'=>'Required','id'=>'lastname', 'placeholder'=>'Last Name', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="fathername" class="col-sm-3 control-label">Father Name</label>
                        {{Form::input('text', 'fathername', $profile->father_name,['data-error'=>'Required','id'=>'fathername', 'placeholder'=>'Father Name', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="cnic" class="col-sm-3 control-label">CNIC</label>
                        {{Form::input('text', 'cnic', $profile->cnic,['data-error'=>'Required','id'=>'cnic', 'placeholder'=>'CNIC', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>                    
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Gender</label>
                        {!! Form::select('gender', array('M'=>'Male','F'=>'Female'), $profile->gender, ['data-error'=>'Required', 'id'=>'gender','class'=>'input-width form-control','placeholder'=>'Gender','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="marital_status" class="col-sm-3 control-label">Marital Status</label>
                        {!! Form::select('marital_status', $maritalstatus, $profile->marital_status_id, ['data-error'=>'Required', 'id'=>'marital_status','class'=>'input-width form-control','placeholder'=>'Marital Status','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                        {{Form::input('text', 'dob', date("m/d/Y",strtotime($profile->dob)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'dob','placeholder'=>'Date of Birth', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        {{Form::input('email', 'email', $profile->email,['type'=>'email','data-error'=>'Invalid email address','id'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="mobile_number" class="col-sm-3 control-label">Mobile</label>
                        {{Form::input('text', 'mobile_number', $profile->mobile,['data-error'=>'Required','id'=>'mobile_number', 'placeholder'=>'Mobile Number', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone_day" class="col-sm-3 control-label">Phone (Day)</label>
                        {{Form::input('text', 'phone_day', $profile->phone_day,['data-error'=>'Required','id'=>'phone_day', 'placeholder'=>'Phone Number', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone_evening" class="col-sm-3 control-label">Phone (Evening)</label>
                        {{Form::input('text', 'phone_evening', $profile->phone_night,['data-error'=>'Required','id'=>'phone_evening', 'placeholder'=>'Phone Number', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>       
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address</label>
                        {{Form::textArea('address', $profile->address,['data-error'=>'Required','id'=>'phone_evening', 'placeholder'=>'Address', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                        <label for="postal_code" class="col-sm-3 control-label">Postal Code</label>
                        {{Form::input('text', 'postal_code', $profile->postal_code,['data-error'=>'Required','id'=>'postal_code', 'placeholder'=>'Postal Code', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>                                                      
                    <div class="form-group">
                        <label for="CountryID" class="col-sm-3 control-label">Country</label>
                        {!! Form::select('CountryID', $countries, $profile->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                        {!! Form::select('StateID', $states, $profile->state_id, ['' => '','data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="CityID" class="col-sm-3 control-label">City</label>
                        {!! Form::select('CityID', $cities, $profile->city_id, ['data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="IndustryID" class="col-sm-3 control-label">Industry</label>
                        {!! Form::select('IndustryID', $industries, $profile->industry_id, ['data-error'=>'Required', 'id'=>'IndustryID','class'=>'input-width form-control','placeholder'=>'Select Industry','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="ExperrianceID" class="col-sm-3 control-label">Experiance Level</label>
                        {!! Form::select('ExperrianceID', $experiance, $profile->experiance_level_id, ['data-error'=>'Required', 'id'=>'ExperrianceID','class'=>'input-width form-control','placeholder'=>'Select Experiance','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="current_salary" class="col-sm-3 control-label">Current Salary</label>
                        {{Form::input('text', 'current_salary', $profile->current_salary,['data-error'=>'Required','id'=>'current_salary', 'placeholder'=>'Current Salary', 'required'=>'required', 'class'=>'input-width-currency form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                        <label for="currsalaryid" class="col-sm-3 control-label">Select Currency</label>
                        {!! Form::select('currsalaryid', $currencies, $profile->current_salary_currency_id, ['data-error'=>'Required', 'id'=>'currsalaryid','class'=>'input-width-currency form-control','placeholder'=>'Select Currency','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="expected_salary" class="col-sm-3 control-label">Expected Salary</label>
                        {{Form::input('text', 'expected_salary', $profile->expected_salary,['data-error'=>'Required','id'=>'expected_salary', 'placeholder'=>'Expected Salary', 'required'=>'required', 'class'=>'input-width-currency form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                        <label for="excurrencyid" class="col-sm-3 control-label">Select Currency</label>
                        {!! Form::select('excurrencyid', $currencies, $profile->expected_salary_currency_id, ['data-error'=>'Required', 'id'=>'excurrencyid','class'=>'input-width-currency form-control','placeholder'=>'Select Currency','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>  

                    <div class="form-group"> 
                        <label for="professional_summary" class="col-sm-3 control-label">Professional Summary</label>
                         <div class="col-md-9 professional-summary">
                            {{Form::textArea('professional_summary', $profile->professional_summary,['data-error'=>'Required','id'=>'professional_summary', 'placeholder'=>'Professional Sumamry', 'required'=>'required', 'class'=>'input-width-currency form-control'])}}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                        {{Form::input('text', 'facebook', $profile->facebook,['data-error'=>'Required','id'=>'facebook', 'placeholder'=>'Facebook', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                        <label for="twitter" class="col-sm-3 control-label">Twitter</label>
                        {{Form::input('text', 'twitter', $profile->twitter,['id'=>'twitter', 'placeholder'=>'Twitter', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                        <label for="linkedin" class="col-sm-3 control-label">Linked In</label>
                        {{Form::input('text', 'linkedin', $profile->linkedin,['id'=>'linkedin', 'placeholder'=>'Linked In',  'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                        <label for="blog" class="col-sm-3 control-label">Blog</label>
                        {{Form::input('text', 'blog', $profile->blog,['id'=>'blog', 'placeholder'=>'http://', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                        <label for="website" class="col-sm-3 control-label">Website</label>
                        {{Form::input('text', 'website', $profile->website,['id'=>'website', 'placeholder'=>'http://', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div> 
                   
                    <input type="hidden" value="{{$resumeid}}" name="resume_id" id="resume_id" />
                    {!! Form::token() !!}
                    <br/><br/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

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
       $.get("{{asset('/'.$country.'/admin/states/getbycountry/')}}/" + CountryId, function(data){
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
        $.get("{{asset('/'.$country.'/admin/cities/getbystate/')}}/" + StateId, function(data){
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
     $("#cnic").mask("99999-9999999-9"); 
     CKEDITOR.replace( 'professional_summary' , {
        width:450,
    toolbar: [
    
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList'] },
    { name: 'clipboard', groups: [ 'undo' ], items: ['Undo', 'Redo' ] }
]
});
    $('input[name="dob"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 
selectState({{$profile->country_id}}, {{$profile->state_id}});
selectCity({{$profile->state_id}},{{$profile->city_id}});

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