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
	</div>
<style type="text/css" media="screen">
	.swal-title{
		font-size: 15px;
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

<?php $is_logged_in   = $this->session->userdata('is_logged_in'); ?>
<?php if($is_logged_in['user_rights'] == "encoder") : ?>
<script>
	$(document).ready(function($) {
		new_notification_encoder_sales();
		setInterval(function(){ 
			new_notification_encoder_sales();
		}, 30000);
	});
</script>
<?php endif; ?>

<?php if($is_logged_in['user_rights'] == "sales" || $is_logged_in['user_rights'] == "encoder") : ?>
<script>
	$(document).ready(function($) {

		notification();
		setInterval(function(){ 
			notification();
		}, 30000);
	});
</script>
<?php endif; ?>

<?php if($is_logged_in['user_rights'] == "super" || $is_logged_in['user_rights'] == "office-admin") : ?>
<script>
	$(document).ready(function($) {

		admin_pending_ticket_notification();
		setInterval(function(){
			admin_pending_ticket_notification();
		}, 30000);
	});
</script>
<?php endif; ?>

<script>
	$(document).ready(function($) {
		

		$('.dropdown-button').dropdown({
		      inDuration: 300,
		      outDuration: 225,
		      constrainWidth: false,
		      // hover: true,
		      gutter: 0,
		      belowOrigin: false,
		      alignment: 'left',
		      stopPropagation: false
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
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger) {
			},
			complete: function() {
				$('#services option:selected').each(function(i, sel){ 
					$(sel).attr('data-id',''); 
				});
				$('#services option:not(:selected)').each(function(i, sel){ 
					$(sel).attr('data-id',''); 
				});
			}
		});

		$.each($(':checkbox'), function(k, v) {
		    var label = $(this).closest('label');
		    $(this).insertBefore(label);
		});
	});


	function admin_pending_ticket_notification(){
		url       = "<?php echo base_url('ticket/administrator_get_notify'); ?>";
		var arr   = [];
		$.ajax({
            url : url,
            type: "POST",
            data:{
                'requestor_id' : "",
            },
            success: function(data)
            {
            	result = $.parseJSON(data)
                if(data)
                {
                	if(result.length > 0){
                		$('.new-notification-admin').html(result.length);   
                		Materialize.toast('<i class="material-icons">notifications</i> Ticket Recieved!', 3000, 'rounded');
              
                		$.each(result, function(index, val) {
	                		title = (val.request_for == 'update') ? "Request For Applicant Update" : "Request For Applicant Delete";
	                		data = [
	                				'<li>',
	                					'<a href="<?php echo base_url("ticket/ticket_complete_information/"); ?>'+val.id+'"><i class="material-icons">',
	                				' assignment </i> Ticket '+title+'</a></li>'
                            	].join('');
                            arr.push(data);
	                	});  
	                	head = ['<li><h5> NOTIFICATIONS <span style="float: right;" data-badge-caption="unread" class="new badge">'+result.length+'</span></h5></li></li><li class="divider"></li>'].join('');
	                	result = arr.join('');
	                	$('.notify-collection').html(head+result);      
                	}else{
                		head = ['<li><h5> NOTIFICATIONS <span style="float: right;" data-badge-caption="unread" class="new badge">0</span></h5></li><li class="divider"></li>'].join('');
                		$('.notify-collection').html(head);  
                	}
                	
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

	function notification(){
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
            	
            	$(".inquire-notification-span").text(result.no_inquire);
				$(".enroll-notification-span").text(result.no_enrolled);
				$(".main-notification-span").text(result.total_notify);
                
            	if(result.data.length > 0){
            		Materialize.toast('<i class="material-icons">notifications</i> Check For Notification Recieved!', 3000, 'rounded');
            		
					$.each(result.data, function(index, val) {
                		title = (val.request_for_type == 'update') ? "Request For Applicant Update "+val.approval_type+"!" : "Request For Applicant Delete "+val.approval_type+"!";
                		data = [
                				'<li class="email-unread" data-key="'+val.id+'">',
                					'<a href="#"><i class="material-icons">',
                				' assignment </i> Ticket '+title+'</a></li>'
                        	].join('');
                        arr.push(data);
                	});  

                	head = ['<li><h5> NOTIFICATIONS <span style="float: right;" data-badge-caption="unread" class="new badge">'+result.length+'</span></h5></li></li><li class="divider"></li>'].join('');
                	result = arr.join('');

                	$('.notify-collection').html(head+result); 

            	}else{
            		head = ['<li><h5> NOTIFICATIONS <span style="float: right;" data-badge-caption="unread" class="new badge">0</span></h5></li></li><li class="divider"></li>'].join('');
                    $('.notify-collection').html(head);  
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


	function new_notification_encoder_sales(){
		url           = "<?php echo base_url('ticket/encoder_get_notify'); ?>";
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

            	if(result.length > 0){
            		Materialize.toast('<i class="material-icons">notifications</i> Check For Pending Tickets!', 3000, 'rounded');
					$(".new-notification-encoder").text(result.length);
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
		window.location = base_url;
	});
	
</script>

</html>