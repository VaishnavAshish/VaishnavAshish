<?php include("connection.php");
?>

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
	  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	</head>

<body>

<!--Header-->	
<?php 
    include("header.php");
	$query = mysql_query("Select * from `question`");	
?>
<!--/Header-->



<!--Icons-->
<div class="col-sm-12 col-xs-12" style="    height: 59px;
    
    margin-left: 4%;
    margin-right: 0% !important;
     width:88%;">
	
	
	<u><h3>Online test ::  <span style="color:green;">Online Aptitude Test<span><h3> </u>
	</div>	

	<div class="col-sm-12 col-xs-12 fixme" style="width:100%; height: 45px; margin-bottom: 1%; margin-left: 4%; margin-right: 0% !important; width:88%;">
		<div class="col-sm-8 col-xs-8">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">Private</a></li>
				<li><a href="#">Pictures</a></li>
				<li class="active">Vacation</li>        
			 </ol>
		</div>
		
		<div class="col-sm-4 col-xs-4 text-danger" style="float:right; ">
			<h5 style="float:right;">Time Left: <span id="timer"></span>
		
			</div></h5>
		
	</div>	
<div class = "container" style="padding-left:0; padding-right:0;" >		
 
	<div class="media_div col-sm-7 col-xs-12 question-outer " >
	   
			<?php 
			 $i=1;
				while($row=mysql_fetch_array($query))
				{	?>
			
			<div class="col-sm-8 col-xs-12 question-display">
							<p><b><?php echo $i.".</b>  ".$row['question'] ;?></p>
							
									<ul class="options clearfix">
										<li>
											<span>
											    <input  type="radio" class="test-checkbox" previousValue="" value="A" checked="false"  name="option<?php echo $i?>">
												<a href="JavaScript:void(0)">A.
												<?php echo $row['opt1']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="radio" class="test-checkbox" previousValue="" value="B" checked="false" name="option<?php echo $i?>">
												<a href="JavaScript:void(0)">B.
												<?php echo $row['opt2']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="radio" class="test-checkbox" previousValue="" value="C" checked="false" name="option<?php echo $i?>">
												<a href="JavaScript:void(0)">C.
												<?php echo $row['opt3']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="radio" class="test-checkbox" previousValue="" value="D" checked="false"  name="option<?php echo $i?>">
												<a href="JavaScript:void(0)">D.
												<?php echo $row['opt4']; ?>
												</a>
											</span>
										</li>
										<li style="display:none">
											<span>
												 <input  type="radio" class="test-checkbox" previousValue="" value="" checked=""  name="option<?php echo $i?>">
												<a href="JavaScript:void(0)">D.
												<?php echo $row['opt4']; ?>
												</a>
											</span>
										</li>
											
									</ul>
							
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="workspace" ws-id="ws<?php echo $i;?>" href="JavaScript:void(0)">&nbsp;Workspace</a>
							</div>
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="report" report-id="r<?php echo $i;?>" href="JavaScript:void(0)">&nbsp;Report</a>
							</div>
							<br>
							<section class="hidden-answer hidden hidden-animate" id="a<?php echo $i;?>">
								<p style="margin-left:5%;" class="text-danger">Correct answer is <?php echo $row['answer'];?></p>
							</section>
							<section class="hidden-discuss hidden hidden-animate" id="view-discuss">
								
							</section>
							<section  class="hidden-workspace hidden hidden-animate" style="border:none;" id="ws<?php echo $i;?>">
								<textarea  class="ckeditor editor1" id="editor1" name="editor1"></textarea>
							</section>
							<section class="hidden-report hidden hidden-animate" style="border:none;" id="r<?php echo $i;?>">
								<form action="" method="post">
									<div class="form-group">
										<textarea style="border:1px solid #ccc; width:100%; color: #555;" name="question" style="overflow: auto; resize:none; width:100%;" cols="15" placeholder="Please tell us what's wrong with this question" required></textarea>
									</div>
									<input style="border-radius:0px;" type="name" class="form-control"  placeholder="Enter Name*" name="name" required><br>
									<input style="border-radius:0px;" type="email" class="form-control"  placeholder="Enter email*" name="email" required><br>
									 <button type="submit" name="subscription" class="btn btn-default button-blue">Report</button>
								</form>
							</section>
							<div class="clear"></div>
						</div> <br> <br> <br>
						
			 <?php $i++;  }?>	
	</div>
	


<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
