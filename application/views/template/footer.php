  
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
<!-- <a href="https://tawk.to/chat/59ec77094854b82732ff6f7b/default/?$_tawk_popout=true"></a> -->
<script type="text/javascript">
$(document).ready(function() {
    $('.datepicker').datepicker({ format: "yyyy/mm/dd" });
}); 
</script>
<?php $is_logged_in = $this->session->userdata('is_logged_in');
 // print_r( $is_logged_in);
  $name = $is_logged_in['user_rights'].' : '.$is_logged_in['user_fname'].' '.$is_logged_in['user_lname'];
 ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  // Here is an example how you could do it using PHP
//Tawk_API.getStatus();

//Example

// Tawk_API.onLoad = function(){
//     var pageStatus = Tawk_API.getStatus();

//     if(pageStatus === 'online'){
//         alert(1)
//     }else if(pageStatus === 'away'){
//         //do something for away
//     }else{
//         // do something for offline
//     }
// };



// var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
// (function(){
// var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
// s1.async=true;
// s1.src='https://embed.tawk.to/59ec77094854b82732ff6f7b/default';
// s1.charset='UTF-8';
// s1.setAttribute('crossorigin','*');
// s0.parentNode.insertBefore(s1,s0);

// })();

// Tawk_API.visitor = {
//     name  : '<?php echo $name; ?>',
//     email : '<?php echo $is_logged_in["user_email"]; ?>',
//     hash  : '<?php echo hash_hmac("sha256", $is_logged_in["user_email"], "63cc1c6433319f0ea8f1bc05003633bbca68c30a"); ?>'
// };

</script>
<!--End of Tawk.to Script-->
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
