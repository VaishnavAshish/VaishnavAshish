<?php
include("connection.php");

 if(isset($_POST))
 {  @$name=$_POST['name'];
    @$email=$_POST['email'];
	@$password=$_POST['password'];
	@$confirm_password=$_POST['confirm_password'];
	if($password==$confirm_password)
	{   
		@$rsEmails = mysql_query("SELECT * FROM `users` WHERE email = '".$email."'");
        @$numEmails = mysql_num_rows($rsEmails);
        if($numEmails > 0) {
            echo "Email already exists";
        }
        else
		{
		$password=crypt($password,'$2y$@NTRIKSH$@@Y$');
		
		@$query=mysql_query("insert into `users`(name,email,password) values('$name','$email','$password')");
			if($query)
			{
				session_start();
				$_SESSION['username']=$_POST['name'];
				$_SESSION['email']=$_POST['email'];
				$arr=['username'=>$name,'email'=>'$email','msg'=>'Registered Successfully'];
				echo json_encode($arr);
			}
			else echo "Registration Failed....please retry";
		}
		
		
	}
	else echo "Password does not match";
 }
?>