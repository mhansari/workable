<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Resume</title>
<style>
body{
font-family: Trebuchet MS;
font-size: 14px;

}
.MsoTitle{
  font-family: Trebuchet MS;
font-size: 27px;
color: #0096ce;
}
h1{
    font-family: Trebuchet MS;
font-size: 20px;
color: #6abbe0;
}
.content{
      margin-top: -20px;
}

.content-other{
      margin-top: 25px;
}
</style>
    <style>

      body { background-image: url({{ URL::asset('images/bg.png') }}); 
      
      background-repeat: repeat-x;
        background-position: bottom left;
  }

  #footer { color:#ccc; text-align:right; position: fixed; left: 0px; bottom: -160px; right: 0px; height: 160px;}
    #footer .page:after { content: counter(page); }
    </style>
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
     <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

</head>

<body>
<p class=MsoTitle>{{$profile->first_name}} {{$profile->last_name}}</p>
<p class="content">{{$profile->phone_day}}, {{$profile->phone_night}}, {{$profile->mobile}}&nbsp;&nbsp;|&nbsp;&nbsp;{{$profile->email}} &nbsp;&nbsp;|&nbsp;&nbsp;{{$profile->address}}. {{$profile->city->Name}} - {{$profile->postal_code}}, {{$profile->country->Name}}</p>

<!-- summary -->
@if(strlen($profile->professional_summary)>0)
<h1>Summary</h1>
<p class=content-other>{!! $profile->professional_summary !!}</p>
@endif
<!-- end summary -->

@if(count($profile->experiance)>0)

<h1>Experience</h1>
<table  width="100%">
 @foreach($profile->experiance as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->job_title}}</span></strong>,
  {{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}</p>

  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate>{{date("M Y",strtotime($e->start_date))}} -@if($e->current_working)Present
                        @else
                            {{date("M Y",strtotime($e->end_date))}}
                        @endif</p>
  </td>
 </tr>
 @if(strlen($e->details)>0)
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{!! $e->details!!}<br/><br/></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p>&nbsp;</o:p></p>
  </td>
 </tr>
 @endif
 @endforeach
 </table>
@endif
@if(count($profile->education)>0)
<h1>Education</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 @foreach($profile->education as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->degreelevel->name}} - {{$e->degree}}</span></strong></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate>{{date("M Y",strtotime($e->completion_date))}}</p>
  </td>
 </tr>
  <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{{$e->institute}}, {{$e->city->Name}}, {{$e->country->Name}} with (Grade/GPA) {{$e->grade}}<br/><br/></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate></p>
  </td>
 </tr>
 @endforeach
</table>
@endif
@if(count($profile->languages)>0)
<h1>Languages</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 @foreach($profile->languages as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->language->name}}</span></strong>
 <o:p></o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate>{{$e->proficiencylevel->name}}<o:p></o:p></p>
  </td>
 </tr>

 @endforeach
</table>
@endif
@if(count($profile->skills)>0)
<h1>Skills</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 @foreach($profile->skills as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->name}}</span></strong>
  <o:p></o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate>{{$e->skilllevel->name}}<o:p></o:p></p>
  </td>
 </tr>
@endforeach
</table>
@endif
 @if(count($profile->certifications)>0)
<h1>Certifications</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 @foreach($profile->certifications as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->name}}<o:p></o:p></span></strong></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate>{{date("M Y",strtotime($e->completion_date))}}<o:p></o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{{$e->institution}}, {{$e->city->Name}}, {{$e->country->Name}} with (Grade/Score) {{$e->score}}<o:p></o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p></o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{!! $e->details !!}<br/><br/></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p></o:p></p>
  </td>
 </tr>
 @endforeach
</table>
@endif
@if(count($profile->publications)>0)
<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<h1>Publications</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 @foreach($profile->publications as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->title}}<o:p></o:p></span></strong></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate>{{date("M Y",strtotime($e->publication_date))}}<o:p></o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>Author(s) : {{ $e->author }}<o:p></o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p></o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal style='tab-stops:50.25pt'>{{ $e->publisher}}, {{$e->city->Name}}, {{$e->country->Name}}<o:p>&nbsp;</o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p>&nbsp;</o:p></p>
  </td>
 </tr>
 @endforeach
</table>
@endif

@if(count($profile->affilitions)>0)
<h1>Affiliations</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 @foreach($profile->affilitions as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->position}}<o:p></o:p></span></strong></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate>{{date("M Y",strtotime($e->start_date))}} -
                    @if($e->current_working)
                        Present
                    @else
                        {{date("M Y",strtotime($e->end_date))}}
                    @endif</p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{{ $e->organization}}</p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{{$e->city->Name}}, {{$e->country->Name}}<o:p></o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p>&nbsp;</o:p></p>
  </td>
 </tr>
 @endforeach
</table>
@endif
@if(count($profile->awards)>0)
<h1>Awards</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 @foreach($profile->awards as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->title}}<o:p></o:p></span></strong></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate>{{date("M Y",strtotime($e->award_date))}}<o:p></o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}<o:p></o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p></o:p></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{!!$e->details!!}<o:p></o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p></o:p></p>
  </td>
 </tr>
 @endforeach
</table>
@endif
@if(count($profile->references)>0)
<h1>References</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 @foreach($profile->references as $e)
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>{{$e->name}}<o:p></o:p></span></strong></p>
  </td>

 </tr>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal>{{$e->job_title}} at {{$e->organization}}, {{$e->city->Name}}, {{$e->country->Name}}<br/>
                        Phone: {{$e->phone}}<br/>
                        Email: {!! '<a href="mailto:'. $e->email . '">' . $e->email . '</a>' !!}<br/>
                        Reference Type: {{$e->referencetype->name}}<br/><br/><o:p></o:p></p>
  </td>
  <td width=154 valign=top style='width:1.6in;padding:0in 0in 0in 0in'>
  <p class=MsoDate><o:p></o:p></p>
  </td>
 </tr>
 @endforeach
</table>
@else
<h1>References</h1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 title="Resume detail" width=672 style='width:7.0in;border-collapse:collapse;
 mso-padding-alt:0in 0in 0in 0in'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=518 valign=top style='width:5.4in;padding:0in 0in 0in 0in'>
  <p class=MsoNormal><strong><span style='font-family:"Trebuchet MS",sans-serif;
  mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
  "Times New Roman";mso-bidi-theme-font:minor-bidi'>Will be furnished upon request<o:p></o:p></span></strong></p>
  </td>

 </tr>

</table>
@endif
<p class=MsoNormal align=right style='text-align:right;tab-stops:center 382.1pt left 483.75pt'><span
style='font-size:6.0pt;mso-bidi-font-size:9.5pt;line-height:150%'><span
style='mso-tab-count:1'>                                                                                                                                                                                                                                    </span>Generated
with CareerJin.com<span style='mso-tab-count:1'>                                         </span><o:p></o:p></span></p>

</div>

</body>

</html>
