@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12 text-center">
		<ul class="nav nav-pills">
		  <li class="active"><a href="{{ asset('seekers/dashboard') }}">Job Seekers</a></li>
		  <li ><a href="{{ asset('employers/dashboard') }}">Employers</a></li>
		</ul>
    </div>
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
      @include('seeker::nav')
  </div>
</nav></div>
                <div class="panel-body ">
                    
                </div>
            </div>
        </div>
         
    </div>
</div>



@endsection