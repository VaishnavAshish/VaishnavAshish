<?php 
ob_start();
require('sidebar.php');
require('header.php');


	if(isset($_POST['edit_subcat']))
	{	$tid = $_POST['edit_subcat'];
		$result=mysql_query("select * from `topics` join `category` on topics.cat_id = category.cat_id where topics.topic_id = '".$tid."'");
		$row = mysql_fetch_array($result);
		
	}
 

	if(isset($_POST['submit']))
	{
		$topic = $_POST['topic'];
		$category = $_POST['category'];
		$topic_id = $_POST['topic_id'];
		$type ="Folder";
		$result = mysql_query("Update `topics` set topic='".$topic."',cat_id='".$category."',type='".$type."' where topic_id='".$topic_id."'");
		if($result)
		{
		echo "<script>alert('Successfully Updated');</script>";
			header('location:view_subcat.php');
		}
        else { echo mysql_error(); }
		
	}
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit Sub-Category</h1>
                    <div class="clearfix"></div>
                  </div>
			<form method="POST" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub-Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="topic" value="<?php echo htmlspecialchars($row['topic'],ENT_QUOTES);?>" class="form-control col-md-7 col-xs-12">
						  <input style="display:none;" type="text"  name="topic_id" value="<?php echo $row['topic_id'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="category" >
							<option value="">Select category</option>
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
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                        </div>
                      </div>
		    </form>
		</div>
        <!-- /page content -->

<?php 
require('footer.php');    
?>
