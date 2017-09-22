<?php 
require('sidebar.php');
require('header.php');


	if(isset($_POST["submit"]))
	{	
		$name = htmlspecialchars($_FILES["file"]["tmp_name"],ENT_QUOTES);
		$csv=htmlspecialchars(file_get_contents($name),ENT_QUOTES);
		$array=array_map("str_getcsv",explode("\n",$csv));
		$c = 0;
		$ids=htmlspecialchars($_POST['category'],ENT_QUOTES);
		$ids=explode(":",$ids);
		$cat_id=$ids[0];
		$topic_id = $ids[1];
		$folder_id=$ids[2];
		$sub_id = $ids[3];
	
		$random=mt_rand(1,1000);
		foreach($array as $filesop)
		 {
			$question = $filesop[0];
			$opt1 = $filesop[1];
			$opt2 = $filesop[2];
			$opt3 = $filesop[3];
			$opt4 = $filesop[4];
			$answer = $filesop[5];
		$result = mysql_query("Insert into `question`(question,opt1,opt2,opt3,opt4,answer,cat_id,topic_id,sub_id,folder_id) 
												values('$question','$opt1','$opt2','$opt3','$opt4','$answer','$cat_id','$topic_id','$sub_id','$folder_id')");
		$c = $c + 1;
		  }
		if($result)
		{   
			move_uploaded_file($_FILES["file"]["tmp_name"],'../uploads/questions/'.$sub_id.'+'.$random.$_FILES["file"]["name"]);
			echo "<script>alert('Successful');</script>";
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" ng-app="adminPanel" ng-controller="subtopicADDCtrl as subtopic" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Upload CSV file of Questions:</h1>
                    <div class="clearfix"></div>
                  </div>
			<form action="" id="demo-form2" data-parsley-validate method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">

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
							
                          <select id="category" class="form-control" name="category">
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$que="Select 
												`subtopic`.`cat_id` as cat_id,
												`subtopic`.`topic_id` as topic_id,
												`subtopic`.`folder_id` as folder_id,
												`subtopic`.`sub_id` as sub_id,
												`subtopic`.`subtopic` as subtopic
											from `subtopic` 
												join `category` on subtopic.cat_id=category.cat_id 
												left outer join `topics` on topics.topic_id=subtopic.topic_id
												left outer join `folder` on subtopic.folder_id = folder.f_id
											";
										$query = mysql_query($que);
										while($row=mysql_fetch_array($query))
										{	
									?>
									<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>:<?php echo htmlspecialchars($row['topic_id'],ENT_QUOTES);?>:<?php echo htmlspecialchars($row['folder_id'],ENT_QUOTES);?>:<?php echo htmlspecialchars($row['sub_id'],ENT_QUOTES);?>">
											<?php echo htmlspecialchars($row['subtopic'],ENT_QUOTES);?>
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
