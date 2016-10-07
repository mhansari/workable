@extends('employers::home')

@section('sub-content')
<div class="row">
    <div class="col-md-6">
        <div class="x_content">
            <!-- start form for validation -->
            {{ Form::open(array('id'=>'demo-form', 'data-parsley-validate'=>'parsley-validate'))}}
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                        {!! Form::select('AdType', $adtypes, null, ['data-parsley-required-message'=>'Required', 'id'=>'AdType','class'=>'form-control','placeholder'=>'Select Ad Type','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                        {!! Form::input('text','JobTitle', '', ['data-parsley-required-message'=>'Required', 'id'=>'JobTitle','class'=>'form-control','placeholder'=>'Job Title','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('DepartmentID', $depts, null, ['data-parsley-required-message'=>'Required', 'id'=>'DepartmentID','class'=>'form-control','placeholder'=>'Select Department','required'=>'required']) !!}
                    </div>
                </div> <a class="glyphicon glyphicon-plus" id="add_de" href="#" data-toggle="modal" data-target="#myModal3"></a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('CategoryID', $adtypes, null, ['data-parsley-required-message'=>'Required', 'id'=>'CategoryID','class'=>'form-control','placeholder'=>'Select Category','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('CareerLevelID', $adtypes, null, ['data-parsley-required-message'=>'Required', 'id'=>'CareerLevelID','class'=>'form-control','placeholder'=>'Select Career Level','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('ExperianceLevelID', $adtypes, null, ['data-parsley-required-message'=>'Required', 'id'=>'ExperianceLevelID','class'=>'form-control','placeholder'=>'Select Experiance Level','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::input('text','NoVac', '', ['data-parsley-required-message'=>'Required', 'id'=>'NoVac','class'=>'form-control','placeholder'=>'No. of Vacancies','required'=>'required']) !!}
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
<div id="txtJobDuties" placeholder="Job duties and responsibilities">
         
        </div>
 </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div id="txtSkills" placeholder="Required skills and personal attributes">
                         
                        </div>
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::input('text','Qualification', '', ['data-parsley-required-message'=>'Required', 'id'=>'Qualification','class'=>'form-control','placeholder'=>'Qualification','required'=>'required']) !!}
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('JobTypeID', $adtypes, null, ['data-parsley-required-message'=>'Required', 'id'=>'JobTypeID','class'=>'form-control','placeholder'=>'Select Job Type','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('ShiftID', $adtypes, null, ['data-parsley-required-message'=>'Required', 'id'=>'ShiftID','class'=>'form-control','placeholder'=>'Select Shift','required'=>'required']) !!}
                    </div>
                </div>
            </div>
            <button type="submit" id="submit" class="btn btn-success">Submit</button>
            {!! Form::close() !!}
            <!-- end form for validations -->



</div>
        </div>
    </div>
</div>


<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <!-- Modal content-->
        <div id="modal-content" class="modal-content">
        </div>
    </div>
</div>

 <script src="{{ asset('js/validator/validator.js') }}"></script>
      <script type="text/javascript">
        window.ParsleyConfig = window.ParsleyConfig || {};

 window.ParsleyConfig.validators = window.ParsleyConfig.validators || {};

 window.ParsleyConfig.validators.date = {
        fn: function (value) {
            return /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/.test(value);
        },
        priority: 256
    };
    </script>
     <script type="text/javascript" src="{{ asset('js/parsley/parsley.min.js') }}"></script>

  <script type="text/javascript">
             $('#CountryID').on('change', function(e){

                var CountryId = e.target.value;
                
                   //ajax
                   if(CountryId >0 && CountryId != ""){
                       $.get('../admin/states/getbycountry/' + CountryId, function(data){

                            //success data
                           $('#StateID').empty();

                           $('#StateID').append('<option>Please select State/Province</option>');

 $('#CityID').empty();
                        $('#CityID').append('<option>Please select City</option>');
                           $.each(data, function(index, countryObj){
                                console.log(countryObj.Name);
                               $('#StateID').append('<option value="'+ countryObj.id+'">'+ countryObj.Name + '</option>');


                           });
                       });
                    }
                    else
                    {
                        $('#StateID').empty();
                        $('#StateID').append('<option>Please select State/Province</option>');
                        $('#CityID').empty();
                        $('#CityID').append('<option>Please select City</option>');
                    }


               });

             $('#StateID').on('change', function(e){

                var StateId = e.target.value;
                
                   //ajax
                   if(StateId >0 && StateId != ""){
                       $.get('../admin/cities/getbystate/' + StateId, function(data){

                              //success data
                           $('#CityID').empty();

                           $('#CityID').append('<option>Please select City</option>');


                           $.each(data, function(index, stateObj){
                                console.log(stateObj.Name);
                               $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');


                           });
                       });
                    }
                    else
                    {
                        $('#CityID').empty();
                        $('#CityID').append('<option>Please select City</option>');
                    }


               });

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
 
                $('#submit').on('click', function () {
                    $_token = "{{ csrf_token() }}";
                    
                    //$date=strtotime($('#dob').val());
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('emp.signup')}}",
                        data: {
                        'firstname' : $('#firstname').val(), 
         
                        'country': $('#CountryID').val(),
                        'state': $('#StateID').val(),
                        'city': $('#CityID').val(),
                       
                        '_token': $_token},
                        success: function(data) {
                            if(data.error)
                                $("#msg").append('<div class="alert alert-danger" role="alert">' + data.error + '</div>');
                            else
                                $(".modal-body").html('<div class="alert alert-info" role="alert">' + data.success + '</div>');

                        }
                    });
                });
            });
             </script>

               <script type="text/javascript">
            
                 $('#add_de').on('click', function(e){
                      $.ajax({
                        type: "GET",
                        dataType: "html",
                        url: "{{route('emp.department_html')}}",
                       async:true, 
                        success: function(data) {
                            //alert(data);
                             $('#modal-content').html(data);
                            
                        }
                    });


               });
            

        </script>


     <script>

  initSample();
initSample2();
</script>
@stop