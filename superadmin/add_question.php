<?php 
require('sidebar.php');
require('header.php');


		if(isset($_POST['submit']))
	{	
		$question = htmlspecialchars($_POST['question'],ENT_QUOTES);
		$opt1 = htmlspecialchars($_POST['opt1'],ENT_QUOTES);
		$opt2 = htmlspecialchars($_POST['opt2'],ENT_QUOTES);
		$opt3 = htmlspecialchars($_POST['opt3'],ENT_QUOTES);
		$opt4 = htmlspecialchars($_POST['opt4'],ENT_QUOTES);
		$answer = htmlspecialchars($_POST['answer'],ENT_QUOTES);
		
		$ids=htmlspecialchars($_POST['category'],ENT_QUOTES);
		$ids=explode(":",$ids);
		$cat_id=$ids[0];
		$topic_id = $ids[1];
		$folder_id=$ids[2];
		$sub_id = $ids[3];
		
		$result = mysql_query("Insert into `question`(question,opt1,opt2,opt3,opt4,answer,cat_id,topic_id,sub_id,folder_id) 
							values('$question','$opt1','$opt2','$opt3','$opt4','$answer','$cat_id','$topic_id','$sub_id','$folder_id')");
		if($result)
		{
			echo "<script>alert('successful');</script>";
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" ng-app="adminPanel" ng-controller="subtopicADDCtrl as subtopic" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Add Question</h1>
                    <div class="clearfix"></div>
                  </div>
			<form method="POST" ng-submit="true" action="" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control"  placeholder="Enter Question here" name="question"></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 1: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control class="form-control col-md-7 col-xs-12""  placeholder="Enter First Option" name="opt1">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 2: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Second Option" name="opt2">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 3: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Third Option" name="opt3">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 4: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Fourth Option" name="opt4">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Answer" name="answer">
                        </div>
                      </div>
					  
					 
					 	<div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select id="category"  class="form-control" name="category">
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
