<?php $__env->startSection('content'); ?>
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
            <button type="button" value="msg" class="btn btn-primary btn-sm btn-toolbar-margin">Message</button>
            <!--button type="button" value="interview" class="btn btn-primary btn-sm btn-toolbar-margin" id="interview">Interview</button-->
          </div> <br/>
        <br/> 

                            </td>
                            <td style="width:20%" class="text-right">
                                <a  class="btn btn-info " href="download/<?php echo e($profile->resume_id); ?>">
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
        <table width="100%">
            <tr style="width:100%; padding:3px;text-align:center" class="print-padding">
                <td>
                    <img src="../../../../../<?php echo e($profile->pp); ?>">
                   
                </td>
            </tr>
            <tr style="width:100%; padding:3px;text-align:center" class="print-padding print-bottom-border">
                <td>
                    <h2><?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?></h2>
                   
                    <?php echo e($profile->address); ?>. <?php echo e($profile->city->Name); ?> - <?php echo e($profile->postal_code); ?>, <?php echo e($profile->country->Name); ?>.<br/>
                    Phone : <?php echo e($profile->phone_day); ?>, <?php echo e($profile->phone_night); ?> Mobile : <?php echo e($profile->mobile); ?> <br/>
                    Email : <?php echo e($profile->email); ?>

                </td>
            </tr>
        </table>
        <br/>
        <?php if(strlen($profile->professional_summary)>0): ?>
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
                        <?php echo $profile->professional_summary; ?>

                    </div>
                </td>
            </tr>
        </table>
        <br/>
        <?php endif; ?>
        <!-- Education Section -->
        <?php if(count($profile->education)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>EDUCATION</strong>
                    </div>
                </th>
            </tr>            
            <?php foreach($profile->education as $e): ?>
            <tr>
                <td style="width:12%; padding:3px; padding-right" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->completion_date))); ?>

                </td>
                <td style="width:88%; padding:3px; padding-left:15px" class="text-left">
                    <strong><?php echo e($e->degreelevel->name); ?> - <?php echo e($e->degree); ?></strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                            <i><?php echo e($e->institute); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?> with (Grade/GPA) <?php echo e($e->grade); ?></i>
                    </td>
                </tr>            
            </tr>
            <?php endforeach; ?>                
        </table>
        <br/>
        <?php endif; ?>        
        <!-- Experiance Section -->
        <?php if(count($profile->experiance)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>EXPERIANCE</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->experiance as $e): ?>
                <tr>
                    <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                        <?php echo e(date("M Y",strtotime($e->start_date))); ?> -<?php if($e->current_working): ?>Till Date
                        <?php else: ?>
                            <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                        <?php endif; ?>
                    </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->job_title); ?></strong>
                </td>

                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                            <i><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></i>
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                            <?php echo e($e->details); ?>

                    </td>
                </tr>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>

        <!-- Project Section -->
        <?php if(count($profile->projects)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>PROJECTS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->projects as $e): ?>
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->start_date))); ?> -
                    <?php if($e->current_working): ?>
                        Till Date
                    <?php else: ?>
                        <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                    <?php endif; ?>
                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->title); ?></strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <i>As <?php echo e($e->position); ?> - <?php echo e($e->experiances->organization); ?> <?php echo e($e->experiances->city->Name); ?>, <?php echo e($e->experiances->country->Name); ?></i>
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <?php echo e($e->details); ?>

                    </td>
                </tr>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>

        <!-- Languages Section -->
        <?php if(count($profile->languages)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>LANGUAGES</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->languages as $e): ?>
            <tr>
                <td style="width:12%; padding:3px"></td>
                <td style="width:44%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->language->name); ?></strong>
                </td>
                <td style="width:44%; padding:3px; text-align:right">
                    (<?php echo e($e->proficiencylevel->name); ?>)
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>

        <!-- Skills Section -->
        <?php if(count($profile->skills)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>SKILLS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->skills as $e): ?>
            <tr>
                <td style="width:12%; padding:3px"></td>
                <td style="width:44%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->name); ?></strong>
                </td>
                <td style="width:44%; padding:3px; text-align:right">
                    (<?php echo e($e->skilllevel->name); ?>)
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>

        <!-- Certifications Section -->
        <?php if(count($profile->certifications)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>CERTIFICATIONS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->certifications as $e): ?>
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->completion_date))); ?>

                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->name); ?></strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <i><?php echo e($e->institution); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?> with (Grade/Score) <?php echo e($e->score); ?></i>
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <?php echo $e->details; ?>

                    </td>
                </tr>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>

        <!-- References Section -->
        <?php if(count($profile->references)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="2">
                    <div class="print-padding print-bottom-border" >
                        <strong>REFERENCES</strong>
                    </div>
                </th>
            </tr>
                <?php foreach($profile->references as $e): ?>
            <tr>
                <td style="width:12%; padding:3px"></td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->name); ?></strong><br/>
                     <?php echo e($e->job_title); ?> at <?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?><br/>
                        Phone: <?php echo e($e->phone); ?><br/>
                        Email: <?php echo '<a href="mailto:'. $e->email . '">' . $e->email . '</a>'; ?><br/>
                        Reference Type: <?php echo e($e->referencetype->name); ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>

<!-- Publications Section -->
        <?php if(count($profile->publications)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>PUBLICATIONS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->publications as $e): ?>
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->publication_date))); ?>

                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->title); ?></strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        Author(s) : <?php echo e($e->author); ?>

                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <?php echo e($e->publisher); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?>

                    </td>
                </tr>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>

<!-- Affiliations Section -->
        <?php if(count($profile->affilitions)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="2">
                    <div class="print-padding print-bottom-border" >
                        <strong>AFFILIATIONS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->affilitions as $e): ?>
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->start_date))); ?> -
                    <?php if($e->current_working): ?>
                        Till Date
                    <?php else: ?>
                        <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                    <?php endif; ?>
                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->position); ?></strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <i><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?>>/i>
                    </td>
                </tr>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>

        <!-- Honors & Awards Section -->
        <?php if(count($profile->awards)>0): ?>
        <table width="100%">
            <tr style="width:100%; padding:3px" >
                <th colspan="3">
                    <div class="print-padding print-bottom-border" >
                        <strong>AWARDS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->awards as $e): ?>
            <tr>
                <td style="width:12%; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->award_date))); ?>

                </td>
                <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->title); ?></strong>
                </td>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <i><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></i>
                    </td>
                </tr>
                <tr>
                    <td style="width:12%; padding:3px"></td>
                    <td style="width:88%; padding:3px;  padding-left:15px" class="text-left">
                        <?php echo $e->details; ?>

                    </td>
                </tr>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>
 </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>