<?php 
ob_start();
require('sidebar.php');
require('header.php');
	
		if(isset($_POST['edit_folder']))
	{	$f_id = $_POST['edit_folder'];
		$result=mysql_query("select * from `folder` where f_id='".$f_id."'" );
		$row = mysql_fetch_array($result);
		
	}
	if(isset($_POST['submit']))
	{
		@$subtopic = $_POST['subtopic'];
		@$category = $_POST['category'];
		$topic_id = $_POST['topic'];
		$sub_id = $_POST['sub_id'];
		$result = mysql_query("Update `subtopic` set subtopic='".$subtopic."',cat_id='".$category."',topic_id='".$topic_id."' where sub_id='".$sub_id."'");
		if($result)
		{
			echo "<script>alert('Successfully Updated');</script>";
			header('Location:view_folder.php');
		}
		else echo "<script>alert('unsuccessful');</script>";
		
		
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit Folder</h1>
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
										while($ro=mysql_fetch_array($query))
										{
									?>
									<option value="<?php echo $ro['cat_id'];?>"><?php echo $row['category'];?></option>
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
										<input type="text" required="required" name="folder_name" value="<?php $row['f_name'];?>" placeholder="Enter Folder Name"class="form-control col-md-7 col-xs-12">
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
