<?php 
ob_start();
require_once('sidebar.php');
require_once('header.php');
if(isset($_POST['edit_category']))
{
	$category_id = htmlspecialchars($_POST['edit_category'],ENT_QUOTES);
	$query=mysql_query("Select * from test_category where tc_id = '".$category_id."'");
	$res=mysql_fetch_array($query);
}
else if(isset($_POST["submit"])) {
	$tc_name = htmlspecialchars($_POST['category'],ENT_QUOTES);
	$tc_id =  htmlspecialchars($_POST['category_id'],ENT_QUOTES);
	
       $resu = mysql_query("UPDATE `test_category` set tc_name='".$tc_name."' where tc_id = '".$tc_id."'");
	   if($resu)
	   {  
           header('location:view_cat.php');
	   }
	   else
	   {
		   echo "<script>alert('Unsuccessful');</script>";
	   }
    
}
$query = mysql_query("select * from `users`");
$count = mysql_num_rows($query)-1;
?>
 <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count"><?php echo $count;?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
            </div>
          </div>
          <!-- /top tiles -->

         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">
						<h1>Edit Test Category</h1>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" required="required" name="category" value="<?php echo htmlspecialchars($res['tc_name'],ENT_QUOTES);?>" class="form-control col-md-7 col-xs-12">
										<input style="display:none;" type="text" required="required" name="category_id" value="<?php echo htmlspecialchars($res['tc_id'],ENT_QUOTES);?>" class="form-control col-md-7 col-xs-12">
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
					 </div>
                </div>
              </div>

          </div>
          <br />

    


        
        </div>
        <!-- /page content -->

<?php 
require('footer.php');    
?>
