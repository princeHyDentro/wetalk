<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!--navigator-->
	<?php require_once(APPPATH."views/template/nav.php"); ?>

	<div class="content-wrapper">
		<div class="container-fluid">
		    <input type="hidden" id="client_id" value="<?php if ($this->uri->segment(3) != "") {echo $this->uri->segment(3);}?>">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.html">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">NCLEX Applicant's Entry</li>
				<li class="breadcrumb-item active">Create New Applicant</li>
			</ol>
			<!-- <div class="row"> -->
				<!-- <div class="col-12"> -->
						<section id="contact">
							<div class="section-content">
								<h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">NCLEX Applicant's Entry</span></h1>
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
							<div class="">
								<div class="form-container col-12">
									<div class="col-md-6 form-line col-sm-12">
										<div class="form-group">
											<label for="exampleInputUsername">Your name</label>
											<input type="text" class="form-control" id="name" placeholder=" Enter Name" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->name;}?>">
										</div>
										<div class="form-group">
											<label for ="Address"> Address</label>
											<textarea  class="form-control" id="address" placeholder="Enter your address"><?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_address;}?></textarea>
										</div>										
										<div class="form-group">
											<label for="telephone">Contact No.</label>
											<input type="text" class="form-control" id="contact_no" placeholder=" Enter contact no." value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_contactno;}?>">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail">Email Address</label>
											<input type="email" class="form-control" id="exampleInputEmail" placeholder=" Enter your email " value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_email;}?>">
										</div>  
										<div class="form-group">
											<div class="input-group">	
												<span class="label-custom input-group-addon-new">BirthDate</span>
								                <input type='text' class="form-control datepicker form-control-new" id="birthdate" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_birthdate;}?>"/>						                  
											    <span class="label-custom input-group-addon-new" for="age">Age</span>
												<input type="text" class="form-control form-control-new" id="age" placeholder=" Enter your age" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_age;}?>">
							            	</div>
										</div>											
										<div class="form-group">
										     <?php
											   $male = "";
											   $female = "";
                                               if ($this->uri->segment(3) != "") {
												  if ($nclex[0]->gender_id == 1) {
													  $male = "selected";
													  $female = "unselected";
												  } else {
												      $female = "selected";
													  $male = "unselected";
												  }
											   }												   
											?>
											<label for="gender">Gender</label>
											<select class="selectpicker form-control" id="gender">
												<option value="">Select</option>
											  	<option value="1" <?php echo $male;?>>Male</option>
											  	<option value="2" <?php echo $female;?>>Female</option>
											</select>
										</div>
										<div class="form-group">
											<label for="year graduated">Year Graduated</label>
											<input type="text" class="form-control" id="year_graduated" placeholder=" Enter year graduated" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_yeargraduated;}?>">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail">Date Visited</label>
							                <div class='input-group date' id='datetimepicker1'>
							                    <input type='text' class="form-control  datepicker" id="date_visited" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_datevisited;}?>"/>
							                </div>
										</div>
										<div class="form-group">
											<label for="School">School</label>
											<input type="text" class="form-control" id="school" placeholder=" Enter your school name" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_school;}?>">
										</div>	
									</div>
									<!-- right container-->
									<div class="col-md-6">			
										
										<div class="form-group">
											<label for="Course">Course</label>
											<input type="text" class="form-control" id="course" placeholder=" Enter your course" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_course;}?>">
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
											<?php
											if ($this->uri->segment(3) != "") { 
											 	$status = $nclex[0]->status_id;
											}
											 ?>
											<label for="gender">Status</label>
											<select class="selectpicker form-control" id="status">
												<option value="">Select</option>
											  	<option value="1" <?php if ($this->uri->segment(3) != "") {dropDownValue(1,$nclex[0]->status_id);}?>>Inquire</option>
											  	<option value="2" <?php if ($this->uri->segment(3) != "") {dropDownValue(1,$nclex[0]->status_id);}?>>SignUp</option>
											  	<option value="3" <?php if ($this->uri->segment(3) != "") {dropDownValue(1,$nclex[0]->status_id);}?>>Cancelled</option>
											  	<option value="4" <?php if ($this->uri->segment(3) != "") {dropDownValue(1,$nclex[0]->status_id);}?>>Departed</option>
											</select>
										</div>
										
										<div class="form-group">
											<div class="input-group">												
												<span class="label-custom input-group-addon-new">Month</span>
											    <select class="selectpicker form-control form-control-new" id="month">
													<option ="">Select</option>
												  	<option value="january" <?php if ($this->uri->segment(3) != "") { dropDownValue("january",$nclex[0]->client_month);} ?>>January</option>
												  	<option value="febuary" <?php if ($this->uri->segment(3) != "") { dropDownValue("febuary",$nclex[0]->client_month);} ?>>Febuary</option>
												  	<option value="march" <?php if ($this->uri->segment(3) != "") { dropDownValue("march",$nclex[0]->client_month);} ?>>March</option>
												  	<option value="april" <?php if ($this->uri->segment(3) != "") { dropDownValue("april",$nclex[0]->client_month);} ?>>April</option>
												  	<option value="may" <?php if ($this->uri->segment(3) != "") { dropDownValue("may",$nclex[0]->client_month);} ?>>May</option>
												  	<option value="june" <?php if ($this->uri->segment(3) != "") { dropDownValue("june",$nclex[0]->client_month);} ?>>June</option>
												  	<option value="july" <?php if ($this->uri->segment(3) != "") { dropDownValue("july",$nclex[0]->client_month);} ?>>July</option>
												  	<option value="august" <?php if ($this->uri->segment(3) != "") { dropDownValue("august",$nclex[0]->client_month);} ?>>August</option>
												  	<option value="september" <?php if ($this->uri->segment(3) != "") { dropDownValue("september",$nclex[0]->client_month);} ?>>September</option>
												  	<option value="october" <?php if ($this->uri->segment(3) != "") { dropDownValue("october",$nclex[0]->client_month);} ?>>October</option>
												  	<option value="november" <?php if ($this->uri->segment(3) != "") { dropDownValue("november",$nclex[0]->client_month);} ?>>November</option>
												  	<option value="december" <?php if ($this->uri->segment(3) != "") { dropDownValue("december",$nclex[0]->client_month);} ?>>December</option>
												</select>
											    <span class="label-custom input-group-addon-new">Year</span>
											    <input type="text" class="form-control form-control-new" id="year" placeholder="End" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_yearapplied;}?>"/>
											</div>
										</div>
										<div class="form-group">
											<label for="gender">J1 Type</label>
											<select class="selectpicker form-control" id="j1_type">
												<option value="">Select</option>
											  	<option value="intern" <?php if ($this->uri->segment(3) != "") { dropDownValue("intern",$nclex[0]->j1_type);} ?>>Intern</option>
											  	<option value="trainee" <?php if ($this->uri->segment(3) != "") { dropDownValue("trainee",$nclex[0]->j1_type);} ?>>Trainee</option>
											</select>
										</div>
										<div class="form-group">
										     <?php
													function checkedValue($value1,$value2) {
														if (ucwords($value1) == ucwords($value2)) {
														echo "checked";
														} else {
															echo "unchecked";
														}
													}
												?>
									        <label class="col-sm-12 control-label">Where did you know about our company ?</label>
									        <div class="col-sm-12">
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="friend" checked <?php if ($this->uri->segment(3) != "") { checkedValue("friend",$nclex[0]->client_company);} ?>> Friend </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="Poster,Flyers,Etc" <?php if ($this->uri->segment(3) != "") { checkedValue("poster,flyers,etc",$nclex[0]->client_company);} ?>> Poster,Flyers,Etc </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="Facebook" <?php if ($this->uri->segment(3) != "") { checkedValue("facebook",$nclex[0]->client_company);} ?>> Facebook </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="Online Website" <?php if ($this->uri->segment(3) != "") { checkedValue("online website",$nclex[0]->client_company);} ?>> Online Website </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" class="company" value="Walkin" <?php if ($this->uri->segment(3) != "") { checkedValue("walkin",$nclex[0]->client_company);} ?>> Walkin </label>
									            </div>
									            <div class="radio">
									                <label> <input type="radio" name="radio" id="referred" value="Referred By" <?php if ($this->uri->segment(3) != "" && $nclex[0]->client_referredby != "") {echo "checked";}else {echo "unchecked";}?>> Reffered By
									                	<input type="text" class="form-control" id="referred_by_input" name="" value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_referredby;}?>"
														<?php if ($this->uri->segment(3) != "" && $nclex[0]->client_referredby != "") {echo "";}else {echo "disabled";}?>>
									                </label>
									            </div>
									        </div>
									    </div>
										<div class="form-group">
											<label for ="description"> Remarks</label>
											<textarea  class="form-control" id="message" placeholder="Enter your message"><?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_remarks;}?></textarea>
										</div>
										<div class="form-group">
											<label for ="form #"> Form #</label>
											<input  class="form-control" id="formno" placeholder="Enter your form no." value="<?php if ($this->uri->segment(3) != "") {echo $nclex[0]->client_formno;}?>">
										</div>													
									</div>									
								</div>
								<div class="col-sm-12 custom-save-button-container">
								    <?php 
									   if ($this->uri->segment(3) != "") {
										   ?>
										   <button type="button" class="btn btn-primary btn-lg" id="nclex_update" style="font-size:1.8;width: 9rem;"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Update</button>
										   <?php 
									   } else {
									?>
									       <button type="button" class="btn btn-primary btn-lg" id="nlex_save" style="font-size:1.8;width: 9rem;"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Save</button>
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
