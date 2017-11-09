        </div>

        <!-- End Page Container -->
    </div>
<footer class="w3-container w3-teal w3-center w3-margin-top">
	<p>Find me on social media.</p>
	<i class="fa fa-facebook-official w3-hover-opacity"></i>
	<i class="fa fa-instagram w3-hover-opacity"></i>
	<i class="fa fa-snapchat w3-hover-opacity"></i>
	<i class="fa fa-pinterest-p w3-hover-opacity"></i>
	<i class="fa fa-twitter w3-hover-opacity"></i>
	<i class="fa fa-linkedin w3-hover-opacity"></i>
	<!-- <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> --></p>
</footer>
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

</body>
</html>


<!-- <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/materialize/prism.js'); ?>"></script> -->
<script>
$(".onclick-link").click(function(e){
	e.preventDefault();
	var base_url = window.location.origin;
	var host   = window.location.host;
	var redirect = $(this).data('id');
	if(redirect == 0){
		window.location.href = base_url+"/wetalk/client_pm";
	}else if(redirect == 1){
		window.location.href = base_url+"/wetalk/client_pm/messages/3";
	}else if(redirect == 2){
		window.location.href = base_url+"/wetalk/client_pm/messages/2";
	}else if(redirect == 4){
		window.location.href = base_url+"/wetalk/client_pm/send";
	}
});
// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
	if (mySidebar.style.display === 'block') {
		mySidebar.style.display = 'none';
	} else {
		mySidebar.style.display = 'block';
	}
}

// Close the sidebar with the close button
function w3_close() {
	mySidebar.style.display = "none";
}
</script>