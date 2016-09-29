@extends('admin::layouts.master')

@section('content')
@include('admin::left')
@include('admin::footer')
</div>
            </div>
@include('admin::top')

<style>
#demo-form ul.parsley-errors-list {
    display:inline-block;
}
</style>
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>State/Provinces</h3>
                         
                        </div>
                    </div>
                </div>

        
             <div class="x_panel">
                <div class="x_title">
                    <h2>Add new State/Province</h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <!-- start form for validation -->
                    {!! Form::open(array('id'=>'demo-form','action' => '\Modules\Admin\Http\Controllers\StatesController@create', 'data-parsley-validate'=>'data-parsley-validate')) !!}
                                       <label for="name">Country Name * :</label>
                                       {!! Form::select('CountryID', $countries, null, ['data-parsley-error-message'=>'Please select Country', 'id'=>'CountryID','class'=>'form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                                       <br/> <label for="name">State/Province Name * :</label>
                                        {!! Form::text('StateName', '', ['data-parsley-error-message'=>'Please enter State/Province Name', 'id'=>'StateName','class'=>'form-control','placeholder'=>'Country Name','required'=>'required']) !!}   
                                        <p style="padding: 5px;">                                
                                      <label>
                                        {{ Form::checkbox('Active', '1',false,['id'=>'Active', 'class'=>'flat']) }} Active
                                    </label>

                                      <br/>
                               
                                         <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                     {!! Form::close() !!}
                    <!-- end form for validations -->

                </div>
            </div>

                    </div>     

            <!-- /page content -->

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

        </script>
        <!-- /form validation -->
@stop
