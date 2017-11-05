
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
            <select name="myTable_length" id="kbl_search_status" style="height: calc(3rem + 2px) !important;" aria-controls="myTable" class="custom-fon form-control form-control-sm">
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
            <tbody>
             <?php if(isset($kbl_data)){ 
              foreach ($kbl_data as $data) { ?>
              <tr>
               <td><?php echo $data->name;?></td>
               <td><?php echo $data->client_address;?></td>
               <td><?php echo $data->client_contactno;?></td>
               <td><?php echo $data->client_datevisited;?></td>
               <td><?php echo $status[$data->status_id-1]; ?></td>
               <td><?php echo $data->client_datevisited; ?></td>
               <td><?php echo $data->client_formno; ?></td>
               <th style="text-align: center;"><a href="kbl_update_client/<?php echo $data->client_id; ?>" class="btn btn-success">Update</a></th>
               <th style="text-align: center;"><a href="kbl_delete_client/<?php echo $data->client_id; ?>" class="btn btn-danger">Delete</a></th>
             </tr>
             <?php } } ?>
           </tbody>
         </table>
       </div>
     </div>
   <?php require_once(APPPATH."views/template/copyright.php"); ?>
 </body>