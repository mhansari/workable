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
                <div class="panel-heading"><h4>Update Language</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                   {{ Form::open(array('class'=>'form-vertical','url'=> route('language.save', array('country'=>$country,'id' => $id,'resumeid'=>$resumeid)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                    <div class="form-group">
                        <label for="language" class="col-sm-3 control-label">Language</label>
                        {!! Form::select('language', $languages, $language->language_id, ['data-error'=>'Required', 'id'=>'language','class'=>'input-width form-control','placeholder'=>'Select Language','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="proficiency_level" class="col-sm-3 control-label">language Level</label>
                        {!! Form::select('proficiency_level', $proficiencylevels, $language->proficiency_level_id, ['data-error'=>'Required', 'id'=>'proficiency_level','class'=>'input-width form-control','placeholder'=>'Select Proficiency Level','required'=>'required']) !!}
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

@endsection