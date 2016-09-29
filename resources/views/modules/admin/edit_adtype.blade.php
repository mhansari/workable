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
                            <h3>Security Questions</h3>
                         
                        </div>
                    </div>
                </div>

        
             <div class="x_panel">
                <div class="x_title">
                    <h2>Add new Security Question</h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <!-- start form for validation -->
                      {{ Form::model($ad, array('route' => array('adtype.update', $ad->id), 'id'=>'demo-form','name'=>'demo-form', 'method' => 'post', 'data-parsley-validate'=>'data-parsley-validate')) }}
                    <label for="name">Ad Type Title * :</label>
                    {!! Form::text('Name', $ad->name,  ['data-parsley-error-message'=>'Please enter Ad Type Title', 'id'=>'Name','class'=>'form-control','placeholder'=>'Ad Type','required'=>'required']) !!}   
                    <br/>
                    <label for="name">Description * :</label>
                    {!! Form::textArea('description', $ad->description, ['data-parsley-error-message'=>'Please enter Description', 'id'=>'description','class'=>'form-control','placeholder'=>'Description','required'=>'required']) !!}   
                    <br/>
                    <label for="name">Price * :</label>
                    {!! Form::text('Price', $ad->price, ['data-parsley-error-message'=>'Please enter Price', 'id'=>'Price','class'=>'form-control','placeholder'=>'Price','required'=>'required','data-parsley-type'=>'number']) !!}   
                    <br/>
                    <label for="name">Duration * :</label>
                    {!! Form::text('Duration', $ad->duration_unit, ['data-parsley-error-message'=>'Please enter Duration', 'id'=>'Duration','class'=>'form-control','placeholder'=>'Duration','required'=>'required','data-parsley-type'=>'digits']) !!}   
                    <br/>
                    <p style="padding: 5px;">                                
                    <label>
                        {{ Form::checkbox('Active', '1',$ad->active,['id'=>'Active', 'class'=>'flat']) }} Active
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
