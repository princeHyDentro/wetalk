
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php require_once(APPPATH."views/template/nav.php"); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
              </li>
               <li class="breadcrumb-item active">NCLEX</li>
              <li class="breadcrumb-item active">View Applicants</li>
            </ol><!-- Example DataTables Card-->

            
            <div class="container-fluid">
           
                <div class="row custom-search-padding">
                    <div class="col-md-4">
                        <span class="label-custom custom-font">Search (Name) : </span>                                               
                        <input type='text' class="form-control form-control-new custom-fon" id="search_by_name" placeholder="Enter client name here" /> 
                    </div>
                    <div class="col-md-4">
                        <span class="label-custom custom-font" for="age">View By :</span>
                        <select name="myTable_length" id="search_status" style="height: calc(2.22rem + 2px) !important;" aria-controls="myTable" class="custom-fon form-control form-control-sm">
                            <option value="">Select</option>
                            <option value="Inquire">Inquire</option>
                            <option value="SignUp">SignUp</option>
                            <option value="Departed">Departed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <br/>
              
            
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table "></i><span class="custom-font"> View Applicants</span></div>
                        <div class="card-body">

                          <div class="table-responsive">                
                            <table class="table table-bordered table-striped" id="view_applicant_table" width="100%" cellpadding="0">
                                <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Address</th>
                                  <th>Contact#</th>
                                  <th>Date Visited</th>
                                  <th>Status</th>
                                  <th>Date Created</th>
                                  <th>Form#</th>
                                  <th>Created By</th>
                                  <th>Update Client</th>
                                  <th>Delete Client</th>
                                </tr>
                              </thead>
                              <tbody>
							      <?php 
								  if (count($nclex) > 0) {
								     foreach ($nclex as $data) {
										 ?>
										    <tr>
											   <td><?php echo $data->name;?></td>
											   <td><?php echo $data->client_address;?></td>
											   <td><?php echo $data->client_contactno;?></td>
											   <td><?php echo $data->client_datevisited;?></td>
											   <td><?php echo $status[$data->status_id-1]; ?></td>
											   <td><?php echo $data->client_datecreated;?></td>
											   <td><?php echo $data->client_formno;?></td>
											   <td><?php echo $user[0]->user_fname. " " .$user[0]->user_lname; ?></td>
											   <th style="text-align: center;"><a href="nclex_update/<?php echo $data->client_id; ?>" class="btn btn-success">Update</a></th>
											   <th style="text-align: center;"><a href="nclex_delete/<?php echo $data->client_id; ?>" class="btn btn-danger">Delete</a></th>
											</tr>
										 <?php 
									 }
								  }
								  ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>

    </div>

<?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>