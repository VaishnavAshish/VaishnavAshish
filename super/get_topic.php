<?php
include("../connection.php");
if(isset($_POST['cat_id'])){
	$cat_id=$_POST['cat_id'];
	$query=mysql_query("SELECT * FROM `topics` where cat_id='".$cat_id."'");
	
	while($row=mysql_fetch_array($query)){
		$a[]=$row;
	}
	
	echo json_encode(array('data'=> $a));
     
	
}
?>