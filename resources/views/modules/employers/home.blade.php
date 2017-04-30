@extends('layouts.app')

@section('content')
<div class="">
@include('seeker::dashboard-links',array('country'=>$country))
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