<?php 
require('sidebar.php');
require('header.php');


	if(isset($_POST["submit"]))
	{	
        $heading = htmlspecialchars($_POST['heading'],ENT_QUOTES);
		$category = $_POST['category-basics'];
	    $topic_id = $_POST['topic_id'];
		$sub_id = $_POST['sub_id'];
		$pdf=$heading.$sub_id.".pdf";
		$result = mysql_query("Insert into `basics`(heading,pdf,cat_id,topic_id,sub_id) values('$heading','$pdf','$category','$topic_id','$sub_id')");
		  
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
							
                          <select class="sel_val form-control" name="category-basics" >
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val topic-select topic-type-basic form-control" name="topic_id" >
									<option value="">Select Topic</option>
						  </select>
                        </div>
                      </div>

					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select SubTopic</label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val sub_topic-select form-control" name="sub_id" >
									<option value="">Select SubTopic</option>
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
