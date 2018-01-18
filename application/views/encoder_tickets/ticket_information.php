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
                                <span class="right">Ticket # <?php echo $ticket_info[0]['id'] ?>  ||  </span>  
                                <span class="right">  Date : <?php echo $ticket_info[0]['created_at'] ?></span>
                            </div>
                            <?php 
                            // echo "<pre>";
                            // print_r($ticket_info);
                            // echo "</pre>";
                            ?>
                            <div class="collapsible-body teal lighten-5">
                                <ul class="collection">
                                    <li>
                                        <div class="row">
                                            <div class="input-field col s12">
                                              <input id="name" type="text" disabled>
                                              <label for="first_name">Sales Ref : <?php echo $ticket_info[0]['sales_name'] ?></label>
                                            </div>
                                            <div class="input-field col s12">
                                              <input id="name" type="text" disabled>
                                              <label for="first_name">Service : <?php echo $ticket_info[0]['service_name'] ?></label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input id="name" type="text" disabled>
                                                <label for="first_name">Applicant Information :</label>
                                                <?php echo $ticket_info[0]['applicant_data'] ?>
                                            </div>
                                        </div>
                                    </li> 
                                    <li>
                                        <a href="<?php echo base_url('ticket/encoder_pending_tickets'); ?> " class="btn waves-effect waves-light"><i class="material-icons">arrow_back</i> Back</a>
                                        <?php if($ticket_info[0]['status'] != 'Complete'): ?>
                                        <button class="btn waves-effect waves-light enrolled" onclick="add_person();" type="submit" name="action">Enroll Applicant <i class="material-icons">border_color</i> 
                                         <?php endif; ?>
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
<style type="text/css">
   .input-field.col label{
        font-size: 1.3rem;
   }
   .select-wrapper+label{
        top:-31px;
   }
</style>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Enroll Form</h3>
            </div>
            <div class="modal-body form">
                <form class="formValidate" id="formValidate" method="get" action="">
                    <div class="input-field col s12">
                        <?php echo $ticket_info[0]['applicant_data'] ?>
                    </div>

                    <div class="row">
                        <div class="divider"></div>
                        <div class="divider"></div>
                        <div class="divider"></div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="input-field col s6 has-error">
                            <label for="fullname">Name<i style="color:red;">*</i></label>
                            <input class="validate" id="fullname" name="name" placeholder="applicant name" type="text" data-error=".errorTxt1"/>
                            <div class="errorTxt1"></div>
                        </div>

                        <div class="input-field col s6 has-error">
                            <label for="contact">Contact<i style="color:red;">*</i></label>
                            <input class="validate" id="contact" name="contact" placeholder="contact number" type="text" data-error=".errorTxt2" />
                            <div class="errorTxt2"></div> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6 has-error">
                            <label for="address">Address<i style="color:red;">*</i></label> 
                            <input class="validate" id="address" name="address" placeholder="applicant address" type="text" data-error=".errorTxt3" />
                            <div class="errorTxt3"></div> 
                        </div>
                        <div class="input-field col s6 has-error">
                            <label for="email">Email<i style="color:red;">*</i></label>
                            <input class="validate" id="email" name="email" placeholder="applicant email address" type="email" data-error=".errorTxt4" />
                            <div class="errorTxt4"></div> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6 has-error">
                            <label for="username">Username<i style="color:red;">*</i></label>
                            <input class="validate" id="username" name="username" placeholder="applicant username" type="text" data-error=".errorTxt5" />
                            <div class="errorTxt5"></div>
                        </div>

                        <div class="input-field col s6 has-error">
                            <label for="password">Password<i style="color:red;">*</i></label>
                            <input class="validate" id="password" name="password" placeholder="applicant password" type="password" data-error=".errorTxt6">
                            <div class="errorTxt6"></div>
                        </div>
                    </div>

                        
                    <div class="row">
                        <div class="input-field col s12 has-error">
                            <input class="validate" data-id="<?php echo $ticket_info[0]['service_name'] ?>" id="service" value="" name="service" placeholder="<?php echo $ticket_info[0]['service_name'] ?>"  type="text" disabled>
                            <label>Assign Services<i style="color:red;">*</i></label>
                        </div>
                    </div>

                    <input type="hidden" data-id="<?php echo $ticket_info[0]['id'] ?>" id="ticket_id" name="ticket_id" value="" placeholder="">
                    <input type="hidden" data-id="<?php echo $ticket_info[0]['service_id'] ?>" id="service_id" name="service_id" value="" placeholder="">
                    <input type="hidden" data-id="<?php echo $ticket_info[0]['sales_id'] ?>" id="sales_id" name="sales_id" value="" placeholder="">
                    <input type="hidden" data-id="<?php echo $ticket_info[0]['sales_name'] ?>" id="sales_name" name="sales_name" value="" placeholder="">
                    <input type="hidden" data-id="<?php echo $ticket_info[0]['encoder_name'] ?>" id="encoder_name" name="encoder_name" value="" placeholder="">
                    <input type="hidden" data-id="<?php echo $ticket_info[0]['encoder_id'] ?>"  id="encoder_id" name="encoder_id" value="" placeholder="">

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                          </button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>
<script src="<?php echo base_url('assets/js/jquery.validate-1-17-0.js'); ?>"></script>

<script type="text/javascript">
$("#formValidate").validate({
    rules: {
        name: {
            required: true,
        },
        contact :{
            required: true,
        },
        email: {
            required: true,
            email:true
        },
        password: {
            required: true,
            minlength: 5
        },
        address :{
            required: true,
        },
        username :{
            required: true,
        }
    },
    //For custom messages
    messages: {
        name:{
            required: "Name field is required.",
        },
        contact:{
            required: "Contact field is required.",
        },
        email:{
            required: "Email field is required.",
        },
        password:{
            required: "Password field is required.",
        },
        address:{
            required: "Address field is required.",
        },
        username:{
            required: "Username field is required.",
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
        enroll_applicant();
    }
});

function enroll_applicant(){
    $('#btnSave').text('saving...');
    $('#btnSave').attr('disabled',true);

    url          = "<?php echo base_url('ticket/enroll_applicant'); ?>";
    
    ticket_id    = $("#ticket_id").attr('data-id');
    name         = $("#fullname").val();
    contact      = $("#contact").val();
    address      = $("#address").val();
    email        = $("#email").val();
    service      = $("#service").attr('data-id');
    username     = $("#username").val();
    password     = $("#password").val();
    service_id   = $("#service_id").attr('data-id');
    sales_id     = $("#sales_id").attr('data-id');
    sales_name   = $("#sales_name").attr('data-id');
    encoder_name = $("#encoder_name").attr('data-id');
    encoder_id   = $("#encoder_id").attr('data-id');

    $.ajax({
        url : url,
        type: "POST",
        data:{
            'ticket_id'     :ticket_id,
            'name'          : name,
            'contact'       : contact,
            'address'       : address,
            'email'         : email,
            'service'       : service,
            'username'      : username,
            'password'      : password,
            'service_id'    : service_id,
            'sales_id'      : sales_id,
            'sales_name'    : sales_name,
            'encoder_name'  : encoder_name,
            'encoder_id'    : encoder_id

        },
        success: function(data)
        {   
            if(data)
            {
                
                $('.enrolled').remove();
                $('#modal_form').modal('close');
                Materialize.toast('<i class="material-icons">notifications</i> Applicant Succesfully Added!', 3000, 'rounded')
                setTimeout(function(){ 
                    window.location = "<?php echo base_url('ticket/encoder_pending_tickets');?>";
                }, 4000);
            }

            $('#btnSave').text('save');
            $('#btnSave').attr('disabled',false);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save');
            $('#btnSave').attr('disabled',false);
        }
    });
}

function add_person()
    {
    save_method = 'add';
    var form = document.getElementById("formValidate");
    clearForm(form);
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('open'); // show bootstrap modal
    $('.modal-title').text('Enroll Applicant'); // Set Title to Bootstrap modal title
}

function clearForm(frm_elements){

    for (i = 0; i < frm_elements.length; i++)
    {
        field_type = frm_elements[i].type.toLowerCase();
        
        switch (field_type)
        {
            case "text":
            case "password":
            case "textarea":
            // case "hidden":
            case "email":
            frm_elements[i].value = "";
            break;
            case "radio":
            case "checkbox":
            if (frm_elements[i].checked)
            {
                frm_elements[i].checked = false;
            }

            break;
            case "select-one":
            case "select-multi":
            frm_elements[i].selectedIndex = -1;
            break;
            default:
            break;
        }
    }
}
</script>