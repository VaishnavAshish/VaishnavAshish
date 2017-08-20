<?php 
ob_start();
require_once('sidebar.php');
require_once('header.php');
if(isset($_POST['edit_category']))
{
	$category_id = htmlspecialchars($_POST['edit_category'],ENT_QUOTES);
	$query=mysql_query("Select * from category where cat_id = '".$category_id."'");
	$res=mysql_fetch_array($query);
	$old = getcwd();  // Save the current directory
	$path_to_file="../images";
    chdir($path_to_file);
	unlink($res['cat_image']); //Deletes the category image
	chdir($old); // Restore the old working directory  
	
}
else if(isset($_POST["submit"])) {
	$name = htmlspecialchars($_POST['category'],ENT_QUOTES);
	$category_id=  htmlspecialchars($_POST['category_id'],ENT_QUOTES);
	$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
	$target_dir = "../images/".$name.".".$imageFileType;
	$img_name = $name.".".$imageFileType;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir);
       $resu = mysql_query("UPDATE `category` set category='".$name."',cat_image='".$img_name."' where cat_id = '".$category_id."'");
	   if($resu)
	   {  
           header('location:view_category.php');
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
						<h1>Edit Category</h1>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" required="required" name="category" value="<?php echo htmlspecialchars($res['category'],ENT_QUOTES);?>" class="form-control col-md-7 col-xs-12">
										<input style="display:none;" type="text" required="required" name="category_id" value="<?php echo htmlspecialchars($res['cat_id'],ENT_QUOTES);?>" class="form-control col-md-7 col-xs-12">
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
