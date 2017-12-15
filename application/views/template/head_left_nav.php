<?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>


<header>
    <div class="navbar-fixed">
        <nav class="top-nav teal darken-1">
            <div class="container">
                <div class="nav-wrapper"> <a href="http://localhost/pmg_hr_new/public" class="page-title"><img src="<?php echo base_url('assets/logo/logo2.png'); ?>" style="width: 22%;" alt="" class="responsive-img valign profile-image-login"></a>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="#" class="waves-effect waves-light"> <i class="material-icons">notifications</i>
                                <div class="notification"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect waves-light"> <i class="material-icons">mail</i>
                                <div class="notification"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect waves-light dropdown-button" data-beloworigin="true" data-constrainwidth="false" data-activates="top-nav-user-menu"><img class="circle" src="http://i.pravatar.cc/300"> </a>
                            <ul id="top-nav-user-menu" class="dropdown-content">
                                <li><a href="#!"><i class="material-icons">face</i>Profile</a> </li>
                                <li><a href="#!"><i class="material-icons">settings</i>Settings</a> </li>
                                <li class="divider"></li>
                                <li><a href="http://localhost/pmg_hr_new/public/logout"><i class="material-icons">keyboard_tab</i>Log Out</a> </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="left show-on-medium-and-down hide-on-med-and-up">
                        <li><a href="#" id="mobile-side-nav-btn" data-activates="left-side-nav" class="side-nav-collapse top-nav full btn-floating btn-medium accent-2 lighten-2"><i class="material-icons">format_align_left</i></a> </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- HORIZONTAL NAV FOR DESKTOP -->
        <ul id="left-side-nav" class="side-nav white hide-on-med-and-down" style="transform: translateX(0px);">
            <li>
                <div class="user-view">
                    <div class="background"> <img src="http://localhost/pmg_hr_new/public/assets/img/user-view-bg.jpg"> </div>
                    <div class="row">
                        <div class="col s4"> <img class="circle" src="http://i.pravatar.cc/300"> </div>
                        <div class="col s8">
                            <a href="#." class="dropdown-button white-text waves-effect waves-light user-btn" data-beloworigin="true" data-constrainwidth="false" data-activates="user-menu"> <span></span> <i class="material-icons">arrow_drop_down_circle</i> </a>
                            <ul id="user-menu" class="dropdown-content">
                                <li><a href="#!"><i class="material-icons">face</i>Profile</a> </li>
                                <li><a href="#!"><i class="material-icons">settings</i>Settings</a> </li>
                                <li class="divider"></li>
                                <li><a href="http://localhost/pmg_hr_new/public/logout"><i class="material-icons">keyboard_tab</i>Log Out</a> </li>
                            </ul> <span class="white-text email">static_data</span> </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url('dashboard'); ?>"><i class="material-icons">dashboard</i>Dashboard</a>
                </li>

                <!-- <li><a href="<?php  echo base_url('registration/employee_registration_form'); ?>"><i class="material-icons">person</i>Employees</a> </li> -->

                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Staff<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php  echo base_url('registration/staff'); ?>">Create Staff</a> </li>
                                    <!-- <li><a href="#!">View Staff</a> </li> -->
                                    <li><a href="<?php  echo base_url('registration/deleted_staff'); ?>">Deleted Staff</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <li><a href="#!"><i class="material-icons">description</i>Policies</a> </li>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32"><i class="material-icons">folder_open</i>Directories<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#!">First</a> </li>
                                    <li><a href="#!">Second</a> </li>
                                    <li><a href="#!">Third</a> </li>
                                    <li><a href="#!">Fourth</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li> <a class="collapsible-header padding-32"><i class="material-icons">group</i>Administration<i class="material-icons right">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#!">First</a> </li>
                                    <li><a href="#!">Second</a> </li>
                                    <li><a href="#!">Third</a> </li>
                                    <li><a href="#!">Fourth</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--END HORIZONTAL NAV FOR DESKTOP -->
        </div>
    </header>

