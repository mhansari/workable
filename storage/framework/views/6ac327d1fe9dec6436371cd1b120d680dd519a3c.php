<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="photo-cover" id="cover" >
        <img src="<?php echo e(asset($company->company_cover)); ?>" class="img-responsive" />
    </div>
    <div class="col-md-2 text-center">
        <div class="img-thumbnail">
            <a href="<?php echo e(asset('/company/' . $company->user_id)); ?>">
            <div class="thumb " style="width:150px;height:150px;line-height:inherit;background-color:transparent;font-size:75px;">
            <span class="helper"></span><img class="img" style="max-width:auto" src="<?php echo e(asset($company->company_logo)); ?>"></div>
            </a>
        </div> 
    </div>
    <div class="col-md-10 col-sm-9 text-center-xs">
        <h2 class="company_name"><a href="<?php echo e(asset('/company/' . $company->user_id)); ?>"><?php echo e($company->company_name); ?>, <?php echo e($company->city->Name); ?>, <?php echo e($company->country->Name); ?></a></h2>
        <br>
        <div class="row">
            <div class="col-md-8">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home" id="ab">About</a></li>
                    <li><a data-toggle="tab" href="#menu1" id="lj">Lastest Jobs</a></li>
                    <li><a data-toggle="tab" href="#menu3" id="mp">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                google ads
            </div>
            <div class="col-md-7">
                 <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 id="heading"></h4>
                </div>
                <div class="panel-body ">
                    <div class="tab-content">
                     <div id="home" class="tab-pane fade in active">
                        <?php echo e($company->about_company); ?>

                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <?php foreach($latest as $job): ?>
                    <div class="panel panel-default"><div class="panel-body ">
                         <ul class="list-group box">
                            <li class="col-md-10 list-group-item result "><a href="<?php echo e(asset('/jobs/' . $job->id)); ?>"><strong><?php echo e($job->job_title); ?></strong></a></li>
                            <li class="col-md-2 list-group-item result text-right">
                                    <?php if(floor((time() - strtotime($job->created_at)) /  (60 * 60 * 24))<=$config['SHOW_NEW_OLD_DAYS']->v): ?>
                                        <span class="label label-default">New</span>
                                    <?php endif; ?>
                                </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Job Type</div>
                                <a href="/jobs/pakistan/full-time/" title="<?php echo e($job->jobtype->name); ?> Jobs in <?php echo e($job->countries->Name); ?>"><?php echo e($job->jobtype->name); ?></a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Shift</div>
                                <a href="/jobs/pakistan/full-time/" title="<?php echo e($job->shift->name); ?> Jobs in <?php echo e($job->countries->Name); ?>"><?php echo e($job->shift->name); ?></a>
                            </li>
                            <li class="col-md-3 list-group-item result result-border">
                                <div class="text-muted">Experiance</div>
                                <a href="/jobs/pakistan/full-time/" title="<?php echo e($job->experiance->name); ?> Jobs in <?php echo e($job->countries->Name); ?>"><?php echo e($job->experiance->name); ?></a>
                            </li>
                            <li class="col-md-3 list-group-item result">
                                <div class="text-muted">Salary</div>
                                <?php echo e($job->currency_min); ?> - <?php echo e($job->salary_max); ?>

                            </li>
                            <li class="col-md-12 list-group-item result"><?php echo e(strlen($job->description)>255?substr($job->description,0,255) . "..." : $job->description); ?></li>
                            <li class="col-md-5 list-group-item result"><span class="glyphicon glyphicon-map-marker"></span>    
                            <?php /**/ $sep = '' /**/ ?>
                            <?php foreach($job->cities as $c): ?>
                            
                                <?php if($sep != ''): ?>
                                    <?php /**/ $sep = $sep . ', ' /**/ ?>
                                <?php endif; ?>
                                <?php /**/ $sep = $sep . $c->Name /**/ ?>
                            
                            <?php endforeach; ?>
                            <?php echo e($sep); ?> - <?php echo e($job->countries->Name); ?>

                            </li>
                            <li class="col-md-3 list-group-item result text-left "><span class="glyphicon glyphicon-time"></span> <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($job->created_at))->diffForHumans()); ?></li>

                            <li class="col-md-4 list-group-item result text-right"><a href="<?php echo e(url('seekers/apply/' . $job->id )); ?>" class="btn btn-primary btn-empty btn-xs">Apply</a> <button type="button" class="btn btn-primary btn-empty btn-xs save" value="<?php echo e($job->id); ?>">Save</button></li>
                            
                        </ul>
                    </div></div>
                    <?php endforeach; ?>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <div id="map" name="map"></div>
                    </div>
                    </div>
                </div>
            </div>
                
                   
                
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Company Overview</h4>
                </div>
                <div class="panel-body ">
                    <div class="mb5"><strong>Industry: </strong> <br/><?php echo e($company->categories->name); ?></div>
                    <div class="mb5"><strong>Business Entity: </strong> <br/><?php echo e($company->inctype->name); ?></div>
                    <div class="mb5"><strong>Established In: </strong> <br/><?php echo e(date('m-d-Y',strtotime($company->established_in))); ?></div>
                    <div class="mb5"><strong>No. of Employees: </strong> <br/><?php echo e($company->total_employees); ?></div>
                    <div class="mb5">
                        <strong>Location: </strong> <br/><a class="inverse" href="/companies/<?php echo e($company->country->Name); ?>/<?php echo e($company->city->seo); ?>/"><?php echo e($company->city->Name); ?></a>, <?php echo e($company->state->Name); ?>, <a class="inverse" href="/companies/<?php echo e($company->country->seo); ?>/" title="Companies in <?php echo e($company->country->Name); ?>"><?php echo e($company->country->Name); ?></a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyDNkInU-qm_PaRpIviucjqFvj_hJGsgIzg"></script>
   <script> 
    $(document).ready(function() {
       $('#heading').text($('#ab').text());
init_map();
        $('#mp').click(function(){
            init_map();
            $('#heading').text($('#mp').text());
        });

        $('#lj').click(function(){
            $('#heading').text($('#lj').text() + " by <?php echo e($company->company_name); ?>" );
        });

        $('#pj').click(function(){
            $('#heading').text($('#pj').text());
        });
        $('#ab').click(function(){
            $('#heading').text($('#ab').text());
        });

    });var map;
    var marker ;
      function init_map() {
        var myLocation = new google.maps.LatLng(<?php echo e($company->lat); ?>,<?php echo e($company->lan); ?>);
        
        var mapOptions = {
           zoom: 14,
            center:myLocation
        };
        
       marker = new google.maps.Marker({
            position: myLocation,
            title:"<?php echo e($company->company_name); ?>"});
             
         map= new google.maps.Map(document.getElementById("map"),
            mapOptions);
        
        marker.setMap(map); 

      }
      
      google.maps.event.addDomListener(window, 'load', init_map);
      
    </script>
    <script>
$('.save').click(function() {
    $.ajax({
        url: "<?php echo e(url('seekers/save-job')); ?>",
            data: {
                "job_id" :$(this).val(),
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            error: function(xhr, status, error) {
                if(xhr.status == 401)
                {
                    window.location="<?php echo e(url('account/login')); ?>";
                }
                else
                {
                    notify('danger','Error while saving Job, try again !!!');
                }
            },
            success: function(data) {
                notify('success','Job Saved Successfully');
            },

        type: 'POST'
    });

});

function notify(t,m){
    $.notify({
            // options
            message: m 
        },{
            // settings
            type: t,
            offset: 250,
            allow_dismiss:false,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },

            placement: {
                from: "top",
                align: "center"
            },
        });
}
</script>

<script src="<?php echo e(asset('js/bootstrap-notify.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>