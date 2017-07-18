<?php 
include('../connection.php');
	if(isset($_POST['submit']))
	{
		@$topic = $_POST['topic'];
		@$category = $_POST['category'];
		@$topic_id = $_POST['topic_id'];
		$result = mysql_query("Insert into `subtopic`(subtopic,cat_id,topic_id) values('$topic','$category','$topic_id')");
		if($result)
		{
			echo "<script>alert('successful');</script>";
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Padhle-pappu</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

</head> 
<body>
   <div class="page-container">
	
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
					<?php include("header.php");?>
				<!-- //header-ends -->
			<!--content-->
			<div class="content">
				<h2>Add Subtopics</h2>
				<!--Add category form-->
					<form class="form-horizontal" action="" method="post">
							<div class="form-group">
							  <label class="control-label col-sm-2" for="email">Sub-topic Name:</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control"  placeholder="Enter Topic name" name="topic">
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-sm-2" for="pwd">Select Category</label>
							  <div class="col-sm-10">          
								<select class="sel_val" name="category" >
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$query = mysql_query("Select * from category");
										while($row=mysql_fetch_array($query))
										{
											
										
									?>
									<option value="<?php echo $row['cat_id'];?>"><?php echo $row['category'];?></option>
										<?php } ?>
								</select>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2" for="pwd">Select Topic</label>
							  <div class="col-sm-10 ">          
								<select class="sel_val topic-select" name="topic_id" >
									<option value="">Select Topic</option>
								</select>
							  </div>
							</div>

							<div class="form-group">        
							  <div class="col-sm-offset-2 col-sm-10">
								<button type="submit" name="submit"class="btn btn-default">Submit</button>
							  </div>
							</div>
					</form>
					<br><br>
					<div class="content-top" align="center">
					
							<table class="table table-bordered" style="width: 75%; text-align:center;">
									<thead>
										<tr >
											<th style="text-align:center;">S. No</th>
											<th style="text-align:center;">SubTopic</th>
											<th style="text-align:center;">Topic</th>
											<th style="text-align:center;">Category</th>
											<th style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$i=0;
										$result = mysql_query("Select * from `topics` join `category` on topics.cat_id=category.cat_id join `subtopic` on subtopic.cat_id = topics.cat_id && subtopic.topic_id=topics.topic_id ");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row['subtopic']?></td>
											<td><?php echo $row['topic']?></td>
											<td><?php echo $row['category']?></td>
											<td style=" display: flex;align-items: center;justify-content: center;">	
													<a  style="margin:2%;" href="delete_subtopic.php?sub_id=<?php echo $row['sub_id'];?>"><button  type="button" class="button btn-danger">Delete</button></a>
													<a  style="margin:2%;" href="edit_subtopic.php?sub_id=<?php echo $row['sub_id'];?>"><button  type="button" class="button btn-danger">Edit</button></a>
											</td>
										</tr>
									
									<?php }?>
									</tbody>
							</table>
					</div>
				</div>
		  </div>
	</div>
				
	<!--/sidebar-menu-->
	<?php include("sidebar.php");?>
	<!--//sidebar -->	
	<div class="clearfix"></div>	
</div>
		
<script src="main.js"></script>
</body>
</html>