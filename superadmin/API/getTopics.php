<?php
include("../../connection.php");
$d = json_decode(file_get_contents("php://input"), false); 
$query="SELECT * FROM `topics` where cat_id=".$d->categoryID;
if($result=mysql_query($query)){
	while($row=mysql_fetch_array($result)){
		$a[]=$row;
	}
	json_encode($a);
}
?>