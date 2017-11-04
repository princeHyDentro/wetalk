// (function( $ ){
//    $.fn.myfunction = function() {
//       alert('hello world');
//       return this;
//    }; 
// })( jQuery );

function login_auth(user_name,user_password){
	$.ajax({
		 url    : "login/login_auth",
		 method : "post",
		 data   : {
			 user_name        : user_name,
			 user_password 	  : user_password,
		 },
		 success : function (data) {
		 	alert(data)
		 	if(data != 'succeeded') {
		 		alert(data);
		 		return false;
		 	} else {
				// alert("Saved Successfully");
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
