@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1 text-center">
        <img src="{{asset('images/map.gif')}}" class="img-responsive"/>
    	</div>
    </div>
    <div class="row">
        
        @foreach($regions as $r)
        <div class="col-md-2  text-center">
	        <div class="panel panel-default">
		        <div class="panel-heading">
					<span class="regions-font">{{$r->name}}</span>
		        </div>
		        <div class="panel-body ">
		        	
		        </div>
		    </div>
	    </div>
        @endforeach
   	</div>
</div>
@endsection
