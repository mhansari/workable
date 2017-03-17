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
                <div class="panel-heading"><h4>Manage Resume</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    {{ Form::open(array('url'=> route('uploadresume',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
                        <div class="form-group">                               
                            <label for="company_name" class="col-sm-3 control-label">Resume Title</label>
                            {{Form::input('title', 'title', '',['data-error'=>'Required','id'=>'title', 'placeholder'=>'Resume Title', 'required'=>'required', 'class'=>'input-width form-control'])}}
                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               

                            <label for="logo" class="col-md-3 control-label">Select Resume (.doc,.docx,pdf)</label>
                            <div class="col-md-6 upload-margin">
                            {{Form::file('cv', ['data-show-remove'=>'false','data-show-upload'=>'false','data-allowed-file-extensions'=>'["doc", "docx","pdf"]','data-show-preview'=>'false','data-validate'=>'true','data-error'=>'Required', 'placeholder'=>'Select Resume', 'required'=>'required', 'class'=>' file form-control input-width upload-margin'])}}
                            </div>
                            <div class="help-block with-errors error-label col-md-3"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 upload-margin">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
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
</script>
@endsection