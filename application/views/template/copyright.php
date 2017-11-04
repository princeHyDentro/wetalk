<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
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
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
