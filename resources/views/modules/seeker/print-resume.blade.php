<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Resume</title>
<style>
body{
font-family: Verdana, Geneva, sans-serif;
font-size: 12.5px;
}
</style>
    <style>

      body { background-image: url({{ URL::asset('images/bg.png') }}); 
      
      background-repeat: repeat-x;
        background-position: bottom left;
  }

  #footer { color:#ccc; text-align:center; position: fixed; left: 0px; bottom: -160px; right: 0px; height: 160px;}
    #footer .page:after { content: counter(page); }
    </style>
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
     <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

</head>
<body id="app-layout">
    <div id="footer">
        Generated with CareerJin.com © Copyright {{date("Y")}}
    <p class="page">Page </p>
  </div>
    <div class="container">
        <table width="100%">
         @if($profile->pp != '')
             <tr style="width:100%; padding:3px;text-align:center" class="print-padding">
                <td>
                    <img src="{{ URL::asset($profile->pp) }}" class="img-circle">
                   
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
            <tr style="width:100%; padding:3px; text-align:left" >
                <th >
                    <div class="print-padding print-bottom-border" style="text-align:left" >
                        <strong>SUMMARY</strong>
                    </div>
                </th>
            </tr>
            <tr style="width:100%; padding:3px" >
                <td style="padding:3px; text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>EDUCATION</strong>
                    </div>
                </th>
            </tr>            
            @foreach($profile->education as $e)
            <tr>
                <td style="width:12%; padding:3px; padding-right" class="print-padding-lr text-right print-date-size">
                    {{date("M Y",strtotime($e->completion_date))}}
                </td>
                <td style="width:88%; padding:3px; padding-left:15px; text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
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
   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
