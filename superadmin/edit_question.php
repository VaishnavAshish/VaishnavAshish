<?php 
require('sidebar.php');
require('header.php');
     if(isset($_POST['edit_question']))
	{	
		$qid = $_POST['edit_question']; 
		$res = mysql_query("SELECT * FROM `question` WHERE qid='".$qid."'");
		$row = mysql_fetch_array($res);
	}
	

		if(isset($_POST['submit']))
	{	 
        
		$qid=$_POST['qid'];
		$question = $_POST['question'];
		$opt1 = $_POST['opt1'];
		$opt2 = $_POST['opt2'];
		$opt3 = $_POST['opt3'];
		$opt4 = $_POST['opt4'];
		$answer = $_POST['answer'];
		$category = $_POST['category'];
		$topic_id = $_POST['topic_id'];
		$sub_id = $_POST['sub_id'];
		 echo "<script>alert('".$category.$topic_id.$sub_id."');</script>";
		$result = mysql_query("UPDATE `question` set question='".$question."',opt1='".$opt1."',opt2='".$opt2."',opt3='".$opt3."',opt4='".$opt4."',answer='".$answer."',cat_id='".$category."',topic_id='".$topic_id."',sub_id='".$sub_id."' WHERE qid='".$qid."' ");
		if($result)
		{
			header('Location:view_question.php');
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
	
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit Questions</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control"  placeholder="Enter Question here" name="question"><?php echo $row['question'];?></textarea>
						  <input style="display:none;" type="text" required="required" name="qid" value="<?php echo $row['qid'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 1: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control class="form-control col-md-7 col-xs-12"" value="<?php echo $row['opt1'];?>" placeholder="Enter First Option" name="opt1">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 2: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control"  placeholder="Enter Second Option" name="opt2" value="<?php echo $row['opt2'];?>">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 3: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['opt3'];?>" placeholder="Enter Third Option" name="opt3">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Option 4: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['opt4'];?>" placeholder="Enter Fourth Option" name="opt4">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $row['answer'];?>" placeholder="Enter Answer" name="answer">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="category" >
									<?php $cat_id=$row['cat_id'];
									$cat=mysql_query("SELECT * FROM `category` WHERE cat_id='".$cat_id."'");
									$cat_res=mysql_fetch_array($cat);
									?>
									<option value="<?php echo $cat_res['cat_id'];?>"><?php echo $cat_res['category'];?></option>
									<?php 
										$j = 0;
										$query_cat = mysql_query("Select * from category");
										while($row_cat=mysql_fetch_array($query_cat))
										{
											
										
									?>
									<option value="<?php echo $row_cat['cat_id'];?>"><?php echo $row_cat['category'];?></option>
										<?php } ?>
							</select>
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<?php $topic_id=$row['topic_id'];
									$topic=mysql_query("SELECT * FROM `topics` WHERE topic_id='".$topic_id."'");
									$topic_res=mysql_fetch_array($topic);
									?>
                          <select class="sel_val topic-select form-control" name="topic_id" >
									<option value="<?php echo $topic_res['topic_id'];?>"><?php echo $topic_res['topic'];?></option>
						  </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select SubTopic</label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val sub_topic-select form-control" name="sub_id" >
						  <?php $sub_id=$row['sub_id'];
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
