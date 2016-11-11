<div class="modal-header modal-header-custom">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new Department</h4>
      </div>
      <div class="modal-body">
            <div id="msg"></div>
        <div class="row">
            {{ Form::open(array('id'=>'demo-form1', 'data-parsley-validate'=>'parsley-validate'))}}
                <div class="col-md-6">
                    
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::input('text', 'Department', '',['data-parsley-required-message'=>'Required','id'=>'Department', 'placeholder'=>'Department Name', 'required'=>'required', 'class'=>'form-control'])}}
                            </div>
                        </div>
                     
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::select('CountryID', $countries, null, ['data-parsley-required-message'=>'Required', 'id'=>'CountryID','class'=>'form-control','placeholder'=>'Select Country','required'=>'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::select('StateID', $states, null, ['data-parsley-required-message'=>'Required', 'id'=>'StateID','class'=>'form-control','placeholder'=>'Select State/Province','required'=>'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::select('CityID', $cities, null, ['data-parsley-required-message'=>'Required', 'id'=>'CityID','class'=>'form-control','placeholder'=>'Select City','required'=>'required']) !!}
                            </div>
                        </div>
                    <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::textArea('description','', ['data-parsley-required-message'=>'Required', 'id'=>'description','class'=>'form-control','placeholder'=>'Description','required'=>'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="submit1" class="btn btn-primary">Submit</button>
                        </div>
                </div>

            {{Form::close()}}
        </div>
      </div>
 <!-- form validation -->
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
            <!-- form validation -->
        <script type="text/javascript">
          
            $(document).ready(function () {
               
                 $('#submit1').on('click', function () {
                 
                  $_token = "{{ csrf_token() }}";
                  
                  //$date=strtotime($('#dob').val());
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('department.add')}}",
                        data: {
                       'Department': $('#Department').val(),
                       'employer_id': {{{ Auth::user()->id }}},
                        'CountryID': $('#CountryID').val(),
                        'StateID': $('#StateID').val(),
                        'CityID': $('#CityID').val(),
                        'Description': $('#description').val(),
                        '_token': $_token},
                        success: function(data) {
                          if(data.error)
                            $("#msg").append('<div class="alert alert-danger" role="alert">' + data.error + '</div>');
                            else{
                              $("#DepartmentID").append("<option value='" + data.department_id + "'>" + $("#Department").val() + "</option>");
                              $(".modal-body").html('<div class="alert alert-info" role="alert">' + data.success + '</div>');
                            }
                        }
                    });
        });


                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form1 .btn').on('click', function () {
                    $('#demo-form1').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form1').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
 
               $('#CountryID').on('change', function(e){

          var CountryId = e.target.value;
          
             //ajax
             if(CountryId >0 && CountryId != ""){
                 $.get('../admin/states/getbycountry/' + CountryId, function(data){

                      //success data
                     $('#StateID').empty();

                     $('#StateID').append('<option value>Please select State/Province</option>');

 $('#CityID').empty();
                  $('#CityID').append('<option value>Please select City</option>');
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
                  $('#CityID').empty();
                  $('#CityID').append('<option value>Please select City</option>');
              }


         });

           $('#StateID').on('change', function(e){

          var StateId = e.target.value;
          
             //ajax
             if(StateId >0 && StateId != ""){
                 $.get('../admin/cities/getbystate/' + StateId, function(data){

                        //success data
                     $('#CityID').empty();

                     $('#CityID').append('<option value>Please select City</option>');


                     $.each(data, function(index, stateObj){
                          console.log(stateObj.Name);
                         $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');


                     });
                 });
              }
              else
              {
                  $('#CityID').empty();
                  $('#CityID').append('<option value>Please select City</option>');
              }


         });
         
         
            });

        </script>
        <!-- /form validation -->
