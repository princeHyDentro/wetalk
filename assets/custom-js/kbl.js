$("document").ready(function(){
	
	   $('#kbl_report').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'print'
			]
		} );
	
	  $("#kbl_create").on("submit",function(e){
		     e.preventDefault();
			var pic_id;
			var name = $("#name").val();
			var address = $("#address").val();
			var mobile = $("#mobile").val();
			var telephone = $("#telephone").val();
			var exampleInputEmail = $("#exampleInputEmail").val();
			var datepicker = $("#datepicker").val();
			var age = $("#age").val();
			var gender = $("#gender").val();
			var educational = $("#educational").val();
			var datevisited = $("#datevisited").val();
			var school = $("#school").val();
			var course = $("#course").val();
			var enrollment = $("#enrollment").val();
			var referral = $("#referral").val();
			var remarks = $("#remarks").val();
			var formno = $("#formno").val();
	       
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
						 url    : "insert_new_kbl",
						 method : "post",
						 data   : {
							name : name,
							address : address,
							mobile : mobile,
							telephone : telephone,
							exampleInputEmail : exampleInputEmail,
							datepicker : datepicker,
							age : age,
							gender : gender,
							educational : educational,
							datevisited : datevisited,
							school : school,
							course : course,
							enrollment : enrollment,
							referral : referral,
							remarks : remarks,
							formno : formno,
							pic_id : data
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
	  
	  $("#kbl_update").on("submit",function(e){
		    e.preventDefault();
		    var name = $("#name").val();
			var address = $("#address").val();
			var mobile = $("#mobile").val();
			var telephone = $("#telephone").val();
			var exampleInputEmail = $("#exampleInputEmail").val();
			var datepicker = $("#datepicker").val();
			var age = $("#age").val();
			var gender = $("#gender").val();
			var educational = $("#educational").val();
			var datevisited = $("#datevisited").val();
			var school = $("#school").val();
			var course = $("#course").val();
			var enrollment = $("#enrollment").val();
			var referral = $("#referral").val();
			var remarks = $("#remarks").val();
			var formno = $("#formno").val();
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
							address : address,
							mobile : mobile,
							telephone : telephone,
							exampleInputEmail : exampleInputEmail,
							datepicker : datepicker,
							age : age,
							gender : gender,
							educational : educational,
							datevisited : datevisited,
							school : school,
							course : course,
							enrollment : enrollment,
							referral : referral,
							remarks : remarks,
							formno : formno,
							client_id : $("#client_id").val()
						},
						success : function (data) {
						   if (data == "success") {
							   window.location.href = '/wetalk/kbl/view_all_applicant';
						   }
						}
					});
			     }
			  }
	      });	 
	  });
});