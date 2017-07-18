<?php 
require('sidebar.php');
require('header.php');

if(isset($_POST['edit_videos']))
	{	
		$video_id = $_POST['edit_videos']; 
		$res = mysql_query("SELECT * FROM `videos` WHERE video_id='".$video_id."'");
		$row_video = mysql_fetch_array($res);
	}

if(isset($_POST['submit']))
	{	$video_id = $_POST['video_id'];
		$video_name = $_POST['video_name'];
		$youtube_id = $_POST['youtube_id'];
		$category = $_POST['category'];
		$topic_id = $_POST['topic_id'];
		$sub_id = $_POST['sub_id'];
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
                           <input type="text" class="form-control" value="<?php echo $row_video['video_name']; ?>" placeholder="Enter Name of Video" name="video_name">
						   <input style="display:none;" type="text" required="required" name="video_id" value="<?php echo $row_video['video_id'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Link">Youtube Video Id: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row_video['youtube_id']; ?>"  placeholder="Enter Youtube Video Id" name="youtube_id">
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
									<option value="<?php echo $cat_res['cat_id'];?>"><?php echo $cat_res['category'];?></option>
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val topic-select form-control" name="topic_id" >
							 <?php 
							    $topic_id=$row_video['topic_id'];
								$topic=mysql_query("SELECT * FROM `topics` WHERE topic_id='".$topic_id."'");
								$topic_res=mysql_fetch_array($topic);
							?>
							<option value="<?php echo $topic_res['topic_id'];?>"><?php echo $topic_res['topic'];?></option>
						  </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select SubTopic</label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val sub_topic-select form-control" name="sub_id" >
							<?php 
							    $sub_id=$row_video['sub_id'];
								$subtopic=mysql_query("SELECT * FROM `subtopic` WHERE sub_id='".$sub_id."'");
								$subtopic_res=mysql_fetch_array($subtopic);
							?>
							<option value="<?php echo $subtopic_res['sub_id'];?>"><?php echo $subtopic_res['subtopic'];?></option>
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
