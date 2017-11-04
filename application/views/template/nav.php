<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<a class="navbar-brand" href="index.html">TLC Wetalk INC</a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
		  <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
			<i class="fa fa-fw fa-dashboard"></i>
			<span class="nav-link-text">Dashboard</span>
		  </a>
		</li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
		  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
			<i class="fa fa-fw fa-exchange"></i>
			<span class="nav-link-text">J-1 Culture Exchange</span>
		  </a>
		  

		  <ul class="sidenav-second-level collapse" id="collapseComponents">
			<li>    
			  <a href="<?php echo base_url('J1_exchange_culture/create_new_applicant'); ?>"><i class="fa fa-fw fa-users"></i> Create New Applicant</a>
			</li>
			<li>
			  <a href="<?php echo base_url('J1_exchange_culture/view_all_applicant'); ?>"><i class="fa fa-fw fa-eye"></i> View Application</a>
			</li>
			 <li>
			  <a href="cards.html"><i class="fa fa-fw fa-flag"></i> Reports</a>
			</li>
		  </ul>
		</li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
		  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
			<i class="fa fa-fw fa-file"></i>
			<span class="nav-link-text">Korean Basic Language</span>
		  </a>
		  <ul class="sidenav-second-level collapse" id="collapseExamplePages">
			<li>       
				
			  	<a href="<?php echo base_url('kbl/create_new_applicant'); ?>"><i class="fa fa-fw fa-users"></i> Create New Applicant</a>
			</li>
			<li>
			  <a href="<?php echo base_url('kbl/view_all_applicant'); ?>"><i class="fa fa-fw fa-eye"></i> View Application</a>
			</li>
			 <li>
			  <a href="cards.html"><i class="fa fa-fw fa-flag"></i> Reports</a>
			</li>
		  </ul>
		</li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
		  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
			<i class="fa fa-fw fa-sitemap"></i>
			<span class="nav-link-text">NCLEX</span>
		  </a>
		  <ul class="sidenav-second-level collapse" id="collapseMulti">
			<li>    

			  <a href="<?php echo base_url('nclex/create_new_applicant'); ?>"><i class="fa fa-fw fa-users"></i> Create New Applicant</a>
			</li>
			<li>
			  <a href="<?php echo base_url('nclex/view_all_applicant'); ?>"><i class="fa fa-fw fa-eye"></i> View Application</a>
			</li>
			 <li>
			  <a href="cards.html"><i class="fa fa-fw fa-flag"></i> Reports</a>
			</li>
		  </ul>
		</li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
		  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti1" data-parent="#exampleReg">
			<i class="fa fa-fw fa-registered"></i>
			<span class="nav-link-text">Employee</span>
		  </a>
		  <ul class="sidenav-second-level collapse" id="collapseMulti1">
			<li>
			  <a href="cards.html"><i class="fa fa-fw fa-users"></i> Add new employee</a>
			</li>
			<li>
			  <a href="cards.html"><i class="fa fa-fw fa-eye"></i> View employees</a>
			</li>
			<li>
			  <a href="cards.html"><i class="fa fa-fw fa-flag"></i> Reports</a>
			</li>
		  </ul>
		</li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
		  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" data-parent="#exampleAccordion">
			<i class="fa fa-fw fa-link"></i>
			<span class="nav-link-text">Profile</span>
		  </a>
		  <ul class="sidenav-second-level collapse" id="collapseMulti2">
			<li>
			  <a href="cards.html"><i class="fa fa-fw fa-users"></i> View Profile</a>
			</li>
			<li>
			  <a href="cards.html"><i class="fa fa-fw fa-eye"></i> Activity Logs</a>
			</li>
			<li>
			  <a href="cards.html"><i class="fa fa-fw fa-flag"></i> History</a>
			</li>
		  </ul>
		</li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
		  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3" data-parent="#exampleAccordion">
			<i class="fa fa-fw fa-link"></i>
			<span class="nav-link-text">Messenger</span>
		  </a>
		  <ul class="sidenav-second-level collapse" id="collapseMulti3">
			<li>
			  <a href="cards.html"><i class="fa fa-fw fa-users"></i> Inbox</a>
			</li>
			<li>
			  <a href="cards.html"><i class="fa fa-fw fa-eye"></i> Archive</a>
			</li>
		  </ul>
		</li>
	  </ul>
	  <ul class="navbar-nav sidenav-toggler">
		<li class="nav-item">
		  <a class="nav-link text-center" id="sidenavToggler">
			<i class="fa fa-fw fa-angle-left"></i>
		  </a>
		</li>
	  </ul>
	  <ul class="navbar-nav ml-auto">
		<li class="nav-item">
		  <form class="form-inline my-2 my-lg-0 mr-lg-2">
			<div class="input-group">
			 <!--  <input class="form-control" type="text" placeholder="Search for..."> -->
			  <span class="input-group-btn">
			  		
				<!-- <button class="btn btn-primary" type="button">
				  <i class="fa fa-search"></i>
				</button> -->
			  </span>
			</div>
		  </form>
		</li>
		<li class="nav-item">
		  <span class="nav-link" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-fw fa-user-circle-o"></i>
			<?php 
				$is_logged_in = $this->session->userdata('is_logged_in');

				if($is_logged_in['user_rights'] == "Admin"){
					echo "Logged as: Administrator";
				}else{
					echo "Logged as: TLC Employee";
				}
			?>
			  	</span>
		</li>
		<li class="nav-item breadcrumb-item">
		  <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-fw fa-sign-out"></i>Logout</a>
		</li>
	  </ul>
	</div>
  </nav>