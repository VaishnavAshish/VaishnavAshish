<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Paddhle-pappu</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="style/style.css">
	  <link rel="stylesheet" href="style/css/bootstrap.min.css">
	  <script src="style/js/jquery.min.js"></script>
	  <script src="style/js/bootstrap.min.js"></script>
    <style>
	
	</style>
	

	</head>

<body>

<!--Header-->	
<?php include("header.php");
?>	
<!--/Header-->
<!--Page heading-->
<div class="col-sm-12 col-xs-12 page-heading">
	<h3>HOME <span class="glyphicon glyphicon-forward"></span><span class="text-success">Online Test</span><h3>
</div>	
<!--/Page Heading-->
	
<!--Breadcrumbs-->
<div class="col-sm-12 col-xs-12 fixme">
	<div class="col-sm-12 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>  
			<li><a href="index.php"><?php echo $test_heading['tc_name'];?></a></li> 	
		 </ol>
	</div>
</div>	
<!--/Breadcrumbs-->
<br><br>
<!--Page Content-->
<div class = "container" style="padding-left:3%; padding-right:3%;" >			
	
		<div class="instruction col-sm-8 col-xs-12" style="padding-left:0%; padding-right:0%;" >
			<div class="col-sm-6 col-xs-12">
				<h3>Instructions<h3>
				<ul>
					<li><span>Total No. of questions : 20</span></li>
					<li><span>Total Time Allotted    : 1 hr.</span></li>
				<ul>
			</div>
			<div class="col-sm-6 col-xs-12">
				<h3>Important Note<h3>
				<ul>
					<li><span>Total No. of questions : 20</span></li>
					<li><span>Total Time Allotted    : 1 hr.</span></li>
				<ul>
			</div>	
		</div>
		
<!--/-Page Content-->		


<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
