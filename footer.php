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

if(isset($_POST['subscription'])){
	$name=htmlspecialchars($_POST['name'],ENT_QUOTES);
	$email=htmlspecialchars($_POST['email'],ENT_QUOTES);
	$subscription_query=mysql_query("INSERT INTO `subscription`(name,email) values('$name','$email')");
	if($subscription_query)
		echo '<script>alert("Successful");</script>';
	else
		echo '<script>alert("UnSuccessful");</script>';
	
}
?>
<br><br>	
<!--footer start-->

		<div class="footer">
			<div class="container">			
				<div class="row footer-row">
							<div class="col-sm-4 col-xs-12 " style="height:100; padding:0 30px 0 30px;">
								<h3 style="margin-left:15px; margin-bottom:15px;">Subscription</h3>
								<!--Subscription form-->
									  <form class="foot" action=""  method="POST" >
										<div class="form-group">
											<input type="name" class="form-control" id="name" placeholder="Enter Your Name*" name="name" required><br>
										</div>  
										 <div class="form-group">
											 <input type="email" class="form-control" id="email" placeholder="Enter email*" name="email" required><br>
										 </div>
									
										<div class="form-group">
										<button type="submit" name="subscription" class="btn btn-default button-blue">Subscribe</button>
										</div>
									  </form>
							</div>
							<div class="col-sm-4 col-xs-12" style="padding:0 30px 0 30px;">
							    <h3 style="margin-left:15px; margin-bottom:15px; ">Contact Us</h3>
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
							<div class="col-sm-4 col-xs-12" style="text-align:left; margin-bottom:15px; padding:0 30px 0 30px;"><h3>Questions and Answers</h3>
								<ul style="list-style-position: inside;">
									 <form method="post" action="topics.php" id="cat" style="display:none;">
										<input type="text" name="cat_id">
									 </form>
									<?php 
										$cat=mysql_query("SELECT * FROM `category`");
										while($row=mysql_fetch_array($cat))
										{
										?>
										<li>
											<a class="category_post" style="color:white;" href="JavaScript:void(0)" value="<?php echo $row['cat_id'];?>"><?php echo $row['category'];?>
										</li>
									<?php } ?>
								</ul>
							</div>
			</div>	
      </div>
</div>
 <script src="style/js/google_login.js" async defer></script>