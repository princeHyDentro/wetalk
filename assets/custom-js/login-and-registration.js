$(document).ready(function() {
	$("#login").click(function(event){
		event.preventDefault();
		var username = $('#username').val();
		var password = $('#password').val();
		login_auth(username,password);
	});
	$("#change-password").click(function(event){
		event.preventDefault();
		
		var confirm_password = $('#confirm_password').val();
        var new_password	 = $('#new_password').val();
        var userEmail		 = $('#userEmail').val();
        var userID			 = $('#userID').val();
       

  //       if(new_password == "" && confirm_password == ""){
		// 	$('#new_password').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
  //       	$('#new_password').next().text("Password is required!"); //select span he
		// 	$('#confirm_password').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
  //       	$('#confirm_password').next().text("Confirm password is required!"); //select span he
		// 	return false;
		// }else if(confirm_password == ""){
		// 	$('#confirm_password').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
  //       	$('#confirm_password').next().text("Confirm password is required!"); //select span he
		// 	return false;
		// }
		// if(new_password != confirm_password){
		// 	$('#confirm_password').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
  //       	$('#confirm_password').next().text("Password does not match !");
  //       	return false;
		// }else {
			//clear_form();
			var base_url = window.location.origin;
			var host = window.location.host;
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
				 	alert(data)
				 // 	if(data != 'succeeded') {
				 // 		alert(data);
				 // 		return false;
				 // 	} else {
					// 	window.location.href = "dashboard";
					// }
				 }
			});
		// }
		
	});
});
function clear_form(){
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
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
		 		alert(data);
		 		return false;
		 	} else {
				window.location.href = "dashboard";
			}
		 }
	});
}
