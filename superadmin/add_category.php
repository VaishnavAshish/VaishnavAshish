<?php 
require('sidebar.php');
require('header.php');
?>

<?php  
if(isset($_POST["submit"])) {
	$name = htmlspecialchars(ucwords($_POST['category']),ENT_QUOTES);
	$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
	$img_name = $name.".".$imageFileType;
       $result = mysql_query("Insert into `category`(category,cat_image) values('$name','$img_name')");
		$imageID=mysql_insert_id();	  
		$target_dir = "../images/".$imageID.".".$imageFileType;
	    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir);
	   if($result)
	   {
		   echo "<script>alert('Success');</script>";
	   }
	   else
	   {
		   echo "<script>alert('Unsuccess');</script>";
	   }
    
}
?>
 <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <?php include('index_counter.php');?>
          <!-- /top tiles -->

         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">
						<h2>Category</h2>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" required="required" name="category" value="" class="form-control col-md-7 col-xs-12">
									</div>
								</div>
								<div class="form-group">
									  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Image: <span class="required">*</span></label>
									  <div class="col-md-6 col-sm-6 col-xs-12">
										<input type="file" name="fileToUpload"><br>
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
