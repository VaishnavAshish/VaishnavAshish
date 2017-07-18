<?php 
session_start();
if(isset($_POST)){
	if($_POST['status']=="logout")
	{
		session_unset();
		session_destroy();
		
		echo "ok";
	}
}
?>