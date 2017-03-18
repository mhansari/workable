<div class="col-md-12 text-center">
	
	<ul class="nav nav-pills">dd
		<li class="<?php echo e(strpos(\Route::getCurrentRoute()->getPath(),'seekers')?'active':''); ?>"><a href="<?php echo e(asset($country . '/seekers/dashboard')); ?>">Job Seekers</a></li>
		<li  class="<?php echo e(strpos(\Route::getCurrentRoute()->getPath(),'employers')?'active':''); ?>"><a href="<?php echo e(asset($country . '/employers/dashboard')); ?>">Employers</a></li>
	</ul>
</div>	