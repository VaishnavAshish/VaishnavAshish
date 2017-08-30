<?php
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
								<h3 style="margin-left:15px; margin-bottom:15px;">About Us</h3>
								<p>"Practice does not make perfect,Only perfect practice makes perfect" -Practice Aptitude, Reasoning, Verbal and other questions to make your practice perfect.<p>
								<p>We at padhlepappu.com believe in hard work and dedication and we want to provide platform to those students who have the dream to get the government jobs through their own preparation. </p>
							</div>
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