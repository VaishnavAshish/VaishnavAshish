<?php 
	include("../connection.php");
	if(isset($_POST['topic_id']))
	{
		$topic_id=htmlspecialchars($_POST['topic_id'],ENT_QUOTES);
		$query=mysql_query("select * from `subtopic` where topic_id='".$topic_id."'");
		if(mysql_num_rows($query)>0){
				while($row=mysql_fetch_array($query))
				{
					$res[]=$row;
				}
			
				echo json_encode(array('sub_data'=> $res));
		}
		else {
		$a=["sub_data"=>"NULL"];
		echo json_encode($a);
		}
	}
?>