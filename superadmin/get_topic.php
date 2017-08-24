<?php
error_reporting(0);
include("../connection.php");
if(isset($_POST['data'])){
	$data=htmlspecialchars($_POST['data'],ENT_QUOTES);
	$query="SELECT * FROM `topics` where cat_id='".$data['cat_id']."'";
	if($data['filter']){
		 $query.=" AND type='".$data['filter']."'";
	}
	if($ress=mysql_query($query)){
		while($row=mysql_fetch_array($ress)){
			$a[]=$row;
		}
		echo json_encode(array('data'=> $a));
	}else{
		$a=["data"=>"{}"];
		echo json_encode($a);
	}
}



if(isset($_POST['cat_id'])){
	$cat_id = htmlspecialchars($_POST['cat_id'],ENT_QUOTES);
	$query=mysql_query("SELECT * FROM `topics` where cat_id='".$cat_id."'");
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