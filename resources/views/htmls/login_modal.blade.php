
      <div class="modal-header modal-header-custom">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Employer | Login</h4>
      </div>
      <div class="modal-body">
      		<div id="msg"></div>
        <div class="row">
        	{{ Form::open(array('id'=>'demo-form', 'data-parsley-validate'=>'parsley-validate'))}}
	        	
	        	<div class="col-md-12">
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
	        					{{Form::checkbox('remember_me',null,null,['id'=>'remember_me'])}} Remember me
	        				</div>
	        			</div>
<div class="col-md-12">
	        				<button type="button" id="submit" class="btn btn-primary">Submit</button>
	        			</div>
	        			{!! Form::token() !!}

	        	</div>
        	{{Form::close()}}
        </div>
      </div>
      <div class="modal-footer">
        {{ Html::link('#', 'Do not have an account? Signup now',[ 'class'=>'m', 'data-toggle'=>'modal','data-target'=>'#myModal3' ])}}
       
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
				    $.ajax({
				        type: "POST",
				        dataType: "json",
				        url: "{{route('emp.login')}}",
				        data: {
					        'email' : $('#email').val(), 
					        'pwd' : $('#password').val(), 
					        'remember_me' :$("input[name='remember_me']:checked").val(), 
					        '_token': $_token
				        },
				        success: function(data) {
				        	if(data.error){
                    $("#msg").html('<div class="alert alert-danger" role="alert">' + data.error + '</div>');
                  }
				          else{
				        		if(data.success == "employer")
                    {
                      window.location.href="employers/home";
                    }
                    else
                    {
                      window.location.href="seeker/home";
                    }
                  }

				        }
				    });
				});
            });

        </script>
        <!-- /form validation -->

         <script type="text/javascript">
            
                 $('.m').on('click', function(e){
                        
                      $.ajax({
                        type: "GET",
                        dataType: "html",
                        url: "{{route('emp.signup_html')}}",
                       async:true, 
                        success: function(data) {
                             $('#modal-content').html(data);
                            
                        }
                    });


               });
            

        </script>