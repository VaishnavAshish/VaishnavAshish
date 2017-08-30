<?php 
include('connection.php');
if(isset($_POST['contact'])){
	$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'],ENT_QUOTES);
	$mobile = htmlspecialchars($_POST['mobile'],ENT_QUOTES);
	$message = htmlspecialchars($_POST['message'],ENT_QUOTES);
	$contact_query=mysql_query("INSERT INTO `contact_us`(name,email,mobile,message) values('$name','$email','$mobile','$message')");
	if($contact_query)
		echo '<script>alert("Successful");</script>';
	else
		echo '<script>alert("UnSuccessful");</script>';
	
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Navigation</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="google-signin-client_id" content="214155233946-n3vsd276lrd5tno5m00nd7k4f1h5id32.apps.googleusercontent.com">
	  <link rel="stylesheet" href="style/style.css">
	  <link rel="stylesheet" href="style/css/bootstrap.min.css">
	  <script src="style/js/jquery.min.js"></script>
	  <script src="style/js/bootstrap.min.js"></script>
	
<script>


</script>
	</head>
	

<body>

<!--Header-->	
<div id="header">
<?php include("header.php");?>	
</div>
<!--/Header-->
<br><br>
<div class="container">
<div class="row">
<div class="col-sm-8 col-xs-12" style="padding:0 100px 0px 100px;">
							    <h2 style="margin-left:15px; margin-bottom:15px; color:#031658; ">Contact Us</h2>
								<!--Contact Us form-->
								<form class="foot" action="" method="POST">
										<div class="form-group">
											<input type="name" class="form-control"  placeholder="Enter Your Name*" name="name" required><br>
										</div>  
										<div class="form-group">
											 <input type="email" class="form-control"  placeholder="Enter Email*" name="email" required><br>
										</div>
										<div class="form-group">
											 <input type="number" class="form-control"  placeholder="Enter Mobile Number*" name="mobile" required><br>
										</div>
										<div class="form-group">
											<textarea class="form-control" name="message" placeholder="Type your message here*" rows="4" required></textarea>
										</div>
										<br>
										<div class="form-group">
											<button type="submit" name="contact" class="btn btn-default button-blue" style="">Submit</button>
										</div>
								</form>
		                </div>
<?php include("news.php"); ?>						
						
		</div>
</div>

<!--Footer-->	
<?php

 include("footer.php");?>	
<!--/Footer-->
		<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
       </body>
 </html>
