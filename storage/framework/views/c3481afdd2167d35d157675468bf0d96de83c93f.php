<nav class="">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Job Seeker's Dashboard</a>
    </div>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Seeker's Dashboard</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Resume Manager
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo e(asset($country . '/seekers/manage/upload-resume')); ?>">Create Resume</a></li>
          <li><a href="<?php echo e(asset($country . '/seekers/my-resumes')); ?>">My Resumes</a></li>
        
          
        </ul>
      </li>
        <li><a href="<?php echo e(asset($country . '/seekers/my-applications')); ?>">My Applications</a></li> 
        <li><a href="<?php echo e(asset($country . '/seekers/my-saved-jobs')); ?>">My Saved Jobs</a></li> 
      </ul>

    </div>
  </div>
</nav>