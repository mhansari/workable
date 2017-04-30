@extends('layouts.app')

@section('content')
<div class="">
@include('seeker::dashboard-links',array('country'=>$country))
  <div class="row">
    <div class="col-md-12 list-col ">
      <div class="panel panel-default">
        <div class="panel-heading">
            @include('employers::nav',array('country'=>$country))
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
   
              {{ Form::open(array('url'=> route('scheduleinterview',array('country'=>$country,'application_id'=>$application_id)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
            <div class="col-md-10 col-md-offet-1">
              <div class="form-group">
                <label for="vanue" class="col-sm-3 control-label">Vanue</label>
                {{Form::select('vanue', $vanues,$obj->vanue_id,['data-error'=>'Required','id'=>'Vanue', 'placeholder'=>'Select Vanue', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="interviewer" class="col-sm-3 control-label">Interviewer(s)</label>
                {{Form::input('text','interviewer',$obj->interviewer,['data-error'=>'Required','id'=>'interviewer', 'placeholder'=>'Interviewer(s)', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="date" class="col-sm-3 control-label">Interview Date</label>
                {{Form::input('text','date',date('m/d/Y',strtotime($obj->interview_date)),['data-error'=>'Required','id'=>'interviewer', 'placeholder'=>'Interview Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="time" class="col-sm-3 control-label">Interview Time</label>
                {{Form::select('time', $slot,date('g:i A',strtotime($obj->interview_time)),['data-error'=>'Required','id'=>'time', 'placeholder'=>'Select Time', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label for="duration" class="col-sm-3 control-label">Interview Duration</label>
                {{Form::input('number', 'duration',$obj->duration,['data-error'=>'Required','id'=>'time', 'placeholder'=>'Duration', 'required'=>'required', 'class'=>'input-width form-control'])}}
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
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

function select_applications(application_ids)
{

  var s = (application_ids+'').split(",");
  
    for(i=0;i<s.length; i++){

      $('#ApplicationID > [value="'+s[i]+'"]').attr("selected", "true");
    }
    $('#ApplicationID').multiselect('rebuild'); 

}
jQuery( document ).ready(function( $ ) {

   $('input[name="date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
$('#ApplicationID').multiselect({
    enableCaseInsensitiveFiltering:true
  });

select_applications("{{$application_id}}");

});
</script>
@endsection

