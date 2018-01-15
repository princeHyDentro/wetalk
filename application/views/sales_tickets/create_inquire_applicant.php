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
                                                <select aria-controls="myTable" class="validate" id="admin_search_status" name="myTable_length">
                                                     <option value="" disabled selected>Search your option</option>
                                                    <option value="">All</option>
                                                    <option value="Inquire">Inquire</option>
                                                    <option value="Enroll">Enroll</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>   
                                   <div class="table-responsive">
                                        <table cellspacing="0" class=" teal  bordered highlight striped responsive-table no-footer" id="sales-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th aria-sort="ascending" class="sorting_asc">Name</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                    <th>Service</th>
                                                    <th>Status</th>
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
<div class="modal fade" id="modal_enroll" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Inquire Applicant Form</h3>
            </div>
            <div class="modal-body form">

                <form action="#" class="form-horizontal" id="form" name="form">
                    <input name="id" id="id" type="hidden" value="">
                    <div class="col s12">
                        
                        <div class="row">
                            <div class="input-field col s6 has-error">
                                <label>Name<i style="color:red;">*</i></label>
                                <input class="validate" id="name" name="name" placeholder="Enter First Name Here.." type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="input-field col s6 has-error">
                                <label>Contact<i style="color:red;">*</i></label> 
                                <input class="validate" id="contact" name="contact" placeholder="Enter Last Name Here.." type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 has-error">
                                <label>Address<i style="color:red;">*</i></label> <input class="validate" id="address" name="address" placeholder="Enter Username Here.." type="text"> <span class="help-block"></span>
                            </div>
                            <div class="input-field col s6 has-error">
                                <label>Email<i style="color:red;">*</i></label>
                                <input class="validate" id="email" name="email" placeholder="Enter Password Here.." type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="row">
                            <div class="input-field col s12 has-error">
                                <select class="active" id="services" name="service">
                                    <option value="" disabled>Choose your option</option>
                                    <?php foreach ($services as $key => $service): ?>
                                        <option data-id="" value="<?php echo $service['id'];?>"><?php echo $service['service_name'];?></option>
                                    <?php endforeach ?>
                                </select>
                                <label>Assign Services<i style="color:red;">*</i></label>
                            </div>
				        </div>
                </form>
            </div>
            <div class="modal-footer" style="padding: 6px;">
                <button class="btn btn-primary " id="btnSave" onclick="save()" type="button">Save</button>
                <button class="btn btn-danger modal-action modal-close"  type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>
<script src="<?php echo base_url('assets/custom-js/sales_inquire_applicant.js'); ?>"></script>
