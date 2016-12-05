@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12 text-center">
    <ul class="nav nav-pills">
      <li><a href="{{ asset('seekers/dashboard') }}">Job Seekers</a></li>
      <li class="active"><a href="{{ asset('employers/dashboard') }}">Employers</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12 list-col ">
      <div class="panel panel-default">
        <div class="panel-heading">
            @include('employers::nav')
        </div>        
        <div class="panel-body ">
        
          <div class="col-md-12">
            @if(Session::has('flash_message'))
              <div class="alert alert-success">
                  {{ Session::get('flash_message') }}
              </div>
            @endif
            @if($errors->has())
               @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
            @endif
            <div class="col-md-12 text-center ">
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Shortlist</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Reject</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Screened</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Offered</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Hired</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Junk</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Message</button>
                <button type="button" class="btn btn-primary btn-sm btn-toolbar-margin">Interview</button>
              </div>
              
            </div>
            <div class="col-md-12">
               <div class="table-responsive table-top-padding"> 
        <table class="table table-bordered table-color">
            <thead>
                <tr>
                    <th><input type="checkbox" /></th>
                    <th>Candidate</th>
                    <th>Education</th>
                    <th>Experience</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
              @foreach($obj as $o)
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>
                      {{ $o->personal_info[0]->first_name }} {{ $o->personal_info[0]->last_name }} <br />
                      {{$o->jobs->job_title}} <br />
                      {{'Expected Salary: ' . $o->personal_info[0]->expected_salary . ' ' . $o->personal_info[0]->ExpectedSalaryCurrency->name}}
                    </td>
                    <td>
                      {{--*/ $sep = '' /*--}} 
                      @foreach($o->education as $e)
                      
                          @if($sep != '')
                              {{--*/ $sep = $sep . '<span>, </span> ' /*--}}
                              
                          @endif
                          {{--*/ $sep =  $sep . $e->degree /*--}}
                        
                      
                      @endforeach
                      {!!$sep!!}
                    </td>
                    <td>
                      {{--*/ $start = '' /*--}} 
                      {{--*/ $end = '' /*--}} 
                      @foreach($o->experiance as $e)
                        @if($start != '')
                          {{--*/ $start = $start . ',' /*--}}
                        @endif
                        @if($end != '')
                          {{--*/ $end = $end . ',' /*--}}
                        @endif
                      {{--*/ $start =  $start . $e->start_date /*--}}
                      {{--*/ $end =  $end . $e->end_date /*--}}
                      
                      @endforeach
                      {{\App\Applied::getYears($start,$end )}} <br/>
                      {{--*/ $positions = '' /*--}} 
                      @foreach($o->experiance as $e)
                      
                          @if($positions != '')
                              {{--*/ $positions = $positions . '<span>, </span> ' /*--}}
                              
                          @endif
                          {{--*/ $positions =  $positions . $e->job_title /*--}}
                        
                      
                      @endforeach
                      {!!$positions!!}
                    </td>
                    <td>
                      {{$o->personal_info[0]->city->Name}}, {{$o->personal_info[0]->country->Name}}
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection