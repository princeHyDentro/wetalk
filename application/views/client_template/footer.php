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

</body>
</html>


<!-- <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/materialize/prism.js'); ?>"></script> -->
<script>
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