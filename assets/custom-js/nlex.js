$("document").ready(function(){
	
	  $("#referred").click(function(){
		  $("#referred_by_input").attr("disabled",false);
	  });
	  
	  $(".company").each(function(){
		  $(this).click(function(){
			  $("#referred_by_input").attr("value","");
		  });
	  });
  
	  $("#nlex_save").click(function(){
		    var company;
		    var name = $("#name").val();
		    var contact_no = $("#contact_no").val();
		    var address = $("#address").val();
		    var email_address = $("#email_address").val();
		    var birthdate = $("#birthdate").val();
		    var age = $("#age").val();
		    var gender= $("#gender").val();
		    var year_graduated = $("#year_graduated").val();
		    var date_visited = $("#date_visited").val();
		    var school = $("#school").val();
		    var course = $("#course").val();
		    var status = $("#status").val();
		    var month = $("#month").val();
		    var year = $("#year").val();
		    var j1_type = $("#j1_type").val();
		    var company = $(".company").is(':checked');
		    var message = $("#message").val();
		    var referred_by = $("#referred_by").val();
		    var formno = $("#formno").val(); 
		    var referred_by = $("#referred_by_input").val();	

            $(".company").each(function(){
				 if ($(this).is(":checked") == true) {
					 company = $(this).val();
				 }
			});		
			
			$.ajax({
				 url    : "insert_nclex",
				 method : "post",
				 data   : {
					name : name,
					contact_no : contact_no,
					email_address : email_address,
					birthdate : birthdate,
					age : age,
					gender : gender,
					year_graduated : year_graduated,
					date_visited : date_visited,
					school : school,
					status : status,
					month : month,
					year : year,
					j1_type : j1_type,
					company : company,
					message : message,
					formno : formno,
					address : address,
					course : course,
					referred_by : referred_by
				 },
				 success : function (data1) {
					if (data1 != "") {
						window.location.href = "view_all_applicant";
					}
				 }
			}); 
	  });
	  
	  $("#nclex_update").click(function(){
		  
		        var company;
				var name = $("#name").val();
				var contact_no = $("#contact_no").val();
				var address = $("#address").val();
				var email_address = $("#email_address").val();
				var birthdate = $("#birthdate").val();
				var age = $("#age").val();
				var gender= $("#gender").val();
				var year_graduated = $("#year_graduated").val();
				var date_visited = $("#date_visited").val();
				var school = $("#school").val();
				var course = $("#course").val();
				var status = $("#status").val();
				var month = $("#month").val();
				var year = $("#year").val();
				var j1_type = $("#j1_type").val();
				var company = $(".company").is(':checked');
				var message = $("#message").val();
				var referred_by = $("#referred_by").val();
				var formno = $("#formno").val(); 
				var referred_by = $("#referred_by_input").val();	
				var client_id = $("#client_id").val();	

				$(".company").each(function(){
					 if ($(this).is(":checked") == true) {
						 company = $(this).val();
					 }
				});		
		   				
				$.ajax({
					url : ""+$("#client_id").val()+"/1",
					method : "post",
					data : {
						name : name,
						contact_no : contact_no,
						email_address : email_address,
						birthdate : birthdate,
						age : age,
						gender : gender,
						year_graduated : year_graduated,
						date_visited : date_visited,
						school : school,
						status : status,
						month : month,
						year : year,
						j1_type : j1_type,
						company : company,
						message : message,
						formno : formno,
						address : address,
						course : course,
						referred_by : referred_by,
						client_id : client_id
					},
					success : function (data) {
					   if (data == "success") {
						   window.location.href = '/wetalk/nclex/view_all_applicant';
					   }
					}
				});
	  });
});