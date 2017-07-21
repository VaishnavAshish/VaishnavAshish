<?php

error_reporting(0);
include('connection.php');
session_start();

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
								$_SESSION['username']=$name;
								$_SESSION['email']=$email;
								$arr=['username'=>$name,'email'=>'$email','msg'=>'Logged in Successfully'];
								echo json_encode($arr);
					}
					else if($numEmails > 0 AND $numfb < 0) {
						@$query=mysql_query("UPDATE into `users` (fbid) values('$fbid')");
						$_SESSION['username']=$name;
						$_SESSION['email']=$email;
						$arr=['username'=>$name,'email'=>'$email','msg'=>'Logged in Successfully'];
						echo json_encode($arr);
					}
					else{
							@$query=mysql_query("insert into `users`(name,email,fbid) values('$name','$email','$fbid')");
							if($query)
							{
								$_SESSION['username']=$name;
								$_SESSION['email']=$email;
								$arr=['username'=>$name,'email'=>'$email','msg'=>'Registered Successfully'];
								echo json_encode($arr);
							}
					}
				}			
else if(isset($_POST['GMAIL'])){
	//gmail Login
	$data=json_decode($_POST['GMAIL'], true);
	@$email=$data["U3"];
	@$name=$data["ig"];
	@$profileImage=$data["Paa"];
	@$gmailID=$data["Eea"];
	if(mysql_num_rows(mysql_query("SELECT * FROM `users` where email='".$email."'"))>0 && $email!=''){
		if(mysql_query("UPDATE `users` set name='".$name."',
			gmailid='".$gmailID."',
			profileImage='".$profileImage."'
			WHERE email='".$email."'")){
				//UPDATE SUCCESS
					$_SESSION['username']=$name;
					$_SESSION['email']=$email;
					$arr=['username'=>$name,'email'=>$email,'msg'=>'Registered Successfully'];
				echo json_encode($arr);
			}else {
				echo "Gmail Login Fail";
			}
	}else {
		//no entry found for the email
			if(mysql_query("INSERT INTO `users` set 
				name='".$name."',
				email='".$email."',
				gmailid='".$gmailID."',
				profileImage='".$profileImage."'")){
					//INsert Success
						$_SESSION['username']=$name;
						$_SESSION['email']=$email;
						$arr=['username'=>$name,'email'=>$email,'msg'=>'Registered Successfully'];
					echo json_encode($arr);
			}else {
				echo "Gmail Login Fail";
			}
	}
}else
	{
		//normal email Login
		 if(isset($_POST))
		 { 
			 print_r($_POST);
		    @$name=$_POST['name'];
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
				else if($email==''){
					echo "Something Went Wrong Please Try Again Later";
				}
				else
				{
				$password=crypt($password,'$2y$@NTRIKSH$@@Y$');
				
				@$query=mysql_query("insert into `users`(name,email,password) values('$name','$email','$password')");
					if($query)
					{
						$_SESSION['username']=$_POST['name'];
						$_SESSION['email']=$_POST['email'];
						$arr=['username'=>$name,'email'=>$email,'msg'=>'Registered Successfully'];
						echo json_encode($arr);
					}
					else echo "Registration Failed....please retry";
				}
				
				
			}
			else echo "Password does not match";
		 }
	}		 
?>