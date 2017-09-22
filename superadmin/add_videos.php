<?php 
require('sidebar.php');
require('header.php');


		if(isset($_POST['submit']))
	{	
		
		$youtube_id = htmlspecialchars($_POST['youtube_id'],ENT_QUOTES);
		$ids=htmlspecialchars($_POST['category'],ENT_QUOTES);
		$ids=explode(":",$ids);
		$cat_id=$ids[0];
		$topic_id = $ids[1];
		$folder_id=$ids[2];
	
		$result = mysql_query("Insert into `videos`(youtube_id,cat_id,topic_id,folder_id) values('$youtube_id','$cat_id','$topic_id','$folder_id')");
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
                    <h1>Add Videos</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video id">Youtube Video Id: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Youtube Video Id" name="youtube_id">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video id">Video Category <span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select id="category" class="form-control" name="category">
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$que="Select 
												topics.topic as name,
												category.cat_id as cat_id,
												`topics`.`topic_id` as topic_id,
												'' as folder_id
											from `topics` 
												join `category` on topics.cat_id=category.cat_id AND `topics`.`type`='Video'
											UNION (
												SELECT 
													f_name as name,
													category.cat_id as cat_id,
													`folder`.`topic_id` as topic_id,
													f_id as folder_id
												FROM `folder` 
												join `category` on folder.cat_id=category.cat_id AND `folder`.`type`='video'
											)
											";
										$query = mysql_query($que);
										while($row=mysql_fetch_array($query))
										{	
									?>
									<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>:<?php echo htmlspecialchars($row['topic_id'],ENT_QUOTES);?>:<?php echo htmlspecialchars($row['folder_id'],ENT_QUOTES);?>">
											<?php echo htmlspecialchars($row['name'],ENT_QUOTES);?>
									</option>
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
