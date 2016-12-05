<?php $__env->startSection('content'); ?>
	<button type="button" id="myModal2" class="btn btn-info btn-lg m" data-toggle="modal" data-target="#myModal3">Open Modal</button>

<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div id="modal-content" class="modal-content">


    </div>
</div>
</div>


            <!-- form validation -->
        <script type="text/javascript">
	        
			     $('#myModal2').on('click', function(e){
			     		
			          $.ajax({
				        type: "GET",
				        dataType: "html",
				        url: "<?php echo e(route('emp.signup_html')); ?>",
				       async:true, 
				        success: function(data) {
				        //	console.log(data);
				        	$('#modal-content').html(data);
				        	
				        }
				    });


			   });
            

        </script>
        <!-- /form validation -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('employers::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>