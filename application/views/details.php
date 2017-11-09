<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<?php require_once(APPPATH."views/template/nav.php"); ?>
	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
				</li>
				<li  class="breadcrumb-item active">Reply</li>
			</ol>
			<div class="col-md-12 col-sm-12 main " style="min-height: 243px;">
				<div class="row inbox">
					<div class="col-md-12">
						
						<div class="panel panel-default">
							
							<div class="panel-body message">
								

								<?php if(count($message)>0): ?>

									<div class="message-title"><i class="fa fa-star" aria-hidden="true"></i> <?php echo $message[TF_PM_SUBJECT]; ?></div>
									<div class="header">

										<i class="fa fa-user" aria-hidden="true"></i>

										<div class="from">
											<span><?php echo $message[PM_FULLNAME]; ?></span>
											<!-- lukasz@holeczek.pl -->
										</div>
										<div class="date"><span class="fa fa-paper-clip"></span>
											<b>
												<?php 
											$old_date = date($message[TF_PM_DATE]);            // works
											$middle 	= strtotime($old_date);             // returns bool(false)

											$new_date = date("F j, Y - g:i A", $middle);   // returns 1970-01-01 00:00:00
											echo '<i class="fa fa-calendar" aria-hidden="true"></i> '.$new_date;
											?>
										</b>
									</div>

									<div class="menu"></div>

								</div>

								<div class="content">
									<p>
										<?php echo $message[TF_PM_BODY]; ?>
									</p>
									
								</div>
								<hr>
								<form id="contact-form" method="post" action="<?php echo base_url('pm/send'); ?>" role="form">

									<input id="recipients" type="hidden" value="<?php echo $message[TF_PM_AUTHOR];  ?>" name="recipients" class="form-control col-md-5" placeholder="Please enter your recipients" required="required" >


									<input id="privmsg_subject" type="hidden" name="privmsg_subject" class="col-md-5 form-control" value="<?php echo $message[TF_PM_SUBJECT]; ?>" placeholder="Please enter your recipients" required="required" >
									<div class="form-group">

										<textarea class="form-control" id="privmsg_body" name="privmsg_body" rows="12" placeholder="Click here to reply"></textarea>

									</div>
									
									<div class="form-group">	

										<!-- <button tabindex="3" name="btnSend" id="btnSend" type="submit" class="btn btn-success">Send message</button> -->
										<input type="submit" class="btn btn-success btn-send "  name="btnSend" id="btnSend" value="Reply ">

									</div>	

								</form>
								
							</div>	
						<?php else:?>
							<h1>No message found.</h1>
						<?php endif;?>

					</div>	

				</div><!--/.col-->	

			</div><!--/row-->
		</div>

	</div>
</div>
<?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>
