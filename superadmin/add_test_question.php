<?php 
require('sidebar.php');
require('header.php');


		if(isset($_POST['submit']))
	{ 	
		$question = htmlspecialchars($_POST['question'],ENT_QUOTES);
		$opt1 = htmlspecialchars($_POST['opt1'],ENT_QUOTES);
		$opt2 = htmlspecialchars($_POST['opt2'],ENT_QUOTES);
		$opt3 = htmlspecialchars($_POST['opt3'],ENT_QUOTES);
		$opt4 = htmlspecialchars($_POST['opt4'],ENT_QUOTES);
		$answer = htmlspecialchars($_POST['answer'],ENT_QUOTES);
		$heading = htmlspecialchars($_POST['heading'],ENT_QUOTES);
	    $test_name = htmlspecialchars($_POST['test_name'],ENT_QUOTES);
		$test_category = htmlspecialchars($_POST['test_category'],ENT_QUOTES);
		$result = mysql_query("Insert into test_question(question,opt1,opt2,opt3,opt4,answer,tc_id,th_id,tn_id) values('$question','$opt1','$opt2','$opt3','$opt4','$answer','$test_category','$heading','$test_name')");
		if($result)
		{
			echo "<script>alert('successful');</script>";
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Add SubTopic</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control"  placeholder="Enter Question here" name="question"></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 1: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control class="form-control col-md-7 col-xs-12""  placeholder="Enter First Option" name="opt1">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 2: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Second Option" name="opt2">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 3: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Third Option" name="opt3">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 4: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Fourth Option" name="opt4">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Answer" name="answer">
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
									<option value="<?php echo htmlspecialchars($row_cat['tc_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row_cat['tc_name'],ENT_QUOTES);?></option>
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
