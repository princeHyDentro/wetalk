$("document").ready(function(){
	
	  $('#nclex_report').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'print'
			]
		} );
	
	  $("#referred").click(function(){
		  $("#referred_by_input").attr("disabled",false);
	  });
	  
	  $(".company").each(function(){
		  $(this).click(function(){
			  $("#referred_by_input").attr("value","");
		  });
	  });
  
	  $("#nlex_save").on("submit",function(e){
		    e.preventDefault();
		    var company;
			var referred_by;			
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
		    var message = $("#message").val();
		    var formno = $("#formno").val(); 
		 
            $(".company").each(function(){
				 if ($(this).is(":checked") == true) {
					 company = $(this).val();
					 referred_by = "";
				 }
			});
            
            if ($("#referred").is(":checked") == true) {
				 referred_by = $("#referred_by_input").val();
				 company = "";
			}				
			$.ajax({
				 url:'do_upload_data',
				 method:"post",
				 data:new FormData(this),
				 processData:false,
				 contentType:false,
				 cache:false,
				 async:false,
				   success: function(data){
				 if (data != "") {
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
				 }
				}
			 });	 
	  });
	  
	  $("#nclex_update").on("submit",function(e){
		        e.preventDefault();
		        var company;
				var referred_by;
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
				var formno = $("#formno").val(); 
				var client_id = $("#client_id").val();	

				$(".company").each(function(){
					 if ($(this).is(":checked") == true) {
						 company = $(this).val();
						 referred_by = "";
					 }
				});

               if ($("#referred").is(":checked") == true) {
				   referred_by = $("#referred_by_input").val();
				   company = "";
			   }					
		   		$.ajax({
				 url:""+$("#client_id").val()+"/upload/"+$("#pic_id").val(),
				 method:"post",
				 data:new FormData(this),
				 processData:false,
				 contentType:false,
				 cache:false,
				 async:false,
				   success: function(data){
				 if (data != "") {		
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
						success : function (data1) {
						   if (data1 == "success") {
							   window.location.href = '/wetalk/nclex/view_all_applicant';
						   }
						}
					});
				 }
				}
			 });	
	  });
});