@extends('layouts.app')

@section('content')
        <link rel="stylesheet" href="{{ asset('css/build.css') }}"/>
        <link rel="stylesheet" href="{{asset('/css/font-awesome/css/font-awesome.css')}}">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('/css/styles-5.css')}}">
<div class="">
    @include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
       
        <div class="col-md-12 list-col ">
        @include('employers::nav',array('country'=>$country))
           <div class="panel panel-default">
                <div class="panel-heading">
                    <table style="width:100%">
                        <tr>
                            <td style="width:80%">
                                 <div class="btn-group">
                                    <button type="button" value="2" class="btn btn-link btn-sm btn-toolbar-margin">Back</button>
            <button type="button" value="2" class="btn btn-primary btn-sm btn-toolbar-margin">Shortlist</button>
            <button type="button" value="3" class="btn btn-primary btn-sm btn-toolbar-margin">Reject</button>
            <button type="button" value="4" class="btn btn-primary btn-sm btn-toolbar-margin">Screened</button>
            <button type="button" value="5" class="btn btn-primary btn-sm btn-toolbar-margin">Offered</button>
            <button type="button" value="6" class="btn btn-primary btn-sm btn-toolbar-margin">Hired</button>
            <button type="button" value="7" class="btn btn-primary btn-sm btn-toolbar-margin">Junk</button>
            <!--button type="button" value="msg" class="btn btn-primary btn-sm btn-toolbar-margin">Message</button-->
            <!--button type="button" value="interview" class="btn btn-primary btn-sm btn-toolbar-margin" id="interview">Interview</button-->
          </div> <br/>
        <br/> 

                            </td>
                            <td style="width:20%" class="text-right">
                                <a  class="btn btn-info " href="{{ asset('/'.$country.'/employers/download/resume/'.$profile->resume_id)}}">
                                    <span class="glyphicon glyphicon-download-alt"></span>&nbsp;&nbsp;Download
                                </a>
                            </td>
                        </tr>
                        <tr >
<td colspan="2">
        <center>
        {{ Form::open(array('class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
          <div class="col-md-12" style="display:none" id="msg">
            <div class="form-group col-md-12">
              <label for="message" class="col-sm-1 control-label">Message</label>
              {{Form::textArea('message', '',['data-error'=>'Required','id'=>'message', 'required'=>'required', 'class'=>'form-control'])}}
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-12">
              <center>
                <button type="button" value="send" class="btn btn-primary btn-sm btn-toolbar-margin" id="interview">Send</button>
              </center>
            </div>
          </div>
          {!! Form::token() !!} 
        {{Form::close()}}
    </center>
</td>
                        </tr>
                    </table>
                  
                </div>
<div class="panel-body ">
<div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile img-circle" src="{{asset($profile->pp)}}" alt="" />
                <h1 class="name">{{$profile->first_name}} {{$profile->last_name}}</h1>
                {{$profile->address}}. {{$profile->city->Name}} - {{$profile->postal_code}}, {{$profile->country->Name}}.
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto:{{$profile->email}}">{{$profile->email}}</a></li>
                    <li class="phone"><i class="fa fa-phone"></i>{{$profile->phone_day}}</li>
                    <li class="phone"><i class="fa fa-phone"></i>{{$profile->phone_night}}</li>
                    <li class="phone"><i class="fa fa-phone"></i>{{$profile->mobile}}</li>
                    <li class="website"><i class="fa fa-globe"></i><a href="{{$profile->website}}" target="_blank">{{$profile->website}}</a></li>
                    <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">{{$profile->linkedin}}</a></li>
                    <li class="facebook"><i class="fa fa-facebook"></i><a href="#" target="_blank">{{$profile->facebook}}</a></li>
                    <li class="twitter"><i class="fa fa-twitter"></i><a href="{{$profile->twitter}}" target="_blank">{{$profile->twitter}}</a></li>
                </ul>
            </div><!--//contact-container-->
            @if(count($profile->education)>0)
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                @foreach($profile->education as $e)
                <div class="item">
                    <h4 >{{$e->degreelevel->name}}</h4>
                    <h5 >{{$e->degree}}</h5>
                    <h5 >{{$e->institute}}</h5>
                    <h5 class="meta"><i>{{$e->city->Name}}, {{$e->country->Name}} with (Grade/GPA) {{$e->grade}}</i></h5>
                    <div class="time">{{date("M Y",strtotime($e->completion_date))}}</div>
                </div><!--//item-->
                @endforeach
            </div><!--//education-container-->
            @endif
            @if(count($profile->languages)>0)
            <div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">
                    @foreach($profile->languages as $e)
                        <li>{{$e->language->name}} <span class="lang-desc">({{$e->proficiencylevel->name}})</span></li>
                    @endforeach
                </ul>
            </div><!--//interests-->
            @endif
            @if(count($profile->references)>0)
            <div class="interests-container container-block">
                <h2 class="container-block-title">References</h2>
                <ul class="list-unstyled interests-list">
                    @foreach($profile->references as $e)
                        <li><strong>{{$e->name}}</strong><br/>
                        <span class="lang-desc">{{$e->job_title}} at {{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}<br/>
                        <i class="fa fa-phone"></i>&nbsp;{{$e->phone}}<br/>
                        <i class="fa fa-envelope"></i>&nbsp;{!! '<a href="mailto:'. $e->email . '">' . $e->email . '</a>' !!}</span></li>
                    @endforeach
                </ul>
            </div><!--//interests-->
            @endif
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
        @if(strlen($profile->professional_summary)>0)
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Summary</h2>
                <div class="summary">
                    <p>{!! $profile->professional_summary !!}</p>
                </div><!--//summary-->
            </section><!--//section-->
        @endif
        @if(count($profile->experiance)>0)
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>
                @foreach($profile->experiance as $e)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$e->job_title}}</h3>
                            <div class="time">{{date("M Y",strtotime($e->start_date))}} -@if($e->current_working)Present
                        @else
                            {{date("M Y",strtotime($e->end_date))}}
                        @endif</div>
                        </div><!--//upper-row-->
                        <div class="company">{{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>{!!$e->details!!}</p>
                    </div><!--//details-->
                </div><!--//item-->
                @endforeach
            </section><!--//section-->
        @endif
        @if(count($profile->projects)>0)
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                @foreach($profile->projects as $e)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$e->title}}</h3>
                            <div class="time">{{date("M Y",strtotime($e->start_date))}} -
                    @if($e->current_working)
                        Present
                    @else
                        {{date("M Y",strtotime($e->end_date))}}
                    @endif</div>
                        </div><!--//upper-row-->
                        <div class="company">As {{$e->position}} - {{$e->experiances->organization}} {{$e->experiances->city->Name}}, {{$e->experiances->country->Name}}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>{!!$e->details!!}</p>
                    </div><!--//details-->
                </div><!--//item-->
                @endforeach
            </section><!--//section-->
        @endif
        @if(count($profile->certifications)>0)<!-- certifications -->
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>CERTIFICATIONS</h2>
                @foreach($profile->certifications as $e)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$e->name}}</h3>
                            <div class="time">{{date("M Y",strtotime($e->completion_date))}}</div>
                        </div><!--//upper-row-->
                        <div class="company">{{$e->institution}}, {{$e->city->Name}}, {{$e->country->Name}} with (Grade/Score) {{$e->score}}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>{!!$e->details!!}</p>
                    </div><!--//details-->
                </div><!--//item-->
                @endforeach
            </section><!--//section-->
        @endif
        @if(count($profile->publications)>0)<!-- publications -->
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Publications</h2>
                @foreach($profile->publications as $e)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$e->title}}</h3>
                            <div class="time">{{date("M Y",strtotime($e->publication_date))}}</div>
                        </div><!--//upper-row-->
                        <div class="company">Author(s) : {{ $e->author }}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>{{ $e->publisher}}, {{$e->city->Name}}, {{$e->country->Name}}</p>
                    </div><!--//details-->
                </div><!--//item-->
                @endforeach
            </section><!--//section-->
        @endif
        @if(count($profile->affilitions)>0)<!-- affiliation -->
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Affiliations</h2>
                @foreach($profile->affilitions as $e)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$e->position}}</h3>
                            <div class="time">{{date("M Y",strtotime($e->start_date))}} -
                    @if($e->current_working)
                        Present
                    @else
                        {{date("M Y",strtotime($e->end_date))}}
                    @endif</div>
                        </div><!--//upper-row-->
                        <div class="company">{{ $e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}</div>
                    </div><!--//meta-->

                </div><!--//item-->
                @endforeach
            </section><!--//section-->
        @endif
        @if(count($profile->awards)>0)<!-- publications -->
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Awards</h2>
                @foreach($profile->awards as $e)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$e->title}}</h3>
                            <div class="time">{{date("M Y",strtotime($e->award_date))}}</div>
                        </div><!--//upper-row-->
                        <div class="company">{{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>{!! $e->details !!}</p>
                    </div><!--//details-->
                </div><!--//item-->
                @endforeach
            </section><!--//section-->
        @endif
        @if(count($profile->skills)>0)
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">   
                @foreach($profile->skills as $e)     
                    <div class="item">
                        <h3 class="level-title">{{$e->name}}</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="{{$e->skill_level_id*33.3 }}%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                @endforeach
                </div>  
            </section><!--//skills-section-->
        @endif
        </div><!--//main-body-->
    </div> </div>
         </div>

</div>

</div>
<script>
jQuery( document ).ready(function( $ ) {
    $('.btn-toolbar-margin').click(function() {
      if(this.value == 2)
      {
        var selected = [];
         selected.push({{$application_id}});
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 3)
      {
        var selected = [];
         selected.push({{$application_id}});
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 4)
      {
        var selected = [];
         selected.push({{$application_id}});
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 5)
      {
        var selected = [];
        selected.push({{$application_id}});
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 6)
      {
        var selected = [];
         selected.push({{$application_id}});
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 7)
      {
        var selected = [];
         selected.push({{$application_id}});
        var jsonString = JSON.stringify(selected.toString());
        
        ajax(jsonString,this.value,$(this).text());
      }

      else if(this.value == 'msg')
      {

        $( "#msg" ).slideToggle( "slow", function() {
          // Animation complete.
        });

      }

      else if(this.value == 'send')
      {
        var selected = [];
       
            selected.push({{$application_id}});
      
       
        var jsonString = JSON.stringify(selected.toString());
        send(jsonString,{{Auth::user()->id}},$('#message').val());
$('#message').val('');
        
      }
    });
});
function send(to,from,msg)
{

  $.ajax({
        type: "POST",
        url: "{{ route('send', array('country'=>$country)) }}",
        data: {_token : "{{ csrf_token() }}", to : to, from : from, msg:msg}, 
        cache: false,

        success: function(data){
          $( "#msg" ).slideToggle( "slow", function() {
    });
          alert('hi');
         //   $('#suc').html('<br /><small class="label label-success">Message sent to selected Applicants</small>');
             
        }
    });
}
function ajax(d,s,t)
{
  var a = $.parseJSON(d);
  a = a.split(',');
  $.ajax({
        type: "POST",
        url: "{{ route('changeStatus', array('country'=>$country)) }}",
        data: {data : d,status:s,_token : "{{ csrf_token() }}"}, 
        cache: false,

      
    });
}
</script>
<script type="text/javascript" src="{{asset('/js/main.js')}}"></script> 
@endsection