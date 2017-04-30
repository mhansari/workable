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
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Jobs
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ asset($country . '/employers/my-jobs') }}">My Jobs</a></li>
              <li><a href="{{ asset($country . '/employers/jobs/post-job') }}">Post Job</a></li>
            </ul>
          
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Interviews
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ asset($country .'/employers/interviews') }}">Scheduled Interviews</a></li>
              <li><a href="{{ asset($country .'/employers/vanues') }}">Vanues</a></li>
              <li><a href="{{ asset($country .'/employers/update-vanue') }}">Add new Vanue</a></li>
            </ul>
            </li> 
            <!--li><a href="{{ asset($country .'/employers/messages') }}">Inbox <span class="badge">{{\App\Conversation::newMsgCount(26)}}</span></a></li--> 
            <li><a href="{{route('update.company',array('country'=>$country))}}">Update Company</a></li> 
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
              <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li>Account</li>
                    <ul class="nav nav-pills nav-stacked nav-touched">
                      <li><a href="change-password">Change Password</a></li>                
                      <li><a href="profile">Edit Profile</a></li>
                      <li><a href="job-alerts">Job Alerts</a></li>
                      <li><a href="privacy">Privacy</a></li>
                    </ul>
                    <li>Organizaton</li>
                      <ul class="nav nav-pills nav-stacked nav-touched">
                      <li><a href="departments">Departments</a></li>
                      <li><a href="update_company">Update Company</a></li>
                      <li><a href="{{ asset($country .'/employers/vanues') }}">Interview Venues</a></li>
                    </ul> 
                </ul>
            </li> 
          </ul>
        </div>
      </div>
      </nav>
  </div>
