<?php 
require('sidebar.php');
require('header.php');
?>

<?php 

	if(isset($_POST['add_subtopic']))
	{
		$subtopic = ucwords(htmlspecialchars($_POST['subtopic'],ENT_QUOTES));
		$category = htmlspecialchars($_POST['category'],ENT_QUOTES);
		$topic = htmlspecialchars($_POST['topic'],ENT_QUOTES);
		$folder_id = htmlspecialchars($_POST['folder'],ENT_QUOTES);
		$topi=explode(",",$topic);
		$topic_id=$topi[1];
		$que="Insert into `subtopic` set subtopic='$subtopic', cat_id=$category, topic_id=$topic_id,folder_id='$folder_id'";
		$result = mysql_query($que);
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
                    <h1>Add SubTopic</h1>
                    <div class="clearfix"></div>
                  </div>
			<form  method="POST" action="" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="" name="subtopic" value=""class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="form-control" name="category" ng-model="subtopic.selectedCategory"  ng-change="subtopic.fetchTopic(subtopic.selectedCategory,'Question')">
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$query = mysql_query("Select * from category");
										while($row=mysql_fetch_array($query))
										{
											
										
									?>
									<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>">
											<?php echo htmlspecialchars($row['category'],ENT_QUOTES);?>
									</option>
										<?php } ?>
								</select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic / Sub Catgory</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="form-control" name="topic" ng-model="subtopic.selectedTopic" ng-change="subtopic.nextFetch(subtopic.selectedTopic.split(','),'Question')" >
									<option value="">{{subtopic.subtopictext?subtopic.subtopictext:'Please Select'}}</option>
									<option ng-repeat="topic in subtopic.topic"  value="{{$index}},{{topic.topic_id}},{{topic.type}}">
										{{topic.topic}}
									</option>
								</select>
                        </div>
                      </div>
					  
					  <div ng-if="subtopic.showFolder" class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select sub Category Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="form-control" name="folder" ng>
									<option value="">{{subtopic.foldertext?subtopic.foldertext:'Please Select'}}</option>
									<option ng-repeat="topic in subtopic.folder" value="{{topic.f_id}}">
										{{topic.f_name}}
									</option>
								</select>
                        </div>
                      </div>
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="add_subtopic" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>

    


        
        </div>
        <!-- /page content -->

<?php 
require('footer.php');    
?>
