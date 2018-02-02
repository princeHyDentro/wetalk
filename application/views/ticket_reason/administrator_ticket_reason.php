<style type="text/css" media="screen">
    .search-icon{
        position           : absolute;
        padding-top        : 9px;
        text-decoration    : none;
        color              : #fff;
        background-color   : #26a69a;
        text-align         : center;
        letter-spacing     : .5px;
        -webkit-transition : .2s ease-out;
        transition         : .2s ease-out;
        cursor             : pointer;
        padding-left       : 5px;
        padding-bottom     : 7px;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }   
    .filter{
        margin-left        : 30px;
    }
    th{
        width: auto !important;
    }
    .dataTables_filter{
        display: none !important;
    }
    /* bootstrap dropdown button */
    .grouped-button{
        position: relative;
        display: inline-block;
        vertical-align: middle;
    }

    .grouped-button>.btn:first-child {
        margin-left: 0;
    }
    .grouped-button>.button {
        position: relative;
        float: left;
    }

    .button{
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .button-default{
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }
    .grouped-button>.button+.dropdown-toggle {
        padding-right: 8px;
        padding-left: 8px;
    }
    .grouped-button>.button:first-child:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .grouped-button>.button:last-child:not(:first-child), .grouped-button>.dropdown-toggle:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .grouped-button .button+.button, .grouped-button .button+.grouped-button, .grouped-button .grouped-button+.button, .grouped-button .grouped-button+.grouped-button {
        margin-left: -1px;
    }
    .button .caret {
        margin-left: 0;
    }

    .button-dropdown-menu{
        position: absolute;
        top: 100%;
        right: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 14px;
        text-align: left;
        list-style: none;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0,0,0,.15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
    }

    .button-dropdown-menu>li>a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: 400;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
    }
    .button-dropdown-menu .divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
    }
    .caret > .material-icons{
        font-size: 18px !important;
    }
    .open>.button-dropdown-menu {
        display: block;
    }
    .button{
        outline: none;
        background-color: #fff !important;
    }
    .error{
        font-style: oblique;
        color: red;
    }
</style>

<?php require_once(realpath(APPPATH.'views/template/head_left_nav.php')); ?>
<?php $is_logged_in = $this->session->userdata('is_logged_in');?>
<main>
    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col s12">
                <div class="panel panel-default">
                    <ul class="collapsible collapsible-accordion" data-collapsible="expandable">
                        <li class="active">
                            <div class="collapsible-header teal white-text task-list-data active">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span>Ticket Complete Information</span>
                            </div>
                           <?php
								// echo "<pre>";
								// print_r($reason);
								// echo "</pre>";
							?>
                            <div class="collapsible-body teal lighten-5">
                                <ul class="collection">
                                    <li>
                                        <form class="formValidate" id="formValidate" method="get" action="">

                                            <div class="row">
                                                <div class="input-field col s12 has-error">
                                                  
                                                    <label style="font-size: 1.4rem;" for="requestor_name">Ticket #  :</label>
                                                    <input class="validate" value="<?php echo $reason['reason']['ticket_id'] ; ?>" id="requestor_name" name="requestor_name" placeholder="applicant name" type="text" data-error=".errorTxt1" disabled/>
                                                </div>

                                                <div class="input-field col s12 has-error">
                                                    <label style="font-size: 1.4rem;" for="requestor_name">Approval Type :</label>
                                                    <input class="validate" value="<?php echo $reason['reason']['approval_type']; ?>" id="requestor_name" name="requestor_name" placeholder="applicant name" type="text" data-error=".errorTxt1" disabled/> 
                                                </div>
											
                                                <div class="input-field col s12 has-error">
                                                    <label style="font-size: 1.4rem;" for="requestor_name">Applicant to be <?php echo $reason['reason']['request_for_type'];?>d :</label>
                                                    <input class="validate" value="<?php echo $reason['applicant']['name']; ?>" id="requestor_name" name="requestor_name" placeholder="applicant name" type="text" data-error=".errorTxt1" disabled/>
                                                </div>
                                
                                                <div class="input-field col s12 has-error">
                                                    <label style="font-size: 1.1rem;" for="requestor_name">Administrator reason :</label>
                                                    <br>
                                                    <p name="" disabled=""><?php echo $reason['reason']['approval_text']; ?></p>
                                                </div>

                                            </div>

                                            <div class="row">
                                            	<?php if($reason['applicant']['status'] == 'Enrolled'): ?>
	                                                <div class="input-field col s12">
	                                                   <a href="<?php echo base_url('encoder/enrolled_applicants'); ?>" title="" class="btn waves-effect waves-light left submit">Go To Enroll Page</a>
	                                              	</div>
												<?php else: ?>
													<div class="input-field col s12">
	                                                   <a href="<?php echo base_url('encoder/inquire_applicants'); ?>" title="" class="btn waves-effect waves-light left submit">Go To Inquire Page</a>
	                                              	</div>
												<?php endif; ?>
                                          </div>
                                      </form>
                                    </li> 
                                </ul>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>
<script src="<?php echo base_url('assets/js/jquery.validate-1-17-0.js'); ?>"></script>

