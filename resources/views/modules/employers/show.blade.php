@extends('layouts.app1')

@section('content')
<div class="">
    <div class="photo-cover" id="cover" >
        <img src="{{ asset($company->company_cover) }}" class="img-responsive" width="100%" />
    </div>
    <div class="col-md-2 text-center">
        <div class="img-thumbnail">
            <a href="{{asset($country . '/company/' . $company->user_id)}}">
            <div class="thumb " style="width:150px;height:150px;line-height:inherit;background-color:transparent;font-size:75px;">
            <span class="helper"></span><img class="img" style="max-width:auto" src="{{ asset($company->company_logo) }}"></div>
            </a>
        </div> 
    </div>
    <div class="col-md-10 col-sm-9 text-center-xs">
        <h2 class="company_name"><a href="{{asset($country . '/company/' . $company->user_id)}}">{{$company->company_name}}, {{$company->city['name'] }}, {{$company->country['name']}}</a></h2>
        <br>
        <div class="row">
            <div class="col-md-8">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home" id="ab">About</a></li>
                    <li><a data-toggle="tab" href="#menu1" id="lj">Lastest Jobs</a></li>
                    <li><a data-toggle="tab" href="#menu3" id="mp">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                google ads
            </div>
            <div class="col-md-7">
                 <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 id="heading"></h4>
                </div>
                <div class="panel-body ">
                    <div class="tab-content">
                     <div id="home" class="tab-pane fade in active">
                        {{$company->about_company}}
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        @foreach($latest as $job)
                    <div class="panel panel-default"><div class="panel-body ">
                         <ul class="list-group box-search">
                            <li class="col-md-10 list-group-item result "><a href="{{ asset($country .'/jobs/' . $job->id) }}"><strong>{{ $job->job_title }}</strong></a></li>
                            <li class="col-md-2 list-group-item result text-right">
                                    @if(floor((time() - strtotime($job->created_at)) /  (60 * 60 * 24))<=$config['SHOW_NEW_OLD_DAYS']->v)
                                        <span class="label label-default">New</span>
                                    @endif
                                </li>
                            <li class="col-md-12 list-group-item result">
                                <a href="{{asset($country .'/company/'.$job->user_id)}}" title="Full-Time Jobs in Pakistan">{{$job->companies->company_name}}</a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Job Type</div>
                                <a href="{{asset($country .'/jobs/job-type/'. $job->jobtype['seo'] )}}" title="{{$job->jobtype['name'] }} Jobs in Pakistan">{{ $job->jobtype['name'] }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Shift</div>
                                <a href="{{asset($country .'/jobs/shift/'. $job->shift['seo'] )}}" title="{{ $job->shift['name'] }} Jobs in Pakistan">{{ $job->shift['name'] }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Experiance</div>
                                <a href="{{asset($country .'/jobs/experiance/'. $job->experiance['seo'] )}}" title="{{ $job->experiance['name'] }} Jobs in Pakistan">{{ $job->experiance['name'] }}</a>
                            </li>
                            <li class="col-md-3 list-group-item result">
                                <div class="text-muted">Salary</div>
                                {{ $job->currency_min }} - {{ $job->salary_max }}
                            </li>
                            <li class="col-md-12 list-group-item result">{!! strlen($job->description)>255?substr($job->description,0,255) . "..." : $job->description  !!}</li>
                            <li class="col-md-5 list-group-item result"><span class="glyphicon glyphicon-map-marker"></span>    
                            {{--*/ $sep = '' /*--}}
                            @foreach($job->cities as $c)
                            
                                @if($sep != '')
                                    {{--*/ $sep = $sep . ', ' /*--}}
                                @endif
                                {{--*/ $sep = $sep . $c['name'] /*--}}
                            
                            @endforeach
                            {{ $sep }} - {{$job->countries['name']}}
                            </li>
                            <li class="col-md-3 list-group-item result text-left "><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($job->created_at))->diffForHumans() }}</li>

                            <li class="col-md-4 list-group-item result text-right"><a href="{{url($country . '/seekers/apply/' . $job->id )}}" class="btn btn-primary btn-empty btn-xs">Apply</a> <button type="button" class="btn btn-primary btn-empty btn-xs save" value="{{$job->id}}">Save</button></li>
                            
                        </ul>
                    </div></div>
                    @endforeach
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <div id="map" name="map"></div>
                    </div>
                    </div>
                </div>
            </div>
                
                   
                
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Company Overview</h4>
                </div>
                <div class="panel-body ">
                    <div class="mb5"><strong>Industry: </strong> <br/>{{$company->categories['name']}}</div>
                    <div class="mb5"><strong>Business Entity: </strong> <br/>{{$company->inctype['name']}}</div>
                    <div class="mb5"><strong>Established In: </strong> <br/>{{ date('m-d-Y',strtotime($company->established_in))}}</div>
                    <div class="mb5"><strong>No. of Employees: </strong> <br/>{{ $company->total_employees}}</div>
                    <div class="mb5">
                        <strong>Location: </strong> <br/><a class="inverse" href="/companies/{{$company->country['name']}}/{{$company->city->seo}}/">{{$company->city['name']}}</a>, {{$company->state['name']}}, <a class="inverse" href="/companies/{{$company->country->seo}}/" title="Companies in {{ $company->country['name']}}">{{ $company->country['name']}}</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyDNkInU-qm_PaRpIviucjqFvj_hJGsgIzg"></script>
   <script> 
    $(document).ready(function() {
       $('#heading').text($('#ab').text());
init_map();
        $('#mp').click(function(){
            init_map();
            $('#heading').text($('#mp').text());
        });

        $('#lj').click(function(){
            $('#heading').text($('#lj').text() + " by {{$company->company_name}}" );
        });

        $('#pj').click(function(){
            $('#heading').text($('#pj').text());
        });
        $('#ab').click(function(){
            $('#heading').text($('#ab').text());
        });

    });var map;
    var marker ;
      function init_map() {
        var myLocation = new google.maps.LatLng({{$company->lat}},{{$company->lan}});
        
        var mapOptions = {
           zoom: 14,
            center:myLocation
        };
        
       marker = new google.maps.Marker({
            position: myLocation,
            title:"{{$company->company_name}}"});
             
         map= new google.maps.Map(document.getElementById("map"),
            mapOptions);
        
        marker.setMap(map); 

      }
      
      google.maps.event.addDomListener(window, 'load', init_map);
      
    </script>
    <script>
$('.save').click(function() {
    $.ajax({
        url: "{{url($country . '/seekers/save-job')}}",
            data: {
                "job_id" :$(this).val(),
                "_token": "{{ csrf_token() }}",
            },
            error: function(xhr, status, error) {
                if(xhr.status == 401)
                {
                    window.location="{{ url($country . '/account/login') }}";
                }
                else
                {
                    notify('danger','Error while saving Job, try again !!!');
                }
            },
            success: function(data) {
                if(data==-1)
                    notify('success','You already saved this Job.');
                else
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