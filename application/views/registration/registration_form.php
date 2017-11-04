<style type="text/css">
body{
    background-color: #525252;
}
.centered-form{
    margin-top: 60px;
}

.centered-form .panel{
    background: rgba(255, 255, 255, 0.8);
    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
</style>

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
      <div class="custome-container">
        <div class="col-lg-12 well">
            <div class="row custom-container-reg">
                <div style="display: none;" id="update" user-id=""></div>
                <div style="margin: auto;    width: 122vh;">
                  <div class="col-sm-12 custom-border">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <label>First Name</label>
                        <input type="text" id="user_fname" placeholder="Enter First Name Here.." class="form-control">
                      </div>
                      <div class="col-sm-6 form-group">
                        <label>Last Name</label>
                        <input type="text" id="user_lname" placeholder="Enter Last Name Here.." class="form-control">
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <label>Middle Name</label>
                        <input type="text" id="user_mname" placeholder="Enter Middle Name Here.." class="form-control">
                      </div>
                    </div>  
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="user_username" placeholder="Enter Username Here.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="user_password" placeholder="Enter Password Here.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" id="user_email" placeholder="Enter Email Address Here.." class="form-control">
                    </div>       
                    <div class="row">
                        <div class="form-group">
                            <label class="checkbox-inline col-sm-5">
                              <input type="checkbox" class="permission" value="J1" >J1
                            </label>
                            <label class="checkbox-inline col-sm-5">
                              <input type="checkbox" class="permission" value="Nursing">Nursing
                            </label>
                            <label class="checkbox-inline col-sm-5">
                              <input type="checkbox" class="permission" value="KBL">KBL
                            </label>
                            <label class="checkbox-inline col-sm-5">
                              <input type="checkbox" class="permission" value="Admin">As Admin
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align: center;">
                      <button type="button" class="btn btn-lg btn-info" style="padding: 0.5rem 3rem;" id="create_user">Save</button>
                    </div>        
                  </div>
                </div> 

            </div>
            <hr>
            <div class="container-fluid">
           
                <div class="row custom-search-padding">
                    <div class="col-md-4">
                        <span class="label-custom custom-font">Search (Name) : </span>                                               
                        <input type='text' class="form-control form-control-new custom-fon" id="search_register_account_by_name" placeholder="Enter user name" /> 
                    </div>
                    <div class="col-md-4">
                       <!--  <span class="label-custom custom-font" for="age">View By :</span>
                        <select name="myTable_length" id="kbl_search_status" style="height: calc(2.22rem + 2px) !important;" aria-controls="myTable" class="custom-fon form-control form-control-sm">
                            <option value="">Select</option>
                            <option value="">All</option>
                            <option value="Enrolled">Enrolled</option>
                            <option value="Inquire">Inquire</option>
                            <option value="Passed">Passed</option>
                            <option value="Retake">Retake</option>
                            <option value="Departed">Departed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select> -->
                    </div>
                </div>
                <br/>
              
            
                <div class="card mb-3 register-custom-ui">
                  <?php  ?>
                    <div class="card-header">
                        <i class="fa fa-table "></i><span class="custom-font">Employee Table</span></div>
                        <div class="card-body">

                          <div class="table-responsive">                
                            <table class="table table-bordered table-striped" id="view_applicant_table" width="100%" cellpadding="0">
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
                                  <th>Update Client</th>
                                  <th>Delete Client</th>
                                </tr>
                              </thead>
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
                                  <th>Update Client</th>
                                  <th>Delete Client</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                <?php
                                  if(isset($employee_result)):
                                    foreach ($employee_result as $key => $employee):
                                ?>
                                  <tr>
                                    <td><?php echo $employee->user_id; ?></td>
                                    <td><?php echo $employee->user_fname; ?></td>
                                    <td><?php echo $employee->user_lname; ?></td>
                                    <td><?php echo $employee->user_mname; ?></td>
                                    <td><?php echo $employee->user_username; ?></td>
                                    <td><?php echo $employee->user_email; ?></td>
                                    <td><?php echo $employee->user_rights; ?></td>
                                    <td><?php echo $employee->user_datecreated; ?></td>
                                    <td><?php echo $employee->user_updateddate; ?></td>                      
                                    <th style="text-align: center;"><button id="<?php echo $employee->user_id; ?>" type="button" class="btn btn-success update-employee-account">Update</button></th>
                                    <th style="text-align: center;"><button id="<?php echo $employee->user_id; ?>" type="button" class="btn btn-danger delete-employee-account">Delete</button></th>
                                  </tr>
                                <?php
                                    endforeach;
                                  endif;
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require_once(APPPATH."views/template/copyright.php"); ?>
  </div>
</body>