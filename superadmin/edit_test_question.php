<?php 
require('sidebar.php');
require('header.php');
     if(isset($_POST['edit_question']))
	{
		$qid = $_POST['edit_question']; 
		$res = mysql_query("SELECT * FROM `test_question` WHERE tq_id='".$qid."'");
		$row = mysql_fetch_array($res);
    
	}
	?>
 <?php 



		if(isset($_POST['submit']))
 	{ 	
	    $question = $_POST['question'];
      $tq_id = $_POST['tq_id'];
		$opt1 = $_POST['opt1'];
		$opt2 = $_POST['opt2'];
		$opt3 = $_POST['opt3'];
		$opt4 = $_POST['opt4'];
		$answer = $_POST['answer'];
		$heading = $_POST['heading'];
	    $test_name = $_POST['test_name'];
		$test_category = $_POST['test_category'];
		$result = mysql_query("Update test_question set question='".$question."',opt1='".$opt1."',opt2='".$opt2."',opt3='".$opt3."',opt4='".$opt4."',answer='".$answer."',tc_id='".$test_category."',th_id='".$heading."',tn_id='".$test_name."' where tq_id='".$tq_id ."'");
		if($result)
		{
			echo "<script>alert('successful');</script>";
      header('location:view_test_question.php');
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit Test Question</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question:<span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control"  placeholder="Enter Question here" name="question"><?php echo $row['question'];?></textarea>
                           <input style="display:none;" type="text" required="required" name="qid" value="<?php echo $row['tq_id'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 1: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control class="form-control col-md-7 col-xs-12" value="<?php echo $row['opt1'];?>" placeholder="Enter First Option" name="opt1">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 2: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['opt2'];?>" placeholder="Enter Second Option" name="opt2">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 3: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['opt3'];?>" placeholder="Enter Third Option" name="opt3">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 4: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['opt4'];?>" placeholder="Enter Fourth Option" name="opt4">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['answer'];?>" placeholder="Enter Answer" name="answer">
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Test Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="test_category" >
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$query_cat = mysql_query("Select * from test_category");
										while($row_cat=mysql_fetch_array($query_cat))
										{
											
										
									?>
									<option value="<?php echo $row_cat['tc_id'];?>"><?php echo $row_cat['tc_name'];?></option>
										<?php } ?>
								</select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Test Heading</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
								<select class="sel_val form-control heading" name="heading" >
									<option value="">Select Heading</option>
								</select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Test Name</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="sel_val  form-control test_name" name="test_name" >
								<option value="">Select Test Name</option>
							</select>
                        </div>
					 </div>
					 
					  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="submit"class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>

    


        
        </div>
        <!-- /page content -->

<?php 
require('footer.php');    
?>
