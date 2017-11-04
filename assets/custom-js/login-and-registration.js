$(document).ready(function() {
	$("#login").click(function(event){
		event.preventDefault();
		var username = $('#username').val();
		var password = $('#password').val();
		login_auth(username,password);
	});
	$("#change-password").click(function(event){
		event.preventDefault();
		$(this).text('Sending..');
		$('.error-same-pass').hide();

		var confirm_password = $('#confirm_password').val();
        var new_password	 = $('#new_password').val();
        var userEmail		 = $('#userEmail').val();
        var userID			 = $('#userID').val();
       

        if(new_password == "" && confirm_password == ""){
			$('#new_password').addClass('has-error');
        	$('#new_password').next().text("Password is required!");
			$('#confirm_password').addClass('has-error');
        	$('#confirm_password').next().text("Confirm password is required!");
			return false;
		}else if(confirm_password == ""){
			$('#confirm_password').addClass('has-error');
        	$('#confirm_password').next().text("Confirm password is required!");
			return false;
		}
		if(new_password != confirm_password){
			$('#confirm_password').addClass('has-error');
        	$('#confirm_password').next().text("Password does not match !");
        	return false;
		}else {

			var base_url = window.location.origin;
			var host 	 = window.location.host;
			$.ajax({
				 url    : base_url+"/wetalk/dashboard/password_reset",
				 method : "post",
				 data   : {
					new_password      : new_password,
					confirm_password  : confirm_password,
					userEmail		  : userEmail,
					userID			  : userID
				 },
				 success : function (data) {
				 	
				 	if(data == 'Message has been sent') {
				 		//clear_form();
				 		$('#close-form').text('Close');		
				 		$('#change-password').css({'display' : 'none'});
				 		$('.hide-form').css({'display' : 'none'});
				 		$('.success-text').show();
				 		$('.success-text').html('<div class="alert alert-success"><strong>Password has been updated!</strong></div> <br> <strong><em>Note :</em></strong><p>  For security purposes, you need to check your email and confirm the changes that you made for your password. Otherwise, you will not be allowed to login if you don\'t confirm this change. Thanks.</p>')				 		
				 	} else {
				 		$('.error-same-pass').show();
				 		$('#change-password').text("Send");
				 		$('.error-same-pass').text(data);
				 		//alert(data);	
					}
				 }
			});
		}
		
	});
});
function clear_form(){
	$('.form-group').show();
	$('.success-text').hide();
	$('#change-password').show();
	$('#change-password').text("Send");
	$('#close-form').text('Cancel');
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.form-group').show();
    $('#confirm_password').val("");
    $('#new_password').val("");
    $('.help-block').empty(); // clear error string
    $('#resetPassword').modal('hide'); // show bootstrap modal
}
function login_auth(user_name,user_password){
	$.ajax({
		 url    : "login/login_auth",
		 method : "post",
		 data   : {
			 user_name        : user_name,
			 user_password 	  : user_password,
		 },
		 success : function (data) {
		 	//alert(data)
		 	if(data != 'succeeded') {
		 		//alert(data);
		 		$('.failed-login').show();
		 		return false;
		 	} else {
				window.location.href = "dashboard";
			}
		 }
	});
}

$(document).ready(function() {
	$("#login").click(function(event){
		event.preventDefault();
		var username = $('#username').val();
		var password = $('#password').val();
		login_auth(username,password);
	});
});
