<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/popper/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>



<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap-datepicker.js'); ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>
<!-- Custom scripts for this page-->

<!-- <script type="text/javascript" language="javascript" src="<?php echo base_url('assets/data
/jquery-1.12.4.js'); ?>"> -->

<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/dataTables.buttons.min.js');?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.flash.min.js');?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/jszip.min.js');?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/pdfmake.min.js');?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/vfs_fonts.js');?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.html5.min.js');?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.print.min.js');?>"></script>

<script src="<?php echo base_url('assets/custom-js/login-and-registration.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/custom-register-user.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/j1_exchange_culture.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/kbl.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/nlex.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/jquery.ajaxfileupload.js'); ?>"></script>




<script src="<?php echo base_url('assets/custom-js/message.js'); ?>"></script> 

</div>
<script type="text/javascript">
	// $(document).ready(function() {
	// 	$('.datepicker').datepicker({ format: "yyyy/mm/dd" });
	// }); 
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
</script>

</html>
