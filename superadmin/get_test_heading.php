<?php
include("../connection.php");
if(isset($_POST['tc_id'])){
	$tc_id=htmlspecialchars($_POST['tc_id'],ENT_QUOTES);
	$query=mysql_query("SELECT * FROM `test_heading` where tc_id='".$tc_id."'");
	if(mysql_num_rows($query)>0){
		while($row=mysql_fetch_array($query)){
			$a[]=$row;
		}
		
		echo json_encode(array('data'=> $a));
	}
	else {
		$a=["data"=>"NULL"];
		echo json_encode($a);
	}
	
     
	
}
?>