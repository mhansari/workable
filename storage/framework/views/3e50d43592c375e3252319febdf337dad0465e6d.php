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

  .header,
.footer {
    width: 100%;
    text-align: center;
    position: fixed;
}
.header {
    top: 0px;
}
.footer {
    bottom: 0px;
}
.pagenum:before {
    content: counter(page);
}
    </style>
    <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
     <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

</head>
<body id="app-layout">
<div class="footer">
    Generated with Careerjin.com <br/>
    Page <span class="pagenum"></span>
</div>
    <div class="container">
        <table width="100%">
            <tr style="width:100%; padding:3px;text-align:left" class="print-padding print-bottom-border">
                <td>
                    <h2><?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?></h2>
                    <?php echo e($profile->phone_day); ?>, <?php echo e($profile->phone_night); ?>, <?php echo e($profile->mobile); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo e($profile->email); ?> <br/><?php echo e($profile->address); ?>. <?php echo e($profile->city->Name); ?> - <?php echo e($profile->postal_code); ?>, <?php echo e($profile->country->Name); ?>

                </td>
                 <?php if($profile->pp != ''): ?>
                <td style=" padding:3px;text-align:right" >
                    <img src="<?php echo e(URL::asset($profile->pp)); ?>" class="img-circle">
                   
                </td>
           
                <?php endif; ?>
            </tr>
        </table>
 
        <br/>
        <?php if(strlen($profile->professional_summary)>0): ?>
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>EDUCATION</strong>
                    </div>
                </th>
            </tr>            
            <?php foreach($profile->education as $e): ?>
            <tr>               
                <td style="width:75% padding:3px; padding-left:15px; text-align:left">
                    <strong><?php echo e($e->degreelevel->name); ?> - <?php echo e($e->degree); ?></strong>
                </td>
                 <td style="width:25%; text-align: right; padding:3px;  padding-right" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->completion_date))); ?>

                </td>
             </tr>
            <tr>
               
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                        <i><?php echo e($e->institute); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?> with (Grade/GPA) <?php echo e($e->grade); ?></i>
                </td> <td style="width:25%; text-align: right; padding:3px"></td>
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>EXPERIANCE</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->experiance as $e): ?>
            <tr>
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->job_title); ?></strong>
                </td>
                <td style="width:25%; text-align: right; padding:3px" class="print-padding-lr text-right print-date-size">
                        <?php echo e(date("M Y",strtotime($e->start_date))); ?> - <?php if($e->current_working): ?>Present
                        <?php else: ?>
                            <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                        <?php endif; ?>
                </td>
            </tr>
            <tr>
              
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                        <i><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></i>
                </td>  <td style="width:25%; text-align: right; padding:3px"></td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                        <?php echo $e->details; ?>

                </td><td style="width:25%; text-align: right; padding:3px"></td>
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>PROJECTS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->projects as $e): ?>
            <tr>                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->title); ?></strong>
                </td>
                <td style="width:25%; text-align: right; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->start_date))); ?> - 
                    <?php if($e->current_working): ?>
                        Present
                    <?php else: ?>
                        <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <i>As <?php echo e($e->position); ?> - <?php echo e($e->experiances->organization); ?> <?php echo e($e->experiances->city->Name); ?>, <?php echo e($e->experiances->country->Name); ?></i>
                </td><td style="width:25%; text-align: right; padding:3px"></td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <?php echo $e->details; ?>

                </td><td style="width:25%; text-align: right; padding:3px"></td>
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>LANGUAGES</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->languages as $e): ?>
            <tr>
                
                <td style="width:56%; padding:3px;  padding-left:15px" class="text-left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>SKILLS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->skills as $e): ?>
            <tr>
                <td style="width:56%; padding:3px;  padding-left:15px" class="text-left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>CERTIFICATIONS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->certifications as $e): ?>
            <tr>
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->name); ?></strong>
                </td><td style="width:25%; text-align: right; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->completion_date))); ?>

                </td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <i><?php echo e($e->institution); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?> with (Grade/Score) <?php echo e($e->score); ?></i>
                </td><td style="width:25%; text-align: right; padding:3px"></td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <?php echo $e->details; ?>

                </td><td style="width:25%; text-align: right; padding:3px"></td>
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>REFERENCES</strong>
                    </div>
                </th>
            </tr>
                <?php foreach($profile->references as $e): ?>
            <tr>
                <td style="width:56%; padding:3px;  padding-left:15px" class="text-left">
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>PUBLICATIONS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->publications as $e): ?>
            <tr>
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->title); ?></strong>
                </td><td style="width:25%; text-align: right; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->publication_date))); ?>

                </td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    Author(s) : <?php echo e($e->author); ?>

                </td><td style="width:25%; text-align: right; padding:3px"></td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <?php echo e($e->publisher); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?>

                </td><td style="width:25%; text-align: right; padding:3px"></td>
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>AFFILIATIONS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->affilitions as $e): ?>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->position); ?></strong>
                </td><td style="width:25%; text-align: right; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->start_date))); ?> -
                    <?php if($e->current_working): ?>
                        Present
                    <?php else: ?>
                        <?php echo e(date("M Y",strtotime($e->end_date))); ?>

                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <i><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></i>
                </td><td style="width:25%; text-align: right; padding:3px"></td>
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
                    <div class="print-padding print-bottom-border" style="text-align:left">
                        <strong>AWARDS</strong>
                    </div>
                </th>
            </tr>
            <?php foreach($profile->awards as $e): ?>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <strong><?php echo e($e->title); ?></strong>
                </td><td style="width:25%; text-align: right; padding:3px" class="print-padding-lr text-right print-date-size">
                    <?php echo e(date("M Y",strtotime($e->award_date))); ?>

                </td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <i><?php echo e($e->organization); ?>, <?php echo e($e->city->Name); ?>, <?php echo e($e->country->Name); ?></i>
                </td><td style="width:25%; text-align: right; padding:3px"></td>
            </tr>
            <tr>
                
                <td style="width:75% padding:3px;  padding-left:15px" class="text-left">
                    <?php echo $e->details; ?>

                </td><td style="width:25%; text-align: right; padding:3px"></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        <?php endif; ?>
    </div>
   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
