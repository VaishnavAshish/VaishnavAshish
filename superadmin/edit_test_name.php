<?php 
ob_start();
require('sidebar.php');
require('header.php');
if(isset($_POST['edit_name']))
	{	@$tn_id = $_POST['edit_name'];
		$result=mysql_query("Select * from `test_name` where tn_id='".$tn_id."'");
		$row = mysql_fetch_array($result);
		
	}
	if(isset($_POST['submit']))
	{
		@$name = $_POST['name'];
		@$heading = $_POST['heading'];
		$question=$_POST['nos'];
		$hours=$_POST['hours'];
		
		$result = mysql_query("Update `test_name` set tn_name='".$name."',th_id='".$heading."',no_of_q='".$question."',hours='".$hours."' where tn_id='".$tn_id."'");
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
                    <h1>Edit Test</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Test Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="name" value="<?php echo $row['tn_name']?>"class="form-control col-md-7 col-xs-12">
						  <input style="display:none;" type="text" required="required" name="tn-id" value="<?php echo $row['tn_id'];?>" class="form-control col-md-7 col-xs-12">
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
                          <input type="number" id="first-name" required="required" name="nos" value="<?php echo $row['no_of_q']?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Of Hours<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required="required" name="hours" value="<?php echo $row['hours']?>"class="form-control col-md-7 col-xs-12">
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
