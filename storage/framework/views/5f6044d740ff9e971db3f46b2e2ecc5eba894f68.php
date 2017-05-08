<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet">
        <?php /* <link href="<?php echo e(URL::asset('css/app.css')); ?>" rel="stylesheet"> */ ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script
          src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
          integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
          crossorigin="anonymous"></script>
        <link href="<?php echo e(asset('css/fileinput.min.css')); ?>" media="all" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/style-responsive.css')); ?>" media="all" rel="stylesheet" type="text/css" />
        <!-- the main fileinput plugin file -->
        <script src="<?php echo e(asset('js/fileinput.min.js')); ?>"></script>
        <!-- include summernote css/js-->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <script src="<?php echo e(asset('js/jquery.maskedinput.min.js')); ?>"></script>
        <link href="<?php echo e(asset('css/bootstrap-treeview.min.css')); ?>" rel="stylesheet">
        <script src="<?php echo e(asset('js/bootstrap-treeview.min.js')); ?>"></script>
        <script src="<?php echo e(asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
        <link href="<?php echo e(URL::asset('css/tabs.css')); ?>" rel="stylesheet">
        <style>
            body {
            font-family: 'Lato';
            }

            .fa-btn {
            margin-right: 6px;
            }
        </style>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('css/build.css')); ?>"/>
        <link rel="stylesheet" href="<?php echo e(asset('/css/font-awesome/css/font-awesome.css')); ?>">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?php echo e(asset('/css/styles-5.css')); ?>">
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(URL::asset('images/logo.png')); ?>" alt="CareerJin.com"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="<?php echo e(strpos(\Route::getCurrentRoute()->getPath(),'seekers')?'active c':''); ?>"><a href="<?php echo e(asset($country . '/seekers/dashboard')); ?>">Job Seekers</a></li>
                        <li  class="<?php echo e(strpos(\Route::getCurrentRoute()->getPath(),'employers')?'active c':''); ?>"><a href="<?php echo e(asset($country . '/employers/dashboard')); ?>">Employers</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(asset($country . '/account/create')); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="<?php echo e(asset($country . '/account/login')); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="glyphicon glyphicon-cog"></span> Manage
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    
                                    <li><a href="update_company"><i class="glyphicon glyphicon-pencil"></i>  Change Password</a></li>
                                    <li><a href="<?php echo e(url($country . '/account/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>  Logout</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="holder">
            <div id="body">
                <div class="container">
                    <div class="row">                 
                        <div class="col-md-12">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>                
                        
                    </div>
                </div>
            </div>
            <div id="footer">
                <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div> 
        </div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-multiselect.css')); ?>" type="text/css">
    <script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap-multiselect.js')); ?>"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
    <script type="text/javascript" src="<?php echo e(asset('/js/main.js')); ?>"></script> 
    </body>
</html>
