<?php 
ob_start();
require('sidebar.php');
require('header.php');
if(isset($_POST['delete_name'])) 
{
	$id=$_POST['delete_name'];
	$delete = mysql_query("Delete from `test_name` where tn_id='".$id."'");
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
						<h2>SubTopic</h2>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									
									<th class="column-title">S.No.</th>
									<th class="column-title ">Test Name</th>
									
									<th class="column-title ">Test Heading</th>
									<th class="column-title ">No. of Questions</th>
									<th class="column-title ">Test Hours</th>
									
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
										$result = mysql_query("Select * from `test_name` join `test_heading` on test_name.th_id=test_heading.th_id");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td><?php echo $i;?></td>
											<td><?php echo $row['tn_name']?></td>
											<td><?php echo $row['th_name']?></td>
											<td><?php echo $row['no_of_q']?></td>
											<td><?php echo $row['hours']?></td>
											<td class="a-right a-right tc">
												<form action="" method="post">
													<button type="submit" name="delete_name" class="btn btn-primary" value="<?php echo $row['tn_id']?>">Delete</button>
													
												</form>
												<form action="edit_test_name.php" method="POST">
													<button type="submit" name="edit_name" class="btn btn-primary" value="<?php echo $row['tn_id']?>">Edit</button>
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
