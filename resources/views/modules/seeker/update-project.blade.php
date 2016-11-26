@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Manage Resume</h4></div>
                <div class="panel-body ">
                    @include('seeker::left_nav')
                </div>
            </div>
        </div>
        <div class="col-md-9 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Update Project</h4></div>
                <div class="panel-body ">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                   {{ Form::open(array('class'=>'form-vertical','url'=> route('project.save', array('id' => $id,'resumeid'=>$resumeid)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>
                        {{Form::input('text', 'title', $project->title,['data-error'=>'Required','id'=>'title', 'placeholder'=>'Title', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="position" class="col-sm-3 control-label">Position</label>
                        {{Form::input('text', 'position', $project->position,['data-error'=>'Required','id'=>'position', 'placeholder'=>'Position', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>                     
                    <div class="form-group">
                        <label for="project_type_id" class="col-sm-3 control-label">Project Type</label>
                        {!! Form::select('project_type_id', $projecttype, $project->project_type_id, ['data-error'=>'Required', 'id'=>'project_type_id','class'=>'input-width form-control','placeholder'=>'Select Project Type','required'=>'required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="col-sm-3 control-label">Start Date</label>
                        @if($id==0)
                            {{Form::input('text', 'start_date','',['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'start_date','placeholder'=>'Start Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        @else
                            {{Form::input('text', 'start_date',date("m/d/Y",strtotime($project->start_date)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'start_date','placeholder'=>'Start Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        @endif
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="col-sm-3 control-label">End Date</label>
                       @if($id==0)
                            {{Form::input('text', 'end_date','',['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'end_date','placeholder'=>'End Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        @else
                            {{Form::input('text', 'end_date',date("m/d/Y",strtotime($project->end_date)),['data-error'=>'Required','readonly'=>'readonly','pattern'=>'^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$', 'id'=>'end_date','placeholder'=>'End Date', 'required'=>'required', 'class'=>'input-width form-control'])}}
                        @endif
                        <div class="help-block with-errors"></div>
                    </div>        
                    <div class="form-group">
                        <label for="current_work" class="col-sm-3 control-label">Currently Working?</label>
                        {{Form::checkbox('current_work',$project->current_working,['id'=>'current_work','class'=>'input-width form-control'])}}
                        <div class="help-block with-errors"></div>
                    </div>                                     
                    <div class="form-group"> 
                        <label for="details" class="col-sm-3 control-label">Details</label>
                         <div class="col-md-9 professional-summary">
                            {{Form::textArea('details', $project->details,['data-error'=>'Required','id'=>'details', 'placeholder'=>'Details', 'required'=>'required', 'class'=>'input-width-currency form-control'])}}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
<input type="hidden" value="{{$id}}" name="resume_id" id="resume_id" />
{!! Form::token() !!}

                           <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>
         
    </div>
</div>
<script type="text/javascript">
 jQuery( document ).ready(function( $ ) {

     $("#cnic").mask("99999-9999999-9"); 
     CKEDITOR.replace( 'details' , {
        width:450,
    toolbar: [
    
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList'] },
    { name: 'clipboard', groups: [ 'undo' ], items: ['Undo', 'Redo' ] }
]
});
    $('input[name="start_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 

$('input[name="end_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    }); 
});
</script>
@endsection