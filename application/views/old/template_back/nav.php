
<?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>
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


			<li class="nav-item"  data-toggle="tooltip" data-placement="right" title="Link">
				<a class="nav-link" href="<?php  echo base_url('registration/employee_registration_form'); ?>">
					<i class="fa fa-fw fa-users"></i>
					<span class="nav-link-text">Registration</span>
				</a>
			</li>

			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
				<a class="nav-link" data-toggle="modal" data-target="#resetPassword" href="#">
					<i class="fa fa-unlock-alt"></i>
					<span class="nav-link-text">Change Password</span>
				</a>
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
						<span class="input-group-btn">	
						</span>
					</div>
				</form>
			</li>
			<li class="nav-item">
				<span class="nav-link" data-toggle="modal" data-target="#exampleModal">
					<i class="fa fa-fw fa-user-circle-o"></i>
					<?php 
					$is_logged_in = $this->session->userdata('is_logged_in');
					echo "Logged as: ".$is_logged_in['user_name'];
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