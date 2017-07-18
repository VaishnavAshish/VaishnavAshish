<?php 
								include("../connection.php");
											if(isset($_GET['topic_id']))
											{	@$check = $_GET['topic_id'];
												$delete = mysql_query("DELETE FROM topics WHERE topic_id = '".$check."' ");
												header('Location:topic.php');
											}
?>
