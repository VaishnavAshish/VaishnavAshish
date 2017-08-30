<?php
error_reporting(0);
require("../../connection.php");
$d = json_decode(file_get_contents("php://input"), false); 
$query="SELECT * FROM `topics` where cat_id=".$d->categoryID;
if(isset($d->type)){
	$query.=" AND (type='".$d->type."' OR type='Folder');";
}
if($result=mysql_query($query)){
	while($row=mysql_fetch_array($result)){
		$a[]=$row;
	}
	echo json_encode($a);
}else {
echo '[]';
}
?>