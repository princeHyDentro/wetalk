<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!--navigator-->
	<?php 
	
	   require_once(APPPATH."views/template/nav.php"); 
	   
	   $id = $this->uri->segment(3);
	   
	?>
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
								    <input type="hidden" id="client_id" value="<?php echo $id; ?>">
									<center>
										<div style="width: 243px;"> 
											<label for="exampleInputUsername">2x2 Photo / Passport Photo</label>
											<img id="blah" alt="your image" class="form-control" style="height: 14rem;"  />
											<label class="btn-bs-file btn btn-lg btn-success" style="padding: 3px 33px;font-size: 20px;line-height: 1.45;border-radius: 6px;margin-top: 10px;margin-bottom: -2rem;">
											    <form enctype="multipart/form-data" id="submit">
												Browse <input type="file" name="file" id="file" style="display: none;" 
												onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
												</form>
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
											<input type="text" class="form-control" id="name" placeholder=" Enter Name" value='<?php if($id != "") {echo $client[0]->name;}?>' >
										</div>
										<div class="form-group">
											<label for ="Address"> Address</label>
											<textarea  class="form-control" id="address" placeholder="Enter Your Address"><?php if($id != "") {echo $client[0]->client_address;}?></textarea>
										</div>										
										<div class="form-group">
											<label for="telephone">Contact No.</label>
											<input type="text" class="form-control" id="contact_no" placeholder=" Enter contact no." value='<?php if($id != "") {echo $client[0]->client_contactno;}?>'>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail">Email Address</label>
											<input type="email" class="form-control" id="email_address" placeholder=" Enter Email id" value='<?php if($id != "") {echo $client[0]->client_email;}?>'>
										</div>  
										<div class="form-group">
											<div class="input-group">	
												<span class="label-custom input-group-addon-new">BirthDate</span>
								                <input type='text' class="form-control datepicker form-control-new" id="birthdate" value='<?php if($id != "") {echo $client[0]->client_birthdate;}?>' />
								                <span class="label-custom input-group-addon-new" for="age">Age</span>
												<input type="text" class="form-control form-control-new" id="age" placeholder=" Enter age" value='<?php if($id != "") {echo $client[0]->client_age;}?>'>
							            	</div>
										</div>											
										<div class="form-group">
											<label for="gender">Gender</label>
										    <?php
											   $male = "";
											   $female = "";
                                               if ($id != "") {
												  if ($client[0]->gender_id == 1) {
													  $male = "selected";
													  $female = "unselected";
												  } else {
												      $female = "selected";
													  $male = "unselected";
												  }
											   }												   
											?>
											<select class="selectpicker form-control" id="gender">
												<option title="">Select</option>
											  	<option value="1" <?php echo $male; ?>>Male</option>
											  	<option value="2" <?php echo $female; ?>>Female</option>
											</select>
										</div>
										<div class="form-group">
											<label for="year graduated">Year Graduated</label>
											<input type="text" class="form-control" id="year_graduated" placeholder=" Enter year graduated" value='<?php if($id != "") {echo $client[0]->client_yeargraduated;}?>'>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail">Date Visited</label>
							                <div class='input-group date'>
							                    <input type='text' class="form-control" id='date_visited' value='<?php if($id != "") {echo $client[0]->client_datevisited;}?>'/>
							                    <span class="input-group-addon">
							                        <span class="glyphicon glyphicon-calendar"></span>
							                    </span>
							                </div>
										</div>
										<div class="form-group">
											<label for="School">School</label>
											<input type="text" class="form-control" id="school" placeholder=" Enter your school name" value='<?php if($id != "") {echo $client[0]->client_school;}?>'>
										</div>	
									</div>
									<!-- right container-->
									<div class="col-md-6">			
										
										<div class="form-group">
											<label for="Course">Course</label>
											<input type="text" class="form-control" id="course" placeholder=" Enter course" value='<?php if($id != "") {echo $client[0]->client_course;}?>'>
										</div>	
										<div class="form-group">
										    <?php
                                                function dropDownValue($value,$number) {
													if (ucwords($value) == ucwords($number)) {
														echo "selected";
													} else {
														echo "unselected";
													}
												}
											?>
											<label for="gender">Status</label>
											<select class="selectpicker form-control" id="status">
												<option title="">Select</option>
											  	<option value="1" <?php if ($this->uri->segment(3) != "") {dropDownValue(1,$client[0]->status_id);}?>>Inquire</option>
											  	<option value="2" <?php if ($this->uri->segment(3) != "") {dropDownValue(2,$client[0]->status_id);}?>>SignUp</option>
											  	<option value="3" <?php if ($this->uri->segment(3) != "") {dropDownValue(3,$client[0]->status_id);}?>>Cancelled</option>
											  	<option value="4" <?php if ($this->uri->segment(3) != "") {dropDownValue(4,$client[0]->status_id);}?>>Departed</option>
											</select>
										</div>
										<div class="form-group">
											<div class="input-group">												
												<span class="label-custom input-group-addon-new">Month</span>
											    <select class="selectpicker form-control form-control-new" id="month">
													<option title="">Select</option>
												  	<option value="january" <?php if ($this->uri->segment(3) != "") {dropDownValue("january",$client[0]->client_month);}?>>January</option>
												  	<option value="febuary" <?php if ($this->uri->segment(3) != "") {dropDownValue("febuary",$client[0]->client_month);}?>>Febuary</option>
												  	<option value="march" <?php if ($this->uri->segment(3) != "") {dropDownValue("march",$client[0]->client_month);}?>>March</option>
												  	<option value="april" <?php if ($this->uri->segment(3) != "") {dropDownValue("april",$client[0]->client_month);}?>>April</option>
												  	<option value="may" <?php if ($this->uri->segment(3) != "") {dropDownValue("may",$client[0]->client_month);}?>>May</option>
												  	<option value="june" <?php if ($this->uri->segment(3) != "") {dropDownValue("june",$client[0]->client_month);}?>>June</option>
												  	<option value="july"<?php if ($this->uri->segment(3) != "") {dropDownValue("july",$client[0]->client_month);}?>>July</option>
												  	<option value="august" <?php if ($this->uri->segment(3) != "") {dropDownValue("august",$client[0]->client_month);}?>>August</option>
												  	<option value="september"<?php if ($this->uri->segment(3) != "") {dropDownValue("september",$client[0]->client_month);}?>>September</option>
												  	<option value="october"<?php if ($this->uri->segment(3) != "") {dropDownValue("october",$client[0]->client_month);}?>>October</option>
												  	<option value="november" <?php if ($this->uri->segment(3) != "") {dropDownValue("november",$client[0]->client_month);}?>>November</option>
												  	<option value="december"<?php if ($this->uri->segment(3) != "") {dropDownValue("december",$client[0]->client_month);}?>>December</option>
												</select>
											    <span class="label-custom input-group-addon-new">Year</span>
											    <input type="text" class="form-control form-control-new" id="year" placeholder="End"/ value='<?php if($id != "") {echo $client[0]->client_yearapplied;}?>'>
											</div>
										</div>
										<div class="form-group">
											<label for="gender">J1 Type</label>
											<select class="selectpicker form-control" id="j1_type">
												<option title="">Select</option>
											  	<option value="1" <?php if ($this->uri->segment(3) != "") {dropDownValue(1,$client[0]->j1_type);} ?>>Intern</option>
											  	<option value="2" <?php if ($this->uri->segment(3) != "") {dropDownValue(2,$client[0]->j1_type);} ?>>Trainee</option>
											</select>
										</div>
										<div class="form-group">
									        <label class="col-sm-12 control-label">Where did you know about our company ?</label>
									        <div class="col-sm-12">
											    <?php
													function checkedValue($value1,$value2) {
														if (ucwords($value1) == ucwords($value2)) {
														echo "checked";
														} else {
															echo "unchecked";
														}
													}
												?>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="friend" checked <?php if ($this->uri->segment(3) != "") { checkedValue("friend",$client[0]->client_company);} ?>> Friend </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="Poster,Flyers,Etc" <?php if ($this->uri->segment(3) != "") { checkedValue("Poster,Flyers,Etc",$client[0]->client_company);} ?>> Poster,Flyers,Etc </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="Facebook" <?php if ($this->uri->segment(3) != "") { checkedValue("Facebook",$client[0]->client_company); }?>> Facebook </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="Online Website" <?php if ($this->uri->segment(3) != "") { checkedValue("Online Website",$client[0]->client_company); }?>> Online Website </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="Walkin" <?php if ($this->uri->segment(3) != "") { checkedValue("Walkin",$client[0]->client_company); } ?>> Walkin </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" id="referred_by" value="Referred By" <?php if ($this->uri->segment(3) != "" &&$client[0]->client_referredby != "") {echo "checked";}else {echo "unchecked";}?>> Referred By
									                	<input type="text" value="<?php if ($this->uri->segment(3) != "") {echo $client[0]->client_referredby;}?>" id="referred_by_input" class="form-control" <?php if ($this->uri->segment(3) != "" && $client[0]->client_referredby != "") {echo "";}else {echo "disabled='true'";}?>>
									                </label>
									            </div>
									        </div>
									    </div>
										<div class="form-group">
											<textarea  class="form-control" id="message" placeholder="Enter Your Message"><?php if($id != "") {echo $client[0]->client_remarks;}?></textarea>
										</div>
										<div class="form-group">
											<label for ="form #"> Form #</label>
											<input  class="form-control" id="formno" placeholder="Enter Form No." value='<?php if($id != "") {echo $client[0]->client_formno;}?>'>
										</div>	
																						
									</div>									
								</div>
								<div class="col-sm-12 custom-save-button-container">
								    <?php 
									  if ($id != "") {
								    ?>
									  <button type="button" class="btn btn-primary btn-lg" id="update_applicant" style="font-size:1.8;width: 9rem;"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Update</button>
                                    <?php 									
									  } else {
									?>
									   <button type="button" class="btn btn-primary btn-lg" id="create_new_applicant" style="font-size:1.8;width: 9rem;"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Save</button>
								    <?php 
									  }
									 ?>
								</div>	
							</div>	
						</section>
			<!-- 	</div> -->
			<!-- </div> -->
		</div>
		<?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>
