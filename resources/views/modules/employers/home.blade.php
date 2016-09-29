@extends('employers::layouts.master')
@section('content')

<div class="row">
    <div class="col-md-10 col-center-block">

    	<div class="row">
    		<div class="col-md-12">
    			<div class="btn-group">
                    <button type="button" class="btn btn-default">Jobs</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">                   
                        <li><a href="{{route('emp.post')}}">Post a Job</a></li>
                        <li><a href="#">Posted Jobs</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
    		</div>
    	</div>
       
    </div>
</div>
 <div class="row">
            <div class="col-md-12">
                @yield('sub-content')
            </div>
        </div>

@stop