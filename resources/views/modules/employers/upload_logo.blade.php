@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Settings</h4></div>
                <div class="panel-body ">
                    @include('employers::left_nav')
                </div>
            </div>
        </div>
        <div class="col-md-9 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Update Logo</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                    {{ Form::open(array('url'=> route('upload.logo'),'files'=>'true','class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                        <div class="logo-employers-alignment" >
                          <img class="center-block" src="{{ asset($ci[0]->company_logo) }}" />
                        </div>
                        <br />
                        <div class="form-group">                               

                            <label for="logo" class="col-md-3 control-label">Select Logo</label>
                            <div class="col-md-6 test">
                            {{Form::file('logo', ['data-show-remove'=>'false','data-show-upload'=>'false','data-allowed-file-extensions'=>'["png", "gif","jpeg","jpg"]','data-show-preview'=>'false','data-validate'=>'true','data-error'=>'Required', 'placeholder'=>'Select Logo', 'required'=>'required', 'class'=>' file form-control input-width '])}}
                        </div><div class="help-block with-errors error-label col-md-3"></div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
         
    </div>
</div>
<script>

$(document).on('ready', function() {
    $("#logo").fileinput({
        showUpload: false,
        maxFileCount: 1,
       // mainClass: "input-group-lg"
    });
});
</script>
@endsection