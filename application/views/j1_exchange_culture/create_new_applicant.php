<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!--navigator-->
	<?php require_once(APPPATH."views/template/nav.php"); ?>

	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">J-1 Applicant's Entry</li>
				<li class="breadcrumb-item active">Create New Applicant</li>
			</ol>
			<!-- <div class="row"> -->
				<!-- <div class="col-12"> -->
						<section id="contact">
							<div class="section-content">
								<h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">J-1 Applicant's Entry</span></h1>
								<!-- <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3> -->
								<div class="container">
									<center>
										<div style="width: 243px;"> 
											<label for="exampleInputUsername">2x2 Photo / Passport Photo</label>
											<div class="form-control" style="height: 14rem;" ></div>
											<label class="btn-bs-file btn btn-lg btn-success" style="padding: 3px 33px;font-size: 20px;line-height: 1.45;border-radius: 6px;margin-top: 10px;margin-bottom: -2rem;">
											    Browse <input type="file" style="display: none;">
											</label>
										</div>
									</center>
								</div>
							</div>
							<div class="contact-section">
							<div class="col-12">
								<div class="form-container col-12">
									<div class="col-md-6 form-line">
										<div class="form-group">
											<label for="exampleInputUsername">Your name</label>
											<input type="text" class="form-control" id="" placeholder=" Enter Name">
										</div>
										<div class="form-group">
											<label for ="Address"> Message</label>
											<textarea  class="form-control" id="address" placeholder="Enter Your Address"></textarea>
										</div>										
										<div class="form-group">
											<label for="telephone">Contact No.</label>
											<input type="text" class="form-control" id="telephone" placeholder=" Enter contact no.">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail">Email Address</label>
											<input type="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id">
										</div>  
										<div class="form-group">
											<div class="input-group">	
												<span class="label-custom input-group-addon-new">BirthDate</span>								                
								                <input type='text' class="form-control datepicker form-control-new" id="datepicker" />						                  
											    <span class="label-custom input-group-addon-new" for="age">Age</span>
												<input type="text" class="form-control form-control-new" id="age" placeholder=" Enter age">
							            	</div>
										</div>											
										<div class="form-group">
											<label for="gender">Gender</label>
											<select class="selectpicker form-control">
												<option title="">Select</option>
											  	<option title="male">Male</option>
											  	<option title="female">Female</option>
											</select>
										</div>
										<div class="form-group">
											<label for="year graduated">Year Graduated</label>
											<input type="text" class="form-control" id="yearGrad" placeholder=" Enter year graduated">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail">Date Visited</label>
							                <div class='input-group date' id='datetimepicker1'>
							                    <input type='text' class="form-control" />
							                    <span class="input-group-addon">
							                        <span class="glyphicon glyphicon-calendar"></span>
							                    </span>
							                </div>
										</div>
										<div class="form-group">
											<label for="School">School</label>
											<input type="text" class="form-control" id="school" placeholder=" Enter your school name">
										</div>	
									</div>
									<!-- right container-->
									<div class="col-md-6">			
										
										<div class="form-group">
											<label for="Course">Course</label>
											<input type="text" class="form-control" id="course" placeholder=" Enter course">
										</div>	
										<div class="form-group">
											<label for="gender">Status</label>
											<select class="selectpicker form-control">
												<option title="">Select</option>
											  	<option title="male">Inquire</option>
											  	<option title="female">SignUp</option>
											  	<option title="female">Cancelled</option>
											  	<option title="female">Departed</option>
											</select>
										</div>
										<div class="form-group">
											<div class="input-group">												
												<span class="label-custom input-group-addon-new">Month</span>
											    <select class="selectpicker form-control form-control-new">
													<option title="">Select</option>
												  	<option title="male">Male</option>
												  	<option title="female">Female</option>
												</select>
											    <span class="label-custom input-group-addon-new">Year</span>
											    <input type="text" class="form-control form-control-new" placeholder="End"/>
											</div>
										</div>
										<div class="form-group">
											<label for="gender">J1 Type</label>
											<select class="selectpicker form-control">
												<option title="">Select</option>
											  	<option title="Intern">Intern</option>
											  	<option title="trainee">Trainee</option>
											</select>
										</div>
										<div class="form-group">
									        <label class="col-sm-12 control-label">Where did you know about our company ?</label>
									        <div class="col-sm-12">
									            <div class="radio">
									                <label> <input type="radio" name="radio" id="friend" value="friend" checked> Friend </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" id="poster" value="Poster,Flyers,Etc"> Poster,Flyers,Etc </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" id="facebook" value="Facebook" > Facebook </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" id="online-website" value="Online Website" > Online Website </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" id="walkin" value="Walkin" > Walkin </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" id="referred" value="Referred By" > Reffered By
									                	<input type="text" value="" class="form-control" name="">
									                </label>
									            </div>
									        </div>
									    </div>
										<div class="form-group">
											<label for ="description"> Message</label>
											<textarea  class="form-control" id="description" placeholder="Enter Your Message"></textarea>
										</div>
										<div class="form-group">
											<label for ="form #"> Form #</label>
											<input  class="form-control" id="formno" placeholder="Enter Form No.">
										</div>	
																						
									</div>									
								</div>
								<div class="col-sm-12 custom-save-button-container">
									<button type="button" class="btn btn-primary btn-lg" style="font-size:1.8;width: 9rem;"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Save</button>
								</div>	
							</div>	
						</section>
			<!-- 	</div> -->
			<!-- </div> -->
		</div>
		<?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>
