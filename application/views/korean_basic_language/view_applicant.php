
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
                <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
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
                        <select name="myTable_length" id="kbl_search_status" style="height: calc(2.22rem + 2px) !important;" aria-controls="myTable" class="custom-fon form-control form-control-sm">
                            <option value="">Select</option>
                            <option value="">All</option>
                            <option value="Enrolled">Enrolled</option>
                            <option value="Inquire">Inquire</option>
                            <option value="Passed">Passed</option>
                            <option value="Retake">Retake</option>
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
                                  <th>Mobile#</th>
                                  <th>Geneder</th>
                                  <th>Educational Attainment</th>
                                  <th>Purpose In Enrollment</th>
                                  <th>Application Status</th>
                                  <th>Date Created</th>
                                  <th>Form #</th>
                                  <th>Created By #</th>
                                  <th>Update Client</th>
                                  <th>Delete Client</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th>Name</th>
                                  <th>Address</th>
                                  <th>Mobile#</th>
                                  <th>Geneder</th>
                                  <th>Educational Attainment</th>
                                  <th>Purpose In Enrollment</th>
                                  <th>Application Status</th>
                                  <th>Date Created</th>
                                  <th>Form #</th>
                                  <th>Created By #</th>
                                  <th>Update Client</th>
                                  <th>Delete Client</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                <tr>
                                    <td>Benjie</td>
                                    <td>cebu</td>
                                    <td>091121212</td>
                                    <td>male</td>
                                    <td>college</td>
                                    <td>wala</td>
                                    <td>Enrolled</td>
                                    <td>$320,800</td>
                                    <td>23434</td>
                                    <td>$320,800</td>
                                    <th style="text-align: center;"><button type="button" class="btn btn-success">Update</button></th>
                                    <th style="text-align: center;"><button type="button" class="btn btn-danger">Delete</button></th>
                                </tr>
                                 <tr>
                                    <td>Judel</td>
                                    <td>cebu</td>
                                    <td>091121212</td>
                                    <td>male</td>
                                    <td>college</td>
                                    <td>wala</td>
                                    <td>Cancelled</td>
                                    <td>$320,800</td>
                                    <td>23434</td>
                                    <td>$320,800</td>
                                    <th style="text-align: center;"><button type="button" class="btn btn-success">Update</button></th>
                                    <th style="text-align: center;"><button type="button" class="btn btn-danger">Delete</button></th>
                                </tr>
                                <tr>
                                    <td>Judel</td>
                                    <td>cebu</td>
                                    <td>091121212</td>
                                    <td>male</td>
                                    <td>college</td>
                                    <td>wala</td>
                                    <td>retake</td>
                                    <td>$320,800</td>
                                    <td>23434</td>
                                    <td>$320,800</td>
                                    <th style="text-align: center;"><button type="button" class="btn btn-success">Update</button></th>
                                    <th style="text-align: center;"><button type="button" class="btn btn-danger">Delete</button></th>
                                </tr>
                              
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