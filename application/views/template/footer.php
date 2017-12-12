		<!-- <footer class="page-footer grey lighten-4 black-text " style="padding-top: 0;border-top: 1px solid #ccc;">
			
			<div class="footer-copyright black-text ">
				<div class="container">
					© 2017 People Management Group
				</div>
			</div>
		</footer> -->
	</body>
	<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/moment.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/prism.js'); ?>"></script>


		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/dataTables.buttons.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.flash.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/jszip.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/pdfmake.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/vfs_fonts.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.html5.min.js');?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/datatables/buttons.print.min.js');?>"></script>
		<script src="<?php echo base_url('assets/datetimepicker/build/jquery.datetimepicker.full.min.js'); ?>"></script>
		
		<script src="<?php echo base_url('assets/custom-js/login-and-registration.js'); ?>"></script>
		<script src="<?php echo base_url('assets/custom-js/custom-register-user.js'); ?>"></script>
	<!-- 	<script src="<?php echo base_url('custom-js/j1_exchange_culture.js'); ?>"></script>
		<script src="<?php echo base_url('assets/custom-js/kbl.js'); ?>"></script>
		<script src="<?php echo base_url('assets/custom-js/nlex.js'); ?>"></script>
		<script src="<?php echo base_url('assets/custom-js/jquery.ajaxfileupload.js'); ?>"></script> -->



		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>
	
	<script>
		$(document).ready(function($) {
			$.datetimepicker.setLocale('en');
			$('.datepicker').datetimepicker({
				onGenerate:function( ct ){
					$(this).css({'background': '#009688', 'padding':0, 'padding-top': '10px'});
					$(this).find('.xdsoft_label').css({'background': '#009688'});
					$(this).find('.xdsoft_calendar').css({'background': '#fff'});
					$(this).find('.xdsoft_datepicker').css({'margin-left': 0,'width': '275px'});
					$(this).find('th').css({'background': '#009688', 'color': '#fff', 'border-color': '#009688'});
					$(this).find('.xdsoft_date > div').css({'padding': '7px'});
					$(this).find('.xdsoft_current ').css({'background': '#009688'});
				},

				closeOnDateSelect: true,
				timepicker: false,
				format: 'Y-m-d',
				mask:true,
				scrollInput: false
			});

			$('select').material_select();

			$('.modal').modal({
		      dismissible: true, // Modal can be dismissed by clicking outside of the modal
		      opacity: .5, // Opacity of modal background
		      inDuration: 300, // Transition in duration
		      outDuration: 200, // Transition out duration
		      startingTop: '4%', // Starting top style attribute
		      endingTop: '10%', // Ending top style attribute
		      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
		        alert("Ready");
		        console.log(modal, trigger);
		      },
		      complete: function() { alert('Closed'); } // Callback for Modal close
		    }
		  );




		//	$('.button-collapse').sideNav('show');
			// $('.button-collapse').sideNav({
		 //      menuWidth: 300, // Default is 300
		 //      edge: 'right', // Choose the horizontal origin
		 //      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		 //      draggable: true, // Choose whether you can drag to open on touch screens,
		 //      onOpen: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is opened
		 //      onClose: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is closed
		 //    }
		 //  );

		});
		
	</script>

</html>