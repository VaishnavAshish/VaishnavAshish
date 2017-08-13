<?php 
include 'connection.php';
if(isset($_GET['tn_id']))
{  
	$testQuery="SELECT * FROM `test_name` join `test_heading` on test_name.th_id=test_heading.th_id join `test_category` on test_name.tc_id=test_category.tc_id where test_name.tn_id='".$_GET['tn_id']."' ";
	$test_query=mysql_query($testQuery);
	$test=mysql_fetch_array($test_query);
	
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
			<li><a href="testTopics.php?cat_id=<?php if(isset($_GET['cat_id'])) echo $_GET['cat_id']; ?>">Online Test</a></li> 
			<li><a href="test_names.php?th_id=<?php echo $test['th_id'];?>&tc_id=<?php echo $test['tc_id'];?>"><?php echo $test['tc_name']; ?></a></li>
			<li><a href="test_names.php?th_id"><?php echo $test['th_name']; ?></a></li>
			<li><a href="test_names.php?"><?php echo $test['tn_name'];?></a></li> 	
		 </ol>
	</div>
</div>	
<!--/Breadcrumbs-->
<br><br>
<!--Page Content-->
<div class = "container" style="padding-left:3%; padding-right:3%;" >			
	
		<div class="instruction col-sm-8 col-xs-12" style="padding-left:0%; padding-right:0%;" >
			<div class="col-sm-6 col-xs-12">
				<h3 style="">Instructions<h3>
				<ul>
					<li><span>Total No. of questions : <?php echo $test['no_of_q'];?></span></li>
					<li><span>Total Time Allotted    : <?php $a=explode(";",$test['time']); echo $a[0]." hrs ".$a[1]."  min ".$a[2]." sec";?></span></li>
					<li><span>Each question carry 1 marks</span></li>
					<li><span>No Negative marking is there</span></li>
					<li><span>All questions are Multiple choice questions</span></li>
				<ul>
			</div>
			<div class="col-sm-6 col-xs-12">
				<h3>Important Note<h3>
				<ul>
					<li><span>Do not refresh the page</span></li>
					<li><span>Test will be automatically submitted if time is over</span></li>
				<ul>
			</div>
			<div class="col-sm-12 col-xs-12" style="margin-top:30px; display: flex; align-items: center; justify-content: center; margin-bottom:40px;">
			     <a href="test.php?tn_id=<?php echo $test['tn_id'];?>"><button type="button" class="btn btn-success">Start test</button></a>
			</div>
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
