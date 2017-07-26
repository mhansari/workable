@extends('layouts.app1')

@section('content')
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile img-circle" src="{{asset($profile->user->pp)}}" alt="" />
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
    </div>
@endsection

