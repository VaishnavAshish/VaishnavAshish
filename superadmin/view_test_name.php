<?php 
ob_start();
require('sidebar.php');
require('header.php');
if(isset($_POST['delete_name'])) 
{
	$id=htmlspecialchars($_POST['delete_name'],ENT_QUOTES);
	$delete = mysql_query("Delete from `test_name` where tn_id='".$id."'");
	if($delete)
	{	$delete_question=mysql_query("Delete from test_question where tn_id='".$id."'");
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
						<h2>Test Name</h2>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									
									<th class="column-title">S.No.</th>
									<th class="column-title ">Test Category</th>
									<th class="column-title ">Test Heading</th>
									<th class="column-title ">Test Name</th>
									<th class="column-title ">No. of Questions</th>
									<th class="column-title ">Test Time</th>
									
									<th class="column-title no-link last tc "><span class="nobr">Action</span></th>
								  </tr>
								</thead>
									<tbody>
								<?php 
										$i=0;
										$result = mysql_query("Select * from `test_name` join `test_heading` on test_name.th_id=test_heading.th_id join `test_category` on test_name.tc_id=test_category.tc_id ");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
											<td><?php echo $i;?></td>
											<td><?php echo htmlspecialchars($row['tc_name'],ENT_QUOTES);?></td>
											<td><?php echo htmlspecialchars($row['th_name'],ENT_QUOTES);?></td>
											<td><?php echo htmlspecialchars($row['tn_name'],ENT_QUOTES);?></td>
											<td><?php echo htmlspecialchars($row['no_of_q'],ENT_QUOTES);?></td>
											<td><?php $a=explode(";",$row['time']);
											      echo $a[0]." hours, ";
												  echo $a[1]." Minutes, ";
												  echo $a[2]." Seconds";
												  ?></td>
											<td class="a-right a-right tc content-center">
												<form action="" method="post">
													<button type="submit" name="delete_name" class="btn btn-primary" value="<?php echo htmlspecialchars($row['tn_id'],ENT_QUOTES);?>">Delete</button>
													
												</form>
												<form action="edit_test_name.php" method="POST">
													<button type="submit" name="edit_name" class="btn btn-primary" value="<?php echo htmlspecialchars($row['tn_id'],ENT_QUOTES);?>">Edit</button>
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
