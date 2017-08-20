<?php 
require('sidebar.php');
require('header.php');
?>


<?php
	if(isset($_POST['submit']))
	{
		$f_name = htmlspecialchars($_POST['folder_name'],ENT_QUOTES);
	
		$cat_id = htmlspecialchars($_POST['folderCategory'],ENT_QUOTES);
		$topic_id = htmlspecialchars($_POST['topic'],ENT_QUOTES);
		$type = htmlspecialchars($_POST['type'],ENT_QUOTES);
		
		$query = mysql_query("Insert into folder(f_name,cat_id,topic_id,type) values('$f_name','$cat_id','$topic_id','$type')");
		if($query)
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
                    <h1>Add Folder</h1>
                    <div class="clearfix"></div>
                  </div>
<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="folderCategory" >
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$query = mysql_query("Select * from category");
										while($row=mysql_fetch_array($query))
										{
									?>
									<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>"><?php echo $row['category'];?></option>
										<?php } ?>
							</select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val topic-select form-control" name="topic" >
									<option value="">Select Topic</option>
								</select>
                        </div>
                      </div>
					  <div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Folder Name <span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" required="required" name="folder_name" value="" placeholder="Enter Folder Name"class="form-control col-md-7 col-xs-12">
									</div>
								</div>

					 <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="type" requires>
										<option readonly>Select Type</option>
										<option value="Question">Questions Page</option>
										<option value="Basic">Basics Page</option>
										<option value="Video">Video Page</option>
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
