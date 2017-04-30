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
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#job">Recommended Jobs</a></li>
		  <li><a data-toggle="tab" href="#resume">My Resumes</a></li>
		  <li><a data-toggle="tab" href="#saved">My Saved Jobs</a></li>
		  <li><a data-toggle="tab" href="#app">My Applications</a></li>
		  <li><a data-toggle="tab" href="#inter">My Interview Calls</a></li>
		</ul>
		<div class="tab-content">
		  <div id="job" class="tab-pane fade in active">
		  </div>
		  <div id="resume" class="tab-pane fade">
		    @include('seeker::dashboard-resumes',array('country'=>$country))
		  </div>
		  <div id="saved" class="tab-pane fade">
		    @include('seeker::dashboard-savedjobs',array('country'=>$country))
		  </div>
		  <div id="app" class="tab-pane fade">
		    @include('seeker::dashboard-applicationonjobs',array('country'=>$country))
		  </div>
		  <div id="inter" class="tab-pane fade">
		    @include('seeker::dashboard-interviews',array('country'=>$country))
		  </div>
		</div>		
	</div>
</div>
@endsection