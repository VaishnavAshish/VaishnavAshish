<?php 
require('sidebar.php');
require('header.php');


	if(isset($_POST["submit"]))
	{	
        $heading = htmlspecialchars($_POST['heading'],ENT_QUOTES);
		$ids=htmlspecialchars($_POST['category'],ENT_QUOTES);
		$ids=explode(":",$ids);
		$cat_id=$ids[0];
		$topic_id = $ids[1];
		$folder_id=$ids[2];
		$pdf=htmlspecialchars(($heading.$sub_id.".pdf"),ENT_QUOTES);
		$result = mysql_query("Insert into `basics`(heading,pdf,cat_id,topic_id,folder_id) values('$heading','$pdf','$cat_id','$topic_id','$folder_id')");
		  
		if($result)
		{   
	        move_uploaded_file($_FILES["file"]["tmp_name"],'../uploads/basics/'.$pdf);
			echo "<script>alert('Successful');</script>";
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Upload Pdf file For Basics:</h1>
                    <div class="clearfix"></div>
                  </div>
			<form action="" id="demo-form2" data-parsley-validate method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Heading:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" class="form-control"  placeholder="Enter Heading" name="heading">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Choose File:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="file" /><br />
                        </div>
                      </div>
					  
					 <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="category" >
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										echo $que="Select 
												topics.topic as name,
												category.cat_id as cat_id,
												`category`.`category` as cat_name,
												`topics`.`topic_id` as topic_id,
												'' as folder_id,
												'' as folder_name
											from `topics` 
												join `category` on topics.cat_id=category.cat_id AND `topics`.`type`='Basics'
											UNION (
												SELECT 
													f_name as name,
													`category`.`category` as cat_name,
													category.cat_id as cat_id,
													`folder`.`topic_id` as topic_id,
													 f_id as folder_id,
													 topics.topic as folder_name
												FROM `folder` 
												join `category` on folder.cat_id=category.cat_id AND `folder`.`type`='Basics'
												join `topics` on folder.topic_id=topics.topic_id
											)
											";
										$query = mysql_query($que);
										while($row=mysql_fetch_array($query))
										{
											
										
									?>
									<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>:<?php echo htmlspecialchars($row['topic_id'],ENT_QUOTES);?>:<?php echo htmlspecialchars($row['folder_id'],ENT_QUOTES);?>">
											<?php echo $row['cat_name'].($row['folder_name']?" / ".$row['folder_name']:"")." / ".htmlspecialchars($row['name'],ENT_QUOTES);?>
									</option>
									<?php } ?>
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
