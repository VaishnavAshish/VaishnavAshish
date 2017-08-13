<?php include("connection.php");
?>
<?php  
	$limit=15;
	if(isset($_GET['page']))
	{	$start=0;
		$page=$_GET['page'];
		$start=$limit*$page;
		
		//echo '<script>alert("'.$start.$end.'")</script>';
	}
	else
	{
		$page=0;
		$start=$page;
		$end=$start+$limit;
	}
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
	
	$que = mysql_query("Select * from `question` where 	sub_id=".$_GET['sub_id']." limit $start,$limit ");	
	$page_count=mysql_num_rows(mysql_query("Select * from `question`"))/$limit;
?>
<!--/Header-->



<!--Icons-->
<br><br>

<div class = "container" style="padding-left:0; padding-right:0;" >			
	<div class="media_div col-sm-7 col-xs-12 question-outer " >
			<?php 
			 $i=$start+1;
				while($row=mysql_fetch_array($que))
				{	?>
			
			<div class="col-sm-8 col-xs-12 question-display">
							<p><b><?php echo $i.".</b>  ".$row['question'] ;?></p>
							
									<ul class="options clearfix" >
										<li>
											<span>
												<a class="check-answer" option-no="A" answer-no="<?php echo $row['answer'];?>" href="JavaScript:void(0)">A.
												<?php echo $row['opt1']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												<a class="check-answer" option-no="B" answer-no="<?php echo $row['answer'];?>" href="JavaScript:void(0)">B.
												<?php echo $row['opt2']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												<a class="check-answer" option-no="C" answer-no="<?php echo $row['answer'];?>" href="JavaScript:void(0)">C.
												<?php echo $row['opt3']; ?>
												</a>
											</span>
										</li>
										<li>
											<span>
												<a class="check-answer" option-no="D" answer-no="<?php echo $row['answer'];?>" href="JavaScript:void(0)">D.
												<?php echo $row['opt4']; ?>
												</a>
											</span>
										</li>
										
											
									</ul>
							
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="view-answer"  answer-id="a<?php echo $i;?>" href="JavaScript:void(0)">&nbsp;View Answer</a>
							</div>
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="discuss" href="JavaScript:void(0)">&nbsp;Discuss in forum</a>
							</div>
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
			 <ul class="pagination pagination-lg">
								<li> <a  href="questions.php?page=<?php if($page>0) echo $page+1; else echo "#";?>">&laquo;</a></li>
								<?php $j=0;
								 while($j<$page_count){
									if($j==$page){ $class="active";} else $class='';
								 ?>
										<li class="<?php echo $class;?>" ><a  href="questions.php?page=<?php echo $j; ?>"><?php echo $j+1; ?></a></li>
								<?php $j++; 
								      }  ?>
							      <li><a href="questions.php?page=<?php if($page<$page_count-1) echo $page+1; else echo "#"; ?>">&raquo;</a></li>	  
							    </ul>
	</div>
	
<!--News-->
<?php include('news.php');?>
<!--/News-->
</div>

<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
