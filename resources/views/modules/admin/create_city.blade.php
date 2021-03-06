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
                            <h3>Cities</h3>
                         
                        </div>
                    </div>
                </div>

        
             <div class="x_panel">
                <div class="x_title">
                    <h2>Add new City</h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <!-- start form for validation -->
                    {!! Form::open(array('id'=>'demo-form','action' => '\Modules\Admin\Http\Controllers\CitiesController@create', 'data-parsley-validate'=>'data-parsley-validate')) !!}
                                       <label for="name">Country Name * :</label>
                                       {!! Form::select('CountryID', $countries, null, ['data-parsley-error-message'=>'Please select Country', 'id'=>'CountryID','class'=>'form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                                       <br/>
<label for="name">State/Province Name * :</label>
                                       {!! Form::select('StateID', $states, null, ['data-parsley-error-message'=>'Please select State/Province', 'id'=>'StateID','class'=>'form-control','placeholder'=>'Select State/Province','required'=>'required']) !!}
                                       <br/>
                                        <label for="name">City Name * :</label>
                                        {!! Form::text('CityName', '', ['data-parsley-error-message'=>'Please enter City Name', 'id'=>'CityName','class'=>'form-control','placeholder'=>'City Name','required'=>'required']) !!}   
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
@push('scripts1')
<script>
$('#CountryID').on('change', function(e){

    var CountryId = e.target.value;

       //ajax
       if(CountryId >0){
           $.get('../states/getbycountry/' + CountryId, function(data){

                //success data
               $('#StateID').empty();

               $('#StateID').append('<option value>Please select State/Province</option>');


               $.each(data, function(index, countryObj){
                    console.log(countryObj.Name);
                   $('#StateID').append('<option value="'+ countryObj.id+'">'+ countryObj.Name + '</option>');


               });
           });
        }
        else
        {
            $('#StateID').empty();
            $('#StateID').append('<option value>Please select State/Province</option>');
        }


   });

</script>
@endpush