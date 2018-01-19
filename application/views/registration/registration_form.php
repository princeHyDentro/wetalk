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
                            <div class="collapsible-header teal white-text task-list-data active">
                                <i class="material-icons more">keyboard_arrow_right</i>
                                <i class="material-icons less" style="display: none">keyboard_arrow_down</i>
                                <span class="right">Staff List</span>
                            </div>

                            <div class="collapsible-body teal lighten-5" style="display: none;">
                                <ul class="collection">
                                    <li>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <!-- <div class="">
                                                    <i class="material-icons search-icon"> search </i>
                                                </div> -->
                                                <input class="validate" id="search_register_account_by_name" placeholder="Search for (ID ,Full Name , Username , Email , Roles)" type='search'>
                                                <!-- <label for="first_name" class="active">First Name</label> -->
                                            </div>
                                            <div class="input-field col s6">
                                                <select aria-controls="myTable" class="validate" id="admin_search_status" name="myTable_length">
                                                     <option value="" disabled selected>Search your option</option>
                                                    <option value="">All</option>
                                                    <option value="Admin">Office Admin</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Encoder">Encoder</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>   
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="staff-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th aria-sort="ascending" class="sorting_asc">Full Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Roles</th>
                                                   <!--  <th>Position</th> -->
                                                    <th>Created</th>
                                                    <th>Updated</th>
                                                    <!-- <th>Action</th> -->
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
   .error{
        font-style: oblique;
        color: red;
   }
</style>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">

                <form action="#" class="form-horizontal" id="form" name="form">
                    <input name="id" id="user_id" type="hidden" value="">
                    <div class="col s12">
                        
                        <div class="row">
                            <div class="input-field col s6 has-error">
                                <label>First Name<i style="color:red;">*</i></label>
                                <input class="validate" id="user_fname" name="user_fname" placeholder="Enter First Name Here.." type="text">
                            </div>
                            <div class="input-field col s6 has-error">
                                <label>Last Name<i style="color:red;">*</i></label> 
                                <input class="validate" id="user_lname" name="user_lname" placeholder="Enter Last Name Here.." type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 has-error">
                                <label>Middle Name</label>
                                <input class="validate" id="user_mname" name="user_mname" placeholder="Enter Middle Name Here.." type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6 has-error">
                                <label>Username<i style="color:red;">*</i></label> <input class="validate" id="user_username" name="user_username" placeholder="Enter Username Here.." type="text">
                            </div>
                            <div class="input-field col s6 has-error">
                                <label>Password<i style="color:red;">*</i></label>
                                <input class="validate" id="user_password" name="user_password" placeholder="Enter Password Here.." type="password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 has-error">
                                <label>Email Address<i style="color:red;">*</i></label>
                                <input class="validate" id="user_email" name="user_email" placeholder="Enter Email Address Here.." type="email">
                            </div>
                            <div class="input-field col s12 has-error">
                                <select  class="validate" id="permission" name="permission">
                                    <option value="" disabled selected>Choose staff roles</option>
                                    <?php foreach ($roles as $key => $role): ?>
                                        <option value="<?php echo $role['value']; ?>"><?php echo $role['staff_roles']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label>Assign staff role<i style="color:red;">*</i></label>
                            </div>
                            <div class="input-field col s12 has-error">
                                <select multiple class="active" id="services" name="services">
                                    <option value="" disabled>Choose your option</option>
                                    <?php foreach ($services as $key => $service): ?>
                                        <option data-id="" value="<?php echo $service['id'];?>"><?php echo $service['service_name'];?></option>
                                    <?php endforeach ?>
                                </select>
                                <label class="show-hide">Assign Multiple Services<i style="color:red;">*</i></label>
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
<script src="<?php echo base_url('assets/js/jquery.validate-1-17-0.js'); ?>"></script>
<script src="<?php echo base_url('assets/new-js/adding_staff.js'); ?>"></script>
<script>
    $('#permission').change(function(event) {
        event.preventDefault();
        var data = $(this).val();
        if(data == 'office-admin'){
            $('#services').material_select('destroy');
            $('.show-hide').hide();
        }else{
            $('#services').material_select('');
            $('.show-hide').show();
        }
    });

    $("#form").validate({
        rules: {
            user_fname      : { required : true },
            user_lname      : { required : true },
            user_username   : { required : true },
            user_password   : { required : true },
            user_email      : { required : true },
            permission      : { required : true }
        },
        //For custom messages
        messages: {
            user_fname:{
                required: "First name field is required."
            },
            user_lname :{
                required: "Last name field is required."
            },
            user_username : {
                required: "Username field is required."
            },
            user_password: {
                required: "Password field is required."
            },
            user_email : { 
                required : "Email field is required." 
            }
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
            save()
        }
    });
</script>
