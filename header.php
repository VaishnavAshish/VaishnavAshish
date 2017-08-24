<?php 
session_start();
require ('connection.php');
?>
<script>
	
	window.fbAsyncInit = function() {
		// FB JavaScript SDK configuration and setup
		FB.init({
		  appId      : '1848921672102352', // FB App ID
		  cookie     : true,  // enable cookies to allow the server to access the session
		  xfbml      : true,  // parse social plugins on this page
		  version    : 'v2.8' // use graph api version 2.8
		});
		
		// Check whether the user already logged in
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				//display user data
				getFbUserData();
			}
			});
		};

		// Load the JavaScript SDK asynchronously
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		// Facebook login with JavaScript SDK
		function fbLogin() {
			FB.login(function (response) {
				if (response.authResponse) {
					// Get and display the user profile data
					getFbUserData();
				} else {
					document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
				}
			}, {scope: 'email'});
		}

		// Fetch the user profile data from facebook
		function getFbUserData(){
			FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
			function (response) {
				saveUserData1(response);
				
			});
		}
	// Save user data to the database
		function saveUserData1(userData){
			var userData=JSON.stringify(userData);
			$.ajax({
					method :'post',
					url : 'register.php',
					data : {'userdata':userData},
					dataType:'json',
					success : function(response){			
															$('#modal').html('<div class="text-danger" style="text-align:center;"><h2>'+response.msg+'</h2></div>');
															setTimeout(function(){
																					$('#modal').html(original);
																					$('#close-modal').click();
																					$('.modal-backdrop ,fade ,in').remove();
																					$("#header").load("header.php");
																				},2000
																		);
												}
				});
		   
		}

</script>

<!--<script src="style/js/google_login.js"></script>-->
<meta name="google-signin-client_id" content="160094403010-g2bveq2fqcl2proet99fc660ivji0oj8.apps.googleusercontent.com">

<!--JavaScript File-->
<script src="style/main.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>


	<div class="row" style="position:fixed !important; top:0 !important; z-index:1000; background-color:white; width:100% !important; margin-left:0px; margin-right:0px; ">
		     <!--upper strip-->
			<div class="col-xs-12" style="background-color:white; height:10px;">
			</div>
			
			<!--Navigation div-->
			<div class="col-xs-12" style="background-color:; height:85px;">
				
				    <!--Logo-->
				
					<div  class="col-md-3 col-sm-3 col-xs-6" style="min-height:1px; padding-right:15px; padding-left:15px; height:83px;">
					 <a href="index.php"><img src="images/logo.png" style="max-width:100%; max-height:100%;"></a>
					</div>
				
				
				 <!--search and sign in-->
					<div class="col-md-9 col-sm-9 col-xs-6" style="background-color:; height:73px; ">
						<div style="float:right; padding-top: 2%;">
							<ul id="nav_search"style=" ">
							<?php 
							if(isset($_SESSION['username']))
							{  ?>
							<li class="nav_li user_info">
							   <div class="dropdown" style="display:table;">
									<div class="login_info dropdown-toggle" id="user_dropdown" data-toggle="dropdown">
										<span class="glyphicon glyphicon-user" style="margin-top: 1%;"></span>&nbsp;&nbsp;<?php echo $_SESSION['username'];?>
										<span class="caret"></span>
									</div>
									<ul class="dropdown-menu user-drop" role="menu">
										<div class="arrow-up"></div>
										<li role="menuitem"><?php echo $_SESSION['email'];?></li>
										<li class="divider"></li>
										<li role="menuitem" class="logout">
										<a href="JavaScript:void(0)">Logout</a></li>
									</ul>
								</div>
						   </li>
							<?php } 
							else {?>
							<li class="nav_li user_info">
								<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#signup" style="padding: 8px 12px;background-color: #031658; color:#fff;">Login / Register</button>
							</li>
							<?php }?>
							<li class="nav_li gsearch"  id="search" style="width:270px" >
					          <!-- <script>
								  (function() {
									var cx = '011329349375461885423:i5dvocmdaom';
									var gcse = document.createElement('script');
									gcse.type = 'text/javascript';
									gcse.async = true;
									gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
									var s = document.getElementsByTagName('script')[0];
									s.parentNode.insertBefore(gcse, s);
								  })();
								</script>
								<gcse:search></gcse:search>
								-->
								
								 <form   class="navbar-form navbar-left">
									<div class="form-group" style=" border-style:solid; border-width:thin;">
									  <input type="text" class="form-control" placeholder="Search" style=" border-width: 0 !important; border-style:solid; border-width:thin;">
									 </div>	
									  <button type="submit" class="btn btn-default glyphicon glyphicon-search headdiv"></button>
								</form>
							</li>
							    
						   </div>
					</div>
			</div>
		</div>	
			
				
			<!--Menu bar-->
			
				<div style="padding-top:90px;">	
              	<div class="col-xm-12 search-mobile">
				<!--		
				   <script>
								  (function() {
									var cx = '011329349375461885423:i5dvocmdaom';
									var gcse = document.createElement('script');
									gcse.type = 'text/javascript';
									gcse.async = true;
									gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
									var s = document.getElementsByTagName('script')[0];
									s.parentNode.insertBefore(gcse, s);
								  })();
								</script>
								<gcse:search></gcse:search>-->	
			<form class="navbar-form search-form" style="margin: 0px;margin-left: auto;margin-right: auto;">
						<div class=" form-group" style=" border-style:solid; border-width:thin; width:80%; float:left;">
							 <input type="text" class="form-control" placeholder="Search" style=" border-width: 0 !important;">
						 </div>	
						<button type="submit" class="btn btn-default glyphicon glyphicon-search headdiv" style="margin-top:-1px;"></button>
				    </form>
				
				</div>				
				<div class="topnav" style="background-color:#e84c4c !important; padding-left:4%;" id="myTopnav">
				  <a href="index.php">Home</a>
				  <a href="about.php">About</a>
					 <?php 
					 $cat=mysql_query("SELECT * FROM `category`");
					 while($res=mysql_fetch_array($cat))
						{  ?>
					<a  href="<?php echo $res['page']."?cat_id=".$res['cat_id']?>" value="<?php echo $res['cat_id'];?>"><?php echo $res['category'];?></a>	 
					<?php }  ?>
				
				 
				  <a href="javascript:void(0);" style="font-size:15px; margin:0px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
				
				
			</div>
			
		

				
				
				
	<!--modal for Signup -->
		<div class="container">	
			<div id="signup" class="modal fade" role="dialog">
				<div class="modal-dialog" style="width:80%; margin-top:90px; margin-left:auto; margin-right:auto;">
				
					
							<!-- modal Content #ffffb3-->
							<div class = "modal-content"> 
								
									<div class="modal-header" style="background-color:#e84c4c !important;">
										<button type="button" id="close-modal" class="close" data-dismiss="modal">&times;</button>
									</div>
								
									
								<div class="modal-body" style="padding:25px;" >
									<div class="row" id="modal" >
										  
											<div class="col-xs-12 col-md-6 login">
												<div class="col-xs-12 col-md-12">
													<h2 style="color:#031658">Login</h2><br>
													<!-- Login form-->
													 <?php if(isset($_SESSION['login_msg']))
															 { ?>
														    <script>$("#signup").modal("show");</script>
															<div  class="alert alert-danger fade in">
																<a href="#" class="close" data-dismiss="alert">×</a>
																<strong>
																	
																		
																	<?php  echo $_SESSION['login_msg'];?>
																</strong>
															</div>
														<?php session_unset($_SESSION['login_msg']); 
														      }
															?>
													<form method="post" action="login.php" class="login_form">
														<div class="form-group">
														  <label>Email:</label>
														  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
														</div>
														<div class="form-group">
															<label for="pwd">Password:</label>
															<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
														</div>
														<button type="submit" name="login" id="login" class="btn btn-default" style="background-color:#031658; color:white;">Login</button>
													</form>
												</div>
												
												<!--Social Login -->
												<div class="col-xs-12 col-md-12">
													<h3 class="text-danger" style="text-align:center; font-weight:bold;">OR</h3>
													<button class="social-button" onclick="fbLogin()" id="fbLink"><img src="images/fblogin.png" alt="Login with Facebook"></img></button>
													<div class="g-signin2" data-onsuccess="GSignin"></div>
													<script>
														//google signin 
															function GSignin(googleUser) {
															var profile = googleUser.getBasicProfile();
															saveUserData(profile,"GMAIL");
															}
													</script>
												</div>
												
											</div>
											
											
										<div class="col-xs-12 col-md-6 login" >
											<!-- Register form-->
											<h2 style="color:#031658;">Register</h2><br>
											<form action="register.php" method="post">
											    <?php if(isset($_SESSION['msg']))
															 { ?>
														    <script>$("#signup").modal("show");</script>
															<div  class="alert alert-danger fade in">
																<a href="#" class="close" data-dismiss="alert">×</a>
																<strong>
																	
																		
																	<?php  echo $_SESSION['msg'];?>
																</strong>
															</div>
														<?php session_unset($_SESSION['msg']); 
														      }
															?>
											   <div class="form-group">
												  <label>User Name:</label>
												  <input type="text" class="form-control"  placeholder="Enter Your Name" name="name" required>
												</div>
												<div class="form-group">
												  <label>Email:</label>
												  <input type="email" class="form-control"  placeholder="Enter email" name="email" required>
												</div>
												<div class="form-group">
												  <label>Password:</label>
												  <input type="password" class="form-control password" placeholder="Enter Password" name="password" autocomplete="off" onDrop="return false" onselectstart="return false" onpaste="return false;" onCopy="return false"   required>
												  <div></div>
												</div>
												<div class="form-group">
												  <label>Confirm Password:</label>
												  <input type="password" class="form-control confirm_password" placeholder="Retype Passsword" name="confirm_password" autocomplete="off" onselectstart="return false" onpaste="return false;" onCopy="return false"  required>
												   <div></div>
												</div>
												
												<div class="checkbox">
												  <label><input type="checkbox" class="tnc" name="remember" required checked><a href="">I agree term & Conditions</a></label>
												</div>
												<div id="register_result"></div>
												<button  type="submit" name="register" id="register" class="btn btn-default" style="background-color:#031658; color:white;">Register</button>
											</form>
										</div>
									</div>	
								</div>
								<div class="modal-footer" style="background-color:#e84c4c !important; height:50px;">
									
								</div>
								
							</div>
							
						
				</div>
			</div>	
		</div>