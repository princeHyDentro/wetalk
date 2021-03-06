<?php
$is_logged_in = $this->session->userdata('is_logged_in'); 
?>
<style type="text/css" media="screen">
    .divider1 {
    height: 1px;
    overflow: hidden;
    background-color: #e0e0e0;
}
.side-nav .collapsible-body li a, .side-nav.fixed .collapsible-body li a {
    padding: 0px 25.5px 0 84px;
}
side-nav .user-view, .side-nav .userView {
    position: relative;
    padding: 0px 0px 0 !important;
    margin-bottom: 8px;
}
li{
    border-bottom: 1px solid #efefef;
}
nav .button-collapse{
    height: auto;
}
.patreon-ad {
    position: fixed;
    left: 0;
    bottom: 0;
    height: 45px;
    width: 299px;
    background-color: #fff;
    z-index: 1000;
    border-top: 1px solid rgba(0,0,0,0.14);
}

</style>
<?php
// echo "<pre>";
// print_r($is_logged_in);
?>
<header>
    <div class="navbar-fixed">
        <nav class="top-nav">
            <div class="container">
                <div class="nav-wrapper">
                	<a href="<?php echo base_url('dashboard') ?>" class="page-title">
                    	<img  src="<?php echo base_url('assets/logo/logo2.png'); ?>" style="height: 56px;margin-top: 5px;" alt="" class="responsive-img valign profile-image-login">
                	</a>

                    <ul class="right hide-on-med-and-down">
                        <?php if($is_logged_in['user_rights'] != 'applicant'): ?>
                        <li>
                            <a href="#" data-beloworigin="true" data-constrainwidth="false" data-activates='chat-out' class="waves-effect waves-light dropdown-button">
                                <i class="material-icons">notifications</i>
                                <div class="notification"></div>
                            </a>
                            <ul id="chat-out" class="dropdown-content notification-content notify-collection" style="white-space: initial; opacity: 1; left: 715.141px; position: absolute; top: 65px;">
                               
                            </ul>
                        </li>
                        <?php endif; ?>

                       	<li style="border-bottom: 1px solid #00897b;border-bottom: none;">

                       		<?php if($is_logged_in['profile']):?>
                       			 <a href="#" class="waves-effect waves-light dropdown-button" data-beloworigin="true" data-constrainwidth="false" data-activates="top-nav-user-menu"><img class="circle" src="<?php echo base_url('assets/profile_picture/').''.$is_logged_in['profile']; ?>"> </a> 
							<?php else:?>
								<a href="#" class="waves-effect waves-light dropdown-button" data-beloworigin="true" data-constrainwidth="false" data-activates="top-nav-user-menu"><img class="circle" src="<?php echo base_url('assets/logo/myAvatar.png'); ?>"> </a> 
							<?php endif;?>

                          	<span class="white-text email" style="font-size: medium;">Welcome : <?php echo $is_logged_in['user_full_name']; ?></span>
                        </li>
                    </ul>
                    <ul class="left show-on-medium-and-down hide-on-med-and-up">
                        <li>
                            <a href="#"  data-activates="slide-out" class="side-nav-collapse  top-nav full btn-floating btn-medium accent-2 lighten-2"><i class="material-icons">format_align_left</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- HORIZONTAL NAV FOR DESKTOP -->
    <header>
        <ul id="left-side-nav" class="side-nav hide-on-med-and-down" style="transform: translateX(0px);">
            <li <?php echo ($this->uri->segment(1) == "profile") ? 'class=active' : ''; ?>>
                <a href="<?php echo base_url('profile'); ?>"><i class="material-icons">face</i>Profile</a>
            </li>

            <li>
                <a href="<?php echo base_url('dashboard'); ?>"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>

            <li><a href="#!"><i class="material-icons">desktop_windows</i> Monitoring</a> </li>
           
           <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "ticket") ? 'active' : ''; ?>"><i class="material-icons">assignment</i>Tickets <i class="material-icons right">arrow_drop_down</i> <span class="new badge new-notification-admin" style="float: right;">0</span></a>
                        <div class="collapsible-body">
                            <ul>
                                <li <?php echo ($this->uri->segment(2) == "pending_tickets") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('ticket/pending_tickets'); ?>">Pending Tickets <span class="new badge new-notification-admin" style="float: right;">0</span></a> </li>
                                <li <?php echo ($this->uri->segment(2) == "completed_tickets") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('ticket/completed_tickets'); ?>">Completed Tickets</a> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>

            <li>
                <ul class="collapsible collapsible-accordion">
                    <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "registration") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Staff<i class="material-icons right">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li <?php echo ($this->uri->segment(2) == "create_staff") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('registration/create_staff'); ?>">Create Staff</a> </li>
                                <li <?php echo ($this->uri->segment(2) == "view_staff") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('registration/view_staff'); ?>">View Staff</a> </li>
                                <li <?php echo ($this->uri->segment(2) == "deleted_staff") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('registration/deleted_staff'); ?>">View Deleted Staff </a> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($is_logged_in['user_rights'] == 'super'): ?>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "services") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Services<i class="material-icons right">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                	<a href="<?php  echo base_url('services'); ?>">Create a Services</a> </li>
                                <li <?php echo ($this->uri->segment(2) == "view_services") ? 'class=active' : ''; ?>>
                                	<a href="<?php  echo base_url('services/view_services'); ?>">View Services</a></li>
                                <li <?php echo ($this->uri->segment(2) == "deleted_services") ? 'class=active' : ''; ?>>
                                	<a href="<?php  echo base_url('services/deleted_services'); ?>">View Deleted Services</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
            
            <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>
                <li>
						
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "applicant") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "enrolled_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('applicant/enrolled_applicants'); ?>">Enrolled Applicant</a> </li>
                                    <li <?php echo ($this->uri->segment(2) == "inquire_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('applicant/inquire_applicants'); ?>">Inquire Applicant</a> </li>
                                    <li <?php echo ($this->uri->segment(2) == "deleted_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('applicant/deleted_applicants'); ?>">Deleted Applicant</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <!-- FOR ENCODER TAB -->
            <?php if( $is_logged_in['user_rights'] === 'encoder'): ?>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "ticket") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Tickets<i class="material-icons right">arrow_drop_down</i>  <span class="new badge new-notification-encoder"  data-badge-caption="Pending" style="float: right;">0</span></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "encoder_pending_tickets") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('ticket/encoder_pending_tickets'); ?>">Pending Tickets</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "encoder") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "enrolled_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('encoder/enrolled_applicants'); ?>">View Enrolled Applicants</a> </li>
                                    <li <?php echo ($this->uri->segment(2) == "inquire_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('encoder/inquire_applicants'); ?>">View Inquire Applicants</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <!--END FOR ENCODER TAB -->

             <?php if( $is_logged_in['user_rights'] === 'sales'): ?>
            <!--FOR SALES TAB -->
            <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "sales_ticket") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Tickets<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "create_enroll_applicant_ticket") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('sales_ticket/create_enroll_applicant_ticket'); ?>">Enroll Applicant</a></li>
                                    <li <?php echo ($this->uri->segment(2) == "create_inquire_applicant") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('sales_ticket/create_inquire_applicant'); ?>">Inquire Applicant</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "sales") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i> 
                            <span class="new badge main-notification-span" data-badge-caption="notification(s)" style="float: right;">0</span></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "view_enrolled_applicant") ? 'class=active' : ''; ?>>
                                        <a class="collapsible-header padding-32" href="<?php  echo base_url('sales/view_enrolled_applicant'); ?>">
                                            <i class="material-icons"></i>
                                            View Enrolled Applicants
                                            <span class="new badge enroll-notification-span" style="float: right;">0</span>
                                        </a>
                                    </li>
                                    <li <?php echo ($this->uri->segment(2) == "view_inquire_applicant") ? 'class=active' : ''; ?>>
                                        <a class="collapsible-header padding-32" href="<?php  echo base_url('sales/view_inquire_applicant'); ?>">
                                            <i class="material-icons"></i>
                                            View Inquire Applicants
                                            <span class="new badge inquire-notification-span" style="float: right;">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <li>
                <a href="#resetPassword" class="modal-trigger"><i class="material-icons">settings</i>Reset Password</a>
            </li>
            <li>
                <a href="#exampleModal" class="modal-trigger"><i class="material-icons">keyboard_tab</i>Log Out</a>
            </li>
    </ul>


    <!-- SIDE NAV FOR MOBILE -->
    <ul id="slide-out" class="side-nav">
    	 <li <?php echo ($this->uri->segment(1) == "profile") ? 'class=active' : ''; ?>>
                <a href="<?php echo base_url('profile'); ?>"><i class="material-icons">face</i>Profile</a>
            </li>

            <li>
                <a href="<?php echo base_url('dashboard'); ?>"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>

            <li><a href="#!"><i class="material-icons">desktop_windows</i> Monitoring</a> </li>
           
           <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "ticket") ? 'active' : ''; ?>"><i class="material-icons">assignment</i>Tickets <i class="material-icons right">arrow_drop_down</i> <span class="new badge new-notification-admin" style="float: right;">0</span></a>
                        <div class="collapsible-body">
                            <ul>
                                <li <?php echo ($this->uri->segment(2) == "pending_tickets") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('ticket/pending_tickets'); ?>">Pending Tickets <span class="new badge new-notification-admin" style="float: right;">0</span></a> </li>
                                <li <?php echo ($this->uri->segment(2) == "completed_tickets") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('ticket/completed_tickets'); ?>">Completed Tickets</a> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>

            <li>
                <ul class="collapsible collapsible-accordion">
                    <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "registration") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Staff<i class="material-icons right">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li <?php echo ($this->uri->segment(2) == "create_staff") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('registration/create_staff'); ?>">Create Staff</a> </li>
                                <li <?php echo ($this->uri->segment(2) == "view_staff") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('registration/view_staff'); ?>">View Staff</a> </li>
                                <li <?php echo ($this->uri->segment(2) == "deleted_staff") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('registration/deleted_staff'); ?>">View Deleted Staff </a> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if($is_logged_in['user_rights'] == 'super'): ?>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "services") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Services<i class="material-icons right">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                	<a href="<?php  echo base_url('services'); ?>">Create a Services</a> </li>
                                <li <?php echo ($this->uri->segment(2) == "view_services") ? 'class=active' : ''; ?>>
                                	<a href="<?php  echo base_url('services/view_services'); ?>">View Services</a></li>
                                <li <?php echo ($this->uri->segment(2) == "deleted_services") ? 'class=active' : ''; ?>>
                                	<a href="<?php  echo base_url('services/deleted_services'); ?>">View Deleted Services</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
            
            <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>
                <li>
						
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "applicant") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "enrolled_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('applicant/enrolled_applicants'); ?>">Enrolled Applicant</a> </li>
                                    <li <?php echo ($this->uri->segment(2) == "inquire_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('applicant/inquire_applicants'); ?>">Inquire Applicant</a> </li>
                                    <li <?php echo ($this->uri->segment(2) == "deleted_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('applicant/deleted_applicants'); ?>">Deleted Applicant</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <!-- FOR ENCODER TAB -->
            <?php if( $is_logged_in['user_rights'] === 'encoder'): ?>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "ticket") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Tickets<i class="material-icons right">arrow_drop_down</i>  <span class="new badge new-notification-encoder"  data-badge-caption="Pending" style="float: right;">0</span></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "encoder_pending_tickets") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('ticket/encoder_pending_tickets'); ?>">Pending Tickets</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "encoder") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "enrolled_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('encoder/enrolled_applicants'); ?>">View Enrolled Applicants</a> </li>
                                    <li <?php echo ($this->uri->segment(2) == "inquire_applicants") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('encoder/inquire_applicants'); ?>">View Inquire Applicants</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <!--END FOR ENCODER TAB -->

             <?php if( $is_logged_in['user_rights'] === 'sales'): ?>
            <!--FOR SALES TAB -->
            <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "sales_ticket") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Tickets<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "create_enroll_applicant_ticket") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('sales_ticket/create_enroll_applicant_ticket'); ?>">Enroll Applicant</a></li>
                                    <li <?php echo ($this->uri->segment(2) == "create_inquire_applicant") ? 'class=active' : ''; ?>><a href="<?php  echo base_url('sales_ticket/create_inquire_applicant'); ?>">Inquire Applicant</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32 <?php echo ($this->uri->segment(1) == "sales") ? 'active' : ''; ?>"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i> 
                            <span class="new badge main-notification-span" data-badge-caption="notification(s)" style="float: right;">0</span></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li <?php echo ($this->uri->segment(2) == "view_enrolled_applicant") ? 'class=active' : ''; ?>>
                                        <a class="collapsible-header padding-32" href="<?php  echo base_url('sales/view_enrolled_applicant'); ?>">
                                            <i class="material-icons"></i>
                                            View Enrolled Applicants
                                            <span class="new badge enroll-notification-span" style="float: right;">0</span>
                                        </a>
                                    </li>
                                    <li <?php echo ($this->uri->segment(2) == "view_inquire_applicant") ? 'class=active' : ''; ?>>
                                        <a class="collapsible-header padding-32" href="<?php  echo base_url('sales/view_inquire_applicant'); ?>">
                                            <i class="material-icons"></i>
                                            View Inquire Applicants
                                            <span class="new badge inquire-notification-span" style="float: right;">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

            <li>
                <a href="#resetPassword" class="modal-trigger"><i class="material-icons">settings</i>Reset Password</a>
            </li>
            <li>
                <a href="#exampleModal" class="modal-trigger"><i class="material-icons">keyboard_tab</i>Log Out</a>
            </li>
        
    </ul>

		<!--<div class="patreon-ad">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div> -->
    </header>
    
    
    <!-- END SIDE NAV FOR MOBILE -->



