@extends('layouts.app')
  @section('content')
    <div class="">
      @include('seeker::dashboard-links',array('country'=>$country))
      <div class="row">
        <div class="col-md-12 list-col ">
          @include('seeker::nav',array('country'=>$country))
        </div>
      </div>
      <div class="col-md-2">
        @include('seeker::google-left',array('country'=>$country))
      </div>
      <div class="col-md-8">
        <div class="panel panel-default">  
          <div class="panel-heading">
            <h4>Request to Re-schedule Interview</h4>
          </div>
          <div class="panel-body ">
            <div class="row">
              @if($errors->has())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
              @endif
              {{ Form::open(array('url'=>route('reschedule.update',array('country'=>$country, 'id'=>$id)),'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator'))}}
              <div class="col-md-10 col-md-offet-1">
                <div class="form-group">
                  <label for="job_title" class="col-sm-3 control-label">Job Title</label>
                  {{Form::input('text','job_title',$interviews->jobs->job_title,['data-error'=>'Required','id'=>'job_title', 'placeholder'=>'Job Title', 'required'=>'required', 'class'=>'input-width form-control', 'readonly'=>'readonly'])}}
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <label for="interviewer" class="col-sm-3 control-label">Company</label>
                  {{Form::input('text','company',$interviews->jobs->companies->company_name,['data-error'=>'Required','id'=>'company', 'placeholder'=>'Company', 'required'=>'required', 'class'=>'input-width form-control', 'readonly'=>'readonly'])}}
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Interview Date</label>
                  {{Form::input('text','date',date('m/d/Y',strtotime($interviews->interview_date)),['data-error'=>'Required','id'=>'interviewer', 'placeholder'=>'Interview Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                  <label for="time" class="col-sm-3 control-label">Interview Time</label>
                  {{Form::select('time', $slot,date('g:i A',strtotime($interviews->interview_time)),['data-error'=>'Required','id'=>'time', 'placeholder'=>'Select Time', 'required'=>'required', 'class'=>'input-width form-control'])}}
                  <div class="help-block with-errors"></div>
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
      <div class="col-md-2">
        @include('seeker::google-right',array('country'=>$country))
      </div>  
    </div>
    <script type="text/javascript">
      jQuery( document ).ready(function( $ ) {
        $('input[name="date"]').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true
        });
      });
    </script>
  @endsection