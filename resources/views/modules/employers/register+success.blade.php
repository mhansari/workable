@extends('layouts.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Signup</h4>
                </div>
                <div class="panel-body ">
                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                              <strong>Success!</strong> {{ Session::get('msg') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
         
    </div>
</div>

@endsection