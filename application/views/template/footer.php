		<!-- <footer class="page-footer grey lighten-4 black-text " style="padding-top: 0;border-top: 1px solid #ccc;">
			
			<div class="footer-copyright black-text ">
				<div class="container">
					© 2017 People Management Group
				</div>
			</div>
		</footer> -->

<!-- <footer  class="page-footer grey lighten-4 black-text " style="padding-top: 0;border-top: 1px solid #ccc;" >
	<div class="container">
		<div class="text-center">
			<small>Copyright © We Talk INC 2017</small>
		</div>
	</div>
</footer> -->
<!-- Scroll to Top Button-->
<?php
// $is_logged_in   = $this->session->userdata('is_logged_in');
// echo "<pre>";
// print_r($is_logged_in);
// echo "</pre>";
?>
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
			</div>
			<div class="modal-body">
				<form action="#" method="get" accept-charset="utf-8">
					<?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>

					<input type="hidden" class="user-email" value="<?php echo $is_logged_in['user_email']; ?>" name="user-email"/> 
					<input type="hidden" class="user-id" value="<?php echo $is_logged_in['user_id']; ?>" name="user-id"/> 
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
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary modal-action modal-close" id="close-form " type="button">Cancel</button>
						<button class="btn btn-primary" type="button" id="change-password" data-dismiss="">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<style type="text/css" media="screen">
		.swal-title{
			font-size: 15px;
		}
		#chat-out{
		    width: 300px !important;
		    right: 0px;
		   	white-space: inherit !important;
		    top: 63px !important;
		}
		#email-list {
			padding: 0;
		}
		#email-list .collection {
			margin: 0;
		}
		#email-list .collection .collection-item.avatar {
			height: auto;
			padding-left: 12px;
			position: relative;
		}
		#email-list .collection .collection-item.selected {
		    background: #e1f5fe;
		    border-left: 4px solid #29b6f6;
		}
		#email-list .collection .collection-item.avatar {
		    height: auto;
		    position: relative;
		}
		.dropdown-content li> .email-title{
			padding: 1px;
		}
		.collection .collection-item.avatar {
		     min-height: auto;
		    padding-left: 72px;
		    position: relative;
		}
		.notify-collection{
			padding-bottom: 0px;
		}
		#chat-out .collapsible-header {
		    background-color: transparent;
		    border: none;
		    height: 45px;
		    font-weight: 400;
		}
		#email-list{
			margin: 0px;
		}
		.email-title{
			font-size: 14px !important;
		}
	</style>
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
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<script>
		$(document).ready(function($) {
			//$('.dropdown-button').dropdown('open');
			$('.dropdown-button').dropdown({
			      inDuration: 300,
			      outDuration: 225,
			      constrainWidth: false, // Does not change width of dropdown to that of the activator
			      // hover: true, // Activate on hover
			      gutter: 0, // Spacing from edge
			      belowOrigin: false, // Displays dropdown below the button
			      alignment: 'left', // Displays dropdown with edge aligned to the left of button
			      stopPropagation: false // Stops event propagation
			    }
			  );

			$(".side-nav-collapse").sideNav();
			
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

		notify();
		// setInterval(function(){ 
		// 	notify();
		// }, 5000);

		function notify(){
			url           = "<?php echo base_url('ticket/pg_get_notify'); ?>";
			requestor_id  = "<?php echo $is_logged_in['user_id']; ?>";
			var arr = [];
			$.ajax({
	            url : url,
	            type: "POST",
	            data:{
	                'requestor_id' : requestor_id,
	            },
	            success: function(data)
	            {
	            	result = $.parseJSON(data)
	                if(data)
	                {
	                	console.log(result.length);
	                	if(result.length > 0){
	                		var $toastContent = $('<span>New Notification Recieved</span>');
  								Materialize.toast($toastContent, 10000);
	                		$.each(result, function(index, val) {
		                		title = (val.request_for_type == 'update') ? "Request For Applicant Update "+val.approval_type+"!" : "Request For Applicant Delete "+val.approval_type+"!";
		                		data = [
			                		'<li class="collection-item avatar email-unread" data-key="'+val.id+'">',
				                		'<span class="email-title">'+title+'</span>',
				                		'<p class="">Administrator Reason :</p>',
				                		'<p class="truncate grey-text ultra-small">Hay Joe, we have next project for this summer.</p>',
			                		'</li>'
	                            	].join('');
	                            arr.push(data);
		                	});  
	                	}else{
	                		data = [
		                		'<li class="collection-item avatar selected">',
			                		'<span class="email-title">0 Notification</span>',
		                		'</li>'
                            	].join('');
                            arr.push(data);
	                	}

	                	result = arr.join('');
	                	$('.notify-collection').html(result);      
	                }
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                swal({   title: "Error deleting data!",   
	                     text: "I will close in 2 seconds.",   
	                     timer: 2000,  
	                     icon: "error", 
	                     type: "error",
	                     showConfirmButton: false 
	                });
	            }
	        });
		}

		$(document).on('click', '.email-unread', function(event) {
			event.preventDefault();
			var id 			= $(this).attr('data-key');
			var base_url	= "<?php echo base_url('ticket/administrator_reason/')?>"+id;
			//alert(base_url)
			window.location = base_url;
		});
		
	</script>

</html>