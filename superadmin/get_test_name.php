<?php
include("../connection.php");
if(isset($_POST['th_id'])){
	$th_id=htmlspecialchars($_POST['th_id'],ENT_QUOTES);
	$query=mysql_query("SELECT * FROM `test_name` where th_id='".$th_id."'");
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