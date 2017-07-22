<?php 
include('../connection.php');
if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = crypt($_POST['password'],'$2y$@NTRIKSH$@@Y$');
		$result = mysql_query("Select * from users where uid=1 && email='".$username."' && password ='".$password."'");
		$count = mysql_num_rows($result);
		if($count>0)
		{
			session_start();
			$_SESSION['Adminusername'] = $username;
			$_SESSION['Adminstatus'] = '0';
			$_SESSION['Adminuid'] ='1';
			header('Location:index.php');
		}
		else
		{
			header('Location:login.php?error=Incorrect email or password');
		}
		
	}
	
	if(isset($_GET['error']))
		{
			$error=$_GET['error'];
		}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PADHLE-PAPPU.COM </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="login-form" method="post" action="">
              <h1>Login Form</h1>
              <div>
			    <div class="text-danger"><?php if(isset($error)) echo $error;?></div>
                <input type="text" class="form-control" placeholder="username" name="username"/>
			  
              </div>
              <div>
				<input type="password" class="form-control" placeholder="password" name="password"/>
              </div>
              <div>
               <button class="btn btn-default submit" type="submit" id="login" name="login">login</button>
                <a class="reset_pass" href="#">Lost your password?</a>
				 
			  
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Padhle-Pappu</h1>
                  <p>©2016 All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
