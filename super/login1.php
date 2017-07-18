<?php  
include("../connection.php");
	if(isset($_POST))
	{
		@$username = $_POST['username'];
		@$password = crypt($_POST['password'],'$2y$@NTRIKSH$@@Y$');
		$result = mysql_query("Select * from users where email = '".$username."' && password = '".$password."' && uid='1' ");
		$count = mysql_num_rows($result);
		if($count>0)
		{
			session_start();
			$_SESSION['username'] = $username;
			header('Location:index.php');
		}
		else
		{
			header('Location:login.php?error=Incorrect email or password');
		}
		
	}
?>