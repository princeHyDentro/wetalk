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
                            <div class="collapsible-header white-text task-list-data active">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span>Request for applicant delete</span>
                            </div>
                            <div class="collapsible-body">
                                <ul class="collection">
                                    <li>
                                        <form class="formValidate" id="formValidate" method="get" action="">

                                            <div class="row">
                                                <div class="input-field col s6 has-error">
                                                    <label for="requestor_name">Requestor Name<i style="color:red;">*</i></label>
                                                    <input class="validate" value="<?php echo $is_logged_in['user_full_name']; ?>" id="requestor_name" name="requestor_name" placeholder="applicant name" type="text" data-error=".errorTxt1" disabled/>
                                                    <div class="errorTxt1"></div>

                                                    <input type="hidden" id="requestor_id" name="requestor_id" value="<?php echo $is_logged_in['user_id']; ?>" placeholder="">
                                                </div>

                                                <div class="input-field col s6 has-error">
                                                    <label for="contact">Subject by service<i style="color:red;">*</i></label>
                                                    <input class="validate" id="service" name="service" value="<?php echo $applicant[0]['service'];?>" type="text" data-error=".errorTxt2" disabled/>
                                                    <div class="errorTxt2"></div> 

                                                    <input class="validate" id="service_id" name="service_id" value="<?php echo $applicant[0]['service_id'];?>" type="hidden" />
                                                    <input class="validate" id="request_for" name="request_for" value="delete" type="hidden" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s12 has-error">
                                                    <label for="address">Description<i style="color:red;">*</i></label> 
                                                    <input class="validate" id="description" name="description" placeholder="Description" type="text" data-error=".errorTxt3" />
                                                    <div class="errorTxt3"></div> 
                                                </div>
                                                <div class="input-field col s12 has-error">
                                                    <label for="reason"> Reason why it needs to be updated<i style="color:red;">*</i></label>
                                                    <textarea  id="reason" name="reason" class="materialize-textarea"></textarea>
                                                </div>
                                            </div>
                                            <input class="" value="<?php echo $applicant[0]['id']; ?>" id="applicant_id" name="applicant_id"  type="hidden"/>
                                            <input class="" value="<?php echo $applicant[0]['name']; ?>" id="applicant_name" name="applicant_name"  type="hidden"/>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit
                                                      <i class="mdi-content-send right"></i>
                                                  </button>
                                                   <a href="<?php echo base_url('encoder/enrolled_applicants'); ?>" title="" class="btn waves-effect waves-light left submit">Back</a>
                                              </div>
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


<script type="text/javascript">
$("#formValidate").validate({
    rules: {
        reason: {
            required: true,
        },
        description: {
            required: true,
        },
    },
    //For custom messages
    messages: {
        reason:{
            required: "Reason field is required.",
        },
        description:{
            required: "Description field is required.",
        },
    },
    errorElement : 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error)
        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function(form) {
        submit_update_ticket();
        
    }
});

function submit_update_ticket(){
   
    url             = "<?php echo base_url('ticket/submit_ticket_to_admin'); ?>";
    requestor_name  = $("#requestor_name").val();
    requestor_id    = $("#requestor_id").val();
    service_name    = $("#service").val();
    service_id      = $("#service_id").val();
    description     = $("#description").val();
    reason          = $("#reason").val();
    request_for     = $("#request_for").val();
    applicant_id    = $("#applicant_id").val();
    applicant_name  = $("#applicant_name").val();


    $.ajax({
        url : url,
        type: "POST",
        data:{
            'requestor_name' : requestor_name,
            'requestor_id'   : requestor_id,
            'service_name'   : service_name,
            'service_id'     : service_id,
            'description'    : description,
            'reason'         : reason,
            'request_for'    : request_for,
            'applicant_id'   : applicant_id,
            'applicant_name' : applicant_name
        },
        success: function(data)
        {   
            if(data)
            {
                swal({   title: "Ticket Succesfully submitted!",   
                   text: "I will close in 2 seconds.",   
                   timer: 2000,  
                   icon: "success", 
                   type: "success",
                   showConfirmButton: false 
                }).then(function() {
                    var status  = "<?php echo $applicant[0]['status'];?>";
                    if(status === 'Inquired'){
                        window.location.href = "<?php echo base_url('sales/view_inquire_applicant');?>";
                    }else{
                        window.location.href = "<?php echo base_url('sales/view_enrolled_applicant');?>";
                    }
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal({   title: "Error deleting data!",   
                 text: "I will close in 2 seconds.",   
                 timer: 2000,  
                 icon: "error", 
                 type: "error",
                 showConfirmButton: false 
            });
        }
    });
}


</script>