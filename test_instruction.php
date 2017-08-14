<?php include("connection.php");

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
	  <title id="title">Navigation</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="style/style.css">
	   <link rel="stylesheet" href="style/style1.css">
	  <link rel="stylesheet" href="style/css/bootstrap.min.css">
	  <script src="style/js/jquery.min.js"></script>
	  <script src="style/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	  
	  <script src="angularTestFiles/angular/angular.min.js"></script>
	   <script src="angularTestFiles/app.js"></script>
	</head>

<body>

<!--Header-->	
<?php 
    include("header.php");
?>
<!--/Header-->



<!--Icons-->
	<div class="col-sm-12 col-xs-12" style="height: 59px;padding-left:25px;">
		<u><h3>Online test <span class="glyphicon glyphicon-forward"></span> <span style="color:green;"><?php echo $test['tc_name'];?><span><h3> </u>
	</div>	

	<div class="col-sm-12 col-xs-12 fixme" style="height: 45px; margin-bottom: 1%;">
		<div class="col-sm-8 col-xs-8">
			<ol class="breadcrumb">
			    <li><a href="index.php">Home</a></li>  
				<li><a href="test_names.php?th_id=<?php echo $test['th_id'];?>&tc_id=<?php echo $test['tc_id'];?>"><?php echo $test['tc_name']; ?></a></li>
				<li><a href="test_names.php?th_id"><?php echo $test['th_name']; ?></a></li>
				<li><a href="test_names.php?"><?php echo $test['tn_name'];?></a></li> 	       
			 </ol>
		</div>
		<?php $time=$test['time']; 
		$a=explode(';',$time);
		$hr=$a[0];
		$min=$a[1];
		$sec=$a[2];
		?>
		<div class="col-sm-4 col-xs-4 text-danger" style="float:right; ">
			<h5 style="float:right;"><span id="timer"></span></h5>
		</div>
		
	</div>	
<div class = "container" style="padding-left:0; padding-right:0;" >		
	<div ng-app="test" ng-controller="testCtrl as test"  class="media_div col-sm-7 col-xs-12 question-outer " >
			<div ng-if="test.resultView=='instructions'">
					<div class="instruction col-xs-12" style="padding-left:0%; padding-right:0%;" >
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
							<button type="button" ng-click="test.startTest(<?php echo $hr;?>,<?php echo $min;?>,<?php echo $sec;?>)" class="btn btn-success">Start test</button>
						</div>
					</div>
			</div>
			<div ng-if="test.resultView=='test'" ng-repeat="TestQ in test.data track by $index" class="col-sm-8 col-xs-12 question-display">
				
							<p><b>Q{{$index+1}} {{TestQ.question}}</p>
							
									<ul class="options clearfix">
										<li>
											<span>
											    <input  type="checkbox" ng-click="TestQ.userOption='A';test.checkAnswer(TestQ.userOption==TestQ.answer,$index)"  value="A" ng-checked="TestQ.userOption=='A'">
												<a href="JavaScript:void(0)">A.
												{{TestQ.opt1}}
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="checkbox" ng-click="TestQ.userOption='B';test.checkAnswer(TestQ.userOption==TestQ.answer,$index)" value="B" ng-checked="TestQ.userOption=='B'">
												<a href="JavaScript:void(0)">B.
												{{TestQ.opt2}}
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="checkbox" ng-click="TestQ.userOption='C';test.checkAnswer(TestQ.userOption==TestQ.answer,$index)" value="C" ng-checked="TestQ.userOption=='C'">
												<a href="JavaScript:void(0)">C.
												{{TestQ.opt3}}
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="checkbox" ng-click="TestQ.userOption='D';test.checkAnswer(TestQ.userOption==TestQ.answer,$index)" value="D" ng-checked="TestQ.userOption=='D'">
												<a href="JavaScript:void(0)">D.
												{{TestQ.opt4}}
												</a>
											</span>
										</li>
											
									</ul>
							
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="report" ng-click="test.toggel(TestQ,'Hreport')" >&nbsp;Report</a>
							</div>

							<section style="position: relative;top: 20px;margin:20px;" ng-show="TestQ.Hreport==true">
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
						</div> 
						<div ng-if="test.resultView=='test'" class="Submit" style="padding:0px 30px; ">
							<br> <br> <br>
							<button id="submit" style="margin-top:30px;" ng-click="test.showResult()" class="btn btn-info col-xs-12">Submit</button>
						</div>

						<div ng-if="test.resultView=='result'" class="col-xs-12">
							<!--Result to be Displayed Here-->
							<!--<p>Correct Answer: <Span>{{test.correstCount}}</span></p>
							<p>Wrong Answer: <Span>{{test.wrongCount}}</span></p>
							<p>Un-Attempedr: <Span >{{test.UnCount}}</span></p>-->
		<table class="ib-dgray" cellspacing="0" cellpadding="4" style="padding:10px;margin:10px;font-size:12px; border:2px solid #ddf8c2; background-color:#fafafa;" width="100%">
            <tbody><tr><td align="center" bgcolor="#ddf8c2" colspan="3"><b>Marks : <Span>{{test.correstCount}}</span>/{{test.correstCount+test.wrongCount+test.UnCount}} </b></td></tr>
            <tr>
                <td>Total number of questions</td>
                <td width="1%">:</td>
                <td width="10%" nowrap="nowrap" align="right" style="padding-right:40px"><b>{{test.correstCount+test.wrongCount+test.UnCount}}</b></td>
            </tr>
            <tr>
                <td>Number of answered questions</td>
                <td width="1%">:</td>
                <td align="right" style="padding-right:40px"><b>{{test.correstCount+test.wrongCount}}</b></td>
            </tr>
            <tr>
                <td>Number of unanswered questions</td>
                <td width="1%">:</td>
                <td align="right" style="padding-right:40px"><b>{{test.UnCount}}</b></td>
            </tr>
            </tbody></table>
						</div>



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
