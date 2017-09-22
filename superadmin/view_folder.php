<?php 
require('sidebar.php');
require('header.php');

if(isset($_POST['delete_folder']))
{	$f_id = htmlspecialchars($_POST['delete_folder'],ENT_QUOTES);
	$delete = mysql_query("Delete from `folder` where f_id='".$f_id."'");
	if($delete)
	{	
		
			
		
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
                    <h1>Sub-category Topics</h1>
                    <div class="clearfix"></div>
                  </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title ">Category</th>
									<th class="column-title ">Sub-category Name</th>
									<th class="column-title ">Topic</th>
									<th class="column-title ">Type</th>
									<th class="column-title no-link last tc"><span class="nobr">Action</span>
									
									</th>
								  </tr>
								</thead>
									<tbody>
								<?php 
										$i=0;
										$result = mysql_query("Select * from `category` join `topics` on category.cat_id=topics.cat_id join `folder` on folder.cat_id = topics.cat_id && folder.topic_id=topics.topic_id ORDER BY f_name ");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td><?php echo $i;?></td>
									        <td><?php echo htmlspecialchars($row['category'],ENT_QUOTES)?></td>
											<td><?php echo htmlspecialchars($row['f_name'],ENT_QUOTES)?></td>
											<td><?php echo htmlspecialchars($row['topic'],ENT_QUOTES)?></td>
											<td><?php echo htmlspecialchars($row['type'],ENT_QUOTES)?></td>
									<td class="a-right a-right tc content-center">
										<form action="" method="post">
											<button type="submit" name="delete_folder" class="btn btn-primary" value="<?php echo htmlspecialchars($row['f_id'],ENT_QUOTES)?>">Delete</button>
											
										</form>
										<form action="edit_folder.php" method="POST">
											<button type="submit" name="edit_folder" class="btn btn-primary" value="<?php echo htmlspecialchars($row['f_id'],ENT_QUOTES)?>">Edit</button>
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
