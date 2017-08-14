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
<script>
var t;
function timer(hr,min,sec) {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("timer").innerHTML = hr+" Hr "+min+" Min " + sec+" Sec";
                 t=setTimeout(function(){
				 timer(hr,min,sec);
				 },1000);
            }
            else { 
                if (parseInt(sec) == 0) {
                   // min = parseInt(min) - 1;
                    
					if(parseInt(min)==0 && parseInt(hr)>0){
						hr=parseInt(hr)-1;
						min=60;
						sec=60;
						document.getElementById("timer").innerHTML = hr+" Hr "+min+" Min " + sec+" Sec";
                        t= setTimeout(function(){
				          timer(hr,min,sec);
				          },1000);
					}
					
					else if (parseInt(min)==0 && parseInt(hr)==0) {
                       alert("Timeout Click ok to submit");
					   setTimeout(function(){
				          $('#submit').click();
				          },1000);
					 }
                    else {
						min = parseInt(min) - 1;
                        sec = 60;
                        document.getElementById("timer").innerHTML = hr+" Hr "+min+" Min " + sec+" Sec";
                       t= setTimeout(function(){
				          timer(hr,min,sec);
				          },1000);
                    }
                }
               
            }
        }
  

</script>
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
			<h5 style="float:right;">Time Left: <span id="timer"><script>
			var hr="<?php echo $hr;?>";
			var min="<?php echo $min;?>";
			var sec="<?php echo $sec;?>";
			timer(hr,min,sec);</script></span></h5>
		</div>
		
	</div>	
<div class = "container" style="padding-left:0; padding-right:0;" >		
	<div ng-app="test" ng-controller="testCtrl as test"  class="media_div col-sm-7 col-xs-12 question-outer " >

			<div ng-if="!test.resultView" ng-repeat="TestQ in test.data track by $index" class="col-sm-8 col-xs-12 question-display">
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
							
							<div class="col-xs-6 col-sm-3 under-option">
								<a class="workspace" ng-click="test.toggel(TestQ,'Hanswer')" >&nbsp;Workspace</a>
							</div>

							<section  class="hidden-workspace" ng-show="TestQ.Hanswer==true">
								<textarea  class="ckeditor editor{{$index}}" id="editor{{$index}}" name="editor{{$index}}"></textarea>
							</section>

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
						</div> <br> <br> <br>
						<div ng-if="!test.resultView" class="Submit" style="padding:0px 30px; ">
							<button id="submit" style="margin-top:30px;" ng-click="test.showResult()" class="btn btn-info col-xs-12">Submit</button>
						</div>

						<div ng-if="test.resultView" class="col-xs-12">
							<!--Result to be Displayed Here-->
							<p>Correct Answer: <Span>{{test.correstCount}}</span></p>
							<p>Wrong Answer: <Span>{{test.wrongCount}}</span></p>
							<p>Un-Attempedr: <Span >{{test.UnCount}}</span></p>
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
