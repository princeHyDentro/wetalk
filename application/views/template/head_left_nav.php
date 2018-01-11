<?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>

<?php
// echo "<pre>";
// print_r($is_logged_in);
// echo "</pre>";
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
</style>
<header>
    <div class="navbar-fixed">
        <nav class="top-nav teal darken-1">
            <div class="container">
                <div class="nav-wrapper"> <a href="<?php echo base_url('dashboard') ?>" class="page-title">
                    <img src="<?php echo base_url('assets/logo/logo2.png'); ?>" style="width: 22%;" alt="" class="responsive-img valign profile-image-login"></a>
                    <ul class="right hide-on-med-and-down">
                       <!--  <li>
                            <a href="#" class="waves-effect waves-light"> <i class="material-icons">notifications</i>
                                <div class="notification"></div>
                            </a>
                        </li> -->
                        <li style="border-bottom: 1px solid #00897b;border-bottom: none;">
                           <span class="material-icons">person_pin</span> <span class="white-text email" style="font-size: medium;">Welcome : <?php echo $is_logged_in['user_full_name']; ?></span>
                            <!-- <a href="#" class="waves-effect waves-light"> <i class="material-icons">mail</i>
                                <div class="notification"></div>
                            </a> -->
                        </li>
                        <li>
                            <!-- <a href="#" class="waves-effect waves-light dropdown-button" data-beloworigin="true" data-constrainwidth="false" data-activates="top-nav-user-menu"><img class="circle" src="http://i.pravatar.cc/300"> </a>
                            <ul id="top-nav-user-menu" class="dropdown-content">
                                <li><a href="#!"><i class="material-icons">face</i>Profile</a> </li>
                                <li><a href="#resetPassword" class="modal-trigger"><i class="material-icons">settings</i>Pass Reset</a> </li>
                                <li class="divider"><?php echo $is_logged_in['user_full_name']; ?></li>
                                <li><a href="#exampleModal" class="modal-trigger"><i class="material-icons">keyboard_tab</i>Log Out</a> </li>
                            </ul> -->
                        </li>
                    </ul>
                    <!-- <ul class="left show-on-medium-and-down hide-on-med-and-up">
                        <li><a href="#" id="mobile-side-nav-btn" data-activates="left-side-nav" class="side-nav-collapse top-nav full btn-floating btn-medium accent-2 lighten-2"><i class="material-icons">format_align_left</i></a> </li>
                    </ul> -->
                </div>
            </div>
        </nav>

        <!-- HORIZONTAL NAV FOR DESKTOP -->
        <ul id="left-side-nav" class="side-nav white hide-on-med-and-down" style="transform: translateX(0px);">
                <!-- <li>
                    <div class="user-view">
                        <div class="background"> <img src="http://i.pravatar.cc/300"> </div>
                        <div class="row">
                            <div class="col s4"> <img class="circle" src="http://i.pravatar.cc/300"> </div>
                            <div class="col s8">
                                <a href="#." class="dropdown-button white-text waves-effect waves-light user-btn">
                                    <span></span> 
                                    <i class="material-icons">arrow_drop_down_circle</i> </a>
                                <ul id="user-menu" class="dropdown-content">
                                    <li><a href="#!"><i class="material-icons">face</i>Profile</a> </li>
                                    <li><a href="#!"><i class="material-icons">settings</i>Pass Reset</a> </li>
                                    <li class="divider"></li>
                                    <li><a href="#exampleModal" class="modal-trigger"><i class="material-icons">keyboard_tab</i>Log Out</a> </li>
                                </ul>
                                <span class="white-text email"><?php echo $is_logged_in['user_full_name']; ?></span>
                            </div>
                    </div>
                </li> -->
                <li>
                    <a href="#"><i class="material-icons">face</i>Profile</a>
                </li>

                <li>
                    <a href="<?php echo base_url('dashboard'); ?>"><i class="material-icons">dashboard</i>Dashboard</a>
                </li>

                <li><a href="#!"><i class="material-icons">desktop_windows</i> Monitoring</a> </li>
               
               <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32"><i class="material-icons">assignment</i>Tickets<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php  echo base_url('ticket/pending_tickets'); ?>">Pending Tickets</a> </li>
                                    <li><a href="<?php  echo base_url('ticket/completed_tickets'); ?>">Completed Tickets</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>

                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Staff<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php  echo base_url('registration/create_staff'); ?>">Create Staff</a> </li>
                                    <li><a href="<?php  echo base_url('registration/view_staff'); ?>">View Staff</a> </li>
                                    <li><a href="<?php  echo base_url('registration/deleted_staff'); ?>">View Deleted Staff </a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($is_logged_in['user_rights'] == 'super'): ?>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Services<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php  echo base_url('services'); ?>">Create a Services</a> </li>
                                    <li><a href="<?php  echo base_url('services/view_services'); ?>">View Services</a></li>
                                    <li><a href="<?php  echo base_url('services/deleted_services'); ?>">View Deleted Services</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php if($is_logged_in['user_rights'] == 'super' || $is_logged_in['user_rights'] == 'office-admin'): ?>
                    <li>
                        <ul class="collapsible collapsible-accordion">
                            <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php  echo base_url('applicant/enrolled_applicants'); ?>">Enrolled Applicant</a> </li>
                                        <li><a href="<?php  echo base_url('applicant/inquire_applicants'); ?>">Inquire Applicant</a> </li>
                                        <li><a href="<?php  echo base_url('applicant/deleted_applicants'); ?>">Deleted Applicant</a> </li>
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
                            <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Tickets<i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="#">Pending Tickets</a> </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="collapsible collapsible-accordion">
                            <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="#!">View Enrolled Applicants</a> </li>
                                        <li><a href="#!">View Inquire Applicants</a> </li>
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
                            <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Tickets<i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="#">Create Iquire Applicant</a> </li>
                                        <li><a href="#">Create Enroll Applicant</a> </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="collapsible collapsible-accordion">
                            <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Applicant<i class="material-icons right">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="#!">View Enrolled Applicants</a> </li>
                                        <li><a href="#!">View Inquire Applicants</a> </li>
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
            <!--END HORIZONTAL NAV FOR DESKTOP -->
        </div>
    </header>

