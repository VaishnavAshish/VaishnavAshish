<?php 
require('sidebar.php');
require('header.php');
?>

<?php 

	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$test_category = $_POST['test_category'];
		$heading = $_POST['heading'];
		$question=$_POST['nos'];
		$hours=$_POST['hours'];
		$minutes=$_POST['minutes'];
		$seconds=$_POST['seconds'];
		$arr=[$hours,$minutes,$seconds];
		$time=implode(";",$arr);
		$result = mysql_query("Insert into `test_name`(tn_name,th_id,tc_id,no_of_q,time) values('$name','$heading','$test_category','$question','$time')");
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Of Questions<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required="required" name="nos" value=""class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Test Time<span class="required">*</span>
                        </label>
                        <div class="col-md-1 col-sm-1 col-xs-3">
                          <input type="number"  required="required" placeholder="Hrs." name="hours" value=""class="form-control col-md-7 col-xs-12">
                        </div>
						<div class="col-md-1 col-sm-1 col-xs-3">
                          <input type="number" required="required"  placeholder="Min." name="minutes" value=""class="form-control col-md-7 col-xs-12">
                        </div>
						<div class="col-md-1 col-sm-1 col-xs-3">
                          <input type="number"  required="required" placeholder="Sec." name="seconds" value=""class="form-control col-md-7 col-xs-12">
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
