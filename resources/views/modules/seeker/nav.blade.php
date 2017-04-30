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
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">Home</a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Resume Manager
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ asset($country . '/seekers/manage/upload-resume') }}">Create Resume</a></li>
                <li><a href="{{ asset($country . '/seekers/my-resumes') }}">My Resumes</a></li>
               </ul>
            </li>
            <li><a href="{{ asset($country . '/seekers/my-applications') }}">My Applications</a></li> 
            <li><a href="{{ asset($country . '/seekers/my-saved-jobs') }}">My Saved Jobs</a></li> 
            <li><a href="{{ asset($country . '/seekers/profile-picture') }}">Update Profile Picture</a></li> 
          </ul>
        </div>
      </div>
    </nav>
  </div>
</nav>