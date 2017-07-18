<?php 
								include("../connection.php");
											if(isset($_GET['sub_id']))
											{	@$check = $_GET['sub_id'];
												$delete = mysql_query("DELETE FROM subtopic WHERE sub_id = '".$check."' ");
												header('Location:subtopic.php');
											}
?>
