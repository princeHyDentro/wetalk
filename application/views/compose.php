<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php require_once(APPPATH."views/template/nav.php"); ?>
  	<div class="content-wrapper">
    	<div class="container-fluid">
	      <!-- Breadcrumbs-->
	      	 <ol class="breadcrumb">
	        	<li class="breadcrumb-item">
	          	<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
	        	</li>
	        	<li  class="breadcrumb-item active">Compose New Message</li>
	      	</ol>
	      	<section id="contact" class="" style="padding-top: 0px;">
				<div class="section-content">
					<br>
					<!-- start: Content -->
					<div class="col-md-10 col-sm-11 main ">
						<div class="row inbox">
							<div class="col-md-3"></div>
							<div class="col-md-9">
								
								<div class="panel panel-default">
									
									<div class="panel-body" style="text-align: left;">

										<div class="messages-list">
											<div class="panel-body message">
												<hr>
												<p class="text-center">New Message</p>
												
												<form id="contact-form" method="post" action="<?php echo base_url($this->uri->uri_string()); ?>" class="form-horizontal" role="form">
													<div class="form-group">
												    	<label for="to" class="col-sm-1 control-label">To:</label>
												    	<div class="col-sm-12">	
												      		<input id="recipients" type="text" name="recipients" class="form-control "  placeholder="Type recipient" >
												    	</div>
												  	</div>
													<div class="form-group">
												    	<label for="cc" class="col-sm-1 control-label">Subject:</label>
												    	<div class="col-sm-12">
												      		<input id="privmsg_subject" type="text" name="privmsg_subject" class="form-control "  placeholder="Type Subject" tabindex="1">
												    	</div>
												  	</div>
													
												  
												  <div class="col-sm-12 col-sm-offset-1">
													
													<br>	
													
													<div class="form-group">
														<textarea class="form-control"  id="privmsg_body" name="privmsg_body" rows="12" placeholder="Click here to reply"></textarea>
													
													</div>
													
													<div class="form-group">	
														
														<button type="submit" name="btnSend" id="btnSend" value="Send message" class="btn btn-success">Send Message</button>
														<button type="submit" class="btn btn-danger" ><a style="color: #fff;  text-decoration: none;" href="<?php echo  base_url('/pm'); ?>"> Discard </a></button>
													
													</div>
													
												</div>
												</form>
												


											</div>
										</div>
										<div class="row">
								           	<div class="col-md-8">
										    	<?php
													if(isset($status)) echo '<div class="messages alert alert-warning"><strong>Warning !</strong> : '.$status.' </div>';
													if($this->session->flashdata('status')) echo $this->session->flashdata('status').' ';
													if(!$found_recipients)
													{
														foreach($suggestions as $original => $suggestion) 
														{
															echo '<div class="messages alert alert-warning">Did you mean <font color="#00CC00">'.$suggestion.'</font> for <font color="#CC0000">'.$original.'</font> ?'; 
															echo '</div><br />';
														}
													}
												?>
										    </div>
								        </div>
										
									</div>	
									
								</div>	
								
							</div><!--/.col-->				
						</div><!--/row-->

					</div>
					<br/>
			</section>
		</div>
	</div>
	<?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>
