<?php 
ob_start();
require('sidebar.php');
require('header.php');
if(isset($_POST['edit_name']))
	{	$tn_id = $_POST['edit_name'];
		$result=mysql_query("Select * from test_name join test_heading on test_name.th_id=test_heading.th_id join test_category on test_heading.tc_id=test_category.tc_id where tn_id='".$tn_id."'");
		$row = mysql_fetch_array($result);
		
	}
	if(isset($_POST['submit']))
	{
		

    	$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
        $tn_id=htmlspecialchars($_POST['tn_id'],ENT_QUOTES);
		$test_category = htmlspecialchars($_POST['test_category'],ENT_QUOTES);
		$heading = htmlspecialchars($_POST['heading'],ENT_QUOTES);
		$question = htmlspecialchars($_POST['nos'],ENT_QUOTES);
		$hours = htmlspecialchars($_POST['hours'],ENT_QUOTES);
		$minutes = htmlspecialchars($_POST['minutes'],ENT_QUOTES);
		$seconds = htmlspecialchars($_POST['seconds'],ENT_QUOTES);
		$arr=[$hours,$minutes,$seconds];
		$time=implode(";",$arr);
		 
		$result = mysql_query("Update `test_name` set tn_name='".$name."',th_id='".$heading."',tc_id='".$test_category."',no_of_q='".$question."',time='".$time."' where tn_id='".$tn_id."'");
		if($result)
		{
			echo "<script>alert('successful');</script>";
          header('Location:view_test_name.php');
		}
		else echo "<script>alert('unsuccessful');</script>";
	}
  
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Edit Test</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Test Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="name" value="<?php echo htmlspecialchars($row['tn_name'],ENT_QUOTES);?>"class="form-control col-md-7 col-xs-12">
						  <input style="display:none;" type="text" required="required" name="tn_id" value="<?php echo $row['tn_id'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                     <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Test Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="test_category" >
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$query_cat = mysql_query("Select * from test_category");
										while($row_cat=mysql_fetch_array($query_cat))
										{
											if($row_cat['tc_id']==$row['tc_id'])
											{
											?>
										<option selected value="<?php echo htmlspecialchars($row_cat['tc_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row_cat['tc_name'],ENT_QUOTES);?></option>	
										<?php	
											}
											else {
									?>
									<option value="<?php echo htmlspecialchars($row_cat['tc_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row_cat['tc_name'],ENT_QUOTES);?></option>
										<?php }} ?>
								</select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Test Heading</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
								<select class="sel_val form-control heading" name="heading" >
									<option value="">Select Heading</option>
									<?php 
									$query_test_head=mysql_query("Select * from test_heading where tc_id='".$row['tc_id']."'");
									while($q=mysql_fetch_array($query_test_head)){
									if($q['th_id']==$row['th_id']){
										?>
									<option selected value="<?php echo $q['th_id'];?>"><?php echo $q['th_name'];?></option>
									<?php
									}
									else{
									?>
									<option value="<?php echo $q['th_id'];?>"><?php echo $q['th_name'];?></option>
									<?php
									   }									
									}
									?>
								</select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Of Questions<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" required="required" name="nos" value="<?php echo $row['no_of_q'];?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <?php $time= explode(";",$row['time']);?>
            
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Test Time<span class="required">*</span>
                        </label>
                        <div class="col-md-1 col-sm-1 col-xs-3">
                          <input type="number"  required="required" placeholder="Hrs." name="hours" value="<?php echo $time[0];?>"class="form-control col-md-7 col-xs-12">
                        </div>
						<div class="col-md-1 col-sm-1 col-xs-3">
                          <input type="number" required="required"  placeholder="Min." name="minutes" value="<?php echo $time[1];?>" class="form-control col-md-7 col-xs-12">
                        </div>
						<div class="col-md-1 col-sm-1 col-xs-3">
                          <input type="number"  required="required" placeholder="Sec." name="seconds" value="<?php echo $time[2];?>" class="form-control col-md-7 col-xs-12">
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
