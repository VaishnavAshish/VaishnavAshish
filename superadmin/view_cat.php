<?php 
require('sidebar.php');
require('header.php');  
if(isset($_POST["submit"])) {
	$name = $_POST['category'];
	$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
	$target_dir = "images/".$name.".".$imageFileType;
	$img_name = $name.".".$imageFileType;
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir);
       $result = mysql_query("Insert into `category`(category,cat_image) values('$name','$img_name')");
	   if($result)
	   {
		   echo "<script>alert('Success');</script>";
	   }
	   else
	   {
		   echo "<script>alert('Unsuccess');</script>";
	   }
    
}
if(isset($_POST['delete_category']))
{	$id = $_POST['delete_category'];
	$delete = mysql_query("Delete from `test_category` where tc_id='".$id."'");
	if($delete)
	{
		echo "<script>alert('Deleted Successfully');</script>";
	}
}
	

$query = mysql_query("select * from `users`");
$count = mysql_num_rows($query)-1;
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
						<h1>Test Category</h1>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title ">Category</th>
									
									<th class="column-title no-link last tc"><span class="nobr">Action</span>
									
									</th>
									<th class="bulk-actions" colspan="7">
									  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
									</th>
								  </tr>
								</thead>
									<tbody>
								<?php 
										$i=0;
										$result = mysql_query("Select * from test_category");
										while($row=mysql_fetch_array($result))
										{ 
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td class=" "><?php echo $i;?></td>
									<td><?php echo $row['tc_name']?></td>
									
									<td class="a-right a-right tc">
										<form action="" method="post">
											<button type="submit" name="delete_category" class="btn btn-primary" value="<?php echo $row['tc_id']?>">Delete</button>
											
										</form>
										<form action="edit_cat.php" method="POST">
											<button type="submit" name="edit_category" class="btn btn-primary" value="<?php echo $row['tc_id']?>">Edit</button>
										</form>
									</td>
									
								  </tr>
										<?php } ?>
								</tbody>
							  </table>


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
