$(document).ready(function() {
	$("#btnSend").click(function(event){
		event.preventDefault();
		var message = $( "#contact-form" ).serialize();
		var base_url = window.location.origin;
		var host 	 = window.location.host;

		$.ajax({
			url    : base_url+"/wetalk/message/createMessage",
			method : "post",
			data   : message,
			
			success : function (data) {
				alert(data)
			}
		});

	});
});