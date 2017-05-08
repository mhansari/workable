<?php $__env->startSection('content'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/build.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('/css/font-awesome/css/font-awesome.css')); ?>">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo e(asset('/css/styles-5.css')); ?>">
<div class="">
    <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
       
        <div class="col-md-12 list-col ">
        <?php echo $__env->make('employers::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                                <a  class="btn btn-info " href="<?php echo e(asset('/'.$country.'/employers/download/resume/'.$profile->resume_id)); ?>">
                                    <span class="glyphicon glyphicon-download-alt"></span>&nbsp;&nbsp;Download
                                </a>
                            </td>
                        </tr>
                        <tr >
<td colspan="2">
        <center>
        <?php echo e(Form::open(array('class'=>'form-vertical','id'=>'demo-form', 'data-toggle'=>'validator','role'=>'form'))); ?>

          <div class="col-md-12" style="display:none" id="msg">
            <div class="form-group col-md-12">
              <label for="message" class="col-sm-1 control-label">Message</label>
              <?php echo e(Form::textArea('message', '',['data-error'=>'Required','id'=>'message', 'required'=>'required', 'class'=>'form-control'])); ?>

              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-12">
              <center>
                <button type="button" value="send" class="btn btn-primary btn-sm btn-toolbar-margin" id="interview">Send</button>
              </center>
            </div>
          </div>
          <?php echo Form::token(); ?> 
        <?php echo e(Form::close()); ?>

    </center>
</td>
                        </tr>
                    </table>
                  
                </div>
<div class="panel-body ">
<div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile img-circle" src="<?php echo e(asset($profile->pp)); ?>" alt="" />
                <h1 class="name"><?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?></h1>
                <?php echo e($profile->address); ?>. <?php echo e($profile->city->Name); ?> - <?php echo e($profile->postal_code); ?>, <?php echo e($profile->country->Name); ?>.
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto:<?php echo e($profile->email); ?>"><?php echo e($profile->email); ?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><?php echo e($profile->phone_day); ?></li>
                    <li class="phone"><i class="fa fa-phone"></i><?php echo e($profile->phone_night); ?></li>
                    <li class="phone"><i class="fa fa-phone"></i><?php echo e($profile->mobile); ?></li>
                    <li class="website"><i class="fa fa-globe"></i><a href="<?php echo e($profile->website); ?>" target="_blank"><?php echo e($profile->website); ?></a></li>
                    <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank"><?php echo e($profile->linkedin); ?></a></li>
                    <li class="facebook"><i class="fa fa-facebook"></i><a href="#" target="_blank"><?php echo e($profile->facebook); ?></a></li>
                    <li class="twitter"><i class="fa fa-twitter"></i><a href="<?php echo e($profile->twitter); ?>" target="_blank"><?php echo e($profile->twitter); ?></a></li>
                </ul>
            </div><!--//contact-container-->
            <?php if(count($profile->education)>0): ?>
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                <?php foreach($profile->education as $e): ?>
                <div class="item">
                    <h4 ><?php echo e($e->degreelevel->name); ?></h4>
                    <h5 ><?php echo e($e->degree); ?></h5>
                    <h5 ><?php echo e($e->institute); ?></h5>
                    <h5 class="meta"><i><?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?> with (Grade/GPA) <?php echo e($e->grade); ?></i></h5>
                    <div class="time"><?php echo e(date("M Y",strtotime($e->completion_date))); ?></div>
                </div><!--//item-->
                <?php endforeach; ?>
            </div><!--//education-container-->
            <?php endif; ?>
            <?php if(count($profile->languages)>0): ?>
            <div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">
                    <?php foreach($profile->languages as $e): ?>
                        <li><?php echo e($e->language->name); ?> <span class="lang-desc">(<?php echo e($e->proficiencylevel->name); ?>)</span></li>
                    <?php endforeach; ?>
                </ul>
            </div><!--//interests-->
            <?php endif; ?>
            <?php if(count($profile->references)>0): ?>
            <div class="interests-container container-block">
                <h2 class="container-block-title">References</h2>
                <ul class="list-unstyled interests-list">
                    <?php foreach($profile->references as $e): ?>
                        <li><strong><?php echo e($e->name); ?></strong><br/>
                        <span class="lang-desc"><?php echo e($e->job_title); ?> at <?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?><br/>
                        <i class="fa fa-phone"></i>&nbsp;<?php echo e($e->phone); ?><br/>
                        <i class="fa fa-envelope"></i>&nbsp;<?php echo '<a href="mailto:'. $e->email . '">' . $e->email . '</a>'; ?></span></li>
                    <?php endforeach; ?>
                </ul>
            </div><!--//interests-->
            <?php endif; ?>
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
        <?php if(strlen($profile->professional_summary)>0): ?>
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Summary</h2>
                <div class="summary">
                    <p><?php echo $profile->professional_summary; ?></p>
                </div><!--//summary-->
            </section><!--//section-->
        <?php endif; ?>
        <?php if(count($profile->experiance)>0): ?>
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>
                <?php foreach($profile->experiance as $e): ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?php echo e($e->job_title); ?></h3>
                            <div class="time"><?php echo e(date("M Y",strtotime($e->start_date))); ?> -<?php if($e->current_working): ?>Present
                        <?php else: ?>
                            <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                        <?php endif; ?></div>
                        </div><!--//upper-row-->
                        <div class="company"><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo $e->details; ?></p>
                    </div><!--//details-->
                </div><!--//item-->
                <?php endforeach; ?>
            </section><!--//section-->
        <?php endif; ?>
        <?php if(count($profile->projects)>0): ?>
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
                <?php foreach($profile->projects as $e): ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?php echo e($e->title); ?></h3>
                            <div class="time"><?php echo e(date("M Y",strtotime($e->start_date))); ?> -
                    <?php if($e->current_working): ?>
                        Present
                    <?php else: ?>
                        <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                    <?php endif; ?></div>
                        </div><!--//upper-row-->
                        <div class="company">As <?php echo e($e->position); ?> - <?php echo e($e->experiances->organization); ?> <?php echo e($e->experiances->city->Name); ?>, <?php echo e($e->experiances->country->Name); ?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo $e->details; ?></p>
                    </div><!--//details-->
                </div><!--//item-->
                <?php endforeach; ?>
            </section><!--//section-->
        <?php endif; ?>
        <?php if(count($profile->certifications)>0): ?><!-- certifications -->
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>CERTIFICATIONS</h2>
                <?php foreach($profile->certifications as $e): ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?php echo e($e->name); ?></h3>
                            <div class="time"><?php echo e(date("M Y",strtotime($e->completion_date))); ?></div>
                        </div><!--//upper-row-->
                        <div class="company"><?php echo e($e->institution); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?> with (Grade/Score) <?php echo e($e->score); ?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo $e->details; ?></p>
                    </div><!--//details-->
                </div><!--//item-->
                <?php endforeach; ?>
            </section><!--//section-->
        <?php endif; ?>
        <?php if(count($profile->publications)>0): ?><!-- publications -->
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Publications</h2>
                <?php foreach($profile->publications as $e): ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?php echo e($e->title); ?></h3>
                            <div class="time"><?php echo e(date("M Y",strtotime($e->publication_date))); ?></div>
                        </div><!--//upper-row-->
                        <div class="company">Author(s) : <?php echo e($e->author); ?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo e($e->publisher); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></p>
                    </div><!--//details-->
                </div><!--//item-->
                <?php endforeach; ?>
            </section><!--//section-->
        <?php endif; ?>
        <?php if(count($profile->affilitions)>0): ?><!-- affiliation -->
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Affiliations</h2>
                <?php foreach($profile->affilitions as $e): ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?php echo e($e->position); ?></h3>
                            <div class="time"><?php echo e(date("M Y",strtotime($e->start_date))); ?> -
                    <?php if($e->current_working): ?>
                        Present
                    <?php else: ?>
                        <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                    <?php endif; ?></div>
                        </div><!--//upper-row-->
                        <div class="company"><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></div>
                    </div><!--//meta-->

                </div><!--//item-->
                <?php endforeach; ?>
            </section><!--//section-->
        <?php endif; ?>
        <?php if(count($profile->awards)>0): ?><!-- publications -->
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Awards</h2>
                <?php foreach($profile->awards as $e): ?>
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"><?php echo e($e->title); ?></h3>
                            <div class="time"><?php echo e(date("M Y",strtotime($e->award_date))); ?></div>
                        </div><!--//upper-row-->
                        <div class="company"><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo $e->details; ?></p>
                    </div><!--//details-->
                </div><!--//item-->
                <?php endforeach; ?>
            </section><!--//section-->
        <?php endif; ?>
        <?php if(count($profile->skills)>0): ?>
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">   
                <?php foreach($profile->skills as $e): ?>     
                    <div class="item">
                        <h3 class="level-title"><?php echo e($e->name); ?></h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?php echo e($e->skill_level_id*33.3); ?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                <?php endforeach; ?>
                </div>  
            </section><!--//skills-section-->
        <?php endif; ?>
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
         selected.push(<?php echo e($application_id); ?>);
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 3)
      {
        var selected = [];
         selected.push(<?php echo e($application_id); ?>);
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 4)
      {
        var selected = [];
         selected.push(<?php echo e($application_id); ?>);
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 5)
      {
        var selected = [];
        selected.push(<?php echo e($application_id); ?>);
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 6)
      {
        var selected = [];
         selected.push(<?php echo e($application_id); ?>);
        var jsonString = JSON.stringify(selected.toString());
        ajax(jsonString,this.value,$(this).text());
      }
      else if(this.value == 7)
      {
        var selected = [];
         selected.push(<?php echo e($application_id); ?>);
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
       
            selected.push(<?php echo e($application_id); ?>);
      
       
        var jsonString = JSON.stringify(selected.toString());
        send(jsonString,<?php echo e(Auth::user()->id); ?>,$('#message').val());
$('#message').val('');
        
      }
    });
});
function send(to,from,msg)
{

  $.ajax({
        type: "POST",
        url: "<?php echo e(route('send', array('country'=>$country))); ?>",
        data: {_token : "<?php echo e(csrf_token()); ?>", to : to, from : from, msg:msg}, 
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
        url: "<?php echo e(route('changeStatus', array('country'=>$country))); ?>",
        data: {data : d,status:s,_token : "<?php echo e(csrf_token()); ?>"}, 
        cache: false,

      
    });
}
</script>
<script type="text/javascript" src="<?php echo e(asset('/js/main.js')); ?>"></script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>