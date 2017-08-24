<?php 
require('sidebar.php');
require('header.php');
 
if(isset($_POST['delete_user'])){	
   $check = htmlspecialchars($_POST['delete_user'],ENT_QUOTES);
   $delete = mysql_query("UPDATE  users  set status=3 WHERE uid = '".$check."' ");
   if($delete)
   {
	   echo "<script>alert('User Deleted Successfully');</script>";
   }
   else
	    echo "<script>alert('Unsuccessful');</script>";
}	
else if(isset($_POST['recover_user'])){	
   $check1 = htmlspecialchars($_POST['recover_user'],ENT_QUOTES);
   $recover = mysql_query("UPDATE  users  set status=1 WHERE uid = '".$check1."' ");
   if($recover)
   {
	   echo "<script>alert('User Recovered Successfully');</script>";
   }
   else
	    echo "<script>alert('Unsuccessful');</script>";
}
$query = mysql_query("select * from `users`");
$count = mysql_num_rows($query)-1;
?>
 <!-- page content -->
        <div  class="right_col" role="main">
          <!-- top tiles -->
          <?php include('index_counter.php');?>
          <!-- /top tiles -->

         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users</h2>
                    <div class="clearfix"></div>
                  </div>
				  <div class="x_content">
						  <div id="table" class="table-responsive">
							  <table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title ">Name</th>
									<th class="column-title ">Email</th>
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
										$result = mysql_query("Select * from users where uid>1");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td class=" "><?php echo $i;?></td>
									<td class=" "><?php echo htmlspecialchars($row['name'],ENT_QUOTES);?></td>
									<td class="a-right a-right "><?php echo htmlspecialchars($row['email'],ENT_QUOTES);?></td>
									<td class="tc content-center">
										<form action="" method="post">
										<?php if($row['status']=='3'){ ?>
											<button type="submit" name="recover_user" class="btn btn-primary" value="<?php echo htmlspecialchars($row['uid'],ENT_QUOTES);?>">Recover</button>
										<?php }
										 else { ?>
											<button type="submit" name="delete_user" class="btn btn-primary" value="<?php echo htmlspecialchars($row['uid'],ENT_QUOTES);?>">Delete</button>
										 <?php } ?>
										</form>
										<?php if($row['status']=='1') {  ?>
										 <button type="button" class="btn btn-warning change-status" id="change-status" value="<?php echo htmlspecialchars($row['uid'],ENT_QUOTES); ?>" status="<?php echo htmlspecialchars($row['status'],ENT_QUOTES);?>"><?php echo "Disable"; ?></button>
										<?php } 
												 else if($row['status']=='2') { ?>
										 <button type="button" class="btn btn-success change-status" id="change-status" value="<?php echo htmlspecialchars($row['uid'],ENT_QUOTES); ?>" status="<?php echo htmlspecialchars($row['status'],ENT_QUOTES);?>"><?php echo "Enable"; ?></button>
									    <?php } 
										
										else { ?>
										 <button type="button" class="btn btn-danger change-status disabled" id="change-status" value="<?php echo htmlspecialchars($row['uid'],ENT_QUOTES); ?>" status="<?php echo htmlspecialchars($row['status'],ENT_QUOTES);?>"><?php echo "Deleted"; ?></button>
									    <?php } ?>
										
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
