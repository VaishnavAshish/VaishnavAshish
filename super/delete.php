<?php 
								include("../connection.php");
											if(isset($_GET['uid']))
											{	@$check = $_GET['uid'];
												$delete = mysql_query("DELETE FROM users WHERE uid = '".$check."' ");
												//header('Location:index.php');
											}
?>
