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
.collection{
    padding-bottom: 22px;
}
.error{
    font-style: oblique;
    color: red;
}
</style>

<?php require_once(realpath(APPPATH.'views/template/head_left_nav.php')); ?>
<?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>
<main>
    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col s12">
                <div class="panel panel-default">
                    <ul class="collapsible collapsible-accordion" data-collapsible="expandable">
                        <li class="active">
                            <div class="collapsible-header white-text task-list-data active" data-id="{{ $task_group['id']}}">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span class="right">Enroll Applicant List</span>
                            </div>
                            <div class="collapsible-body" style="display: none;">
                                <ul class="collection">
                                    <li>
                                        <div class="row">
                                            <div class="input-field col s12 m12 l12 ">
                                                <label class="active"><h5>Search Field : </h5></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6 ">
                                                <input class="validate" id="search_enroll_applicant" placeholder="Search for (ID ,Service, Encoder, Applicant, Email ,Date created)" type='search'>
                                            </div>
                                        </div> 
                                    </li>   
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="sales-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th aria-sort="ascending" class="sorting_asc">Applicant Name</th>
                                                    <th>Encoded By</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                    <th>Service</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                    <th>Action</th>
                                                    <th>Request Status</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
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
                <h3 class="modal-title">Update Applicant Form</h3>
            </div>
            <div class="modal-body form">
                <form class="formValidate" id="formValidate" method="get" action="">
                    <div class="input-field col s12">
                        <?php  //echo $ticket_info[0]['applicant_data'] ?>
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
                        <div class="col s12 has-error">
                            <label for="service">Assign Services<i style="color:red;">*</i></label>
                            <select id="service" name="service" class="browser-default" data-error=".errorTxt7">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                            <div class="errorTxt7"></div>
                        </div>
                    </div>

                    <input type="hidden" data-id="" id="applicant_id" name="applicant_id" value="" placeholder="">
                    <input type="hidden" data-id="" id="requestor_ticket_id" name="requestor_ticket_id" value="" placeholder="">

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
<?php require_once(realpath(APPPATH.'views/template/_footer.php')); ?>
<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>
<script src="<?php echo base_url('assets/custom-js/view_enrolled_applicant.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/button-dropdown.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate-1-17-0.js'); ?>"></script>
<script>

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
            minlength: 8
        },
        address :{
            required: true,
        },
        username :{
            required: true,
        },
        service:{
            required: true,
        },
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
        service:{
            required: "Service field is required.",
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

    url          = "<?php echo base_url('ticket/update_enroll_applicant'); ?>";
    applicant_id = $("#applicant_id").val();
    name         = $("#fullname").val();
    contact      = $("#contact").val();
    address      = $("#address").val();
    email        = $("#email").val();
    username     = $("#username").val();
    password     = $("#password").val();
    service_id   = $("#service").val();
    service      = $("#service").find(":selected").text();
    requestor_ticket_id   = $("#requestor_ticket_id").val();

    $.ajax({
        url : url,
        type: "POST",
        data:{
            'name'          : name,
            'contact'       : contact,
            'address'       : address,
            'email'         : email,
            'service'       : service,
            'username'      : username,
            'password'      : password,
            'service_id'    : service_id,
            'applicant_id'  : applicant_id,
            'requestor_ticket_id' : requestor_ticket_id
        },
        success: function(data)
        {   
            if(data)
            {
                
                $('.enrolled').remove();
                $('#modal_form').modal('close');
                
                swal({   title: "Applicant Succesfully Updated!",   
                   text: "I will close in 2 seconds.",   
                   timer: 2000,  
                   icon: "success", 
                   type: "success",
                   showConfirmButton: false 
                }).then(function() {
                   reload_table();
                });
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

$(document).on("click",".applicant-update",function(event) {
    event.preventDefault();
    var arr             = [];
    var applicant_id    = $(this).attr('data-id');

    var save_method     = 'add';
    var form            = document.getElementById("formValidate");
    var url             = "<?php echo base_url('ticket/get_applicant_data'); ?>"; 
    clearForm(form);

    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('open'); // show bootstrap modal
    $('.modal-title').text('Update Applicant Data'); // Set Title to Bootstrap modal title

    $.ajax({
        url : url,
        type: "POST",
        data:{
            'applicant_id'     : applicant_id,
        },
        success: function(data)
        {   
            var result = $.parseJSON(data);

            $(result.applicant_data).each(function(index, el) {
               $("#fullname").val(el.name);
               $("#contact").val(el.contact);
               $("#address").val(el.address);
               $("#email").val(el.email);
               $("#username").val(el.username);
               $("#applicant_id").val(el.id);
               $("#requestor_ticket_id").val(el.requestor_ticket_id);
            });

            $(result.services_list).each(function(index, el) {
                var selected        = (result.applicant_data[0]['service_id'] == el.id) ? "selected" : "";
                data = [
                        '<option value="'+el.id+'" '+selected+'>'+el.service_name+'</option>'
                    ].join('');
                arr.push(data);
            });

            head = ['<option value="" disabled>Choose your option</option>'].join('');
            html = arr.join(''); 

            $("#service").html(head+html);
            $('#service').material_select();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });

});


$(document).on("click",".applicant-delete",function(event) {
    event.preventDefault();
    var applicant_id         = $(this).attr('data-id');
    var requestor_ticket_id  = $(this).attr('requestor-id');
    
    swal({
      title: "Are you sure?",
      text: "Once deleted, only the administrator can restore the applicant data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            soft_delete_applicant_data(applicant_id , requestor_ticket_id);
        } else {
            swal({
                 title: "Applicant data is safe!",   
                    text: "I will close in 3 seconds.",   
                    timer: 3000,  
                    icon: "success", 
                    type: "success",
                    showConfirmButton: false 
            });
        }
    });
});

function soft_delete_applicant_data(applicant_id , requestor_ticket_id){
    var url             = "<?php echo base_url('ticket/soft_delete_applicant_data'); ?>"; 
    $.ajax({
        url : url,
        type: "POST",
        data:{
            'applicant_id'          : applicant_id,
            'requestor_ticket_id'   : requestor_ticket_id,
        },
        success: function(data)
        {   
            swal({   
                    title: "Poof! Applicant has been deleted!",   
                    text: "I will close in 2 seconds.",   
                    timer: 2000,  
                    icon: "success", 
                    type: "success",
                    showConfirmButton: false 
            })
            .then(function() {
                   reload_table();
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            //console.log(errorThrown)
            swal("Error deleting data!", {
                icon: "success",
            });
        }
    }); 
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
