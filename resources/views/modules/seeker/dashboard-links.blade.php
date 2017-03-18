<div class="col-md-12 text-center">
	
	<ul class="nav nav-pills">dd
		<li class="{{ strpos(\Route::getCurrentRoute()->getPath(),'seekers')?'active':''}}"><a href="{{ asset($country . '/seekers/dashboard') }}">Job Seekers</a></li>
		<li  class="{{ strpos(\Route::getCurrentRoute()->getPath(),'employers')?'active':''}}"><a href="{{ asset($country . '/employers/dashboard') }}">Employers</a></li>
	</ul>
</div>	