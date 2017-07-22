<?php 
require('sidebar.php');
require('header.php');  
if(isset($_POST['delete_heading'])){	
   $check = $_POST['delete_heading'];
   $delete = mysql_query("DELETE FROM test_heading WHERE th_id = '".$check."' ");
   if($delete)
   {
	   echo "<script>alert('Deleted Successfully');</script>";
   }
   else
	    echo "<script>alert('Unsuccessful');</script>";
}
?>
 <!-- page content -->
        <div class="right_col" role="main">
          <?php include('index_counter.php');?>

         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Test Heading</h2>
                    <div class="clearfix"></div>
                  </div>
				  <div class="x_content">
						  <div class="table-responsive">
							  <table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title ">Heading</th>
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
										$result = mysql_query("Select * from test_heading join test_category on test_heading.tc_id = test_category.tc_id");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td class=" "><?php echo $i;?></td>
									<td class=" "><?php echo $row['th_name']?></td>
									<td class="a-right a-right "><?php echo $row['tc_name']?></td>
									<td class="a-right a-right tc content-center">
										<form action="" method="post">
											<button type="submit" name="delete_heading" class="btn btn-primary" value="<?php echo $row['th_id'];?>">Delete</button>
											
										</form>
										<form action="edit_test_heading.php" method="POST">
											<button type="submit" name="edit_heading" class="btn btn-primary" value="<?php echo $row['th_id'];?>">Edit</button>
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
