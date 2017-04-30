<?php $__env->startSection('content'); ?>
<div class="">
	<?php echo $__env->make('seeker::dashboard-links',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		<div class="col-md-12 list-col ">
			<?php echo $__env->make('employers::nav',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<!--li class="active"><a class="tab-bg" href="#job">Perfect Match (60)</a></li-->
		  <li><a  data-toggle="tab" href="#posted">My Posted Jobs</a></li>
		  <li><a  data-toggle="tab" href="#app">Applicants</a></li>
		  <li><a  data-toggle="tab" href="#inter">My Scheduled Interviews</a></li>
		</ul>
		<div class="tab-content">
		  <div id="job" class="tab-pane fade in active">
		    <?php echo $__env->make('employers::dashboard-perfect',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		  </div>
		  <div id="posted" class="tab-pane fade">
		    <?php echo $__env->make('employers::dashboard-jobs',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		  </div>

	  <div id="app" class="tab-pane fade">
			<?php echo $__env->make('employers::dashboard-applicants',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		  </div>
		  <div id="inter" class="tab-pane fade">
		  	<?php echo $__env->make('employers::dashboard-interviews',array('country'=>$country), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		  </div>
		</div>			
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>