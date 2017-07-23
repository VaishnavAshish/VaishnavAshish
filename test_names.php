<?php 
 include("connection.php");

if(isset($_GET['th_id']))
{ 
	$topQuery="SELECT * FROM `test_heading` where th_id=".$_GET['th_id']." ";
	$heading_query=mysql_query($topQuery);
	$test_heading=mysql_fetch_array($heading_query);
}

?>
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
<div class = "container" style="margin-top:100px;margin-bottom:100px;padding-left:3%; padding-right:3%;" >			
		<div class="media_div col-sm-8 col-xs-12 " style="margin-bottom:15px;" >
			
			<?php 
				$Q="SELECT * FROM `test_name` where tc_id=".$_GET['tc_id']." AND 	th_id=".$_GET['th_id'];
				$query=mysql_query($Q);
				if(mysql_num_rows($query)>0){
				while($row=mysql_fetch_array($query)){
			?>
					<a href="#">
						<div class="col-xs-12 col-sm-6 image-testname" style="" >
							<img  src="images/test_icon.png">
							<h4 class="testname-heading" ><?php echo $row['tn_name'];?></h4>
						</div>
					</a>
			<?php }
			   }else {?>
                    <div class="row" style="margin-top:20px;margin-bottom:20px;">
                            <div class="container">
                                <center>
                                    <div class="col-xs-12" style="font-size:20px;background-color: #ececec;box-shadow: 5px 5px 20px #888888;padding:50px;text-align:center">
                                        <b>Sorry No Data To Be Shown</b>
                                    </div>
                                 </center>
                            </div>
                    </div>
        	<?php }?>
		</div>
		
<!--/-Page Content-->		


<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
