<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
    <?php require_once(APPPATH."views/template/nav.php"); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Employee Registration Form</li>
            </ol>
            <div class="row custom-search-padding">
                    <div class="col-md-4">
                        <span class="label-custom custom-font">Search (Name) : </span>                                               
                        <input type='search' class="form-control form-control-new custom-fon" id="search_register_account_by_name" placeholder="Enter user name"  aria-controls="person1-table"/> 
                    </div>
                    <div class="col-md-4">
                        <span class="label-custom custom-font" for="age">View By Privilege :</span>
                        <select name="myTable_length" id="admin_search_privilege" style="height: calc(2.22rem + 2px) !important;" aria-controls="myTable" class="custom-fon form-control form-control-sm">
                            <option value="">Select</option>
                            <option value="">All</option>
                            <option value="Admin">Admin</option>
                            <option value="KBL">KBL</option>
                            <option value="J1">J1</option>
                            <option value="Nursing">Nursing</option>
                        </select>
                    </div>
                </div>
            <div class="card mb-3 register-custom-ui">
                <div class="card-header">
                    <i class="fa fa-table "></i><span class="custom-font">Employee Table</span>
                </div>
                <div class="table-responsive">              
                    <!-- <div class="container"> -->
                        <div style="margin:1rem;">
                            <button class="btn btn-success" onclick="add_person()"><i class="fa fa-plus-circle"></i> Add Person</button>
                            <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
                        </div>
   
                        <table id="person1-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Mname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Account Privilege</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>

                        <tfoot>
                        <tr>
                        <th>ID</th>
                        <th>Fname</th>
                        <th>Lname</th>
                        <th>Mname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Account Privilege</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </tr>
                        </tfoot>
                        </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
       
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="col-sm-12 custom-border">
                    <div class="row">
                      <div class="col-sm-6 form-group has-error">
                        <label>First Name</label>
                        <input type="text" name="user_fname" id="user_fname" placeholder="Enter First Name Here.." class="form-control">
                        <span class="help-block"></span>
                      </div>
                      <div class="col-sm-6 form-group has-error">
                        <label>Last Name</label>
                        <input type="text" name="user_lname" id="user_lname" placeholder="Enter Last Name Here.." class="form-control">
                        <span class="help-block"></span>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-sm-6 form-group has-error">
                        <label>Middle Name</label>
                        <input type="text" name="user_mname" id="user_mname" placeholder="Enter Middle Name Here.." class="form-control">
                        <span class="help-block"></span> 
                      </div>
                    </div>  
                    <div class="form-group has-error">
                        <label>Username</label>
                        <input type="text" name="user_username" id="user_username" placeholder="Enter Username Here.." class="form-control">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group has-error">
                        <label>Password</label>
                        <input type="password" name="user_password" id="user_password" placeholder="Enter Password Here.." class="form-control">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group has-error">
                        <label>Email Address</label>
                        <input type="text" name="user_email" id="user_email" placeholder="Enter Email Address Here.." class="form-control">
                        <span class="help-block"></span>
                    </div>       
                    <div class="row">
                        <div class="form-group has-error">
                            <label class="checkbox-inline col-sm-5">
                              <input type="checkbox" name="permission" class="permission1" value="J1" >J1
                            </label>
                            <label class="checkbox-inline col-sm-5">
                              <input type="checkbox" name="permission" class="permission2" value="Nursing">Nursing
                            </label>
                            <label class="checkbox-inline col-sm-5">
                              <input type="checkbox" name="permission" class="permission3" value="KBL">KBL
                            </label>
                            <label class="checkbox-inline col-sm-5">
                              <input type="checkbox" name="permission" class="permission4" value="Admin">As Admin
                            </label>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12" style="text-align: center;">
                      <button type="button" class="btn btn-lg btn-info" style="padding: 0.5rem 3rem;" id="create_user">Save</button>
                    </div>     -->    
                  </div>
                    <!-- <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <select name="gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth</label>
                            <div class="col-md-9">
                                <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer" style="padding: 6px;">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
 <?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>
