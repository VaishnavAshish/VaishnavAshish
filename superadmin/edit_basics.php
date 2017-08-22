<?php 
require('sidebar.php');
require('header.php');

if(isset($_POST['edit_basics']))
	{	
		$basics_id = htmlspecialchars($_POST['edit_basics'],ENT_QUOTES); 
		$res = mysql_query("SELECT * FROM `basics` WHERE basics_id='".$basics_id."'");
		$row_basics = mysql_fetch_array($res);
		$old = getcwd();  // Save the current directory
		$path_to_file="../uploads/basics";
		chdir($path_to_file);
		unlink($row_basics['pdf']); //Deletes the pdf file
		chdir($old); // Restore the old working directory  
	}

if(isset($_POST["submit"]))
	{	
		$basics_id = htmlspecialchars($_POST['basics_id'],ENT_QUOTES); 
        $heading = htmlspecialchars($_POST['heading'],ENT_QUOTES);
		$category = htmlspecialchars($_POST['category'],ENT_QUOTES);
	    $topic_id = htmlspecialchars($_POST['topic_id'],ENT_QUOTES);
		$sub_id = htmlspecialchars($_POST['sub_id'],ENT_QUOTES);
		$pdf=$heading.$sub_id.".pdf";
		$result = mysql_query("UPDATE `basics` set heading='".$heading."',pdf='".$pdf."',cat_id='".$category."',topic_id='".$topic_id."',sub_id='".$sub_id."' WHERE basics_id='".$basics_id."' ");
		  
		if($result)
		{   
	        move_uploaded_file($_FILES["file"]["tmp_name"],'../uploads/basics/'.$pdf);
			header('Location:view_basics.php');
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit Basics:</h1>
                    <div class="clearfix"></div>
                  </div>
			<form action="" id="demo-form2" data-parsley-validate method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Heading:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" class="form-control" value="<?php echo $row_basics['heading']; ?>"  placeholder="Enter Heading" name="heading">
						   <input style="display:none;" type="text" required="required" name="basics_id" value="<?php echo $row_basics['basics_id'];?>" class="form-control col-md-7 col-xs-12">
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
									<?php $cat_id = htmlspecialchars($row_basics['cat_id'],ENT_QUOTES);
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
							    $topic_id=$row_basics['topic_id'];
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
							    $sub_id = htmlspecialchars($row_basics['sub_id'],ENT_QUOTES);
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
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>

    


        
        </div>
        <!-- /page content -->

<?php 
require('footer.php');    
?>
