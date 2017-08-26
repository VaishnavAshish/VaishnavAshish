<?php
session_start();
error_reporting(0);
include("connection.php");
if(isset($_GET['goto'])){
if(isset($_POST['login']))
{
echo '<script>alert("'.$_GET['goto'].'")</script>';	
$email=$_POST['email'];
$password=crypt(md5($_POST['password']),'$2y$@NTRIKSH$@@Y$#$%2sW@s&8Anxwu@SUbw23828@283hduchd');
$check=mysql_query("SELECT * FROM `users` WHERE email='".$email."' && password='".$password."'");
	if(mysql_num_rows($check)==0)
	{  $_SESSION['login_msg']="Incorrect Username or Password";
	   header("location:".$_GET['goto']);
	}
	else{
			session_start();
			while($row=mysql_fetch_array($check))
				{
					$_SESSION['username']=$row['name'];
					$_SESSION['email']=$row['email'];
					$name=$_SESSION['username'];
					header("location:".$_GET['goto']);
					// $arr=array('username'=>$name,'usr_email' => $email ,'msg'=>'Login Successful','status'=>'login');
					// echo json_encode($arr);
				}	
		
		}	
	
}
}
?>