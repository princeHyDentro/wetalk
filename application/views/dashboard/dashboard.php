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
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php echo $count_msgs; ?> New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('pm'); ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>