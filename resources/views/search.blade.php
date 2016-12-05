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
                    @if(count($j)<1)
                        <span class="col-md-12 alert alert-danger text-center">There is no job available in the selected category.</span>
                    @endif
                    @foreach($j as $job)
                    <div class="panel panel-default"><div class="panel-body ">
                         <ul class="list-group box">
                            <li class="col-md-10 list-group-item result "><a href="{{ asset('jobs/' . $job->id) }}"><strong>{{ $job->job_title }}</strong></a></li>
                            <li class="col-md-2 list-group-item result text-right">
                                    @if(floor((time() - strtotime($job->created_at)) /  (60 * 60 * 24))<=$config['SHOW_NEW_OLD_DAYS']->v)
                                        <span class="label label-default">New</span>
                                    @endif 
                                </li>
                            <li class="col-md-12 list-group-item result">
                                <a href="{{asset('/company/'.$job->user_id)}}" title="Full-Time Jobs in Pakistan">{{$job->companies->company_name}}</a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Job Type</div>
                                <a href="{{asset('jobs/'.$config['DEFAULT_COUNTRY']->v .'/' . $job->jobtype->seo )}}" title="$job->jobtype->name Jobs in Pakistan">{{ $job->jobtype->name }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Shift</div>
                                <a href="{{asset('jobs/'.$config['DEFAULT_COUNTRY']->v .'/' . $job->shift->seo )}}" title="{{ $job->shift->name }} Jobs in Pakistan">{{ $job->shift->name }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Experiance</div>
                                <a href="{{asset('jobs/'.$config['DEFAULT_COUNTRY']->v .'/' . $job->experiance->seo )}}" title="{{ $job->experiance->name }} Jobs in Pakistan">{{ $job->experiance->name }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result">
                                <div class="text-muted">Salary</div>
                                {{ $job->currency_min }} - {{ $job->salary_max }}
                            </li>
                            <li class="col-md-12 list-group-item result">{{ strlen($job->description)>255?substr($job->description,0,255) . "..." : $job->description  }}</li>
                            <li class="col-md-5 list-group-item result"><span class="glyphicon glyphicon-map-marker"></span>    
                             {{--*/ $sep = '' /*--}}
                                @foreach($job->cities as $c)
                                
                                    @if($sep != '')
                                        {{--*/ $sep = $sep . '<span>,</span> ' /*--}}
                                        
                                    @endif
                                    {{--*/ $sep =  $sep . '<a href="'. asset('/jobs/'.$config['DEFAULT_COUNTRY']->v). '/'. $c->seo . '">' . $c->Name. '</a>' /*--}}
                                  
                                
                                @endforeach
                                {!! $sep !!} - Pakistan
                            </li>
                            <li class="col-md-3 list-group-item result text-left "><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($job->created_at))->diffForHumans() }}</li>

                            <li class="col-md-4 list-group-item result text-right"><a href="{{url('seekers/apply/' . $job->id )}}" class="btn btn-primary btn-empty btn-xs">Apply</a> <button type="button" class="btn btn-primary btn-empty btn-xs save" value="{{$job->id}}">Save</button></li>
                            
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
<script>
$('.save').click(function() {
    $.ajax({
        url: "{{url('seekers/save-job')}}",
            data: {
                "job_id" :$(this).val(),
                "_token": "{{ csrf_token() }}",
            },
            error: function(xhr, status, error) {
                if(xhr.status == 401)
                {
                    window.location="{{ url('account/login') }}";
                }
                else
                {
                    notify('danger','Error while saving Job, try again !!!');
                }
            },
            success: function(data) {
                notify('success','Job Saved Successfully');
            },

        type: 'POST'
    });

});

function notify(t,m){
    $.notify({
            // options
            message: m 
        },{
            // settings
            type: t,
            offset: 250,
            allow_dismiss:false,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },

            placement: {
                from: "top",
                align: "center"
            },
        });
}
</script>

<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
@endsection

