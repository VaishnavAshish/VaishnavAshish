<?php 
require('sidebar.php');
require('header.php');
?>

<?php 

	if(isset($_POST['submit']))
	{
		$topic = ucwords($_POST['topic']);
		$category = $_POST['category'];
		$type = $_POST['type'];
		$result = mysql_query("Insert into `topics`(topic,cat_id,type) values('$topic','$category','$type')");
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
                    <h1>Add Topic</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Topic Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="topic" value=""class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="category" >
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$query = mysql_query("Select * from category");
										while($row=mysql_fetch_array($query))
										{
											
										
									?>
									<option value="<?php echo $row['cat_id'];?>"><?php echo $row['category'];?></option>
										<?php } ?>
								</select>
								
                        </div>
                      </div>
                      
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select type</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						   <select class="sel_val form-control" name="type" >
									<option value="">Select Type</option>
									<option value="Folder">Folder</option>
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
