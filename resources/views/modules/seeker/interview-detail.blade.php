@extends('layouts.app')

@section('content')
<div class="">
	@include('seeker::dashboard-links',array('country'=>$country))
	<div class="row">
		<div class="col-md-12 list-col ">
			@include('seeker::nav',array('country'=>$country))
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-body ">
            	<div class="row">
                    <div class="col-md-9">
                        <h4>Interview for {{$interviews->jobs->job_title}}</h4>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="col-md-6 text-sm">
                        	@if($interviews->status_id == 1)
                         	   <a href="{{url($country . '/seekers/interview/confirm/' . $interviews->id )}}"><i class="fa fa-check" aria-hidden="true"></i>Confirm</a>
                         	@elseif($interviews->status_id == 3)
                         	   <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i>Availability confirmed</span>
                         	@endif
                        </div>
                        <div class="col-md-6 text-sm">
                        	@if($interviews->status_id == 2)
                        		<span class="text-warning"><i class="fa fa-calendar" alt="Request Reschedule" aria-hidden="true"></i>Reschedule Requested</span>
                        	@else
                        	<a href="{{url($country . '/seekers/interview/reschedule/' . $interviews->id )}}"><i class="fa fa-calendar" alt="Request Reschedule" aria-hidden="true"></i>Reschedule</a>
                        	@endif
                        </div>
                    </div>
                </div>
                <div class="table-grid table-grid-bordered mb20">
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Interview at</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
	                        <i class="glyphicon glyphicon-time"></i>&nbsp;&nbsp;
                         {{date('M d',strtotime($interviews->interview_date))}}
                         - {{date('h:i A',strtotime($interviews->interview_time))}}
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Duration</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
	                        {{$interviews->duration}} Min.
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Job Title</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
	                        {{$interviews->jobs->job_title}}
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Company</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
							{{$interviews->jobs->companies->company_name}}
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Venue</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
	                        {{$interviews->vanue->title}},
	                        {{$interviews->vanue->address}},
	                        {{$interviews->vanue->city->Name}},
	                        {{$interviews->vanue->state->Name}},
	                        {{$interviews->vanue->country->Name}}
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Contact Person</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
	                        {{$interviews->vanue->contact_person}}
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Phone</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
	                        {{$interviews->vanue->phone}}
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Mobile</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
	                        {{$interviews->vanue->mobile}}
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4 col-sm-5 col-xs-5 cell active">Applied On</div>
	                    <div class="col-md-8 col-sm-7 col-xs-7 cell">
	                        {{date('M d, Y',strtotime($interviews->created_at))}}
	                    </div>
	                </div>
	            </div>
                <div class="row">
                            	<div class="col-md-12">
                		<div id="map" name="map"></div>

                	</div>
                </div>

               
            </div>
        </div>
	</div>
</div>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDNkInU-qm_PaRpIviucjqFvj_hJGsgIzg"></script>
   <script> 
    $(document).ready(function() {

init_map();
        

    });var map;
    var marker ;
      function init_map() {
        var myLocation = new google.maps.LatLng({{$interviews->vanue->lat}},{{$interviews->vanue->lng}});
        
        var mapOptions = {
           zoom: 14,
            center:myLocation
        };
        
       marker = new google.maps.Marker({
            position: myLocation,
            title:"{{$interviews->jobs->companies->company_name}}"});
             
         map= new google.maps.Map(document.getElementById("map"),
            mapOptions);
        
        marker.setMap(map); 

      }
      
      google.maps.event.addDomListener(window, 'load', init_map);
      
    </script>

@endsection