<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!--navigator-->
	<?php require_once(APPPATH."views/template/nav.php"); ?>

	<div class="content-wrapper">
	    <input type="hidden" id="client_id" value="<?php if ($this->uri->segment(3) != "") {echo $this->uri->segment(3);}?>">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">KBL Applicant's Entry</li>
				<li class="breadcrumb-item active">Create New Applicant</li>
			</ol>
			<!-- <div class="row"> -->
				<!-- <div class="col-12"> -->
						<section id="contact">
							<div class="section-content">
								<h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">KBL Applicant's Entry</span></h1>
								<!-- <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3> -->
								<div class="container">
					
                                <?php 
								  if ($this->uri->segment(3) != "") {
									  ?>
									    <input type="hidden" id="pic_id" value="<?php echo $picture[0]->pic_id;?>">
									    <form enctype="multipart/form-data" id="kbl_update">
									  <?php
								  } else {
							     ?>
								      <form enctype="multipart/form-data" id="kbl_create">
								  <?php } ?>			
									<center>
										<div style="width: 243px;"> 
											<label for="exampleInputUsername">2x2 Photo / Passport Photo</label>
											<img id="blah" src="<?php if ($this->uri->segment(3) != "") {if (count($picture) != 0) {echo base_url()."upload/".$picture[0]->pic_path;}}?>" alt="your image" class="form-control" style="height: 14rem;"  />
											<label class="btn-bs-file btn btn-lg btn-success" style="padding: 3px 33px;font-size: 20px;line-height: 1.45;border-radius: 6px;margin-top: 10px;margin-bottom: -2rem;">
												Browse <input type="file" required name="file" id="image_file" style="display: none;" 
												onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
										    </label>
										</div>
									</center>
								</div>
							</div>
							<div class="contact-section">
							<div class="col-12">
								<div class="form-container col-12">
									<div class="col-md-6 form-line col-sm-12">
										<div class="form-group">
											<label for="exampleInputUsername">Your name</label>
											<input type="text" required class="form-control" id="name" placeholder=" Enter Name" value="<?php if ($this->uri->segment(3) != ""){echo $kbl[0]->name;}?>">
										</div>
										<div class="form-group">
											<label for ="Address"> Complete Address</label>
											<textarea required  class="form-control" id="address" placeholder="Enter Your Address"><?php if ($this->uri->segment(3) != ""){echo $kbl[0]->client_address;}?></textarea>
										</div>									
										
										<div class="form-group">
											<label for="telephone">Mobile #</label>
											<input type="text" required class="form-control" id="mobile" placeholder=" Enter your mobile no." value="<?php if ($this->uri->segment(3) != ""){echo $kbl[0]->client_mobile;}?>" 
											   oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
										</div>
										<div class="form-group">
											<label for="telephone">Telephone #</label>
											<input type="text" required class="form-control" id="telephone" placeholder=" Enter your telephone no." value="<?php if ($this->uri->segment(3) != ""){echo $kbl[0]->client_contactno;}?>">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail">Email Address</label>
											<input type="email" required class="form-control" id="exampleInputEmail" placeholder=" Enter your Email" value="<?php if ($this->uri->segment(3) != ""){echo $kbl[0]->client_email;}?>">
										</div>  
										<div class="form-group">
											<div class="input-group">	
												<span class="label-custom input-group-addon-new">BirthDate</span>
								                <input type='text' required class="form-control datepicker form-control-new" id="datepicker" value="<?php if ($this->uri->segment(3) != ""){echo $kbl[0]->client_birthdate;}?>" />						                  
											    <span class="label-custom input-group-addon-new" for="age">Age</span>
												<input type="text" required class="form-control form-control-new" id="age" placeholder=" Enter your age" value="<?php if ($this->uri->segment(3) != ""){echo $kbl[0]->client_age;}?>" 
												  oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
							            	</div>
										</div>											
										<div class="form-group">
										    <?php
											   $male = "";
											   $female = "";
                                               if ($this->uri->segment(3) != "") {
												  if ($kbl[0]->gender_id == 1) {
													  $male = "selected";
													  $female = "unselected";
												  } else {
												      $female = "selected";
													  $male = "unselected";
												  }
											   }												   
											?>
											<label for="gender">Gender</label>
											<select class="selectpicker form-control" required id="gender">
												<option value="">Select</option>
											  	<option value="1" <?php echo $male; ?>>Male</option>
											  	<option value="2" <?php echo $female; ?>>Female</option>
											</select>
										</div>
										<div class="form-group">
											<label for="year graduated">Educational Attainment</label>
											<input type="text" required class="form-control" id="educational" placeholder=" Enter your educational attainment" value="<?php if ($this->uri->segment(3) != "") {echo $kbl[0]->client_educationalattainment;}?>">
										</div>
										
									</div>
									<!-- right container-->
									<div class="col-md-6 col-sm-12">			
										<div class="form-group">
											<label for="exampleInputEmail">Date Visited</label>
							                <div class='input-group date' id='datetimepicker1'>
							                    <input type='text' required id="datevisited" class="form-control" value="<?php if ($this->uri->segment(3) != "") {echo $kbl[0]->client_datevisited;}?>"/>
							                    <span class="input-group-addon">
							                        <span class="glyphicon glyphicon-calendar"></span>
							                    </span>
							                </div>
										</div>
										<div class="form-group">
											<label for="School">School</label>
											<input type="text" required class="form-control" id="school" placeholder=" Enter your school name" value="<?php if ($this->uri->segment(3) != "") {echo $kbl[0]->client_school;}?>">
										</div>	
										<div class="form-group">
											<label for="Course">Course</label>
											<input type="text" required class="form-control" id="course" placeholder=" Enter your course" value="<?php if ($this->uri->segment(3) != "") {echo $kbl[0]->client_course;}?>">
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
											<label for="gender">Purpose in Enrollment</label>
											<select class="selectpicker form-control"id="enrollment" required>
												<option value="">Select</option>
												<option value="enrolled" <?php if ($this->uri->segment(3)) { dropDownValue("enrolled",$kbl[0]->client_enrolled); }?>>Enrolled</option>
											  	<option value="inquire" <?php if ($this->uri->segment(3)) { dropDownValue("inquire",$kbl[0]->client_enrolled); }?>>Inquire</option>
											  	<option value="passed" <?php if ($this->uri->segment(3)) { dropDownValue("passed",$kbl[0]->client_enrolled); }?>>Passed</option>
											  	<option value="cancelled" <?php if ($this->uri->segment(3)) { dropDownValue("cancelled",$kbl[0]->client_enrolled); }?>>Cancelled</option>
											</select>
										</div>
										<div class="form-group">
											<label for="Course">Referral</label>
											<input type="text" required class="form-control" id="referral" placeholder=" Enter your refferal" value="<?php if ($this->uri->segment(3) != "") {echo $kbl[0]->client_referredby;}?>">
										</div>	
										<div class="form-group">
											<label for ="description"> Remarks</label>
											<textarea required  class="form-control" id="remarks" placeholder="Enter Your Message"><?php if ($this->uri->segment(3) != "") {echo $kbl[0]->client_remarks;}?></textarea>
										</div>
										<div class="form-group">
											<label for ="form #"> Form #</label>
											<input required  class="form-control" id="formno" placeholder="Enter Form No." value="<?php if ($this->uri->segment(3) != "") {echo $kbl[0]->client_formno;}?>" 
											   oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
										</div>															
									</div>									
								</div>
								<div class="col-sm-12 custom-save-button-container">
								   <?php
								      if ($this->uri->segment(3) != "") {
										  ?>
										     <button type="submit" class="btn btn-primary btn-lg" style="font-size:1.8;width: 9rem;"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Update</button>
										  <?php
									  }  else {
								   ?>
									<button type="submit" class="btn btn-primary btn-lg" style="font-size:1.8;width: 9rem;"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Save</button>
								   <?php 
									   }
								   ?>
								  </form> 
								</div>	
							</div>	
						</section>
			<!-- 	</div> -->
			<!-- </div> -->
		</div>
		<?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>
