@extends('layouts.app')

@section('content')
<div class="">
	@include('seeker::dashboard-links',array('country'=>$country))
	<div class="row">
		<div class="col-md-12 list-col ">
			@include('employers::nav',array('country'=>$country))
		</div>
	</div>
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<!--li class="active"><a class="tab-bg" href="#job">Perfect Match (60)</a></li-->
		  <li><a  data-toggle="tab" href="#posted">My Posted Jobs</a></li>
		  <li><a  data-toggle="tab" href="#app">Applicants</a></li>
		  <li><a  data-toggle="tab" href="#inter">My Scheduled Interviews</a></li>
		</ul>
		<div class="tab-content">
		  <div id="job" class="tab-pane fade in active">
		    @include('employers::dashboard-perfect',array('country'=>$country))
		  </div>
		  <div id="posted" class="tab-pane fade">
		    @include('employers::dashboard-jobs',array('country'=>$country))
		  </div>

	  <div id="app" class="tab-pane fade">
			@include('employers::dashboard-applicants',array('country'=>$country))
		  </div>
		  <div id="inter" class="tab-pane fade">
		  	@include('employers::dashboard-interviews',array('country'=>$country))
		  </div>
		</div>			
	</div>
</div>
@endsection