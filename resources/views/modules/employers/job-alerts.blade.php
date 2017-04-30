@extends('layouts.app')

@section('content')
<div class="">
    @include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
      
        <div class="col-md-12 list-col ">
        @include('employers::nav',array('country'=>$country))
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Alerts</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    {{ Form::open(array('url'=> route('update.alerts',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                <div class="col-md-12"> 
                    <div class="form-group">
                        <label for="service_alerts" class="col-sm-3 control-label">Services Alert</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                        <input name="service_alerts" id="service_alerts" type="checkbox" value="1" {{$notifications->service_alerts?'checked':''}}>
                                    <label for="service_alerts"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div> 
                <div class="form-group">
                    <label for="messages" class="col-sm-3 control-label">Messages</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                        <input name="messages" id="messages" type="checkbox" value="1" {{$notifications->messages?'checked':''}}>
                                    <label for="messages"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div> 
                <div class="form-group">
                    <label for="new_applications" class="col-sm-3 control-label">New Applications</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                        <input name="new_applications" id="new_applications" type="checkbox" value="1" {{$notifications->new_applications?'checked':''}}>
                                    <label for="new_applications"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>       
                <div class="form-group">
                    <label for="closing_jobs" class="col-sm-3 control-label">Closing Jobs</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                         <input name="closing_jobs" id="closing_jobs" type="checkbox" value="1" {{$notifications->closing_jobs?'checked':''}}>
                                    <label for="closing_jobs"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="daily_jobs_alerts" class="col-sm-3 control-label">Daily Job Alerts</label>
                    <div class="col-md-1 checkbox checkbox-success checkbox-circle">
                        <input name="daily_jobs_alerts" id="daily_jobs_alerts" type="checkbox" value="1" {{$notifications->daily_jobs_alerts?'checked':''}}>
                        <label for="daily_jobs_alerts"></label>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="CountryID" class="col-sm-3 control-label">Country</label>
                    {!! Form::select('CountryID', $countries, $notifications->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                  {!! Form::select('StateID[]', $states, '', ['data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','required'=>'required','multiple'=>"multiple"]) !!}
                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="CityID" class="col-sm-3 control-label">City</label>
                  {!! Form::select('CityID[]', $cities, '', ['multiple'=>'multiple','data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','required'=>'required']) !!}
                  <div class="help-block with-errors"></div>
              </div>
                 <div class="form-group">
                    <label for="CategoryID" class="col-sm-3 control-label">Categories</label>
                    {!! Form::select('CategoryID[]', $industries,'', ['multiple'=>'multiple','data-error'=>'Required', 'id'=>'CategoryID','class'=>'input-width form-control','required'=>'required']) !!}
                    <div class="help-block with-errors"></div>
                </div>

                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
         
    </div>
</div>

<script>

function loadStates(CountryId, StateId)
{
  var s = (StateId+'').split(",");

   if(CountryId >0 && CountryId != ""){
       $.get("{{asset($country . '/admin/states/getbycountry/')}}/" + CountryId, function(data){
            $('#StateID').empty();
            //$('#StateID').append('<option value>Please select State/Province</option>');
            $('#CityID').empty();
           // $('#CityID').append('<option value>Please select City</option>');
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
  $.get("{{asset($country .'/admin/cities/getbystate/')}}/" + StateId, function(data){
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

$('#CategoryID').multiselect('rebuild'); 
  var s = ("{{ $notifications->category_id }}"+'').split(',');

    for(i=0;i<s.length; i++){
      $('#CategoryID > [value="'+s[i]+'"]').attr("selected", "true");
    }
    $('#CategoryID').multiselect('rebuild'); 


    @if(old('CountryID')>0)
  loadStates({{old('CountryID')}},"{{implode(',',old('StateID'))}}");
@elseif($notifications->country_id >0)
  loadStates({{$notifications->country_id }},"{{$notifications->state_id }}");
@endif
@if(count(old('StateID'))>0)
  loadCities("{{implode(',',old('StateID'))}}","{{implode(',',old('CityID'))}}");
@elseif($notifications->state_id !='')

loadCities("{{$notifications->state_id}}","{{$notifications->city_id}}");
@endif
  $('#CityID').multiselect({
    enableCaseInsensitiveFiltering:true,
  });

  $('#StateID').multiselect({
    enableCaseInsensitiveFiltering:true,
        onChange : function(option, checked) {
            if($(option).val() >0 && $(option).val() != "" && checked){
              $.get("{{asset($country .'/admin/cities/getbystate/')}}/" + $(option).val(), function(data){
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
});
</script>
@endsection