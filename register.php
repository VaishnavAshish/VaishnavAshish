<?php
include('connection.php');
if(isset($_POST['gmailRegister'])){
	$data=json_decode($_POST['gmailRegister'], true);
	print_r($data);
}

if(isset($_POST['userdata'])){
					$data=json_decode($_POST['userdata'], true);
					@$name=$data['first_name']." ".$data['last_name'];
					@$email=$data['email'];
					@$fbid=$data['id'];
					
					@$rsEmails = mysql_query("SELECT * FROM `users` WHERE email = '".$email."'");
					@$numEmails = mysql_num_rows($rsEmails);
					@$rsfb = mysql_query("SELECT * FROM `users` WHERE fbid = '".$fbid."'");
					@$numfb = mysql_num_rows($rsfb);
					
					if($numfb > 0){
								session_start();
								$_SESSION['username']=$name;
								$_SESSION['email']=$email;
								$arr=['username'=>$name,'email'=>'$email','msg'=>'Logged in Successfully'];
								echo json_encode($arr);
					}
					
					
					else if($numEmails > 0) {
						@$query=mysql_query("insert into `users`(fbid) values('$fbid')");
						session_start();
						$_SESSION['username']=$name;
						$_SESSION['email']=$email;
						$arr=['username'=>$name,'email'=>'$email','msg'=>'Logged in Successfully'];
						echo json_encode($arr);
					}
					else{
							@$query=mysql_query("insert into `users`(name,email,fbid) values('$name','$email','$fbid')");
							if($query)
							{
								session_start();
								$_SESSION['username']=$name;
								$_SESSION['email']=$email;
								$arr=['username'=>$name,'email'=>'$email','msg'=>'Registered Successfully'];
								echo json_encode($arr);
							}
					}
				}			

else
	{
	
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
	}		 
?>