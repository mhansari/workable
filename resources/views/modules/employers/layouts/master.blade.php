<!DOCTYPE html>
<html lang="en">
	<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <!-- Meta, title, CSS, favicons, etc. -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <title>Gentallela Alela! | </title>

	    <!-- Bootstrap core CSS -->

	    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

	    <link href="{{ asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
	    <link href="{{ asset('css/animate.min.css')}}" rel="stylesheet">

	    <!-- Custom styling plus plugins -->
	    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
	        <script src="{{ asset('js/jquery.min.js')}}"></script>
	    <link href="{{ asset('css/icheck/flat/green.css')}}" rel="stylesheet" />
	       <script type="text/javascript" src="{{ asset('editor/ckeditor/ckeditor.js') }}"></script>
	        <script type="text/javascript" src="{{ asset('editor/ckeditor/config.js') }}"></script>

	       <script type="text/javascript" src="{{ asset('editor/ckeditor/samples/js/sample.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('js/jquery.maskedinput.min.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-multiselect.css') }}" type="text/css">
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-multiselect.js') }} "></script>
          
 

	    
	    <!--[if lt IE 9]>
	        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
	        <![endif]-->

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	        <![endif]-->
	</head>
	<body class="body_employers">
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		    <div class="navbar-header">

		    		<img src="{{ asset('images/logo.png') }}" class="logo-diemensions">
		    
		    </div>
		  </div>
		</nav>
		@yield('content')
	</body>
</html>