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
        
      </div>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
         <iframe height="500" src="https://tawk.to/chat/59ec77094854b82732ff6f7b/default/?$_tawk_popout=true"></iframe>
        
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php require_once(APPPATH."views/template/copyright.php"); ?>
</body>