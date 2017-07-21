<?php 
include("connection.php");
if(isset($_GET['cat_id']))
{   $cat_id=$_GET['cat_id'];
	$query=mysql_query("SELECT * FROM `topics` JOIN `category` ON topics.cat_id=category.cat_id where topics.cat_id='".$cat_id."' ");
	$row1=mysql_fetch_array($query);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  <title></title>
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
	<h3>HOME <span class="glyphicon glyphicon-forward"></span> <span class="text-success"><?php echo $row1['category'];?></span><h3>
</div>	
<!--/Page Heading-->
	
<!--Breadcrumbs-->
<div class="col-sm-12 col-xs-12 fixme">
	<div class="col-sm-12 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Private</a></li>
			<li><a href="#">Pictures</a></li>
			<li class="active">Vacation</li>        
		 </ol>
	</div>
</div>	
<!--/Breadcrumbs-->

<!--Page Content-->
<div class = "container" style="padding-left:0; padding-right:0;" >			
	
		<div class="media_div col-sm-7 col-xs-12 " >
			<?php while($row=mysql_fetch_array($query))
					{ ?>
			<a href="#">
				<div class="col-xs-4 col-sm-4 img_padd" style="" >
					<img align="middle" src="images/file.png">
					<h4 class="h4_gk" ><?php echo $row['topic'];?></h4>
				</div>
			</a>
					<?php }?>
		</div>
	
		
<!--/Page Content-->

<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
