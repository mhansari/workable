@extends('layouts.app')

@section('content')
<div class="">
    @include('seeker::dashboard-links',array('country'=>$country))
    <div class="row">
        <div class="col-md-12 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading"><h4>Apply for the post of {{$obj->job_title}}</h4></div>
                <div class="panel-body ">
                    {{ Form::open(array('class'=>'form-vertical','url'=> route('apply',array('country'=>$country, 'jobid'=>$jobid)),'id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))}}
                    <div class="form-group">
                        <div class="col-md-12"> 
                            <div class="row">
                                <div class="col-md-1">
                                    Q:
                                </div>              
                                <div class="col-md-9">
                                    <strong>Do you have following or equivalent qualification?</strong>
                                </div>
                                <div class="col-md-2" >
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="qualification" type="checkbox" required>
                                        <label for="qualification"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"> 
                            <div class="row ans-margin-top">
                                <div class="col-md-11 col-md-offset-1 ans-label-margin">
                                    {{$obj->qualifications}}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"> 
                            <div class="row ans-padding-top">
                                <div class="col-md-1">
                                    Q:
                                </div>              
                                <div class="col-md-9">
                                    <strong>Do you qualify for this Career Level?</strong>
                                </div>
                                <div class="col-md-2" >
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="career_level" type="checkbox" required>
                                        <label for="career_level"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row ans-margin-top">
                                <div class="col-md-11 col-md-offset-1 ans-label-margin">
                                    {{$obj->careerlevel->name}}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"> 
                            <div class="row ans-padding-top">
                                <div class="col-md-1">
                                    Q:
                                </div>              
                                <div class="col-md-9">
                                    <strong>Do you have following experience?</strong>
                                </div>
                                <div class="col-md-2" >
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="experience" type="checkbox" required>
                                        <label for="experience"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row ans-margin-top">
                                <div class="col-md-11 col-md-offset-1 ans-label-margin">
                                    {{$obj->experiancelevel->name}}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="row ans-padding-top">
                                <div class="col-md-1">
                                    Q:
                                </div>              
                                <div class="col-md-9">
                                    <strong>Do you have following skill set?</strong>
                                </div>
                                <div class="col-md-2" >
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="skill" type="checkbox" required> 
                                        <label for="skiil"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row ans-margin-top">
                                <div class="col-md-11 col-md-offset-1 ans-label-margin">
                                    {{$obj->required_skills}}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"> 
                            <div class="row ans-padding-top">
                                <div class="col-md-1">
                                    Q:
                                </div>              
                                <div class="col-md-9">
                                    <strong>Are you comfortable to work in the following shift?</strong>
                                </div>
                                <div class="col-md-2" >
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="timings" type="checkbox" required>
                                        <label for="timings"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row ans-margin-top">
                                <div class="col-md-11 col-md-offset-1 ans-label-margin">
                                    {{$obj->shift_timings->name}}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($obj->required_travelling)
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="row ans-padding-top">
                                <div class="col-md-1">
                                    Q:
                                </div>              
                                <div class="col-md-9">
                                    <strong>Are you comfortable to travel?</strong>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-2" >
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="travel" type="checkbox" required>
                                        <label for="travel"></label>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    @endif
                    <div class="form-group ">
                        <div class="col-md-12">
                            <div class="row ans-padding-top"> 
                                <div class="col-md-1">
                                    Q:
                                </div>              
                                <div class="col-md-9">
                                    <strong>Are you located or want to re-locate on the following location(s)?</strong>
                                </div>
                                <div class="col-md-2" >
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="travel" type="checkbox" required>
                                        <label for="travel"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="row ans-margin-top">
                                <div class="col-md-11 col-md-offset-1 ans-label-margin">
                                    {{--*/ $sep = '' /*--}}
                                    @foreach($obj->cities as $c)
                                    
                                        @if($sep != '')
                                            {{--*/ $sep = $sep . '<span>,</span> ' /*--}}
                                            
                                        @endif
                                        {{--*/ $sep =  $sep .  $c->Name  /*--}}
                                      
                                    
                                    @endforeach
                                    {!! $sep !!}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"> 
                            <div class="row ans-padding-top">
                                <div class="col-md-11 col-md-offset-1">
                                    <strong>Select your resume</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-11 col-md-offset-1"> 
                           {!! Form::select('resume', $resumes, '', ['data-error'=>'Required', 'id'=>'resume','class'=>'input-width form-control','placeholder'=>'Select Resume','required'=>'required']) !!}
                           <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"> 
                            <div class="row ans-padding-top">
                                <div class="col-md-11 col-md-offset-1">
                                    <strong>Additional Comments (Optional)</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-11 col-md-offset-1"> 
                           <textarea name="comments" id="comments" style="width:100%" cols="80" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12"> 
                            <div class="row ans-padding-top text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Apply</button>
                            </div>
                        </div>
                       
                    </div>
                    <input type="hidden" name="job_id" id="job_id" value="{{$jobid}}"/>
                    {!! Form::token() !!}
                    {{Form::close()}}
                </div>
            </div>
        </div>
            
    </div>
</div>

@endsection