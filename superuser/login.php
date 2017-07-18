<?php 
if(isset($_GET['error']))
{
	@$error=$_GET['error'];
}
?>

<!DOCTYPE html>
<html>
	<head>
		 <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	  <link rel="stylesheet" href="../style/css/bootstrap.min.css">
	  <script src="../style/js/jquery.min.js"></script>
	  <script src="../style/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/mystyle.css">
		
	</head>
	<body>
		
		<div class="login-page">
		  <div class="form">
			<form class="login-form" method="post" action="login1.php">
			<div class="error">.<?php echo @$error ;?>.</div>
			  <input type="text" placeholder="username" name="username"/>
			  <input type="password" placeholder="password" name="password"/>
			  <button type="submit" id="login" name="submit">login</button><br>
			  <a href="forget.php">Forget Password</a>
			</form>
		  </div>
		</div>
	</body>
</html>	