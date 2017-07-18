<?php 
require('sidebar.php');
require('header.php');
?>

<?php 

	if(isset($_POST['submit']))
	{
		@$name = $_POST['name'];
		@$heading = $_POST['heading'];
		$question=$_POST['nos'];
		$hours=$_POST['hours'];
		
		$result = mysql_query("Insert into `test_name`(tn_name,th_id,no_of_q,hours) values('$name','$heading',$question,$hours)");
		
		//Question file upload
							if(isset($_POST["file"]))
								{	$name = $_FILES["file"]["name"];
									$csv=file_get_contents($name);
									$array=array_map("str_getcsv",explode("\n",$csv));
									$c = 0;
									//print_r($array);
									
									foreach($array as $filesop)
									 {
										@$question = $filesop[0];
										@$opt1 = $filesop[1];
										@$opt2 = $filesop[2];
										@$opt3 = $filesop[3];
										@$opt4 = $filesop[4];
										@$answer = $filesop[5];
									
									@$category = $_POST['category'];
									@$topic_id = $_POST['topic_id'];
									@$sub_id = $_POST['sub_id'];
									
									$result = mysql_query("Insert into `test_question`(question,opt1,opt2,opt3,opt4,answer) values('$question','$opt1','$opt2','$opt3','$opt4','$answer','$category','$topic_id','$sub_id')");
									$c = $c + 1;
									  }
									if($result)
									{
										echo "<script>alert('Successful');</script>";
									}
									else echo "<script>alert('unsuccessful');</script>";
								}
		//questions file upload end
		
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
                    <h1>Add Test Name</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Test Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="name" value=""class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Test Heading</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="heading" >
									<option value="">Select Heading</option>
									<?php 
										$j = 0;
										$query = mysql_query("Select * from test_heading");
										while($row=mysql_fetch_array($query))
										{
											
										
									?>
									<option value="<?php echo $row['th_id'];?>"><?php echo $row['th_name'];?></option>
										<?php } ?>
								</select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Of Questions<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required="required" name="nos" value=""class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Of Hours<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required="required" name="hours" value=""class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Test Questions:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="file" /><br />
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
