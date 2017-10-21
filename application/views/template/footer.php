  
  <!-- Bootstrap core JavaScript-->

  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <script src="<?php echo base_url('assets/vendor/popper/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Page level plugin JavaScript-->
<!--     <script src="<?php //echo base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url('assets/js/sb-admin-datatables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/custom-js/login-and-registration.js'); ?>"></script>
  <!-- <script src="<?php echo base_url('assets/custom-js/tadatableCRUD.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/custom-js/custom-register-user.js'); ?>"></script>
    
<!--     <script src="<?php// echo base_url('assets/js/sb-admin-charts.min.js'); ?>"></script> -->
  </div>

<script type="text/javascript">
$(document).ready(function() {
    $('.datepicker').datepicker({ format: "yyyy/mm/dd" });
}); 
</script>

<script type="text/javascript">

$(document).ready(function() {

    //function for view client table
    var table = $('#view_applicant_table').DataTable({
        responsive: true,
        //"lengthMenu": false
        // "bFilter" : false,               
        // "bLengthChange": false
    });
    
    $('#search_by_name').on('keyup' , function(){
        table
          .columns( 0 )
          .search( this.value )
          .draw();
    });

    $('#search_status').on( 'change', function () {
      table
          .columns( 4 )
          .search( this.value )
          .draw();
    } );

    //kbl
    $('#kbl_search_status').on( 'change', function () {
      table
          .columns( 6 )
          .search( this.value )
          .draw();
    } );
    // for register page search name function
    $('#search_register_account_by_name').on('keyup' , function(){
        table
          .columns( 1 )
          .search( this.value )
          .draw();
    });
} );

// Tawk_API = Tawk_API || {};
// Tawk_API.onLoad = function(){
//     //place your code here
//     alert(1)
// };
</script>

</html>
