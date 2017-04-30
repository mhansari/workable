@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    <h3>Messages</h3>

        </div>
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                @foreach($to as $t)
                <div class="row">
                   <div class="col-md-2">
                   <thumb>
                        <div class="thumb-latest-profile" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                            <span class="helper"></span>
                          <thumb>
                                            <div class="thumb-latest-profile img-responsive" style="line-height: inherit; background-color: transparent; font-size: 25px;">
                                                <span class="helper"></span>
                                                <img src="../../{{$t->sender->pp==''?'pp/placeholder.png':$t->sender->pp}}">
                                            </div>
                                        </thumb>
                        </div>
                    </thumb>
                   </div>
                   <div class="col-md-10">
                   <div class="col-md-12 small">
                      <strong>
                        {{$t->sender->first_name}} {{$t->sender->last_name}}
                      </strong>
                   </div>
                  <div class="col-md-12 text-sm">
                       {{substr($t->msg,0,25)}}...
                   </div>
                   <div class="col-md-12 text-sm text-right">
                       {{date('m/d/Y g:i A',strtotime($t->created_at))}}
                   </div>
                   </div>

                    <div class="col-md-12">
                <hr/>
                </div>
                </div>
               

                @endforeach
                </div>
            </div>

        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body">
                <div class="form-msg">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      {{Form::textArea('msg', '',['data-error'=>'Required','id'=>'msg', 'placeholder'=>'Message', 'required'=>'required', 'class'=>'conversation-msg form-control'])}}
                      </div>
                    </div>
                    <div class="col-md-12">
                     <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div><hr/>
                    </div>
                  </div>
                  </div>

                  <div class="row">

                    @foreach($obj as $msg)
                     <div class="row">
                   <div class="col-md-1 text-right">
                   <thumb>
                        <div class="thumb-latest-profile text-right" style="width: 50px; height: 50px; line-height: inherit; background-color: transparent; font-size: 25px;">
                            <span class="helper"></span>
                          <thumb>
                                            <div class="thumb-latest-profile img-responsive text-right" style="line-height: inherit; background-color: transparent; font-size: 25px;">
                                                <span class="helper"></span>
                                                <img src="../../{{$msg->sender->pp==''?'pp/placeholder.png':$msg->sender->pp}}">
                                            </div>
                                        </thumb>
                        </div>
                    </thumb>
                   </div>
                   <div class="col-md-11">
                   <div class="col-md-12 small">
                      <strong>
                        {{$t->sender->first_name}} {{$t->sender->last_name}}
                      </strong>
                   </div>
                  <div class="col-md-12 text-sm">
                       {{$msg->msg}}...
                   </div>
                   <div class="col-md-12 text-sm text-right">
                       {{date('m/d/Y g:i A',strtotime($t->created_at))}}
                   </div>
                   </div>

                    <div class="col-md-12">
                <hr/>
                </div>
                </div>
               

                            @if(count($msg->childs))
                                {{$msg->childs}}
                            @endif
                        
                    @endforeach
          
                  </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
