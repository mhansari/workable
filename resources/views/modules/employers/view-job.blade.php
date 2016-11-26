@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                     @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    <div class="col-md-3 text-center">
                        <div class="img-thumbnail">
                            <a href="{{asset('/company/' . $j->user_id)}}">
                                <div class="thumb " style="width:150px;height:150px;line-height:inherit;background-color:transparent;font-size:75px;">
                                    <img style="max-width:auto;align-items:" class="img" src="{{ asset($j->companies->company_logo) }}">
                                </div>
                            </a>
                        </div> 
                    </div>
                    <div class="col-md-9 mobile-center">
                        <div class="row">
                            <div class="col-md-8 pow1">
                                <h4>{{$j->job_title}}</h4>
                            </div>
                            <div class="col-md-4 pow1">
                                <div class="col-md-6">

                                    <a href="{{url('seekers/apply/' . $j->id )}}"  class="btn btn-primary btn-empty btn-lg">Apply</a> 
                                </div>
                                 <div class="col-md-6">
                                    <button type="button" class="save btn btn-primary btn-empty btn-lg" value="{{$j->id}}">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 pow1">
                                <h5>{{$j->companies->company_name}}</h5>
                            </div>
                        </div>
                        <br/>
                        <ul class="list-unstyled list-columns mt5 row pow">
                            <li class="col-md-3 col-xs-6 result result-border">
                                <div class="text-muted">Job Type</div>
                                <a href="{{asset('jobs/'.$config['DEFAULT_COUNTRY']->v .'/' . $j->jobtype->seo )}}" title="{{ $j->jobtype->name }} Jobs in Pakistan">{{ $j->jobtype->name }}</a>
                            </li>
                            <li class="col-md-3 col-xs-6 result result-border">
                                <div class="text-muted">Shift</div>
                                <a href="{{asset('jobs/'.$config['DEFAULT_COUNTRY']->v .'/' . $j->shift->seo )}}" title="{{ $j->shift->name }} Jobs in Pakistan">{{ $j->shift->name }}</a>
                            </li>
                            <li class="col-md-3 col-xs-6 result result-border">
                                <div class="text-muted">Experiance</div>
                                <a href="{{asset('jobs/'.$config['DEFAULT_COUNTRY']->v .'/' . $j->experiance->seo )}}" title="{{ $j->experiance->name }} Jobs in Pakistan">{{ $j->experiance->name }}</a>
                            </li>
                            <li class="col-md-3 col-xs-6 result">
                                <div class="text-muted">Salary</div>
                                {{ $j->currency_min }} - {{ $j->salary_max }}
                            </li>
                        </ul>
                       
                    </div>

                    <div class="row ">
                        <div class="col-md-12 ">
                            <div class="hor mbc"></div>
                            <h4>Job Description</h4>
                            {{$j->description}}
                        </div>
                    </div>  <br/>
                    <div class="row ">
                        <div class="col-md-12 ">
                            <h4>Skills</h4>
                            {!! $j->required_skills !!}
                        </div>
                    </div>
                    @if(count($j->benefits)>0)
                    <br/>
                    <div class="row ">
                        <div class="col-md-12 ">
                            <h4>Benefits</h4>
                            <ul class="list-tags">
                            @foreach($j->benefits as $benefit)
                                    {!! '<li > ' . $benefit->name . '</li>' !!}
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <br/>
                    <div class="row ">
                        <div class="col-md-12 ">
                            <h4>Job Details</h4>
                            <div class="table-grid table-grid-bordered mb20">
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Category</div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell">
                            <a href="{{asset('/jobs/'.$config['DEFAULT_COUNTRY']->v .'/' . $j->categories->seo )}}" title="{{$j->categories->name}} Jobs in Pakistan">{{$j->categories->name}}</a>
                        </div>
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active"><span class="hidden-xs">Requires</span> Traveling</div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell">{{ ($j->required_travelling?'Yes':'No') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Career <span class="hidden-xs">Level</span></div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell">
                            <a href="{{asset('jobs/'.$config['DEFAULT_COUNTRY']->v .'/' . $j->experiance->seo )}}" title="{{$j->experiance->name}} Jobs in Pakistan">{{$j->experiance->name}}</a>
                        </div>
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Qualification</div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell">{{$j->qualifications}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Posted <span class="hidden-xs">on</span></div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell">{{ date("M d, Y",strtotime($j->created_at)) }}</div>
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active"><span class="hidden-xs">Total</span> Vacancies</div>
                        <div class="col-md-4 col-sm-7 col-xs-7 cell">{{$j->number_of_positions}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Last Date</div>
                        <div class="col-md-10 col-sm-7 col-xs-7 cell">{{ date("M d, Y",strtotime($j->job_expiry)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-5 col-xs-5 cell active">Location(s)</div>
                        <div class="col-md-10 col-sm-7 col-xs-7 cell">
                             {{--*/ $sep = '' /*--}}
                                @foreach($j->cities as $c)
                                
                                    @if($sep != '')
                                        {{--*/ $sep = $sep . '<span>,</span> ' /*--}}
                                        
                                    @endif
                                    {{--*/ $sep =  $sep . '<a href="'. asset('/jobs/'.$config['DEFAULT_COUNTRY']->v). '/'. $c->seo . '">' . $c->Name. '</a>' /*--}}
                                  
                                
                                @endforeach
                                {!! $sep !!} - Pakistan
                                
                        </div>
                    </div>


            </div>  
            <div class="hor mbc"></div>
                    <div class="row">

                        <div class="col-md-12 ">
                            <div class="col-md-6 text-center">
                                <div style="border-style:solid; border-width:1px; border-color:#ccc; height:300px;width:300px">

                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div style="border-style:solid; border-width:1px; border-color:#ccc; height:300px;width:300px">

                                </div>
                            </div>
                        </div>
                    </div>
<div class="hor mbc"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>{{$j->companies->company_name}}</h4>
                            <h5>{{$j->companies->city->Name}}, {{$j->companies->country->Name}}</h5>
                            {!!strlen($j->companies->about_company)>255?substr($j->companies->about_company,0,255) . '<br/><a href="'.asset('/company/' . $j->user_id).'">[more]</a>' : $job->description  !!}
                        </div>
                    </div>

                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-md-3">
            Google Ads
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
                notify('danger','Error while saving Job, try again !!!');
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