<?php 
ob_start();
require('sidebar.php');
require('header.php');
	
		if(isset($_POST['edit_subtopic']))
	{	$subid = htmlspecialchars($_POST['edit_subtopic'],ENT_QUOTES);
		$result=mysql_query("Select * from `topics` join `category` on topics.cat_id=category.cat_id join `subtopic` on subtopic.cat_id = topics.cat_id && subtopic.topic_id=topics.topic_id where subtopic.sub_id = '".$subid."'");
		$row = mysql_fetch_array($result);
		
	}
	if(isset($_POST['submit']))
	{
		$subtopic = htmlspecialchars($_POST['subtopic'],ENT_QUOTES);
		$category = htmlspecialchars($_POST['category'],ENT_QUOTES);
		$topic_id = htmlspecialchars($_POST['topic'],ENT_QUOTES);
		$sub_id = htmlspecialchars($_POST['sub_id'],ENT_QUOTES);
		$result = mysql_query("Update `subtopic` set subtopic='".$subtopic."',cat_id='".$category."',topic_id='".$topic_id."' where sub_id='".$sub_id."'");
		if($result)
		{
			echo "<script>alert('Successfully Updated');</script>";
			header('Location:view_subtopic.php');
		}
		else echo "<script>alert('unsuccessful');</script>";
		
		
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit SubTopic</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST" action="" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SubTopic Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Subtopic name" name="subtopic" value="<?php echo $row['subtopic'];?>">
						   <input style="display:none;" type="text" required="required" name="sub_id" value="<?php echo $row['sub_id'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="category" >
							<?php 
										$j = 0;
										$query = mysql_query("Select * from category");
										while($row=mysql_fetch_array($query))
										{
											
										
									?>
									<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row['category'],ENT_QUOTES);?></option>
									<?php } ?>	
								</select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val topic-select form-control" name="topic" >
						  <option value="">Select Topic</option>
									<?php 
										$j = 0;
										$que = mysql_query("Select * from topics");
										while($ro=mysql_fetch_array($que))
										{
											
										
									?>
									<option value="<?php echo htmlspecialchars($ro['topic_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($ro['topic'],ENT_QUOTES);?></option>
										<?php } ?>
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
