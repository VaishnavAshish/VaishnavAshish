<?php
include("../../connection.php");
$d = json_decode(file_get_contents("php://input"), false); 
$query="SELECT * FROM `folder` where topic_id=".$d->topicID;
if(isset($d->type)){
	$query.=" AND type='".$d->type."';";
}
if($result=mysql_query($query)){
	while($row=mysql_fetch_array($result)){
		$a[]=$row;
	}
		echo json_encode($a);
}
?>