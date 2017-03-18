@extends('layouts.app')

@section('content')
<div class="container">
@include('seeker::dashboard-links',array('country'=>$country))
  <div class="row">
    <div class="col-md-12 list-col ">

            @include('employers::nav',array('country'=>$country))

        
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
   
              {{ Form::open(array('url'=> route('emp.savevanue',array('country'=>$country)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
            <div class="col-md-10 col-md-offet-1">
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Title</label>
                {{Form::input('text', 'title', $obj->title,['data-error'=>'Required','id'=>'title', 'placeholder'=>'Title', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Address</label>
                {{Form::textarea('address', $obj->address,['data-error'=>'Required','id'=>'address', 'placeholder'=>'Address', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              
              <div class="form-group">
                  <label for="CountryID" class="col-sm-3 control-label">Country</label>
                  {!! Form::select('CountryID', $countries, $obj->country_id, ['data-error'=>'Required', 'id'=>'CountryID','class'=>'input-width form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="StateID" class="col-sm-3 control-label">State/Province</label>
                  {!! Form::select('StateID', $states, $obj->state_id, ['data-error'=>'Required', 'id'=>'StateID','class'=>'input-width form-control','placeholder'=>'Select State/Province','required'=>'required']) !!}
                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                  <label for="CityID" class="col-sm-3 control-label">City</label>
                  {!! Form::select('CityID', $cities, $obj->city_id, ['data-error'=>'Required', 'id'=>'CityID','class'=>'input-width form-control','placeholder'=>'Please select City','required'=>'required']) !!}
                  <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Contact Person</label>
                {{Form::input('text', 'contact_person', $obj->contact_person,['data-error'=>'Required','id'=>'contact_person', 'placeholder'=>'Contact Person', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Phone</label>
                {{Form::input('text', 'phone', $obj->phone,['data-error'=>'Required','id'=>'phone', 'placeholder'=>'Phone', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Mobile</label>
                {{Form::input('text', 'mobile', $obj->mobile,['data-error'=>'Required','id'=>'mobile', 'placeholder'=>'Mobile', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Fax</label>
                {{Form::input('text', 'fax', $obj->fax,['data-error'=>'Required','id'=>'fax', 'placeholder'=>'Fax', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Email</label>
                {{Form::input('text', 'email', $obj->email,['data-error'=>'Required','id'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Instructions</label>
                {{Form::textarea('instructions', $obj->instructions,['data-error'=>'Required','id'=>'instructions', 'placeholder'=>'Instructions', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
<input type="hidden" id="vanue_id" name="vanue_id" value="{{$obj->id}}">
            </div>
            {!! Form::token() !!}

                           
                    {{Form::close()}}
          </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
function loadStates(CountryId, StateId)
{
   if(CountryId >0 && CountryId != ""){
       $.get("{{asset('/admin/states/getbycountry/')}}/" + CountryId, function(data){
            $('#StateID').empty();
            $('#StateID').append('<option value>Please select State/Province</option>');
            $('#CityID').empty();
            $('#CityID').append('<option value>Please select City</option>');
            $.each(data, function(index, countryObj){
                $('#StateID').append('<option value="'+ countryObj.id+'">'+ countryObj.Name + '</option>');
            });   
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
function loadCities(StateId, CityId)
{
  $('#CityID').empty();
            $('#CityID').append('<option value>Please select City</option>');
  $.get("{{asset('/admin/cities/getbystate/')}}/" + StateId, function(data){
    $.each(data, function(index, stateObj){
      //alert(stateObj.Name);
      $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');
    });
    $('#CityID > [value="'+CityId+'"]').attr("selected", "true");
  });
}

jQuery( document ).ready(function( $ ) {
@if(old('CountryID')>0)
  loadStates({{old('CountryID')}},"{{old('StateID')}}");
@elseif($obj->country_id >0)
loadStates({{$obj->country_id}},"{{$obj->state_id}}");
@endif
@if(count(old('StateID'))>0)
  loadCities("{{old('StateID')}}","{{old('CityID')}}");
@elseif($obj->state_id >0)
loadCities("{{$obj->state_id}}","{{$obj->city_id}}");
@endif


 $('#CountryID').on('change', function(e){
            var CountryId = e.target.value;
            loadStates(CountryId,0);
        });
$('#StateID').on('change', function(e){
            var StateID = e.target.value;
            loadCities(StateID,0);
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

