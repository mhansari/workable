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
              <li><a href="<?php echo e(asset('employers/my-jobs')); ?>">My Jobs</a></li>
              <li><a href="#">Post Job</a></li>
            </ul>
          
            <li><a href="#">Page 2</a></li> 
            <li><a href="#">Page 3</a></li> 
          </ul>
        </div>
      </div>
      </nav>
  </div>
