<div class="panel panel-default">
    <div class="panel-body ">
       <ul class="media-list row list-compact">
                @foreach($interviews as $obj)
                  <li class="media mt0">
                    <div class="col-md-6">
                      <div class="media-body">
                        <div>
                            <i class="text-sm glyphicon glyphicon-time "></i>&nbsp;
                                {{date('M d, Y',strtotime($obj->interview_date))}}
                                {{date('h:i A',strtotime($obj->interview_time))}}
                            @if($obj->status_id==2)
                              &nbsp;&nbsp;&nbsp;| 
                              <span class="text-sm">
                                <i class="fa fa-refresh"></i>&nbsp;&nbsp;Reschedule Requested
                              </span>
                            @endif
                          </div>
                          <div class="text-sm"><i class="glyphicon glyphicon-map-marker"></i> 
                            {{$obj->vanue->title}}, {{$obj->vanue->city->Name}}, {{$obj->vanue->country->Name}}                          </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-sm text-warning">
                    @if($obj->status_id==2)
                      The applicant has requested to reschedule interview at {{date('M d, Y',strtotime($obj->re_interview_date))}}
                                {{date('h:i A',strtotime($obj->re_interview_time))}}
                    @endif
                    </div>
                    <div class="col-md-2 text-sm">
                      <a href="{{asset($country . '/employers/interview/reschedule/'. $obj->id)}}">Reschedule</a> | <a href="{{asset($country . '/employers/interview/delete/'. $obj->id)}}">Delete</a>
                    </div>
                  </li>
                      <hr/>                    
                @endforeach
              </ul>
    </div>
</div>
