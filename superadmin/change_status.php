<?php
include("../connection.php");
if(isset($_POST['user_id']))
{	$status =$_POST['user_status'];
	if($status=='1'){
	$query = mysql_query("update `users`  set status=2 where uid='".$_POST['user_id']."'");
	}
	else if($status=='2'){
		$query = mysql_query("update `users`  set status=1 where uid='".$_POST['user_id']."'");
	}
	
	if($query)
	{   
		echo "true";
	}
	else{
		echo "false";
	}
}
?>