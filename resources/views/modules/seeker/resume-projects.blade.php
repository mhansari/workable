@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Manage Resume</h4>
                </div>
                <div class="panel-body ">
                    @include('seeker::left_nav')
                </div>
            </div>
        </div>
        <div class="col-md-9 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Manage Resume</h4>
                </div>
                <div class="panel-body ">
                  <a href="../update_project/{{$resumeid}}/0" class="btn btn-success">Add new</a>
                  <br/><br/>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
<div class="table-responsive">
  <table class="table">
   <tr>
      <th>#</th>
      <th>Title</th>
      <th>Position</th>
      <th>Project Type</th>
      <th>Start Date</th>
      <th>End Date</th>      
      <th>Actions</th>
   </tr>
   @foreach($project as $a)
   <tr>
      <td>#</td>
      <td>{{$a->title}}</td>
      <td>{{$a->position}}</td>
      <td>{{$a->projecttype->name}}</td>
      <td>{{$a->start_date}}</td>
      <td>
        @if($a->current_working)
          Till Date
        @else
          {{$a->end_date}}
        @endif
      </td>
      
      <td><a href="../update_project/{{$a->resume_id}}/{{$a->id}}" class="fa fa-edit"></a> | <a onclick="return confirm('Are you sure you want to delete?')" href="../delete_project/{{$a->resume_id}}/{{$a->id}}" class="fa fa-remove"></a></td>
   </tr>
   @endforeach
  </table>
</div>
                </div>
            </div>
        </div>
         
    </div>
</div>

@endsection