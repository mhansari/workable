@extends('layouts.app')

@section('content')
<div class="container">
    @include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
       
        <div class="col-md-9 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
                    <table style="width:100%">
                        <tr>
                            <td style="width:80%">
                                 

                            </td>
                            <td style="width:20%" class="text-right">
                                <a  class="btn btn-info " href="download/{{$profile->resume_id}}">
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
        <table width="100%">
        @if($profile->pp != '')
            <tr style="width:100%; padding:3px;text-align:center" class="print-padding">
                <td>
                    <img src="{{asset($profile->pp)}}">
                   
                </td>
            </tr>
        @endif
            <tr style="width:100%; padding:3px;text-align:center" class="print-padding print-bottom-border">
                <td>
                    <h2>{{$profile->first_name}} {{$profile->last_name}}</h2>
                   
                    {{$profile->address}}. {{$profile->city->Name}} - {{$profile->postal_code}}, {{$profile->country->Name}}.<br/>
                    Phone : {{$profile->phone_day}}, {{$profile->phone_night}} Mobile : {{$profile->mobile}} <br/>
                    Email : {{$profile->email}}
                </td>
            </tr>
        </table>
        <br/>
        @if(strlen($profile->professional_summary)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th >
                    <div class="print-padding print-bottom-border" >
                        <strong>SUMMARY</strong>
                    </div>
                </th>
            </tr>
            <tr style="width:100%; padding:3px" >
                <td style="padding:3px">
                    <div class="print-padding-lr" >
                        {!! $profile->professional_summary !!}
                    </div>
                </td>
            </tr>
        </table>
        <br/>
        @endif
        <!-- Education Section -->
        @if(count($profile->education)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>EDUCATION</strong>
                    </div>
                </th>
            </tr>            
            @foreach($profile->education as $e)
            <tr>
                <td style="width:12%; padding:3px; padding-right" class="print-padding-lr text-right print-date-size">
                    {{date("M Y",strtotime($e->completion_date))}}
                </td>
                <td style="width:88%; padding:3px; padding-left:15px" class="text-left">
                    <strong>{{$e->degreelevel->name}} - {{$e->degree}}</strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                            <i>{{$e->institute}}, {{$e->city->Name}}, {{$e->country->Name}} with (Grade/GPA) {{$e->grade}}</i>
                    </td>
                </tr>            
            </tr>
            @endforeach                
        </table>
        <br/>
        @endif        
        <!-- Experiance Section -->
        @if(count($profile->experiance)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>EXPERIANCE</strong>
                    </div>
                </th>
            </tr>
            @foreach($profile->experiance as $e)
                <tr>
                    <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                        {{date("M Y",strtotime($e->start_date))}} -@if($e->current_working)Till Date
                        @else
                            {{date("M Y",strtotime($e->end_date))}}
                        @endif
                    </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->job_title}}</strong>
                </td>

                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                            <i>{{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}</i>
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                            {{$e->details}}
                    </td>
                </tr>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif

        <!-- Project Section -->
        @if(count($profile->projects)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>PROJECTS</strong>
                    </div>
                </th>
            </tr>
            @foreach($profile->projects as $e)
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    {{date("M Y",strtotime($e->start_date))}} -
                    @if($e->current_working)
                        Till Date
                    @else
                        {{date("M Y",strtotime($e->end_date))}}
                    @endif
                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->title}}</strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <i>As {{$e->position}} - {{$e->experiances->organization}} {{$e->experiances->city->Name}}, {{$e->experiances->country->Name}}</i>
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        {{$e->details}}
                    </td>
                </tr>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif

        <!-- Languages Section -->
        @if(count($profile->languages)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>LANGUAGES</strong>
                    </div>
                </th>
            </tr>
            @foreach($profile->languages as $e)
            <tr>
                <td style="width:12%; padding:3px"></td>
                <td style="width:44%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->language->name}}</strong>
                </td>
                <td style="width:44%; padding:3px; text-align:right">
                    ({{$e->proficiencylevel->name}})
                </td>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif

        <!-- Skills Section -->
        @if(count($profile->skills)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>SKILLS</strong>
                    </div>
                </th>
            </tr>
            @foreach($profile->skills as $e)
            <tr>
                <td style="width:12%; padding:3px"></td>
                <td style="width:44%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->name}}</strong>
                </td>
                <td style="width:44%; padding:3px; text-align:right">
                    ({{$e->skilllevel->name}})
                </td>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif

        <!-- Certifications Section -->
        @if(count($profile->certifications)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>CERTIFICATIONS</strong>
                    </div>
                </th>
            </tr>
            @foreach($profile->certifications as $e)
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    {{date("M Y",strtotime($e->completion_date))}}
                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->name}}</strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <i>{{$e->institution}}, {{$e->city->Name}}, {{$e->country->Name}} with (Grade/Score) {{$e->score}}</i>
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        {!! $e->details !!}
                    </td>
                </tr>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif

        <!-- References Section -->
        @if(count($profile->references)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="2">
                    <div class="print-padding print-bottom-border" >
                        <strong>REFERENCES</strong>
                    </div>
                </th>
            </tr>
                @foreach($profile->references as $e)
            <tr>
                <td style="width:12%; padding:3px"></td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->name}}</strong><br/>
                     {{$e->job_title}} at {{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}<br/>
                        Phone: {{$e->phone}}<br/>
                        Email: {!! '<a href="mailto:'. $e->email . '">' . $e->email . '</a>' !!}<br/>
                        Reference Type: {{$e->referencetype->name}}
                </td>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif

<!-- Publications Section -->
        @if(count($profile->publications)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>PUBLICATIONS</strong>
                    </div>
                </th>
            </tr>
            @foreach($profile->publications as $e)
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    {{date("M Y",strtotime($e->publication_date))}}
                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->title}}</strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        Author(s) : {{ $e->author }}
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        {{ $e->publisher}}, {{$e->city->Name}}, {{$e->country->Name}}
                    </td>
                </tr>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif

<!-- Affiliations Section -->
        @if(count($profile->affilitions)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="2">
                    <div class="print-padding print-bottom-border" >
                        <strong>AFFILIATIONS</strong>
                    </div>
                </th>
            </tr>
            @foreach($profile->affilitions as $e)
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    {{date("M Y",strtotime($e->start_date))}} -
                    @if($e->current_working)
                        Till Date
                    @else
                        {{date("M Y",strtotime($e->end_date))}}
                    @endif
                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->position}}</strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <i>{{ $e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}>/i>
                    </td>
                </tr>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif

        <!-- Honors & Awards Section -->
        @if(count($profile->awards)>0)
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>AWARDS</strong>
                    </div>
                </th>
            </tr>
            @foreach($profile->awards as $e)
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    {{date("M Y",strtotime($e->award_date))}}
                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong>{{$e->title}}</strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <i>{{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}</i>
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        {!! $e->details !!}
                    </td>
                </tr>
            </tr>
            @endforeach
        </table>
        <br/>
        @endif
 </div>
         </div>

</div>
<div class="col-md-3 list-col ">
           <div class="panel panel-default">
                <div class="panel-body ">
                    Google Ads.
                </div>
            </div>
        </div>
 </div>

</div>

@endsection