<?php 
require('sidebar.php');
require('header.php');

if(isset($_POST['delete_subtopic']))
{	$id = htmlspecialchars($_POST['delete_subtopic'],ENT_QUOTES);
	$delete = mysql_query("Delete from `subtopic` where sub_id='".$id."'");
	if($delete)
	{	
		
			$question_query=mysql_query("Delete from `question` where sub_id='".$id."'");
		
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
                    <h1>SubTopics</h1>
                    <div class="clearfix"></div>
                  </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title ">Category</th>
									<th class="column-title ">Topic</th>
									<th class="column-title ">Folder</th>
									<th class="column-title ">SubTopic</th>
									<th class="column-title no-link last tc"><span class="nobr">Action</span>
									
									</th>
								  </tr>
								</thead>
									<tbody>
								<?php 
										$i=0;
										$que="Select *
											from `subtopic` 
												join `category` on subtopic.cat_id=category.cat_id 
												left outer join `topics` on topics.topic_id=subtopic.topic_id
												left outer join `folder` on subtopic.folder_id = folder.f_id
											";
										
										$result = mysql_query($que);
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td><?php echo $i;?></td>
											<td><?php echo htmlspecialchars($row['category'],ENT_QUOTES)?></td>
											<td><?php echo htmlspecialchars($row['topic'],ENT_QUOTES)?></td>
											<td><?php echo htmlspecialchars($row['f_name'],ENT_QUOTES)?></td>
											<td><?php echo htmlspecialchars($row['subtopic'],ENT_QUOTES)?></td>
									<td class="a-right a-right tc content-center">
										<form action="" method="post">
											<input type="hidden" name="type" value="<?php echo $row['tab']?>">
											<button type="submit" name="delete_subtopic" class="btn btn-primary" value="<?php echo htmlspecialchars($row['sub_id'],ENT_QUOTES);?>">Delete</button>
											
										</form>
										<form action="edit_subtopic.php" method="POST">
											<input type="hidden" name="type" value="<?php echo $row['tab']?>">
											<button type="submit" name="edit_subtopic" class="btn btn-primary" value="<?php echo htmlspecialchars($row['sub_id'],ENT_QUOTES);?>">Edit</button>
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
