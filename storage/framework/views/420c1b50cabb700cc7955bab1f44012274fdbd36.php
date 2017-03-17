  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Employer's Dashboard</a>
    </div>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand" href="#">Employer's Dashboard</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Jobs
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo e(asset($country . '/employers/my-jobs')); ?>">My Jobs</a></li>
              <li><a href="<?php echo e(asset($country . '/employers/jobs/post-job')); ?>">Post Job</a></li>
            </ul>
          
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Interviews
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo e(asset($country .'/employers/vanues')); ?>">Vanues</a></li>
              <li><a href="#">Add new Vanue</a></li>
            </ul></li> 
            <li><a href="<?php echo e(asset($country .'/employers/messages')); ?>">Inbox <span class="badge"><?php echo e(\App\Conversation::newMsgCount(26)); ?></span></a></li> 
          </ul>
        </div>
      </div>
      </nav>
  </div>
