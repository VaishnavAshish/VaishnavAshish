<?php 
require('sidebar.php');
require('header.php');

if(isset($_POST["submit"]))
	{	
		$name = htmlspecialchars($_FILES["file"]["tmp_name"],ENT_QUOTES);
		$csv=htmlspecialchars(file_get_contents($name),ENT_QUOTES);
		$array=array_map("str_getcsv",explode("\n",$csv));
		$heading = htmlspecialchars($_POST['heading'],ENT_QUOTES);
	    $test_name = htmlspecialchars($_POST['test_name'],ENT_QUOTES);
		$test_category = htmlspecialchars($_POST['test_category'],ENT_QUOTES);
		foreach($array as $filesop)
		  { 
			$question = $filesop[0];
			$opt1 = $filesop[1];
			$opt2 = $filesop[2];
			$opt3 = $filesop[3];
			$opt4 = $filesop[4];
			$answer = $filesop[5];
			$result = mysql_query("Insert into test_question(question,opt1,opt2,opt3,opt4,answer,tc_id,th_id,tn_id) values('$question','$opt1','$opt2','$opt3','$opt4','$answer','$test_category','$heading','$test_name')");
		}
		if($result)
				{
					echo "<script>alert('Successful');</script>";
				}
		 else echo "<script>alert('unsuccessful');</script>";
 }	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Upload CSV file of Test Questions:</h1>
                    <div class="clearfix"></div>
                  </div>
			<form action="" id="demo-form2" data-parsley-validate method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose File:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="file" /><br />
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
