
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
        <li class="breadcrumb-item active">Report</li>
      </ol><!-- Example DataTables Card-->

      <div class="container-fluid">
        <br/>
        <div class="table-responsive">                
          <table class="display dataTable" id="nclex_report" width="100%" cellpadding="0">
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
                </tr>
                <?php 
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>