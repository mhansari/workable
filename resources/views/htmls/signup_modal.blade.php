<div class="modal-header modal-header-custom">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Employer</h4>
      </div>
      <div class="modal-body">
      		<div id="msg"></div>
        <div class="row">
        	{{ Form::open(array('id'=>'demo-form', 'data-parsley-validate'=>'parsley-validate'))}}
	        	<div class="col-md-6">
	        		
	        			
	        			<div class="col-md-12">
	        				<div class="form-group">
	        					{{Form::input('text', 'firstname', '',['data-parsley-required-message'=>'Required','id'=>'firstname', 'placeholder'=>'First Name', 'required'=>'required', 'class'=>'form-control'])}}
	        				</div>
	        			</div>
	        			<div class="col-md-12">
	        				<div class="form-group">
		        				{{Form::input('text', 'lastname', '',['data-parsley-required-message'=>'Required','id'=>'lastname', 'placeholder'=>'Last Name', 'required'=>'required', 'class'=>'form-control'])}}
	        				</div>
	        			</div>
	        			<div class="col-md-6">
	        				<div class="form-group">
	        					{!! Form::select('gender', array('M'=>'Male','F'=>'Female'), null, ['data-parsley-required-message'=>'Required', 'id'=>'gender','class'=>'form-control','placeholder'=>'Gender','required'=>'required']) !!}
	        				</div>
	        			</div>
	        			<div class="col-md-6">
	        				<div class="form-group">
		        				{{Form::input('text', 'dob', '',['data-parsley-date'=>'dateIso','id'=>'dob', 'data-parsley-error-message'=>'Invalid Date of Birth','placeholder'=>'Date of Birth', 'required'=>'required', 'class'=>'form-control'])}}
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
	        		<div class="col-md-4">
	        				<div class="form-group">
	        					{{Form::input('text', 'mobile_code', '',['data-parsley-required-message'=>'Required','id'=>'mobile_code', 'placeholder'=>'03__', 'required'=>'required', 'class'=>'form-control'])}}
	        				</div>
	        			</div>
	        			<div class="col-md-8">
	        				<div class="form-group">
		        				{{Form::input('text', 'mobile_number', '',['data-parsley-required-message'=>'Required','id'=>'mobile_number', 'placeholder'=>'Mobile Number', 'required'=>'required', 'class'=>'form-control'])}}
	        				</div>
	        			</div>
	        			<div class="col-md-12">
	        				<button type="button" id="submit" class="btn btn-primary">Submit</button>
	        			</div>
	        	</div>

	        	<div class="col-md-6">
	        			<div class="col-md-12">
	        				<div class="form-group">
	        					{{Form::input('email', 'email', '',['data-parsley-type'=>'email','data-parsley-required-message'=>'Required','id'=>'email', 'placeholder'=>'Email', 'required'=>'required', 'class'=>'form-control'])}}
	        				</div>
	        			</div>
	        			<div class="col-md-12">
	        				<div class="form-group">
	        				
	        					{{Form::input('password', 'password', '',['data-parsley-minlength'=>'6','data-parsley-required-message'=>'Required','id'=>'password', 'placeholder'=>'Password', 'required'=>'required', 'class'=>'form-control'])}}
	        				</div>
	        			</div>
	        			<div class="col-md-12">
	        				<div class="form-group">
	        					{{Form::input('password', 'confirm_password', '',['data-parsley-required-message'=>'Required', 'id'=>'confirm_password', 'data-parsley-equalto'=>'#password', 'placeholder'=>'Confirm Password', 'required'=>'required', 'class'=>'form-control'])}}
	        				</div>
	        			</div>
	        			<div class="col-md-12">
	        				<div class="form-group">
	        					{!! Form::select('QuestionID', $questions, null, ['data-parsley-required-message'=>'Required', 'id'=>'QuestionID','class'=>'form-control','placeholder'=>'Select Security Question','required'=>'required']) !!}
	        				</div>
	        			</div>
						<div class="col-md-12">
	        				<div class="form-group">
	        					{{Form::input('text', 'security_answer', '',['data-parsley-required-message'=>'Required','id'=>'security_answer', 'placeholder'=>'Your Security Answer', 'required'=>'required', 'class'=>'form-control'])}}
	        				</div>
	        			</div>
	        			<div class="col-md-12">
	        				<div class="form-group">
	        					{{Form::checkbox('newsletter', '1', '',['id'=>'newsletter'])}} Subscribe to daily job alerts?
	        				</div>
	        			</div>

	        			<div class="col-md-12">
	        				By clicking on <b>Submit</b> button you are agreeing to the (TOS).
	        			</div>{!! Form::token() !!}
{{ Form::hidden('ut', 1,array('id'=>'ut')) }}
	        	</div>
        	{{Form::close()}}
        </div>
      </div>
      <div class="modal-footer">
      	
        {{ Html::link('#', 'Already have an account? Login now',[ 'class'=>'m', 'data-toggle'=>'modal','data-target'=>'#myModal3' ])}}
      </div>
    </div>


<script>
$( document ).ready(function() {
     
      $("#dob").mask("99/99/9999");      



});

</script>
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
	         $('#CountryID').on('change', function(e){

			    var CountryId = e.target.value;
			    
			       //ajax
			       if(CountryId >0 && CountryId != ""){
			           $.get('admin/states/getbycountry/' + CountryId, function(data){

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
			           $.get('admin/cities/getbystate/' + StateId, function(data){

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
			   
			     $('#myModal2').on('click', function(e){

			           $.get("{{route('emp.login_html')}}", function(data){

			                  //success data
			               $('#CityID').empty();

			               $('#CityID').append('<option>Please select City</option>');


			               $.each(data, function(index, stateObj){
			                    console.log(stateObj.Name);
			                   $('#CityID').append('<option value="'+ stateObj.id+'">'+ stateObj.Name + '</option>');


			               });
			           });
			        


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
				        'lastname': $('#lastname').val(),
				        'gender': $('#gender').val(),
				        
					
				        'dob':  $('#dob').val(), //date_format($date,"Y-m-d"),
				        'country': $('#CountryID').val(),
				        'state': $('#StateID').val(),
				        'city': $('#CityID').val(),
				        'mobile-prefix': $('#mobile_code').val(),
				        'mobile-number': $('#mobile_number').val(),
				        'email' : $('#email').val(), 
				        'pwd' : $('#password').val(), 
				        'question' : $('#QuestionID').val(), 
				        'answer' : $('#security_answer').val(), 
				        'newsletter' : $('#newsletter').val(),
				        'ut' : $('#ut').val(),  
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
        <!-- /form validation -->

             <!-- form validation -->
        <script type="text/javascript">
	        
			     $('.m').on('click', function(e){
			     		
			          $.ajax({
				        type: "GET",
				        dataType: "html",
				        url: "{{route('emp.login_html')}}",
				       async:true, 
				        success: function(data) {
				        	 $('#modal-content').html(data);
				        	
				        }
				    });


			   });
            

        </script>