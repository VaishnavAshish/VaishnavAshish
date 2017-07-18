<?php
include("connection.php");

if(isset($_POST))
{
@$email=$_POST['email'];
@$password=crypt($_POST['password'],'$2y$@NTRIKSH$@@Y$');
@$check=mysql_query("SELECT * FROM `users` WHERE email='".$email."' && password='".$password."'");
	if(mysql_num_rows($check)==0)
	{
		echo "Email/Password is Incorrect";
	}
	else{
			session_start();
			while($row=mysql_fetch_array($check))
				{
					$_SESSION['username']=$row['name'];
					$_SESSION['email']=$row['email'];
					$name=$_SESSION['username'];
					$arr=array('username'=>$name,'usr_email' => $email ,'msg'=>'Login Successful','status'=>'login');
					echo json_encode($arr);
				}	
		
		}	
	
}
?>