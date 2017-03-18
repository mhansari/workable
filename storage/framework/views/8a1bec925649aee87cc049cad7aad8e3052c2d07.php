<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row">
        <div class="col-md-3 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Manage Resume</h4>
                </div>
                <div class="panel-body ">
                    <?php echo $__env->make('seeker::left_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-9 list-col ">
           <div class="panel panel-default">
                <div class="panel-heading">
                    <table style="width:100%">
                        <tr>
                            <td style="width:50%">
                                <h4>Preview Resume</h4>
                            </td>
                            <td style="width:50%" class="text-right">
                                <a  class="btn btn-info " href="download/<?php echo e($profile->resume_id); ?>">
                                    <span class="glyphicon glyphicon-download-alt"></span>&nbsp;&nbsp;Download
                                </a>
                            </td>
                        </tr>
                    </table>
                  
                </div>
<div class="panel-body ">
        <table width="100%">
               <tr style="width:100%; padding:3px;text-align:center" class="print-padding">
                <td>
                    <img src="<?php echo e(URL::asset($profile->pp)); ?>">
                   
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>