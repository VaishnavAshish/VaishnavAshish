<?php
error_reporting(0);
$a=array();
require("../../connection.php");
$d = json_decode(file_get_contents("php://input"), false); 
$query="SELECT * FROM `subtopic` ";
if(isset($d->topicID)){
	$query.="where topic_id=".$d->topicID;
}
if(isset($d->folderID)){
	$query.="where folder_id=".$d->folderID;
}
if(!isset($d->topicID) && !isset($d->folderID)){
$query.=" where 1";
}

//echo $query;

if($result=mysql_query($query)){
	while($row=mysql_fetch_array($result)){
		$a[]=$row;
	}
	echo json_encode($a);
}else {
echo '[]';
}
?>