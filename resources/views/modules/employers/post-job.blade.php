@extends('layouts.app')

@section('content')
<div class="">
@include('seeker::dashboard-links',array('country'=>$country))
<div class="row">
    <div class="col-md-12 list-col ">
        @include('employers::nav', array('country'=>$country))
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 list-col ">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Post Job</h4>
        </div>
        
          <div class="panel-body ">
              @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
              @endif
              @if($errors->has())
                 @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
              @endif
              {{ Form::open(array('url'=> route('emp.savejob',array('country'=>$country,'id'=>$job->id)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
            <div class="col-md-10 col-md-offet-1">
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Title</label>
                {{Form::input('text', 'title', $job->job_title,['data-error'=>'Required','id'=>'title', 'placeholder'=>'Title', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="DepartmentID" class="col-sm-3 control-label">Department</label>
                {!! Form::select('DepartmentID', $depts, $job->department_id, ['data-error'=>'Required', 'id'=>'DepartmentID','class'=>'input-width form-control','placeholder'=>'Select Department','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="CategoryID" class="col-sm-3 control-label">Category</label>
                {!! Form::select('CategoryID', $categories,  $job->category_id, ['data-error'=>'Required', 'id'=>'CategoryID','class'=>'input-width form-control','placeholder'=>'Select Category','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="CareerLevelID" class="col-sm-3 control-label">Career Level</label>
                {!! Form::select('CareerLevelID', $career_level,  $job->career_level_id, ['data-error'=>'Required', 'id'=>'CareerLevelID','class'=>'input-width form-control','placeholder'=>'Select Career Level','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="ExperianceLevelID" class="col-sm-3 control-label">Experiance Level</label>
                  {!! Form::select('ExperianceLevelID', $experiance_level,  $job->experiance_level_id, ['data-error'=>'Required', 'id'=>'ExperianceLevelID','class'=>'input-width form-control','placeholder'=>'Select Experiance Level','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="NoVac" class="col-sm-3 control-label">Vacancies</label>
                  {!! Form::input('text','NoVac',  $job->number_of_positions, ['data-error'=>'Required', 'id'=>'NoVac','class'=>'input-width form-control','placeholder'=>'No. of Vacancies','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group"> 
                <label for="details" class="col-sm-3 control-label">Details</label>
                 <div class="col-md-9 professional-summary">
                    {{Form::textArea('details', $job->description,['data-error'=>'Required','id'=>'details', 'required'=>'required', 'class'=>'input-width-currency form-control'])}}
                    <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group"> 
                <label for="skills" class="col-sm-3 control-label">Required Skills</label>
                 <div class="col-md-9 professional-summary">
                    {{Form::textArea('skills', $job->required_skills,['data-error'=>'Required','id'=>'skills', 'required'=>'required', 'class'=>'input-width-currency form-control'])}}
                    <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="Qualification" class="col-sm-3 control-label">Qualifications</label>
                  {!! Form::input('text','Qualification', $job->qualifications, ['data-error'=>'Required', 'id'=>'Qualification','class'=>'input-width form-control','placeholder'=>'Qualification','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="type" class="col-sm-3 control-label">Type</label>
                {!! Form::select('type', $type, $job->job_type_id, ['data-error'=>'Required', 'id'=>'type','class'=>'input-width form-control','placeholder'=>'Select Job Type','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="shift" class="col-sm-3 control-label">Shift</label>
                  {!! Form::select('shift', $shift, $job->shift_timings_id, ['data-error'=>'Required', 'id'=>'shift','class'=>'input-width form-control','placeholder'=>'Select Shift','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <label for="traveling" class="col-sm-3 control-label">Required Traveling?</label>
              <div class="checkbox checkbox-success checkbox-circle">

                  <input id="traveling" name="traveling" value="1" type="checkbox" {{Input::old('traveling')==1?'checked':''}} {{$job->required_travelling==1?'checked':''}}>
                  <label for="traveling" style="    margin-left: 20px;"></label>
              </div>
              <div class="form-group">
                <label for="salary_min" class="col-sm-3 control-label">Salary</label>
                  {!! Form::input('text','salary_min', $job->currency_min, ['data-error'=>'Required', 'id'=>'salary_min','class'=>'form-control  input-width-salary-min col-md-2','placeholder'=>'Min','required'=>'required']) !!}
                  {!! Form::input('text','salary_max', $job->salary_max, ['data-error'=>'Required', 'id'=>'salary_max','class'=>' form-control input-width-salary-max ','placeholder'=>'Max','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="salary_currency" class="col-md-3 control-label">Currency</label>
                  {!! Form::select('salary_currency', $currency, $job->salary_currency_id, ['data-error'=>'Required', 'id'=>'salary_currency','class'=>'input-width form-control','placeholder'=>'Select Currency','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
               <div class="form-group">
                <label for="benefits[]" class="col-md-3 control-label">Benefits</label>
                  <div class="col-md-9 benefits-checkbox-margin">
                     {{--*/ $sep = 0 /*--}} 
                    @foreach($benefits as $benefit)
                    {{--*/ $b = '' /*--}} 

                    @for($i =0; $i<count($benefits); $i++)
                        @if(Input::old('benefits.' . $i) == $benefit->id)
                          {{--*/ $b = 'checked' /*--}}
                        @elseif(\App\JobBenefits::checkBenefit($benefit->id,$job->id))
                          {{--*/ $b = 'checked' /*--}}
                        @endif
                    @endfor
                    <div class="checkbox checkbox-success checkbox-circle">
                        <input id="A{{$benefit->id}}" name="benefits[]" value="{{$benefit->id}}" {{ $b }} type="checkbox" class="col-md-3" >
                        <label for="A{{$benefit->id}}" class="col-md-3 benefits-font" style="    margin-left: 20px;">{{$benefit->name}}</label>
                    </div>
                    {{--*/ $sep = $sep + 1 /*--}} 
                    @endforeach
                  </div>
                <div class="help-block with-errors"></div>
              </div><br/><br/>
              <div class="form-group">
                  <label for="CountryID" class="col-sm-3 control-label">Country</label>
                  {!! Form::select('CountryID', $countries, $job->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                  {!! Form::select('StateID[]', $states, '', ['data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required','multiple'=>"multiple"]) !!}
                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="CityID" class="col-sm-3 control-label">City</label>
                  {!! Form::select('CityID[]', $cities, '', ['multiple'=>'multiple','data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']) !!}
                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="last_date" class="col-sm-3 control-label">Completion Date</label>
                  {{Form::input('text', 'last_date',date("m/d/Y",strtotime($job->job_expiry)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'date_of_completion','placeholder'=>'Date of Completion', 'required'=>'required', 'class'=>'input-width form-control'])}}
                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="after_expiry_actions" class="col-sm-3 control-label">After Expiry</label>
                {!! Form::select('after_expiry_actions', $after_expiry_actions, $job->after_expiry_actions_id, ['data-error'=>'Required', 'id'=>'after_expiry_actions','class'=>'input-width form-control','placeholder'=>'Select After Expiry','required'=>'required']) !!}
                <div class="help-block with-errors"></div>
              </div>
              <label for="traveling" class="col-sm-3 control-label">Email resume</label>
              <div class="checkbox checkbox-success checkbox-circle">
                  <input id="email_resume" name="email_resume" type="checkbox" value="1" {{Input::old('email_resume')==1?'checked':''}}  {{$job->email_resume==1?'checked':''}}>
                  <label for="email_resume" style="    margin-left: 20px;"></label>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </div>
            {!! Form::token() !!}

                           
                    {{Form::close()}}
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
       $.get("{{asset($country . '/admin/states/getbycountry/')}}/" + CountryId, function(data){
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
  $.get("{{asset($country . '/admin/cities/getbystate/')}}/" + StateId, function(data){
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
@if(old('CountryID')>0)
  loadStates({{old('CountryID')}},"{{implode(',',old('StateID'))}}");
@elseif($job->country_id >0)
  loadStates({{$job->country_id }},"{{$job->state_ids }}");
@endif
@if(count(old('StateID'))>0)
  loadCities("{{implode(',',old('StateID'))}}","{{implode(',',old('CityID'))}}");
@elseif($job->state_ids !='')

loadCities("{{$job->state_ids}}","{{$job->city_ids}}");
@endif

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
              $.get("{{asset($country . '/admin/cities/getbystate/')}}/" + $(option).val(), function(data){
                 $.each(data, function(index, stateObj){
                     $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
                 });
                 $('#CityID').multiselect('rebuild'); 
              });
            }
            if($(option).val() >0 && $(option).val() != "" && (!checked)){
              $.get("{{asset($country . '/admin/cities/getbystate/')}}/" + $(option).val(), function(data){
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
@endsection

