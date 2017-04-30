@extends('layouts.app')
  @section('content')
    <div class="">
      @include('seeker::dashboard-links',array('country'=>$country))
      <div class="row">
        <div class="col-md-12 list-col ">
          @include('employers::nav',array('country'=>$country))
        </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            
            <h4>Reschedule Interview </h4>
            
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
   
            {{ Form::open(array('url'=> route('emp.reschedule.update',array('country'=>$country,'id'=>$id)) ,'class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator'))}}
            <div class="col-md-12">
              <div class="row">
                <div class="form-group">
                  <div class="col-md-3">
                    <label class="control-label">Vanue</label>
                  </div>
                  <div class="col-md-4">
                    {{Form::select('vanue', $vanues,$obj->vanue_id,['data-error'=>'Required','id'=>'Vanue', 'placeholder'=>'Select Vanue', 'required'=>'required', 'class'=>'form-control'])}}
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="col-md-1">
                      <a href="{{ asset($country .'/employers/update-vanue') }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <div class="col-md-3">
                    <label for="interviewer" class="control-label">Interviewer(s)</label>
                  </div>
                  <div class="col-md-4">
                    {{Form::input('text','interviewer',$obj->interviewer,['data-error'=>'Required','id'=>'interviewer', 'placeholder'=>'Interviewer(s)', 'required'=>'required', 'class'=>'form-control'])}}
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="form-group">
                  <div class="col-md-3">
                    <label for="date" class="control-label">Interview Date/Time</label>
                  </div>
                  <div class="col-md-4">
                    {{Form::input('text','date',date('m/d/Y',strtotime($obj->interview_date)),['data-error'=>'Required','id'=>'date', 'placeholder'=>'Interview Date', 'required'=>'required', 'class'=>'form-control'])}}
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="col-md-5">
                    {{Form::select('time', $slot,date('g:i A',strtotime($obj->interview_time)),['data-error'=>'Required','id'=>'time', 'placeholder'=>'Select Time', 'required'=>'required', 'class'=>'form-control'])}}
                  </div>
                </div>
              </div>
               @if($obj->status_id==2)
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9 text-warning">               
                The applicant has requested to reschedule interview at {{date('M d, Y',strtotime($obj->re_interview_date))}}
                                {{date('h:i A',strtotime($obj->re_interview_time))}}
                </div>
              </div>
              @endif
              <div class="row">
                <div class="form-group">
                  <div class="col-md-3">
                    <label for="duration" class="control-label">Interview Duration</label>
                  </div>
                  <div class="col-md-4">
                    {{Form::input('number', 'duration',$obj->duration,['data-error'=>'Required','id'=>'duration', 'placeholder'=>'Duration', 'required'=>'required', 'class'=>'form-control'])}}
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
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

     <script type="text/javascript">
      jQuery( document ).ready(function( $ ) {
        $('input[name="date"]').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true
        });
      });
    </script>
  @endsection