<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php require_once(APPPATH."views/template/nav.php"); ?>
  	<div class="content-wrapper">
    	<div class="container-fluid">
	      <!-- Breadcrumbs-->
	    	<ol class="breadcrumb">
	        	<li class="breadcrumb-item">
	          	<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
	        	</li>
	        	<li  class="breadcrumb-item active">My Message Box</li>
	      	</ol>
			<div class="col-md-10 col-sm-11 main " style="min-height: 243px;">
				<div class="row inbox">
					<div class="col-md-3"></div><!--/.col-->
					
					<div class="col-md-9">
						
						<div class="panel panel-default">
							
							<div class="panel-body message">
								
									<span class="btn-group">
									 	<!-- <button class="btn btn-default"> -->
									 		<a class="breadcrumb-item btn btn-default" href="<?php echo base_url("pm");?>"><i class="fa fa-inbox" aria-hidden="true"></i> Inbox</a>
									 	<!-- </button>	 -->
									</span>

									<span class="btn-group">
									  	<!-- <button class="btn btn-default"> -->
									 		<a  class="btn btn-default" href="<?php echo base_url("pm/messages")."/".MSG_UNREAD?>"><i class="fa fa-envelope" aria-hidden="true"></i> Unread</a>
									 	<!-- </button> -->
									</span>

									<span class="btn-group">
										<!-- <button class="btn btn-default"> -->
									 		<a  class="btn btn-default" href="<?php echo base_url("pm/messages")."/".MSG_SENT?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> Sent</a>
									 	<!-- </button> -->
									</span>

									<span class="btn-group">
										<!-- <button class="btn btn-default"> -->
									 		<a  class="btn btn-default" href="<?php echo base_url("pm/messages")."/".MSG_DELETED?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Trashed</a>
									 	</button>
									</span>
									<span class="btn-group">
										<!-- <button class="btn btn-default"> -->
									 		<a class="btn btn-default" href="<?php echo base_url("pm/send")."/"?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Compose</a>
									 	<!-- </button>  -->
									</span>
								<?php if(count($message)>0):

								//echo "<pre>"; print_r($message); echo "</pre>";
								?>

								<div class="message-title"><?php echo $message[TF_PM_SUBJECT]; ?></div>
								<div class="header">

									<img class="avatar" src="assets/img/avatar.jpg">

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
											echo $new_date;
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

								<div class="attachments"></div>

								<form id="contact-form" method="post" action="<?php echo base_url('pm/send'); ?>" role="form">
					
									<input id="recipients" type="hidden" value="<?php echo $message[TF_PM_AUTHOR];  ?>" name="recipients" class="form-control col-md-5" placeholder="Please enter your recipients" required="required" >

	
								    <input id="privmsg_subject" type="hidden" name="privmsg_subject" class="col-md-5 form-control" value="<?php echo $message[TF_PM_SUBJECT]; ?>" placeholder="Please enter your recipients" required="required" >
									<div class="form-group">
									
										<textarea class="form-control" id="privmsg_body" name="privmsg_body" rows="12" placeholder="Click here to reply"></textarea>
									
									</div>
									
									<div class="form-group">	

										<!-- <button tabindex="3" name="btnSend" id="btnSend" type="submit" class="btn btn-success">Send message</button> -->
										<input type="submit" class="btn btn-success btn-send"  name="btnSend" id="btnSend" value="Send message">
									
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
