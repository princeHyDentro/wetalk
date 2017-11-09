<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/popper/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>


<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>
<!-- Custom scripts for this page-->
<script src="<?php echo base_url('assets/js/sb-admin-datatables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/login-and-registration.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/custom-register-user.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/j1_exchange_culture.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/kbl.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom-js/nlex.js'); ?>"></script>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.datepicker').datepicker({ format: "yyyy/mm/dd" });
	}); 
</script>
<?php 
// $is_logged_in = $this->session->userdata('is_logged_in');
// $name = $is_logged_in['user_rights'].' : '.$is_logged_in['user_fname'].' '.$is_logged_in['user_lname'];
?>
<script type="text/javascript">
	// $(document).ready(function() {
	// 	var base_url = window.location.origin;
	// 	var host   = window.location.host;
	// 	url =  base_url+"/wetalk/pm/ajax_messages";
	// 	$.ajax({
	// 		url    : url,
	// 		method : "post",
	// 		data   : {
	// 			MSG_NONDELETED      : 'MSG_NONDELETED',
	// 		},
	// 		success : function (data) {

	// 			jsonObject = JSON.parse(data);

	// 			$.each(jsonObject, function (key, val) {

	// 				$.each(val, function (key1, val1) {
	// 					console.log( val1);
	// 					var date = new Date(Date.parse(val1.privmsg_date)).toUTCString()

	// 					if(val1.read_unread['pmto_read'] == 1){
	// 						data = '<div class="dropdown-divider"></div>';
	// 						data += '<a class="dropdown-item" href="">';
	// 						data += '<strong>'+val1.from_name+'</strong>';
	// 						data += '<span class="small float-right text-muted">'+date+'</span>';
	// 						data += '<br><div class="dropdown-message small">'+val1.privmsg_body+'</div>';
	// 						data += '</a> ';

	// 						$(".data-msgs").append(data);
	// 					}
	// 				});
	// 			});
	// 		}
	// 	});
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
