@extends('layouts.app')

@section('content')
<div class="container">
@include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
        <div class="col-md-12 list-col ">
      @include('seeker::nav',array('country'=>$country))
        </div>
    </div>
<div class="row">
        <div class="col-md-12 list-col ">
dfgdfg
        </div>

    </div>


</div>



@endsection