<?php 
ob_start();
require('sidebar.php');
require('header.php');


	if(isset($_POST['edit_topic']))
	{	@$tid = htmlspecialchars($_POST['edit_topic'],ENT_QUOTES);
		$result=mysql_query("select * from `topics` join `category` on topics.cat_id = category.cat_id where topics.topic_id = '".$tid."'");
		$row = mysql_fetch_array($result);
		
	}
 

	if(isset($_POST['submit']))
	{
		$topic = htmlspecialchars($_POST['topic'],ENT_QUOTES);
		$category = htmlspecialchars($_POST['category'],ENT_QUOTES);
		$topic_id = htmlspecialchars($_POST['topic_id'],ENT_QUOTES);
		$type = htmlspecialchars($_POST['type'],ENT_QUOTES);
		$result = mysql_query("Update `topics` set topic='".$topic."',cat_id='".$category."',type='".$type."' where topic_id='".$topic_id."'");
		if($result)
		{
		echo "<script>alert('Successfully Updated');</script>";
			header('location:view_topic.php');
		}
		
		
	}
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit Topic</h1>
                    <div class="clearfix"></div>
                  </div>
			<form method="POST"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Topic Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="topic" value="<?php echo htmlspecialchars($row['topic'],ENT_QUOTES);?>" class="form-control col-md-7 col-xs-12">
						  <input style="display:none;" type="text" required="required" name="topic_id" value="<?php echo htmlspecialchars($row['topic_id'],ENT_QUOTES);?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="category" >
							<?php 
										$i=0;
										$result = mysql_query("Select * from category");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>		
									
									<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row['category'],ENT_QUOTES);?></option>
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
									<option value="Questions">Questions </option>
									<option value="Basics">Basics Page</option>
									<option value="Video">Video Page</option>
						   </select>
						</div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>

    


        
        </div>
        <!-- /page content -->

<?php 
require('footer.php');    
?>
