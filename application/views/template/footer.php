		<!-- <footer class="page-footer grey lighten-4 black-text " style="padding-top: 0;border-top: 1px solid #ccc;">
			
			<div class="footer-copyright black-text ">
				<div class="container">
					© 2017 People Management Group
				</div>
			</div>
		</footer> -->

<footer  class="page-footer grey lighten-4 black-text " style="padding-top: 0;border-top: 1px solid #ccc;" >
	<div class="container">
		<div class="text-center">
			<small>Copyright © We Talk INC 2017</small>
		</div>
	</div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary modal-action modal-close" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?php echo base_url('login/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!--update password -->
<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" id="form" class="form-horizontal">
					<?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>

					<input type="hidden" id="userEmail" value="<?php echo $is_logged_in['user_email']; ?>" name=""/> 
					<input type="hidden" id="userID" value="<?php echo $is_logged_in['user_id']; ?>" name=""/> 
					<div class="col-sm-12 custom-border">
						<div class="success-text" style="display: none;"></div>                     

						<div class="form-group hide-form">
							<label>New Password</label>
							<input type="password" name="new_password" name="new_password" id="new_password" placeholder="Enter your new password here.." class="form-control">
							<div class="help-block-new"></div>
						</div>
						<div class="form-group hide-form">
							<label>Confirm Password</label>
							<input type="password" name="confirm_password" name="confirm_password" id="confirm_password" placeholder="Confirm password here.." class="form-control">
							<div class="help-block-new"></div>
						</div>  
						<div class="alert alert-warning error-same-pass" style="display: none;"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" id="close-form" type="button" onclick="clear_form();" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="button" id="change-password" data-dismiss="">Send</button>
					<!-- a class="btn btn-primary" href="">Logout</a> -->
				</div>
			</div>
		</div>
	</div>


	</body>
	<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/moment.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/prism.js'); ?>"></script>


		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/dataTables.buttons.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.flash.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/jszip.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/pdfmake.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/vfs_fonts.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.html5.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.print.min.js');?>"></script>
		<script src="<?php echo base_url('assets/datetimepicker/build/jquery.datetimepicker.full.min.js'); ?>"></script>
		
		<script src="<?php echo base_url('assets/custom-js/login-and-registration.js'); ?>"></script>
	<!-- 	<script src="<?php echo base_url('custom-js/j1_exchange_culture.js'); ?>"></script>
		<script src="<?php echo base_url('assets/custom-js/kbl.js'); ?>"></script>
		<script src="<?php echo base_url('assets/custom-js/nlex.js'); ?>"></script>
		<script src="<?php echo base_url('assets/custom-js/jquery.ajaxfileupload.js'); ?>"></script> -->



		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
	
	<script>
		$(document).ready(function($) {
			$.datetimepicker.setLocale('en');
			$('.datepicker').datetimepicker({
				onGenerate:function( ct ){
					$(this).css({'background': '#009688', 'padding':0, 'padding-top': '10px'});
					$(this).find('.xdsoft_label').css({'background': '#009688'});
					$(this).find('.xdsoft_calendar').css({'background': '#fff'});
					$(this).find('.xdsoft_datepicker').css({'margin-left': 0,'width': '275px'});
					$(this).find('th').css({'background': '#009688', 'color': '#fff', 'border-color': '#009688'});
					$(this).find('.xdsoft_date > div').css({'padding': '7px'});
					$(this).find('.xdsoft_current ').css({'background': '#009688'});
				},

				closeOnDateSelect: true,
				timepicker: false,
				format: 'Y-m-d',
				mask:true,
				scrollInput: false
			});

			$('select').material_select();

			$('.modal').modal({
		      dismissible: true, // Modal can be dismissed by clicking outside of the modal
		      opacity: .5, // Opacity of modal background
		      inDuration: 300, // Transition in duration
		      outDuration: 200, // Transition out duration
		      startingTop: '4%', // Starting top style attribute
		      endingTop: '10%', // Ending top style attribute
		      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
		       
		      },
		      complete: function() {
    			$('#services option:selected').each(function(i, sel){ 
				    $(sel).attr('data-id',''); 
				});
				$('#services option:not(:selected)').each(function(i, sel){ 
				    $(sel).attr('data-id',''); 
				});
		      } // Callback for Modal close
		    }
		  );

			$.each($(':checkbox'), function(k, v) {
			    var label = $(this).closest('label');
			    $(this).insertBefore(label);
			});
		});
		
	</script>

</html>