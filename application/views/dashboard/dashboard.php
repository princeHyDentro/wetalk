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

      </div>
    </div>
  </div>
</main>
<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>

<script src="<?php echo base_url('assets/chart-js/chart-js.js'); ?>"></script>

<script>
  $(document).ready(function(){
      var options = {
          type: 'line',
          data: {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            fill: false,
            responsive : true,
            datasets: [
              {
                label: 'test 1',
                data: [12, 19, 3, 5, 2],
                borderWidth: 1
              },  
              {
                label: 'test 2',
                data: [7, 11, 5, 8, 3],
                borderWidth: 1
              }
            ]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  reverse: false
                }
              }]
            }
          }
        }

        var ctx = document.getElementById('chartJSContainer').getContext('2d');
        new Chart(ctx, options);
  });
</script>