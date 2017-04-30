@extends('layouts.app')

@section('content')
<div class="">
    @include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
       
        <div class="col-md-12 list-col ">
        @include('employers::nav',array('country'=>$country))
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Change Password</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    {{ Form::open(array('url'=> route('updatePassword',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                        <div class="form-group">                               
                            <label for="company_name" class="col-sm-3 control-label">Old Password</label>
                            {{Form::input('password', 'opwd', '',['data-error'=>'Required','id'=>'opwd', 'placeholder'=>'Old Password', 'required'=>'required', 'class'=>'input-width form-control'])}}
                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="about_company" class="col-sm-3 control-label">Password</label>
                             {{Form::input('password', 'npwd', '',['data-error'=>'Required','id'=>'npwd', 'placeholder'=>'New Password', 'required'=>'required', 'class'=>'input-width form-control'])}}
                            <div class="help-block with-errors error-label"></div>
                        </div>
                        <div class="form-group">                               
                            <label for="designation" class="col-sm-3 control-label">Confirm Password</label>
                             {{Form::input('password', 'cpwd', '',['data-error'=>'Required','id'=>'cpwd', 'placeholder'=>'Confirm Password', 'data-match'=>'#npwd','required'=>'required', 'class'=>'input-width form-control'])}}
                            <div class="help-block with-errors error-label"></div>
                        </div>
                        
<div class="form-group">
    <div class="col-md-5 col-md-offset-4">
    <button type="submit" class="btn btn-primary">Change</button>
</div>
  </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
         
    </div>
</div>


@endsection