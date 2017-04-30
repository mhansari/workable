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
                <div class="panel-heading"><h4>Update Profile Picture</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    {{ Form::open(array('url'=> route('uploadpp',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form','files'=>'true'))}}
                    <div class="form-group"> 
                    <label for="logo" class="col-md-3 control-label"></label>
                    <div class="col-md-9" style=" padding-left: inherit;">
                    <thumb>
                                            <div class="thumb-latest-profile" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                                                <span class="helper"></span>
                                                <img src="../../{{$user->pp==''?'pp/placeholder.png':$user->pp}}">
                                            </div>
                                        </thumb>
                                        </div>
                         </div>
                        <div class="form-group">                               
                        <label for="logo" class="col-md-3 control-label">Select Picture</label>
                        <div class="col-md-9" style=" padding-left: inherit;">
                            {{Form::file('logo', ['data-show-remove'=>'false','data-show-upload'=>'false','data-allowed-file-extensions'=>'["png", "gif","jpeg","jpg"]','data-show-preview'=>'false','data-validate'=>'true','data-error'=>'Required', 'placeholder'=>'Select Logo', 'required'=>'required', 'class'=>'input-width form-control'])}}
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

@endsection