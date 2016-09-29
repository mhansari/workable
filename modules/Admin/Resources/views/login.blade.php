@extends('admin::layouts.master_login')

@section('content')
 <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div class="x_content" >
            	
                <section class="login_content">
                    {!! Form::open(array('id'=>'demo-form','action' => '\Modules\Admin\Http\Controllers\SiteController@login', 'data-parsley-validate'=>'data-parsley-validate')) !!}
                        <h1>Login</h1>
                        @if (Session::has('error_login'))
    <div class="alert alert-danger">{{ Session::get('error_login') }}</div>
@endif
                       
                        	{!! Form::text('Username', '', ['data-parsley-error-message'=>'Please enter Username', 'id'=>'Username','class'=>'form-control','placeholder'=>'Username','required'=>'required']) !!}


                        	{!! Form::text('password', '', ['data-parsley-error-message'=>'Please enter Password','id'=>'password', 'class'=>'form-control','placeholder'=>'Password','required'=>'required']) !!}
                            

                            <button type="submit" id="send" class="btn btn-success">Login</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <div class="clearfix"></div>
                       
                    {!! Form::close() !!}
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            
        </div>
    </div>
     
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- chart js -->
    <script src="{{ asset('js/chartjs/chart.min.js') }}"></script>
    <!-- bootstrap progress js -->
    <script src="{{ asset('js/progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('js/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <!-- icheck -->
    <script src="{{ asset('js/icheck/icheck.min.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- form validation -->
    <script src="{{ asset('js/validator/validator.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/parsley/parsley.min.js') }}"></script>
            <!-- form validation -->
        <script type="text/javascript">
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
/*
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {}*/
        </script>
        <!-- /form validation -->
@stop