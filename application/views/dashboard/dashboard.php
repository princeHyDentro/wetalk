<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?php echo base_url('assets/xcharts-build/xcharts.css'); ?>" rel="stylesheet">
<?php require_once(realpath(APPPATH.'views/template/head_left_nav.php')); ?>
<style type="text/css" media="screen">
canvas { 
    background-color : #eee;
}
.card{
    padding-bottom: 10px;
}
</style>
<main>
  <div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <br><br>
            <div class="card">
                <div class="card-move-up waves-effect waves-block waves-light">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-move-up waves-effect waves-block waves-light">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <br>
            <div class="divider"></div>
            <div class="card">
                <div class="card-move-up waves-effect waves-block waves-light">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
            <button type="button" id="test">test</button>
        </div>
    </div>
  </div>
</main>
<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>
<script src="<?php echo base_url('assets/chart-js/chart-js.js'); ?>"></script>
<script>

$("#test").click(function(event) {
  event.preventDefault();
    $.ajax({
        url: "<?php echo base_url('dashboard/chart_js_yearly');?>",
        method: "GET",
        success: function(data) {
                result = $.parseJSON(data);
                console.log(data);
                // return false;
                var ctx = $("#pieChart");

                // Global Options:
                 Chart.defaults.global.defaultFontColor = 'black';
                 Chart.defaults.global.defaultFontSize = 13;

                var data = {
                    labels: ["Enrolled", "Inquired"],
                      datasets: [
                        {
                            fill: true,
                            backgroundColor: [
                                '#3e95cd',
                                '#8e5ea2'],
                            data: result.result,
                            borderColor:    ['rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)'],
                            borderWidth: [1,1]
                        }
                    ]
                };

                var options = {
                        title: {
                                  display: true,
                                  text: result.title,
                                  position: 'top'
                              },
                        rotation: -0.7 * Math.PI
                };


                // Chart declaration:
                var myBarChart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: options
                });


        },
        error: function(data) {
            console.log(data);
        }
    });
   
});

load_weekly_chart();
load_chat_monthly();
load_yearly_chart()

function load_yearly_chart(){
     $.ajax({
        url: "<?php echo base_url('dashboard/chart_js_yearly');?>",
        method: "GET",
        success: function(data) {

                result = $.parseJSON(data);
                // return false;
                var ctx = $("#pieChart");

                // Global Options:
                 Chart.defaults.global.defaultFontColor = 'black';
                 Chart.defaults.global.defaultFontSize = 13;

                var data = {
                    labels: ["Enrolled", "Inquired"],
                      datasets: [
                        {
                            fill: true,
                            backgroundColor: [
                                '#3e95cd',
                                '#8e5ea2'],
                            data: result.result,
                            borderColor:    ['rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)'],
                            borderWidth: [1,1]
                        }
                    ]
                };

                var options = {
                        title: {
                                  display: true,
                                  text: result.title,
                                  position: 'top'
                              },
                        rotation: -0.7 * Math.PI
                };

                // Chart declaration:
                var myBarChart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: options
                });


        },
        error: function(data) {
            console.log(data);
        }
    });
}

function load_weekly_chart(){
     $.ajax({
        url: "<?php echo base_url('dashboard/chart_js_weeks');?>",
        method: "GET",
        success: function(data) {
            result = $.parseJSON(data);
          var chartdata = {
                        labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday" , "Sturday" , "Sunday"],
                        datasets: [
                        {
                            label: "Enrolled",
                            backgroundColor: "#3e95cd",
                            data: result.enroll,
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        },
                        {
                            label: "Inquired",
                            backgroundColor: "#8e5ea2",
                            data: result.inquire,
                            borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }
                    ]
                };
                var ctx = $("#myChart2");

                var barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata,
                    options: {
                        title: {
                        display: true,
                        text: result.title,

                    },
                    responsive: true,
                    barValueSpacing: 2,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                            }
                        }]
                    },
                    animation: {
                        animateScale: true
                    },
                    cutoutPercentage: 80

                    }
                });
        },
        error: function(data) {
          console.log(data);
        }
    });
}

function load_chat_monthly(){
    $.ajax({
        url: "<?php echo base_url('dashboard/chart_js_months');?>",
        method: "GET",
        success: function(data) {
               result = $.parseJSON(data);

                var chartdata = {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [
                    {
                        label: "Enrolled",
                        backgroundColor: "#3e95cd",
                        data: result.enroll,
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: "Inquired",
                        backgroundColor: "#8e5ea2",
                        data: result.inquire,
                        borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            };

            var ctx = $("#myChart");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    title: {
                    display: true,
                    text: result.title,

                },
                responsive: true,
                barValueSpacing: 2,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                        }
                    }]
                },
                animation: {
                    animateScale: true
                },
                cutoutPercentage: 80

                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
}
setInterval(function(){
    // load_weekly_chart();
    // load_chart();
}, 3000);
</script>