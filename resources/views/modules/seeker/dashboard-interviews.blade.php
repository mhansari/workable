<div class="panel panel-default">
    <div class="panel-body ">
        <div class="col-md-12">
        <ul class="media-list row list-compact">
        @foreach($interviews as $obj)
            <li class="media mt0">
            <div class="col-sm-8">
                <div class="media-left pt0 pr10">
                    <a href="{{asset($country . '/company/' . $obj->jobs->companies->user_id)}}">
                        <thumb>
                            <div class="thumb-latest" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                                <span class="helper"></span>
                                
                                <img src="{{asset($obj->jobs->companies->company_logo)}}">
                                
                            </div>
                        </thumb>
                    </a>
                </div>
                <div class="media-body">
                    <div class="media-heading b" style="height:16px;overflow:hidden;"><a href="{{ asset($country .'/jobs/' . $obj->job_id) }}">{{$obj->jobs->job_title}}</a></div>
                    <div class="text-sm">
                        <div style="height:16px;overflow:hidden;">
                        <a href="{{asset($country . '/company/' . $obj->jobs->companies->user_id)}}">{{$obj->jobs->companies->company_name}}</a></div>
                        <div style="height:16px;overflow:hidden;">
                            <div><a href="{{route('interview.detail',array('country'=>$country,'id'=>$obj->id))}}">
                        <i class="  glyphicon glyphicon-calendar"></i>
                            <span>
                            View details</a> &nbsp;|
                            @if($obj->status_id == 1)
                                <a href="{{url($country . '/seekers/interview/confirm/' . $obj->id )}}"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Confirm Availability</a></span> |
                            @elseif($obj->status_id == 3)
                                <span class="text-success"><i class="material-icons"></i>&nbsp;Availability Confirmed</span> |
                            @endif
                            &nbsp;
                            @if($obj->status_id==2)
                                <span class="text-warning"><i class="material-icons"></i>&nbsp;Reschedule Requested</span>
                            @else
                                <a href="{{url($country . '/seekers/interview/reschedule/' . $obj->id )}}"><i class="fa fa-calendar" alt="Request Reschedule" aria-hidden="true"></i>&nbsp;&nbsp;Reschedule</a>
                            @endif                           

                        </span>
                    </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-sm">
                <div>
                    <div>
                        <i class="glyphicon glyphicon-time"></i>
                         {{date('M d',strtotime($obj->interview_date))}}
                         - {{date('h:i A',strtotime($obj->interview_time))}}
                        
                    </div>
                    <div><i class="glyphicon glyphicon-map-marker"></i> 
                     {{$obj->vanue->title}}, {{$obj->vanue->city->Name}}, {{$obj->vanue->country->Name}} </div>
                </div>
                </div>
        </li>
        <hr/>
        @endforeach
        </ul>
        </div>
    </div>
</div>
