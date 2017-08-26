<?php 
require('sidebar.php');
require('header.php'); 

if(isset($_POST['delete_category']))
{	$id = htmlspecialchars($_POST['delete_category'],ENT_QUOTES);
    $img=mysql_fetch_array(mysql_query("SELECT cat_image FROM `category` where cat_id='".$id."' "));
	$delete = mysql_query("Delete from `category` where cat_id='".$id."'");
	 $old = getcwd();  // Save the current directory
	 $path_to_file="../images";
    chdir($path_to_file);
	unlink($img['cat_image']); //Deletes the category image
	chdir($old); // Restore the old working directory  
	if($delete)
	{	$topic_query=mysql_query("Delete from `topics` where cat_id='".$id."'");
		if($topic_query)
		{
			$subtopic_query=mysql_query("Delete from `subtopic` where cat_id='".$id."'");
			if($subtopic_query)
			{
				$question_query=mysql_query("Delete from `question` where cat_id='".$id."'");
			}
		}
		echo "<script>alert('Deleted Successfully');</script>";
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
						<h1>Category</h1>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title ">Category Name</th>
									<th class="column-title ">Image</th>
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
										$result = mysql_query("Select * from category ORDER BY category");
										while($row=mysql_fetch_array($result))
										{  $image = "../images/".$row['cat_image'];
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td class=" "><?php echo $i;?></td>
									<td><?php echo htmlspecialchars($row['category'],ENT_QUOTES)?></td>
									<td>
										<img width="70px" height="70px" src="../images/<?php echo $row['cat_id'];?>.png"></img>
									</td>
									<td class="a-right a-right tc content-center">
										<form action="" method="post">
											<button type="submit" name="delete_category" class="btn btn-primary" value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES)?>">Delete</button>
											
										</form>
										<form action="edit_category.php" method="POST">
											<button type="submit" name="edit_category" class="btn btn-primary" value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES)?>">Edit</button>
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
