
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
      <li class="breadcrumb-item active">J-1 Exchange Culture</li>
      <li class="breadcrumb-item active">Report</li>
  </ol><!-- Example DataTables Card-->

<br/>
<div class="table-responsive">                
  <table class="display dataTable" id="report" width="100%" cellpadding="0">
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
   if (count($j1_data) > 0) {
      foreach ($j1_data as $index => $row) {
         ?>
         <tr>
           <td><?php echo $row->name; ?></td>
           <td><?php echo $row->client_address; ?></td>
           <td><?php echo $row->client_contactno; ?></td>
           <td><?php echo $row->client_datevisited; ?></td>
           <td><?php echo $status[$row->status_id-1]; ?></td>
           <td><?php echo $row->client_datecreated; ?></td>
           <td><?php echo $row->client_formno; ?></td>
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