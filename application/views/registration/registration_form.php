<!-- <body class="fixed-nav sticky-footer bg-dark" id="page-top"> -->
    <!-- Navigation-->
    <style type="text/css">
        th{
            width: auto !important;
        }
    </style>
    <?php //require_once(APPPATH."views/template/nav.php"); ?>
    <?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>


    <main>
        <p></p>
        <div class="container">
                <div class="col s12 m9 l10">
                    <!-- search field -->
                    <div class="row custom-search-padding">
                        <div class="col m4">
                            <span class="label-custom custom-font">Search (Name) :</span> <input class="form-control form-control-new custom-fon" id="search_register_account_by_name" placeholder="Enter user name" type='search'>
                        </div>
                        <div class="col m4">
                            <span class="label-custom custom-font">View By :</span>
                            <select aria-controls="myTable" class="custom-fon form-control form-control-sm" id="admin_search_status" name="myTable_length" style="height: calc(3rem + 2px) !important;">
                                <option value="">
                                    Select
                                </option>
                                <option value="">
                                    All
                                </option>
                                <option value="Admin">
                                    Office Admin
                                </option>
                                <option value="Sales">
                                    Sales
                                </option>
                                <option value="Encoder">
                                    Encoder
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table cellspacing="0" class="bordered highlight striped responsive-table no-footer" id="staff-table" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th aria-sort="ascending" class="sorting_asc">Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
        </div>
    </main>

    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> -->
                    <h3 class="modal-title">Person Form</h3>
                </div>
                <div class="modal-body form">
                    <form action="#" class="form-horizontal" id="form" name="form">
                        <input name="id" type="hidden" value="">
                        <div class="col-sm-12 custom-border">
                            <div class="row">
                                <div class="col-sm-6 form-group has-error">
                                    <label>First Name<i style="color:red;">*</i></label> <input class="form-control" id="user_fname" name="user_fname" placeholder="Enter First Name Here.." type="text"> <span class="help-block"></span>
                                </div>
                                <div class="col-sm-6 form-group has-error">
                                    <label>Last Name<i style="color:red;">*</i></label> <input class="form-control" id="user_lname" name="user_lname" placeholder="Enter Last Name Here.." type="text"> <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 form-group has-error">
                                    <label>Middle Name</label> <input class="form-control" id="user_mname" name="user_mname" placeholder="Enter Middle Name Here.." type="text"> <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 form-group has-error">
                                   <label>Username<i style="color:red;">*</i></label> <input class="form-control" id="user_username" name="user_username" placeholder="Enter Username Here.." type="text"> <span class="help-block"></span>
                                </div>
                                <div class="col-sm-6 form-group has-error">
                                    <label>Password<i style="color:red;">*</i></label> <input class="form-control" id="user_password" name="user_password" placeholder="Enter Password Here.." type="password"> <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group has-error">
                                <label>Email Address<i style="color:red;">*</i></label> <input class="form-control" id="user_email" name="user_email" placeholder="Enter Email Address Here.." type="text"> <span class="help-block"></span>
                            </div>
                            <div class="form-group has-error">
                                 <label>Position<i style="color:red;">*</i></label>
                                <select  class="custom-fon form-control form-control-sm" id="privilege" name="privilege" style="height: calc(3rem + 2px) !important;">
                                    <option value="">Select</option>
                                    <option value="Admin">Office Admin</option>
                                    <option value="Sales">Sales</option>
                                    <option value="Encoder">Encoder</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="padding: 6px;">
                    <button class="btn btn-primary" id="btnSave" onclick="save()" type="button">Save</button> <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
                </div>
            </div>
        </div>
    </div>
