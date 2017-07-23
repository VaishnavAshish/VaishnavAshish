<?php 
//error_reporting(0);
    include("../connection.php");
    $que="SELECT * FROM `test_question` where tn_id=".$_GET['tn_id'];
    $result=mysql_query($que);
    while($row=mysql_fetch_array($result)){
        $a[]=$row;
    }
    echo json_encode($a);

?>