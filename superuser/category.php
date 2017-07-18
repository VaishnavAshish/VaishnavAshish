<?php
include("../connection.php");
if(isset($_POST["submit"])) {
	$name = $_POST['Category'];
	$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
	$target_dir = "images/".$name.".".$imageFileType;
	$img_name = $name.".".$imageFileType;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir);
       $result = mysql_query("Insert into `category`(category,cat_image) values('$name','$img_name')");
	   if($result)
	   {
		   echo "<script>alert('Success');</script>";
	   }
	   else
	   {
		   echo "<script>alert('Unsuccess');</script>";
	   }
    
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Gretong a Ecommerce Admin Panel Category Flat Bootstrap Responsive Web Template | Sunglasses :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/simpleCart.min.js"> </script>
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
   <!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">
        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });
    </script>
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
				<h2>Add Category</h2>
				<!--Add category form-->
				
					
				
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
							  <label class="control-label col-sm-2" for="email">Category Name:</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control"  placeholder="Enter Category name" name="Category">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2" for="email">Select image to upload::</label>
							  <div class="col-sm-10">
								<input type="file" name="fileToUpload"><br>
							  </div>
							</div>
							<div class="form-group">        
							  <div class="col-sm-offset-2 col-sm-10">
								<button  type="submit" value="Upload Image" name="submit" class="btn btn-default">Submit</button>
							  </div>
							</div>
				</form>		
				<!--Add category form-->
				
				<!--category table-->
					<br><br>
					<div class="content-top" align="center">
					
							<table class="table table-bordered" style="width: 75%; text-align:center;">
									<thead>
										<tr >
											<th style="text-align:center;">S. No</th>
											<th style="text-align:center;">Category</th>
											<th style="text-align:center;">Image</th>
											<th style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$i=0;
										$result = mysql_query("Select * from category");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row['category']?></td>
											<td>
												<img src=<?php echo $target_dir;?> ></img>
											</td>
											<td style=" display: flex;align-items: center;justify-content: center;">	
													<a href="delete_topic.php?topic_id=<?php echo $row['topic_id'];?>"><button  type="button" class="button btn-danger">Delete</button></a>
													<a href="edit_topic.php?topic_id=<?php echo $row['topic_id'];?>"><button  type="button" class="button btn-danger">Edit</button></a>
											</td>
										</tr>
									
									<?php }?>
									</tbody>
							</table>
					</div>
				<!--category table close-->
				
			</div>
			<!--content-->
			</div>
		</div>
				
			<!--/sidebar-menu-->
				<?php include("sidebar.php");?>
			<!--//sidebar -->	
			 <div class="clearfix"></div>	
	</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
	
<!-- /real-time -->
<script src="js/jquery.fn.gantt.js"></script>
    <script>

		$(function() {

			"use strict";

			$(".gantt").gantt({
				source: [{
					name: "Sprint 0",
					desc: "Analysis",
					values: [{
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "Requirement Gathering", 
						customClass: "ganttRed"
					}]
				},{
					name: " ",
					desc: "Scoping",
					values: [{
						from: "/Date(1322611200000)/",
						to: "/Date(1323302400000)/",
						label: "Scoping", 
						customClass: "ganttRed"
					}]
				},{
					name: "Sprint 1",
					desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period", 
						customClass: "ganttOrange"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});

			prettyPrint();

		});

    </script>
		   <script src="js/menu_jquery.js"></script>
</body>
</html>