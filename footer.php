<?php
include('connection.php');
if(isset($_POST['contact'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$message=$_POST['message'];
	$contact_query=mysql_query("INSERT INTO `contact_us`(name,email,mobile,message) values('$name','$email','$mobile','$message')");
	if($contact_query)
		echo '<script>alert("Successful");</script>';
	else
		echo '<script>alert("UnSuccessful");</script>';
	
}

if(isset($_POST['subscription'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subscription_query=mysql_query("INSERT INTO `subscription`(name,email) values('$name','$email')");
	if($subscription_query)
		echo '<script>alert("Successful");</script>';
	else
		echo '<script>alert("UnSuccessful");</script>';
	
}
?>



<!--NEWS-->
<div class="col-sm-4 col-xs-12" style="max-width:100%; ">
			<div class="col-xs-4" style="border:solid; background-color:white; height:560px; padding:0px; border:1; width:100%;"> 
				<div  class="col-xs-12"  style="background-color:#031658; height:35px; width:100%; color:white;">
					<h4  style="text-align:center;">Latest News<h4>
				</div>
				<marquee direction="up" style="height:520px;">
					<?php 
						$homepage = file_get_contents('http://newsapi.org/v1/articles?source=the-times-of-india&sortBy=top&apiKey=aac20ad4883a41e0b8d8f4874e8168e1');
						$news=json_decode($homepage,true);
						foreach($news['articles'] as $value)
						{ 
					?>
							<div class="col-xs-12" >
							<a href="<?php echo $value['url'];?>" target="_blank"
							<h4 class="text-primary"><?php echo $value['title'];?></h4></a>
							<p class="text-default"><?php echo $value['description'];?></p>
							</div>
						<?php } ?>
				</marquee>
			</div>
		</div>
</div>
<!--/NEWS-->
<br><br>	

<!--footer start-->

		<div class="footer">
			<div class="container">			
				<div class="row footer-row">
							<div class="col-md-3 col-sm-6 col-xs-12 " style="height:100;">
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
							<div class="col-md-4 col-sm-6 col-xs-12"><h3 style="margin-left:15px; margin-bottom:15px;">Contact Us</h3>
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
							<div class="col-md-4 col-sm-6 col-xs-12" style="text-align:left; margin-bottom:15px;"><h3>Questions and Answers</h3>
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