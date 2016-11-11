@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    {{ Form::open(array('id'=>'demo-form', 'data-parsley-validate'=>'parsley-validate'))}}
                     <ul class="list-group">
                        <li class="col-md-7 list-group-item form-list">{!! Form::input('text','NoVac', '', ['data-parsley-required-message'=>'Required', 'id'=>'NoVac','class'=>'form-control','placeholder'=>'Job Title, Skills or Company','required'=>'required']) !!}</li>
                        <li class="col-md-3 list-group-item form-list">{!! Form::select('CategoryID', $obj2, null, ['data-parsley-required-message'=>'Required', 'id'=>'CategoryID','class'=>'form-control','placeholder'=>'Select Category','required'=>'required']) !!}</li>
                        <li class="col-md-2 list-group-item form-list text-center"><button type="submit" id="submit" class="btn btn-success">Search</button></li>
                    </ul>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading panel-height">
                    <div class="col-md-12">    Categories</div>
                </div>
                <div class="panel-body">               
                    <ul class="list-group">
                        @foreach($obj as $key => $value)                                                      
                            <li class="col-md-4 col-sm-6 col-xs-12 list-group-item list"><a href="jobs/{{ $config['DEFAULT_COUNTRY']->v }}/{{ $key }}">{{$value}}</a></li>
                        @endforeach
                    </ul>               
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-height">
                    <div class="col-md-12">Featured Jobs</div> 
                </div>

                <div class="panel-body">                    
                    <ul class="list-group">
                        <li class="col-md-4 list-group-item box"></li>
                        <li class="col-md-4 list-group-item box"></li>
                        <li class="col-md-4 list-group-item box"></li>
                        <li class="col-md-4 list-group-item box"></li>
                        <li class="col-md-4 list-group-item box"></li>
                        <li class="col-md-4 list-group-item box"></li>
                        <li class="col-md-4 list-group-item  box"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
