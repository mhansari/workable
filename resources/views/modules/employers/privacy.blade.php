@extends('layouts.app')

@section('content')
<div class="">
    @include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
  <div class="col-md-12 list-col ">
      @include('employers::nav', array('country'=>$country))
  </div>
</div>
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Privacy Settings</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    {{ Form::open(array('url'=> route('update.privacy',array('country'=>$country)),'class'=>'form-horizontal','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                    @foreach($privacy_options as $pv)
                        <div class="col-md-12"> 
                            <div class="row">
                                <div class="col-md-1" >
                                    <div class="checkbox checkbox-success checkbox-circle text-right">
                                        <input name="pv[]" id="qualification" type="checkbox" value="{{$pv->options[0]->id}}" {{$pv->visible?'checked':''}}>
                                        <label for="qualification"></label>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <strong>Make {{$pv->options[0]->privacy_option}} visible</strong>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                        
<div class="form-group">
    <div class="col-md-5 col-md-offset-4">
    <button type="submit" class="btn btn-primary">Update</button>
</div>
  </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
         
    </div>
</div>


@endsection