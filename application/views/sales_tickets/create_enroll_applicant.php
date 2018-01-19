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
                            <div class="collapsible-header teal white-text task-list-data active" data-id="{{ $task_group['id']}}">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span class="right">Enroll Applicant List</span>
                            </div>

                            <div class="collapsible-body teal lighten-5" style="display: none;">
                                <ul class="collection">
                                    <li>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <!-- <div class="">
                                                    <i class="material-icons search-icon"> search </i>
                                                </div> -->
                                                <input class="validate" id="search_register_account_by_name" placeholder="Search for (ID ,Full Name , Contact , Address , Email Address, Service, Status)" type='search'>
                                                <!-- <label for="first_name" class="active">First Name</label> -->
                                            </div>
                                            <div class="input-field col s6">
                                                <select aria-controls="myTable" class="validate" id="filter-status" name="myTable_length">
                                                     <option value="" disabled selected>Filter</option>
                                                    <option value="">All</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Complete">Complete</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>   
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="sales-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>TicketID</th>
                                                    <th aria-sort="ascending" class="sorting_asc">Applicant Name</th>
                                                    <th aria-sort="ascending" class="sorting_asc">Assing to</th>
                                                    <th>Service</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
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
   select {
        background-color: transparent;
        width: 100%;
        padding: 5px;
        border: none;
        border-radius: 2px;
        height: 3rem;
        border-bottom: 1px solid #9e9e9e;
    }
    .input-field div.error {
        position: relative;
        top: -1rem;
        left: 0rem;
        font-size: 0.8rem;
        color: red;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
        font-style: oblique;
    }
</style>
<div class="modal fade" id="modal_enroll" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Enroll Applicant Form</h3>
            </div>
            <div class="modal-body form">

                <form action="#" class="form-horizontal" id="form" name="form">
                    <input name="sale-id" id="sale-id" type="hidden" value="<?php echo $is_logged_in['user_id'];?>">
                    <div class="col s12">
                        <?php
                        // echo "<pre>";
                        // print_r($is_logged_in);
                        // echo "</pre>";
                        ?>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="sales_name">Sales Representative Name:</label>
                                <input disabled="true" class="validate" id="sales_name" value="<?php echo $is_logged_in['user_full_name'];?>" name="sales_name"  type="text">
                            </div>

                            <div class="input-field col s12">
                                <label for="applicant_name">Applicant Name:</label>
                                <input class="applicant_name" id="applicant_name" value="" name="applicant_name"  type="text">
                                <div class="input-field">
                                    <div class="errorTxt0"></div>
                                </div>
                            </div>

                            <div class="col s12">
                                <label for="services" style="font-size: 1.2rem;">Select Service :<i style="color:red;">*</i></label>
                                <select class="error browser-default" id="services" name="services" data-error=".errorTxt1">
                                    <option value="" disabled="" selected="">Choose your profile</option>
                                     <?php foreach ($services as $key => $service): ?>
                                        <option data-id="" value="<?php echo $service['id'];?>"><?php echo $service['service_name'];?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="input-field">
                                    <div class="errorTxt1"></div>
                                </div>
                            </div>

                            <div class="col s12">
                                <label for="encoder_name" style="font-size: 1.2rem;">Assign To :<i style="color:red;">*</i></label>
                                <select class="error browser-default" id="encoder_name" name="encoder_name" data-error=".errorTxt2">
                                    <option value="" disabled>Choose your option</option>
                                </select>
                                <div class="input-field">
                                    <div class="errorTxt2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 has-error">
                                <label>Applicant Information :</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 has-error">
                                <label for="ticket_format">Applicant Information Data :</label>
                            </div>
                            <div class="input-field col s12 has-error">
                                <textarea  id="ticket_format" name="ticket_format" class="materialize-textarea"><table class="striped" style="height: 161px;" width="658">
                                <thead>
                                <tr>
                                <th style="width: 173px;" colspan="5" data-field="id">Applicant Information</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td style="width: 173px;"><strong>Name</strong></td>
                                <td style="width: 239px;" colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                <td style="width: 173px;"><strong>Current Address</strong></td>
                                <td style="width: 239px;" colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                <td style="width: 173px;"><strong>Date of Birth</strong></td>
                                <td style="width: 239px;" colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                <td style="width: 173px;"><strong>Email Address</strong></td>
                                <td style="width: 239px;" colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                <td style="width: 173px;"><strong>Contact No.</strong></td>
                                <td style="width: 239px;" colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                <td style="width: 173px;"><strong>Status</strong></td>
                                <td style="width: 239px;" colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                <td style="width: 173px;"><strong>Username</strong></td>
                                <td style="width: 239px;" colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                <td style="width: 173px;"><strong>Password</strong></td>
                                <td style="width: 239px;" colspan="3">&nbsp;</td>
                                </tr>
                                </tbody>
                                </table></textarea>
                                <div class="input-field">
                                    <div class="errorTxt3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding: 6px;">
                            <button class="btn btn-primary " id="btnSave"  type="submit">Save</button>
                            <button class="btn btn-danger modal-action modal-close"  type="button">Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>

<script src="<?php echo base_url('assets/custom-js/sales_enroll_applicant.js'); ?>"></script>
<script src="<?php echo base_url('assets/tinymce/tinymce.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate-1-17-0.js'); ?>"></script>
<script>
    
    $(document).ready(function(){

        $("#form").validate({
            rules: {
                sales_name  : { required: true },
                services    : { required: true },
                encoder_name: { required: true },
                applicant_name : { required: true }
            },
            //For custom messages
            messages: {
                sales_name:{
                    required: "Name field is required.",
                },
                services:{
                    required: "Service field is required.",
                },
                encoder_name: { required: "Encoder field is required.", },
                applicant_name : { required: "Applicant name field is required." }
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
                save_ticket();
            }
        });

        $("#services").change(function(event){
            event.preventDefault();
             $('#encoder-name').material_select('destroy');
            var arr         = new Array();
            var service_id  = $(this).val();
            var url         = 'get_encoder';

            $.ajax({
                url : url,
                type: "POST",
                data: {'service_id' : service_id },
                success: function(data)
                {
                    
                    ojb     = $.parseJSON(data);
                   
                    $(ojb).each(function(indxe,elem){
                        answer_data = new Array();
                        data = [
                                '<option value="'+elem.id+'">'+elem.full_name+' || <span class="new badge">Ticket Pending '+elem.tickets+'</span></option>'
                            ].join('');
                        answer_data.push(data);
                        arr.push(answer_data);
                    });
                    data1 = [
                            '<option value="" disabled>Choose your option</option>'
                            ].join('');

                    result = data1+arr.join('');

                    $("#encoder_name").html(result);
                    $('#encoder_name').material_select();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                }
            });
        });

        editor();
    });

    function editor(){

        tinymce.init({ 
            selector:'#ticket_format',
            branding: false,
            menubar: false,
            height : 50,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help template code'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help, UserInfo | code',
        
            height: 500,
            mobile: {
                theme: 'mobile',
                plugins: [ 'autosave', 'lists', 'autolink' ],
                toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
            },
            /* Will save the data to the textarea on change*/
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
        });
    }
</script>

