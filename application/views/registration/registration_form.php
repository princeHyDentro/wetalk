<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <style type="text/css">
    th{
      width: auto !important;
    }
  </style>
  <?php require_once(APPPATH."views/template/nav.php"); ?>
  <?php $is_logged_in = $this->session->userdata('is_logged_in'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Employee Registration Form</li>
      </ol>
      
      <div class="container-fluid">
        <div class="row custom-search-padding">
          <div class="col-md-4">
            <span class="label-custom custom-font">Search (Name) : </span>                                               
            <input type='search' class="form-control form-control-new custom-fon" id="search_register_account_by_name" placeholder="Enter user name" /> 
          </div>
          <div class="col-md-4">
            <span class="label-custom custom-font" for="age">View By :</span>
            <select name="myTable_length" id="admin_search_status" style="height: calc(3rem + 2px) !important;" aria-controls="myTable" class="custom-fon form-control form-control-sm">
              <option value="">Select</option>
              <option value="">All</option>
              <option value="Nursing">Nursing</option>
              <option value="KBL">KBL</option>
              <option value="J1">J1</option>
            </select>
          </div>
        </div>
        <div class="table-responsive">              
          <!-- <div class="container"> -->
            <div style="margin:1rem;">
              <button class="btn btn-success" onclick="add_person()"><i class="fa fa-plus-circle"></i> Add Person</button>
              <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> Reload</button>
            </div>

            <table id="person1-table" class="table table-striped table-bordered display no-footer" cellspacing="0" width="100%">
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
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>

             <!-- <tfoot>
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
                  <th>Action</th>
                </tr>
              </tfoot> -->
            </table>
            <!-- </div> -->
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
                      <div class="form-group has-error">
                        <label>
                          <input type="radio" name="permission" class="permission1" value="J1" >J1
                        </label>
                        <br>
                        <label>
                          <input type="radio" name="permission" class="permission2" value="Nursing">Nursing
                        </label>
                        <br>
                        <label>
                          <input type="radio" name="permission" class="permission3" value="KBL">KBL
                        </label>
                        <br>
                        <?php if( $is_logged_in['user_rights'] == 'super' ): ?>
                        <label>
                          <input type="radio" name="permission" class="permission4" value="Admin">As Admin
                        </label>
                        <?php endif; ?>
                        <span class="help-block"></span>
                      </div>
                  </div>
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
