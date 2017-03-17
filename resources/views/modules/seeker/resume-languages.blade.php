@extends('layouts.app')

@section('content')
<div class="container">
  @include('seeker::dashboard-links',array('country'=>$country))
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
                  <h4>Languages</h4>
                </div>
                <div class="panel-body ">
                  <a href="../update_language/{{$resumeid}}/0" class="btn btn-success">Add new</a>
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
      <th>Name</th>
      <th>Proficiency Level</th>
      <th>Actions</th>
   </tr>
   @foreach($language as $a)
   <tr>
      <td>#</td>
      <td>{{$a->language->name}}</td>
      <td>{{$a->proficiencylevel->name}}</td>
      <td><a href="../update_language/{{$a->resume_id}}/{{$a->id}}" class="fa fa-edit"></a> | <a onclick="return confirm('Are you sure you want to delete?')" href="../delete_language/{{$a->resume_id}}/{{$a->id}}" class="fa fa-remove"></a></td>
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