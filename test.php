<?php include("connection.php");?>

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
		<u><h3>Online test ::  <span style="color:green;">Online Aptitude Test<span><h3> </u>
	</div>	

	<div class="col-sm-12 col-xs-12 fixme" style="height: 45px; margin-bottom: 1%;">
		<div class="col-sm-8 col-xs-8">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">Private</a></li>
				<li><a href="#">Pictures</a></li>
				<li class="active">Vacation</li>        
			 </ol>
		</div>
		
		<div class="col-sm-4 col-xs-4 text-danger" style="float:right; ">
			<h5 style="float:right;">Time Left: <span id="timer"></span></h5>
		</div>
		
	</div>	
<div class = "container" style="padding-left:0; padding-right:0;" >		
 <form method="POST" >
	<div ng-app="test" ng-controller="testCtrl as test"  class="media_div col-sm-7 col-xs-12 question-outer " >

			<div ng-repeat="TestQ in test.data" class="col-sm-8 col-xs-12 question-display">
							<p><b>{{$index}} {{TestQ.question}}</p>
							
									<ul class="options clearfix">
										<li>
											<span>
											    <input  type="checkbox" name="A{{$index}}"  value="A" ng-checked="{TestQ.userOption=='A'?true:false}">
												<a href="JavaScript:void(0)">A.
												{{TestQ.opt1}}
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="checkbox" name="A{{$index}}" value="B">
												<a href="JavaScript:void(0)">B.
												{{TestQ.opt2}}
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="checkbox" name="A{{$index}}" value="C">
												<a href="JavaScript:void(0)">C.
												{{TestQ.opt3}}
												</a>
											</span>
										</li>
										<li>
											<span>
												 <input  type="checkbox" name="A{{$index}}" value="D">
												<a href="JavaScript:void(0)">D.
												{{TestQ.opt4}}
												</a>
											</span>
										</li>
											
									</ul>
							
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="workspace" ng-click="test.toggel(TestQ,'Hanswer')" >&nbsp;Workspace</a>
							</div>
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="report" ng-click="test.toggel(TestQ,'Hreport')" >&nbsp;Report</a>
							</div>

							<section style="margin:20px 0px" ng-show="TestQ.Hanswer==true">
								<p style="margin-left:5%;" class="text-danger">Correct answer is {{TestQ.answer}}</p>
							</section>
							<section style="margin:20px 0px" ng-show="TestQ.Hreport==true">
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
	</div>
  </form>


<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
