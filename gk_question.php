<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Navigation</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="style/style.css">
	   <link rel="stylesheet" href="style/style1.css">
	  <link rel="stylesheet" href="style/css/bootstrap.min.css">
	  <script src="style/js/jquery.min.js"></script>
	  <script src="style/js/bootstrap.min.js"></script>
	</head>

<body>

<!--Header-->	
<?php 
    include("header.php");
	include("connection.php");
	$query = mysql_query("Select * from `questions`");
	
	
?>
<!--/Header-->



<!--Icons-->
<br><br>

<div class = "container" style="padding-left:0; padding-right:0;" >			
	<div class="media_div col-sm-7 col-xs-12 question-outer " >
			<?php 
			 $i=1;
				while($row=mysql_fetch_array($query))
				{	?>
			
			<div class="col-sm-8 col-xs-12 question-display">
							<p><?php echo $i.". ".$row['question'] ;?></p>
							
									<ul class="options clearfix" >
										<li><span><?php echo $row['opt1']; ?></span></li>
										<li><span><?php echo $row['opt2']; ?></span></li>
										<li><span><?php echo $row['opt3']; ?></span></li>
										<li><span><?php echo $row['opt4']; ?></span></li>					
									</ul>
							
								
							<div class="col-xs-6 col-md-3 col-sm-3 col-lg-3">
								<a href="#">View Answer</a>
							</div>
							<div class="col-xs-6 col-md-3 col-sm-3 col-lg-3">
								<a href="#">Discuss in form</a>
							</div>
							<div class="col-xs-6 col-md-3 col-sm-3 col-lg-3">
								<a href="#">workspace</a>
							</div>
							<div class="col-xs-6 col-md-3 col-sm-3 col-lg-3">
								<a href="#">report</a>
							</div>
						</div> <br> <br> <br>
						
			 <?php $i++;  }?>	
	</div>
	<div class="col-sm-4 col-xs-12" style="max-width:100%; ">
		<div class="col-xs-4" style="border:solid; background-color:white; height:460px; padding:0px; border:1; width:100%; margin-left:2%;"> 
			<div  class="col-xs-12 col-md-6 col-xs-12"  style="background-color:#031658; height:30px; width:100%; color:white;">
				<h5 style="text-align:center;">Recent Updates<h5>
			</div>
		</div>
	</div>
</div>
<br><br>	
<!--/Icons-->

<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
