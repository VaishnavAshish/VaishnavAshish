<?php 
 include("connection.php");

if(isset($_GET['th_id']))
{ 
	$topQuery="SELECT * FROM `test_heading` where th_id='".htmlspecialchars($_GET['th_id'],ENT_QUOTES)."' ";
	$heading_query=mysql_query($topQuery);
	$test_heading=mysql_fetch_array($heading_query);
}
if(isset($_GET['tc_id']))
{ 
	$catQuery="SELECT * FROM `test_category` where tc_id='".htmlspecialchars($_GET['tc_id'],ENT_QUOTES)."' ";
	$cat_query=mysql_query($catQuery);
	$test_cat=mysql_fetch_array($cat_query);
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
			<li><a href="testTopics.php?cat_id=<?php echo $_GET['cat_id'];?>">Online Test</a></li>  
			<li><a href="testTopics.php?cat_id=<?php echo $_GET['cat_id'];?>"><?php echo $test_cat['tc_name'];?></a></li>
			<li><?php echo $test_heading['th_name'];?></li> 	
		 </ol>
	</div>
</div>	
<!--/Breadcrumbs-->
<br><br>
<!--Page Content-->
<div class = "container" style="margin-top:100px;margin-bottom:100px;padding-left:3%; padding-right:3%;" >			
		<div class="media_div col-sm-8 col-xs-12 " style="margin-bottom:15px;" >
			
			<?php 
				$Q="SELECT * FROM `test_name` where tc_id=".$_GET['tc_id']." AND th_id=".$_GET['th_id'];
				$query=mysql_query($Q);
				if(mysql_num_rows($query)>0){
				while($row=mysql_fetch_array($query)){
			?>      
			       
					    <a href="test_instruction.php?tn_id=<?php echo $row['tn_id'];?>&cat_id=<?php echo $_GET['cat_id'];?>">
						<div class="col-xs-12 col-sm-12 image-testname">
							<img  src="images/test_icon.png">
							<h4 style="margin-top:6px; margin-left:50px;" ><?php echo $row['tn_name'];?></h4>
						</div>
					    </a>	
					
						<div class="col-xs-12 col-sm-12" style="margin-bottom:25px; border-bottom: 1px dashed #ccc;">
								<div class="col-xs-12 col-sm-6">
								<h5 style="color:#e84c4c;">No. of Questions : <span style="color:black;"><?php echo $row['no_of_q'];?></span></h5>
								</div>
								<div class="col-xs-12 col-sm-6">
								<h5 style="color:#e84c4c;">Test Time : <span style="color:black;"><?php $a=explode(";",$row['time']); echo $a[0]." hr ".$a[1]." min ".$a[2]." sec";?></span></h5>
								</div>
						</div>
						
					
					
			<?php }
			   }  else {?>
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

<!--News-->
<?php include('news.php');?>
<!--/News-->
</div>		
<!--/-Page Content-->		


<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
