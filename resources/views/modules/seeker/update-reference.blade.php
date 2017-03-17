@extends('layouts.app')

@section('content')
<div class="container">
    @include('seeker::dashboard-links',array('country'=>$country))
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
                <div class="panel-heading"><h4>Update Reference</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                   {{ Form::open(array('class'=>'form-vertical','url'=> route('reference.save', array('country'=>$country,'id' => $id,'resumeid'=>$resumeid)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        {{Form::input('text', 'name', $reference->name,['data-error'=>'Required','id'=>'name', 'placeholder'=>'Name', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="job_title" class="col-sm-3 control-label">Job Title</label>
                        {{Form::input('text', 'job_title', $reference->job_title,['data-error'=>'Required','id'=>'job_title', 'placeholder'=>'Job Title', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="org" class="col-sm-3 control-label">Organization</label>
                        {{Form::input('text', 'org', $reference->organization,['data-error'=>'Required','id'=>'org', 'placeholder'=>'Organization', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>                       
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Phone</label>
                        {{Form::input('text', 'phone', $reference->phone,['data-error'=>'Required','id'=>'phone', 'placeholder'=>'Phone', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        {{Form::input('text', 'email', $reference->email,['data-error'=>'Required','id'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="reference_type" class="col-sm-3 control-label">Reference Type</label>
                        {!! Form::select('reference_type', $referencetypes, $reference->reference_type_id, ['data-error'=>'Required', 'id'=>'reference_type','class'=>'input-width form-control','placeholder'=>'Select Reference Type','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>                  
                    <div class="form-group">
                        <label for="CountryID" class="col-sm-3 control-label">Country</label>
                        {!! Form::select('CountryID', $countries, $reference->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                        {!! Form::select('StateID', $states, $reference->state_id, ['' => '','data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="CityID" class="col-sm-3 control-label">City</label>
                        {!! Form::select('CityID', $cities, $reference->city_id, ['data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']) !!}
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
var s = selectState({{$reference->country_id}}, {{$reference->state_id}});


selectCity({{$reference->state_id}},{{$reference->city_id}});
@endif


});
</script>
@endsection