@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12 text-center">
		<ul class="nav nav-pills">
		  <li><a href="{{ asset('seekers/dashboard') }}">Job Seekers</a></li>
		  <li><a href="{{ asset('employers/dashboard') }}">Employers</a></li>
		</ul>
    </div>
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Welcome {{ $user->first_name . ' ' . $user->last_name }}!</h4></div>
                <div class="panel-body ">
                    
                </div>
            </div>
        </div>
         
    </div>
</div>



@endsection