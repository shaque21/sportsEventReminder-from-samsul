<?php include "header.php"; ?>

<section id="contact-info" class="mb-4" style="margin-top: 10%">
<!-- show message -->
		<div id="msg" style="color: green; text-align: center; margin-bottom: 20px;"></div>
	<div class="container" style="background: linear-gradient(rgba(206, 214, 224,0.8),rgba(223, 228, 234,0.9));">
		
		<!-- form -->
		<form action="" method="" id="add_form">
			<div class="contact-page">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label for="name">Name :</label>
					    <input type="text" class="form-control" name="name" placeholder="Enter Your Name" id="name">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <label for="mobile">Mobile :</label>
					    <input type="text" class="form-control" placeholder="Enter Your Mobile Number" id="mobile" name="mobile">
					</div>
				</div>
			</div>
			<div class="col-md-6 p-0">
				<div class="form-group">
				    <label for="email">Email address :</label>
				    <input type="email" class="form-control" placeholder="Enter Your Email Address" id="email" name="email">
				</div>
			</div>
			<div class="form-group">
			  <label for="message">Message :</label>
			  <textarea class="form-control" rows="5" id="message" name="message"></textarea>
			</div>
			<div class="register-btn d-flex justify-content-center align-items-center mt-5">
				<input type="submit" id="save_btn" value="send form" name="save" class="btn"/>
			</div>

		</div>
		</form>
		
	</div>
	<!-- show error msg on page -->
	<div id="error_msg"></div>
	<!-- show success msg on page -->
	<div id="success_msg"></div>
	
</section>
<?php include "footer.php"; ?>
<script>
	$(document).ready(function(){
		$("#save_btn").on("click",function(e){
				e.preventDefault();
				var name = $("#name").val();
				var mobile = $("#mobile").val();
				var email = $("#email").val();
				var message = $("#message").val();
				if(name == "" || mobile == "" || email == "" || message == ""){
					$('#error_msg').html("All fields are required.").slideDown();
					$('#success_msg').slideUp();
					setTimeout(function(){
									$('#error_msg').fadeOut("slow");
								},4000);
				}
				else{

					$.ajax({
						url: "contact_insert.php",
						type: "POST",
						data: {
							name:name,
							mobile:mobile,
							email:email,
							message:message
						},

						success:function(data){
							if(data == 1){
								$('#msg').html("Query Send Succesfully.").slideDown();
								setTimeout(function(){
									$('#msg').fadeOut("slow");
								},4000);
								$('#add_form').trigger("reset");
							}
							else{
								$('#error_msg').html("can\'t save record.").slideDown();
								$('#success_msg').slideUp();
								setTimeout(function(){
									$('#error_msg').fadeOut("slow");
								},4000);
							}
						}
					});
				}
			});
	});
</script>
</body>
</html>