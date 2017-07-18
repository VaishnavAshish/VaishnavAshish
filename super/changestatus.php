<?php 
	include("../connection.php");
	if(isset($_GET['uid']))
	{	$uid = $_GET['uid'];
		$var = mysql_query("Select * from ``users` where uid = '".$uid."'");
		$result=mysql_fetch_array($var);
		if($result['status']=="ACTIVATED")
		{
			$arr = ['status'=>'ACTIVATED'];
			echo json_encode($arr);
		}
		else if($result['status']=="DEACTIVATED")
		{
			$arr = ['status'=>'DEACTIVATED'];
			echo json_encode($arr);
		}
		
	}
?>