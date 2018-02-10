<!-- Page Container -->
<?php
$is_logged_in = $this->session->userdata('is_logged_in');
// echo "<pre>";
// print_r($user_information);
// echo "</pre>";
?>
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

<?php require_once(realpath(APPPATH.'views/template/head_left_nav.php')); ?>
<link rel="stylesheet" href="<?php echo base_url('assets/dropify/css/dropify.css'); ?>">
<div class="container profile-main-container">
	<div class="row">
		<div class="col s4">
			<div class="card">
				<div class="cover-image card-image waves-effect waves-block waves-light">
					<?php if($user_information['user_info'][0]['profile_picture']):?>
						<img src="<?php echo base_url('assets/profile_picture/').''.$user_information['user_info'][0]['profile_picture']; ?>" alt="profile picture" class="profile-responsive-image circle z-depth-2 activator">
					<?php else:?>
						<img class="activator" src="<?php echo base_url('assets/logo/myAvatar.png'); ?>">
					<?php endif;?>
					
				</div>
				<figure class="profile-picture">
					<?php if($user_information['user_info'][0]['profile_picture']):?>
						<img src="<?php echo base_url('assets/profile_picture/').''.$user_information['user_info'][0]['profile_picture']; ?>" alt="profile picture" class="profile-responsive-image circle z-depth-2 activator">
					<?php else:?>
						<img src="<?php echo base_url('assets/logo/myAvatar200.png'); ?>" alt="profile picture" class="profile-responsive-image circle z-depth-2 activator">
					<?php endif;?>
				</figure>
				<div class="card-content profile-content">
					<span class="card-title grey-text text-darken-4 center-align"> 
						<?php 
							echo $user_information['user_info'][0]['fname'].' '.$user_information['user_info'][0]['middle'].' '.$user_information['user_info'][0]['lname'];
						?>
					</span>
				</div>
			</div>
			<div class="divider"></div>
			<div class="card">
				<ul class="fomr-div" style="transform: translateX(0px);">
					<li><a href="#" class="upload-prof-pic"><i class="material-icons">perm_media</i> &nbsp;Upload Profile Picture</a></li>
					<li><a href="#exampleModal" class="modal-trigger"><i class="material-icons">keyboard_tab</i>Log Out</a></li>
					<li><a href="<?php echo base_url('dashboard'); ?>"><i class="material-icons">arrow_back</i> &nbsp;Back to Dashboard</a></li>
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
									<h6>  <i class="fa fa-birthday-cake"> </i>  <strong> First Name </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($user_information['user_info'][0]['fname']):?>
										<?php echo $user_information['user_info'][0]['fname'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i> 
									</h6>
									<p class="not-visible">
										<input placeholder="Placeholder" id="fname" value="<?php echo $user_information['user_info'][0]['fname'];?>" name="fname" type="text" class="validate">
										<i class="material-icons right red-text text-darken 2 close-button"> close </i> 
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i> 
									</p>
								</div>
							</div> 
						</li>
						<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-birthday-cake"> </i>  <strong> Middle Name </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($user_information['user_info'][0]['middle']):?>
										<?php echo $user_information['user_info'][0]['middle'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i> 
									</h6>
									<p class="not-visible">
										<input placeholder="Placeholder" id="middle" value="<?php echo $user_information['user_info'][0]['middle'];?>" name="middle" type="text" class="validate">
										<i class="material-icons right red-text text-darken 2 close-button"> close </i> 
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i> 
									</p>
								</div>
							</div> 
						</li>
						<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-birthday-cake"> </i>  <strong> Middle Name </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										<?php if($user_information['user_info'][0]['lname']):?>
										<?php echo $user_information['user_info'][0]['lname'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i> 
									</h6>
									<p class="not-visible">
										<input placeholder="Placeholder" id="lname" value="<?php echo $user_information['user_info'][0]['lname'];?>" name="lname" type="text" class="validate">
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
										<?php if($user_information['user_info'][0]['birth_date']):?>
										<?php echo $user_information['user_info'][0]['birth_date'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i> 
									</h6>
									<p class="not-visible">
										<input placeholder="Placeholder" id="birth_date" value="<?php echo $user_information['user_info'][0]['birth_date'];?>" name="birth_date" type="text" class="validate datepicker">
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
										<?php if($user_information['user_info'][0]['marital_status']):?>
										<?php echo $user_information['user_info'][0]['marital_status'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<select name="marital_status" id="marital_status">
											<option value="" disabled selected>Choose Marital Status</option>
											<option value="Single" <?php echo ($user_information['user_info'][0]['marital_status'] == 'Single') ?  ' selected' : ''; ?> >Single</option>


											<option value="Married" <?php echo ($user_information['user_info'][0]['marital_status'] == 'Married') ? ' selected' : ''; ?> >Married</option>
											<option value="Widowed" <?php echo ($user_information['user_info'][0]['marital_status'] == 'Widowed') ? ' selected' : ''; ?> >Widowed</option>
											<option value="Divorced" <?php echo ($user_information['user_info'][0]['marital_status'] == 'Divorced') ? ' selected' : ''; ?> >Divorced</option>
										</select>
										<i class="material-icons right red-text text-darken 2 close-button"> close </i> 
										<i class="material-icons right teal-text text-darken 2 save-button"> save </i>
									</p>
								</div>
							</div>
						</li>
						
					</ul>
				</li>

				<li class="collection-header teal darken-3"><h5 class="white-text"> <i class="material-icons"> person_pin </i> Employment Information</h5></li>

				<li class="collection-item">
					<ul>
						<li>
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-building-o"> </i>  <strong>  Company </strong></h6>
								</div>
								<div class="col s6">
									<h6> 
										Teaching Learning and Consultancy @WETALK INC.
									</h6>
								</div>
							</div> 
						</li>
						
						<li> 
							<div class="row">
								<div class="col s3">
									<h6>  <i class="fa fa-user-circle-o"></i>  <strong> Position </strong></h6>
								</div>
								<div class="col s6 hoverable">
									<h6> 
										
										<?php if($user_information['user_info'][0]['roles'] == "super"):?>
											Super Administrator
										<?php elseif($user_information['user_info'][0]['roles'] == "office-admin"):?>
											Office Administrator
										<?php elseif($user_information['user_info'][0]['roles'] == "sales"):?>
											Sales Representative
										<?php else:?>
											Encoder
										<?php endif;?>
									</h6>
								</div>
							</div>
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
										<?php if($user_information['user_info'][0]['primary_contact_number']):?>
										<?php echo $user_information['user_info'][0]['primary_contact_number'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<?php if($user_information['user_info'][0]['primary_contact_number']):?>
										<input type="text" id="primary_contact_number" name="primary_contact_number" value="<?php echo $user_information['user_info'][0]['primary_contact_number'];?>" class="validate">
										<?php else:?>
											<input type="text" id="primary_contact_number" name="primary_contact_number" value="" class="validate">
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
										<?php if($user_information['user_info'][0]['email']):?>
										<?php echo $user_information['user_info'][0]['email'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<?php if($user_information['user_info'][0]['email']):?>
											<input type="email" id="email" name="email" value="<?php echo $user_information['user_info'][0]['email'];?>" class="validate">
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
										<?php if($user_information['user_info'][0]['address']):?>
										<?php echo $user_information['user_info'][0]['address'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<?php if($user_information['user_info'][0]['address']):?>
											<input type="text" name="address" id="address" value="<?php echo $user_information['user_info'][0]['address'];?>" class="validate">
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
										<?php if($user_information['user_info'][0]['username']):?>
										<?php echo $user_information['user_info'][0]['username'];?>
										<?php else:?>
											Not set
										<?php endif;?>
										<i class="material-icons right blue-text text-darken 2 edit-button"> create </i>
									</h6>
									<p class="not-visible">
										<?php if($user_information['user_info'][0]['username']):?>
										<input type="text" id="username" name="username" value="<?php echo $user_information['user_info'][0]['username'];?>" class="validate">
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


<?php require_once(realpath(APPPATH.'views/template/footer.php')); ?>
<script src="<?php echo base_url('assets/dropify/js/dropify.js'); ?>"></script>

<script>


	$(document).ready(function(){
		$('.dropify').dropify();
		$('.modal').modal();

		$('#upload').on('click', function () {

            var file_data = $('#file').prop('files')[0];
            var form_data = new FormData();
            var user_id = "<?php echo $user_information['user_info'][0]['id']; ?>";
            form_data.append('file', file_data);
            $.ajax({
                url: '<?php echo base_url('profile/do_upload') ?>/'+user_id, // point to server-side controller method
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
			var user_id = "<?php echo $user_information['user_info'][0]['id']; ?>";

			if( data.length < 1 ){
				data = $( this ).siblings('.select-wrapper').find('select');
			}

			data 		 = data.serialize();
			url          = "<?php echo base_url('profile/update'); ?>/"+user_id;

		    $.ajax({
		        url : url,
		        type: "POST",
		        data: data,
		        success: function(data)
		        {
		        	
		        	console.log(data)
		            // if(data)
		            // {
		            // 	var button = text.find('i');
		            // 	parent.fadeOut('slow');
		            // 	text.html(data).append(button).fadeIn('slow');
		            // 	location.reload();		                
		            // }
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
