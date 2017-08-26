<?php 
require('sidebar.php');
require('header.php');

if(isset($_POST['delete_topic'])){	
   $check = htmlspecialchars($_POST['delete_topic'],ENT_QUOTES);
   $delete = mysql_query("DELETE FROM topics WHERE topic_id = '".$check."' ");
   if($delete)
   {	$sub_query=mysql_query("Delete from `subtopic` where topic_id='".$check."'");
		if($sub_query)
		{
			$question_query=mysql_query("Delete from `question` where topic_id='".$check."'");
		}
	   echo "<script>alert('User Deleted Successfully');</script>";
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
                    <h2>Topics</h2>
                    <div class="clearfix"></div>
                  </div>
				  <div class="x_content">
						  <div class="table-responsive">
							  <table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title ">Topic Name</th>
									<th class="column-title ">Category</th>
									<th class="column-title ">Page Type</th>
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
										$result = mysql_query("Select * from topics join category on topics.cat_id = category.cat_id ORDER BY topic");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td class=" "><?php echo $i;?></td>
									<td class=" "><?php echo htmlspecialchars($row['topic'],ENT_QUOTES);?></td>
									<td class="a-right a-right "><?php echo htmlspecialchars($row['category'],ENT_QUOTES);?></td>
									<td class="a-right a-right "><?php 
										echo htmlspecialchars($row['type'],ENT_QUOTES);
									   ?>
									</td>
									<td class="tc content-center">
										<form action="" method="post">
											<button type="submit" name="delete_topic" class="btn btn-primary" value="<?php echo htmlspecialchars($row['topic_id'],ENT_QUOTES);?>">Delete</button>
											
										</form>
										<form action="edit_topic.php" method="POST">
											<button type="submit" name="edit_topic" class="btn btn-primary" value="<?php echo htmlspecialchars($row['topic_id'],ENT_QUOTES);?>">Edit</button>
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
