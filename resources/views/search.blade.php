@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2 list-col">
           <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    {{ Form::open(array('id'=>'demo-form', 'data-parsley-validate'=>'parsley-validate'))}}
                     <ul class="list-group">
                        <li class="col-sm-12 list-group-item form-list">{!! Form::select('CategoryID', $obj2, null, ['data-parsley-required-message'=>'Required', 'id'=>'CategoryID','class'=>'form-control','placeholder'=>'Category','required'=>'required']) !!}</li>
                        <li class="col-sm-12 list-group-item form-list">{!! Form::select('ExperianceID', $el, null, ['data-parsley-required-message'=>'Required', 'id'=>'ExperianceID','class'=>'form-control','placeholder'=>'Experiance','required'=>'required']) !!}</li>
                        <li class="col-sm-6 list-group-item form-list form-sm">{!! Form::input('ExperianceID', $el, null, ['data-parsley-required-message'=>'Required', 'id'=>'ExperianceID','class'=>'form-control','placeholder'=>'Experiance','required'=>'required']) !!}</li>
                        <li class="col-sm-6 list-group-item form-list form-sm">{!! Form::input('ExperianceID', $el, null, ['data-parsley-required-message'=>'Required', 'id'=>'ExperianceID','class'=>'form-control','placeholder'=>'Experiance','required'=>'required']) !!}</li>
                        <li class="col-sm-12 list-group-item form-list text-center"><button type="submit" id="submit" class="btn btn-primary">Search</button></li>
                    </ul>
                    {!! Form::close() !!}
                </div>
            </div>
        </div> 
         <div class="col-md-7 list-col">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Search Jobs in {{ $cntry->Name }} </h4></div>
                <div class="panel-body ">
                    @foreach($j as $job)
                    <div class="panel panel-default"><div class="panel-body ">
                         <ul class="list-group box">
                            <li class="col-md-10 list-group-item result "><a href="#"><strong>{{ $job->job_title }}</strong></a></li>
                            <li class="col-md-2 list-group-item result text-right">
                                    @if(floor((time() - strtotime($job->created_at)) /  (60 * 60 * 24))<=$config['SHOW_NEW_OLD_DAYS']->v)
                                        <span class="label label-default">New</span>
                                    @endif
                                </li>
                            <li class="col-md-12 list-group-item result">VR Hiring (Pvt.) Ltd.</li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Job Type</div>
                                <a href="/jobs/pakistan/full-time/" title="Full-Time Jobs in Pakistan">{{ $job->jobtype->name }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Shift</div>
                                <a href="/jobs/pakistan/full-time/" title="Full-Time Jobs in Pakistan">{{ $job->shift->name }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Experiance</div>
                                <a href="/jobs/pakistan/full-time/" title="Full-Time Jobs in Pakistan">{{ $job->experiance->name }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result">
                                <div class="text-muted">Salary</div>
                                <a href="/jobs/pakistan/full-time/" title="Full-Time Jobs in Pakistan">{{ $job->currency_min }} - {{ $job->salary_max }}</a>
                            </li>
                            <li class="col-md-12 list-group-item result">{{ strlen($job->description)>255?substr($job->description,0,255) . "..." : $job->description  }}</li>
                            <li class="col-md-5 list-group-item result"><span class="glyphicon glyphicon-map-marker"></span>    
                            {{--*/ $sep = '' /*--}}
                            @foreach($job->cities as $c)
                            
                                @if($sep != '')
                                    {{--*/ $sep = $sep . ', ' /*--}}
                                @endif
                                {{--*/ $sep = $sep . $c->Name /*--}}
                            
                            @endforeach
                            {{ $sep }} - Pakistan
                            </li>
                            <li class="col-md-3 list-group-item result text-left "><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($job->created_at))->diffForHumans() }}</li>

                            <li class="col-md-4 list-group-item result text-right"><button type="button" class="btn btn-primary btn-empty btn-xs">Apply</button> <button type="button" class="btn btn-primary btn-empty btn-xs">Save</button></li>
                            
                        </ul>
                    </div></div>
                    @endforeach
                    
                   
                </div>
            </div>
        </div>
         <div class="col-md-3 list-col">
           <div class="panel panel-default">
     
                <div class="panel-body">
                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

