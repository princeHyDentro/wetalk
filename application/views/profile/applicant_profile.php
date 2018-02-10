<?php if($this->uri->segment(1) == 'profile'): ?>
	<style type="text/css" media="screen">
		#left-side-nav{
			display: none;
		}
	</style>
<?php endif; ?>

<style>
	#toast-container {
	    float: right;
	    right:2% !important;
	}
	.profile-picture{
		width: 124px;
		position: absolute;
		top: 190px;
		z-index: 1;
		left: 32%;
		cursor: pointer;
		margin: 0;
	}
	.cover-image{
		height: 250px;
	}
	.profile-responsive-image{
		width: 100%;
		max-width: 100%;
	}
	.profile-content{
		padding: 80px 24px 24px 24px !important;
	}
	.profile-main-container{
		padding-top: 20px;
	}
	.profile-name{

	}
	.not-visible{
		display: none;
	}
	.edit-button, .close-button{
		display: none;
		cursor: pointer;
		margin-top: -6px;
	}
	.save-button{
		display: none;
		cursor: pointer;
		margin-top: -32px;
	}
	.hoverable:hover .edit-button,
	.hoverable:hover .close-button,
	.hoverable:hover .save-button{
		display: block;
	}
	.hoverable input{
		width: 80% !important;
	}
	.select-wrapper{
		width: 80%;
		display: inline-block;
	}
	.select-wrapper input{
		width: 100% !important;
	}
	.has-reavel{
		position: relative;
	}
	.collection-reveal{
		padding: 24px;
		position: absolute;
		background-color: #fff;
		width: 100%;
		overflow-y: auto;
		left: 0;
		top: 100%;
		height: 100%;
		z-index: 30;
		display: none;
		transform: translateY(0px);
	}
	.collection-reveal-title{
		font-size: 24px;
		font-weight: 300;
	}
	.collection-reveal-close, .collection-reveal-activator{
		cursor: pointer;
	}
	.fomr-div li>a {
		color: rgba(0, 0, 0, 0.87);
		display: block;
		font-size: 14px;
		font-weight: 500;
		height: 48px;
		line-height: 48px;
		padding: 0 32px;
	}
</style>
<?php 
	// echo "<pre>";
	// print_r($applicant_information['applicant_info']);
?>
<?php require_once(realpath(APPPATH.'views/template/head_left_nav.php')); ?>
<link rel="stylesheet" href="<?php echo base_url('assets/dropify/css/dropify.css'); ?>">
<div class="container profile-main-container">
	<div class="row">
		<div class="col s4">
			<div class="card">
				<div class="cover-image card-image waves-effect waves-block waves-light">
					<?php if($applicant_information['applicant_info']['applicant_profile_picture']):?>
						<img src="<?php echo base_url('assets/profile_picture/').''.$applicant_information['applicant_info']['applicant_profile_picture']; ?>" alt="profile picture" class="profile-responsive-image circle z-depth-2 activator">
					<?php else:?>
						<img class="activator" src="<?php echo base_url('assets/logo/myAvatar.png'); ?>">
					<?php endif;?>
					
				</div>
				<figure class="profile-picture">
					<?php if($applicant_information['applicant_info']['applicant_profile_picture']):?>
						<img src="<?php echo base_url('assets/profile_picture/').''.$applicant_information['applicant_info']['applicant_profile_picture']; ?>" alt="profile picture" class="profile-responsive-image circle z-depth-2 activator">
					<?php else:?>
						<img src="<?php echo base_url('assets/logo/myAvatar200.png'); ?>" alt="profile picture" class="profile-responsive-image circle z-depth-2 activator">
					<?php endif;?>
					
				</figure>
				<div class="card-content profile-content">
					<span class="card-title grey-text text-darken-4 center-align">
						<?php echo $applicant_information['applicant_info']['name']; ?>
					</span>
				</div>
			</div>
			<div class="divider"></div>
			<div class="card">
				<ul class="fomr-div" style="transform: translateX(0px);">
					<li><a href="#" class="upload-prof-pic"><i class="material-icons">perm_media</i> &nbsp;Upload Profile Picture</a></li>
					<li><a href="#resetPassword" class="modal-trigger"><i class="material-icons">settings</i>Reset Password</a></li>
					<li><a href="#exampleModal" class="modal-trigger"><i class="material-icons">keyboard_tab</i>Log Out</a></li>
				</ul>
			</div>
		</div>

		<div class="col s8">
			<ul class="collection with-header">
				<li class="collection-header teal darken-3"><h5 class="white-text"> <i class="material-icons"> perm_identity </i> Personal Information</h5> </li>
				<li class="collection-item has-reavel">
					<ul>
						<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-birthday-cake"> </i>  <strong> Name </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($applicant_information['applicant_info']['name']):?>
										<?php echo $applicant_information['applicant_info']['name'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i> 
									</h6>
									<p class="not-visible">
										<input placeholder="Placeholder" id="name" value="<?php echo $applicant_information['applicant_info']['name'];?>" name="name" type="text" class="validate">
										<i class="material-icons right red-text text-darken 2 close-button"> close </i> 
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i> 
									</p>
								</div>
							</div> 
						</li>
						<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-birthday-cake"> </i>  <strong>  Birth Date </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($applicant_information['applicant_info']['birth_date']):?>
										<?php echo $applicant_information['applicant_info']['birth_date'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i> 
									</h6>
									<p class="not-visible">
										<input placeholder="Placeholder" id="birth_date" value="<?php echo $applicant_information['applicant_info']['birth_date'];?>" name="birth_date" type="text" class="validate datepicker">
										<i class="material-icons right red-text text-darken 2 close-button"> close </i> 
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i> 
									</p>
								</div>
							</div> 
						</li>
						<li> 
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-heart-o"></i>  <strong> Marital Status </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($applicant_information['applicant_info']['marital_status']):?>
										<?php echo $applicant_information['applicant_info']['marital_status'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<select name="marital_status" id="marital_status">
											<option value="" disabled selected>Choose Marital Status</option>
											<option value="Single" <?php echo ($applicant_information['applicant_info']['marital_status'] == 'Single') ?  ' selected' : ''; ?> >Single</option>
											<option value="Married" <?php echo ($applicant_information['applicant_info']['marital_status'] == 'Married') ? ' selected' : ''; ?> >Married</option>
											<option value="Widowed" <?php echo ($applicant_information['applicant_info']['marital_status'] == 'Widowed') ? ' selected' : ''; ?> >Widowed</option>
											<option value="Divorced" <?php echo ($applicant_information['applicant_info']['marital_status'] == 'Divorced') ? ' selected' : ''; ?> >Divorced</option>
										</select>
										<i class="material-icons right red-text text-darken 2 close-button"> close </i> 
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i>
									</p>
								</div>
							</div>
						</li>
					</ul>
				</li>

				<li class="collection-header teal darken-3"><h5 class="white-text"> <i class="material-icons"> perm_identity </i> Service Information</h5> </li>
				<li class="collection-item has-reavel">
					<ul>
						<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-birthday-cake"> </i>  <strong> Service Name </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($applicant_information['applicant_info']['service']):?>
										<?php echo $applicant_information['applicant_info']['service'];?>
										<?php else:?>
											Not set
										<?php endif;?>
									</h6>
								</div>
							</div>
							<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-birthday-cake"> </i>  <strong> Status </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($applicant_information['applicant_info']['status']):?>
										<?php echo $applicant_information['applicant_info']['status'];?>
										<?php else:?>
											Not set
										<?php endif;?>
									</h6>
								</div>
							</div> 
						</li> 
						</li>
					</ul>
				</li>

				<li class="collection-header teal darken-3"><h5 class="white-text"> <i class="material-icons"> phone </i>Contact Information</h5></li>
				<li class="collection-item">
					<ul>
						<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-phone"> </i>  <strong> Phone Number </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($applicant_information['applicant_info']['contact']):?>
										<?php echo $applicant_information['applicant_info']['contact'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<?php if($applicant_information['applicant_info']['contact']):?>
										<input type="text" id="contact" name="contact" value="<?php echo $applicant_information['applicant_info']['contact'];?>" class="validate">
										<?php else:?>
											<input type="text" id="contact" name="contact" value="" class="validate">
										<?php endif;?>
										
										<i class="material-icons right red-text text-darken 2 close-button"> close </i>
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i>
									</p>
								</div>
							</div> 
						</li>
						<li> 
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-envelope">  </i>  <strong> Email Address </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($applicant_information['applicant_info']['email']):?>
										<?php echo $applicant_information['applicant_info']['email'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<?php if($applicant_information['applicant_info']['email']):?>
											<input type="email" id="email" name="email" value="<?php echo $applicant_information['applicant_info']['email'];?>" class="validate">
										<?php else:?>
											<input type="email" id="email" name="email" value="" class="validate">
										<?php endif;?>
										
										<i class="material-icons right red-text text-darken 2 close-button"> close </i>
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i>
									</p>
								</div>
							</div>
						</li>
						<li> 
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-map-marker"></i>  <strong> Address </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6>
										<?php if($applicant_information['applicant_info']['address']):?>
										<?php echo $applicant_information['applicant_info']['address'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<?php if($applicant_information['applicant_info']['address']):?>
											<input type="text" name="address" id="address" value="<?php echo $applicant_information['applicant_info']['address'];?>" class="validate">
										<?php else:?>
											<input type="text" name="address" id="address" value="" class="validate">
										<?php endif;?>
										
										<i class="material-icons right red-text text-darken 2 close-button"> close </i>
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i>
									</p>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<li class="collection-header teal darken-3"><h5 class="white-text"> <i class="material-icons"> person_pin </i> Credentials</h5></li>
				<li class="collection-item">
					<ul>
						<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-phone"> </i>  <strong> Username </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($applicant_information['applicant_info']['username']):?>
										<?php echo $applicant_information['applicant_info']['username'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<?php if($applicant_information['applicant_info']['username']):?>
										<input type="text" id="username" name="username" value="<?php echo $applicant_information['applicant_info']['username'];?>" class="validate">
										<?php else:?>
											<input type="text" id="username" name="username" value="" class="validate">
										<?php endif;?>
										
										<i class="material-icons right red-text text-darken 2 close-button"> close </i>
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i>
									</p>
								</div>
							</div> 
						</li>
					</ul>
				</li>

			</ul>
		</div>

	</div>
</div>
<div id="upload-picture" class="modal">
	<div class="modal-content">
		<h4>Upload Profile Picture</h4>
		<input type="file" id="file" class="dropify" />
		<div class="modal-footer">
		<button class="btn modal-action waves-effect waves-green" id="upload" type="button">Upload</button>
		<button class="btn modal-action modal-close waves-effect waves-green" id="upload" type="button">Cancel</button>
	</div>
	</div>
	
</div>


<?php require_once(realpath(APPPATH.'views/client_template/footer.php')); ?>
<script src="<?php echo base_url('assets/dropify/js/dropify.js'); ?>"></script>
<script>


	$(document).ready(function(){
		$('.dropify').dropify();
		$('.modal').modal();

		$('#upload').on('click', function () {

            var file_data = $('#file').prop('files')[0];
            var form_data = new FormData();
            var user_id = "<?php echo $applicant_information['applicant_info']['id']; ?>";
            form_data.append('file', file_data);
            $.ajax({
                url: '<?php echo base_url('profile/do_upload_applicant') ?>/'+user_id, // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {

                	$("#upload-picture").modal('close');

                	swal({   title: "Succesfully uploaded!",   
	                   text: "I will close in 2 seconds.",   
	                   timer: 2000,  
	                   icon: "success", 
	                   type: "success",
	                   showConfirmButton: false 
	                }).then(function() {
	                   location.reload()
	                });
                   // $('#msg').html(response); // display success response from the server
                },
                error: function (response) {

                	swal({   title: response,   
	                   text: "I will close in 2 seconds.",   
	                   timer: 2000,  
	                   icon: "warning", 
	                   type: "warning",
	                   showConfirmButton: false 
	                }).then(function() {
	                   location.reload()
	                });
                  //  $('#msg').html(response); // display error response from the server
                }
            });
        });

		$('body').on('click', '.upload-prof-pic', function(event){
			event.preventDefault();
			 $('#upload-picture').modal('open');
		});



		$('body').on('click', '.edit-button', function(){
			$(this).closest('.hoverable').find('p').show(); 
			$(this).parent().hide();
		});

		$('body').on('click', '.close-button', function(){
			$(this).closest('.hoverable').find('h6').show(); 
			$(this).parent().hide();
		});

		$('body').on('click', '.save-button', function(){
			var parent 	= $( this ).parent();
			var text 	= parent.siblings('h6');
			var data 	= $( this ).siblings('input');
			var user_id = "<?php echo $applicant_information['applicant_info']['id']; ?>";

			if( data.length < 1 ){
				data = $( this ).siblings('.select-wrapper').find('select');
			}

			data 		 = data.serialize();
			url          = "<?php echo base_url('profile/applicant_update'); ?>/"+user_id;

		    $.ajax({
		        url : url,
		        type: "POST",
		        data: data,
		        success: function(data)
		        {
		        	
		            if(data)
		            {
		            	var button = text.find('i');
		            	parent.fadeOut('slow');
		            	text.html(data).append(button).fadeIn('slow');
		            	location.reload();		                
		            }
		        },
		        error: function (jqXHR, textStatus, errorThrown)
		        {
		            alert('Error adding / update data');
		            $('#btnSave').text('save');
		            $('#btnSave').attr('disabled',false);
		        }
		    });

		});

		$('body').on('click', '.collection-reveal-activator', function(){
			var reveal = $(this).closest('.collection-header').next('.has-reavel').find('.collection-reveal');
			reveal.css({ display: 'block' })
					.velocity("stop", false)
					.velocity({ translateY: '-100%' }, {
						duration: 300, queue: false, easing: 'easeInOutQuad' 
					}).parent().css({'overflow-y': 'hidden'});
		});

		$('body').on('click', '.collection-reveal-close', function(){
			var closeReveal = $(this).closest('.has-reavel').find('.collection-reveal');
			closeReveal.velocity({ translateY: '0px' }, {
				duration: 255,
				queue: false,
				easing: 'easeInOutQuad',
				complete: function () {
						$(this).css({ display: 'none' });
						closeReveal.parent().css('overflow', 'inheret');
					}
			});

		});
	});
</script>
