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
                <div class="panel-heading"><h4>Update Affiliation</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                   {{ Form::open(array('class'=>'form-vertical','url'=> route('affiliation.save', array('country'=>$country,'id' => $id,'resumeid'=>$resumeid)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                    <div class="form-group">
                        <label for="position" class="col-sm-3 control-label">Position</label>
                        {{Form::input('text', 'position', $affiliation->position,['data-error'=>'Required','id'=>'position', 'placeholder'=>'Position', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="org" class="col-sm-3 control-label">Organization</label>
                        {{Form::input('text', 'org', $affiliation->organization,['data-error'=>'Required','id'=>'org', 'placeholder'=>'Organization', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>                     
                    <div class="form-group">
                        <label for="CountryID" class="col-sm-3 control-label">Country</label>
                        {!! Form::select('CountryID', $countries, $affiliation->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                        {!! Form::select('StateID', $states, $affiliation->state_id, ['' => '','data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="CityID" class="col-sm-3 control-label">City</label>
                        {!! Form::select('CityID', $cities, $affiliation->city_id, ['data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="col-sm-3 control-label">Start Date</label>
                        @if($id==0)
                            {{Form::input('text', 'start_date','',['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'start_date','placeholder'=>'Start Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        @else
                            {{Form::input('text', 'start_date',date("m/d/Y",strtotime($affiliation->start_date)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'start_date','placeholder'=>'Start Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        @endif
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="col-sm-3 control-label">End Date</label>
                       @if($id==0)
                            {{Form::input('text', 'end_date','',['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'end_date','placeholder'=>'End Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        @else
                            {{Form::input('text', 'end_date',date("m/d/Y",strtotime($affiliation->end_date)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'end_date','placeholder'=>'End Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        @endif
                        <div class="help-block with-errors"></div>
                    </div>        
                    
<input type="hidden" value="{{$id}}" name="resume_id" id="resume_id" />
{!! Form::token() !!}

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
   return loadStates(CountryID,StateId);
  
}
function selectCity(StateId,CityId)
{
    loadcities(StateId, CityId)
  
}
function loadStates(CountryId, StateId)
{
   if(CountryId >0 && CountryId != ""){
       $.get("{{asset('/admin/states/getbycountry/')}}/" + CountryId, function(data){
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
            return  StateId;
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
        $.get("{{asset('/admin/cities/getbystate/')}}/" + StateId, function(data){
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

@if($id!= 0)
var s = selectState({{$affiliation->country_id}}, {{$affiliation->state_id}});


selectCity({{$affiliation->state_id}},{{$affiliation->city_id}});
@endif
   $('input[name="start_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 

$('input[name="end_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 

});
</script>
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    