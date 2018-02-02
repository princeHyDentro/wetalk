<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?php echo base_url('assets/xcharts-build/xcharts.css'); ?>" rel="stylesheet">
<?php require_once(realpath(APPPATH.'views/template/head_left_nav.php')); ?>
<style type="text/css" media="screen">
canvas { background-color : #eee;
}
</style>
<main>
  <div class="container">
    <div class="row">
      <div class="col s12 m9 l10">
       <!--  <canvas id="chartJSContainer" width="600" height="400"></canvas> -->
        <?php
        // $is_logged_in   = $this->session->userdata('is_logged_in');
        // echo "<pre>";
        // print_r($is_logged_in);
        // echo "</pre>";
        ?>
        <center><h3> Page Under Construction! </h3></center>
      </div>
    </div>
  </div>
</main>
<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>

<script src="<?php echo base_url('assets/chart-js/chart-js.js'); ?>"></script>