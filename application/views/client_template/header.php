<!DOCTYPE html>
<html>
<head>
	<title>WE TALK INC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/css/flag-icon.css" rel="stylesheet">
	 <link  href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">
</head>
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<?php
$is_logged_in = $this->session->userdata('is_logged_in');

?>
<body class="w3-light-grey">
	<div class="w3-top">
		<div class="w3-bar w3-white w3-card" id="myNavbar">
			<a href="<?php echo base_url('profile'); ?>" class="w3-bar-item w3-button w3-wide">
				<!-- <img src="<?php echo base_url('assets/logo/logo2.png'); ?>"> -->
			</a>
			<!-- Right-sided navbar links -->
			<div class="w3-right w3-hide-small">
				<a href="<?php echo base_url('profile'); ?>" class="w3-bar-item w3-button">
					<i class="fa fa-fw fa-user-circle-o" aria-hidden="true"></i>
				Logged as: Benjie Caranoo</a>
				<a href="<?php echo base_url('login/logout'); ?>" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
			<!-- Hide right-floated links on small screens and replace them with a menu icon -->

			<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
	</div>
	<!-- Sidebar on small screens when clicking the menu icon -->
	<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
		<a href="<?php echo base_url('profile'); ?>" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-fw fa-user-circle-o" aria-hidden="true"></i>Logged as: Benjie Caranoo</a>
		<a href="<?php base_url('login/logout'); ?>" onclick="w3_close()" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Logout</a>

	</nav>
	<br><br>
	<div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">

                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-display-container">
                        <img src="https://www.w3schools.com/w3images/avatar_hat.jpg" style="width:100%" alt="Avatar">
                        <div class="w3-display-bottomleft w3-container w3-text-black">
                            <h2><?php echo $is_logged_in['name'] ?></h2>
                        </div>
                    </div>
                    <div class="w3-container">
                        <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>
                        <?php
                            if($is_logged_in['cl_type_id'] == 2){
                                echo "Client : Korean Basic Language";
                            }
                        ?></p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $is_logged_in['client_address'];?></p>
                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $is_logged_in['client_email']; ?></p>
                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $is_logged_in['client_contactno']; ?></p>
                        <p><i class="fa fa-mobile fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $is_logged_in['client_mobile']; ?></p>

                        <hr>
                        <p class="w3-large onclick-link" data-id="0" style="cursor: default;">
                            <i class="fa fa-inbox fa-fw w3-margin-right w3-large w3-text-teal"></i>Inbox
                        </p>
                        <p class="w3-large onclick-link" data-id="1" style="cursor: default;">
                            <i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>Unread
                        </p>
                        <p class="w3-large onclick-link"  data-id="2" style="cursor: default;">
                            <i class="fa fa-paper-plane fa-fw w3-margin-right w3-large w3-text-teal"></i>Sent
                        </p>
                        <p class="w3-large onclick-link" data-id="3" style="cursor: default;">
                            <i class="fa fa-trash-o fa-fw w3-margin-right w3-large w3-text-teal"></i>Trashed
                        </p>
                        <p class="w3-large onclick-link" data-id="4" style="cursor: default;">
                            <i class="fa fa-pencil-square-o fa-fw w3-margin-right w3-large w3-text-teal"></i>Compose
                        </p>
                        <hr>
                        <br>

                        <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
                        <p>English</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
                        </div>
                        <p>Spanish</p>
                        <div class="w3-light-grey w3-round-xlarge">
                            <div class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
                        </div>
                        <br>
                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>


