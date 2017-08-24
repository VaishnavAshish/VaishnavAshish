<?php 
require('sidebar.php');
require('header.php');

if(isset($_POST['edit_videos']))
	{	
		$video_id = htmlspecialchars($_POST['edit_videos'],ENT_QUOTES); 
		$res = mysql_query("SELECT * FROM `videos` WHERE video_id='".$video_id."'");
		$row_video = mysql_fetch_array($res);
	}

if(isset($_POST['submit']))
	{	$video_id = htmlspecialchars($_POST['video_id'],ENT_QUOTES);
		$video_name = htmlspecialchars($_POST['video_name'],ENT_QUOTES);
		$youtube_id = htmlspecialchars($_POST['youtube_id'],ENT_QUOTES);
		$category = htmlspecialchars($_POST['category'],ENT_QUOTES);
		$topic_id = htmlspecialchars($_POST['topic_id'],ENT_QUOTES);
		$sub_id = htmlspecialchars($_POST['sub_id'],ENT_QUOTES);
		$result = mysql_query("UPDATE `videos` set video_name='".$video_name."',youtube_id='".$youtube_id."',cat_id='".$category."',topic_id='".$topic_id."',sub_id='".$sub_id."' where video_id='".$video_id."' ");
		if($result)
		{
			header('Location:view_videos.php');
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit Videos</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Video Name:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" class="form-control" value="<?php echo htmlspecialchars($row_video['video_name'],ENT_QUOTES); ?>" placeholder="Enter Name of Video" name="video_name">
						   <input style="display:none;" type="text" required="required" name="video_id" value="<?php echo htmlspecialchars($row_video['video_id'],ENT_QUOTES);?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Link">Youtube Video Id: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo htmlspecialchars($row_video['youtube_id'],ENT_QUOTES); ?>"  placeholder="Enter Youtube Video Id" name="youtube_id">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="category" >
									<?php $cat_id=$row_video['cat_id'];
									$cat=mysql_query("SELECT * FROM `category` WHERE cat_id='".$cat_id."'");
									$cat_res=mysql_fetch_array($cat);
									?>
									<option value="<?php echo htmlspecialchars($cat_res['cat_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($cat_res['category'],ENT_QUOTES);?></option>
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
							
                          <select class="sel_val topic-select form-control" name="topic_id" >
							 <?php 
							    $topic_id=$row_video['topic_id'],ENT_QUOTES);
								$topic=mysql_query("SELECT * FROM `topics` WHERE topic_id='".$topic_id."'");
								$topic_res=mysql_fetch_array($topic);
							?>
							<option value="<?php echo htmlspecialchars($topic_res['topic_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($topic_res['topic'],ENT_QUOTES);?></option>
						  </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select SubTopic</label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val sub_topic-select form-control" name="sub_id" >
							<?php 
							    $sub_id=htmlspecialchars($row_video['sub_id'],ENT_QUOTES);
								$subtopic=mysql_query("SELECT * FROM `subtopic` WHERE sub_id='".$sub_id."'");
								$subtopic_res=mysql_fetch_array($subtopic);
							?>
							<option value="<?php echo htmlspecialchars($subtopic_res['sub_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($subtopic_res['subtopic'],ENT_QUOTES);?></option>
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
