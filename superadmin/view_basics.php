<?php 
ob_start();
require('sidebar.php');
require('header.php');
 
$limit=15;
if(isset($_GET['page'])){
	$page=$_GET['page'];
	$start=$page*$limit;
	$end=$start+$limit;
}
else {
	$page=0;
	$start=$page;
	$end=$page+$limit-1;
}	

if(isset($_POST['delete_basic']))
{	$id = $_POST['delete_basic'];
	$delete = mysql_query("Delete from `basics` where basics_id='".$id."'");
	if($delete)
	{	
		echo "<script>alert('Deleted Successfully');</script>";
	}
	else{
		echo "<script>alert('Unsuccessful');</script>";
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
						<h1>Basics</h1>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									
									<th class="column-title">S.No.</th>
									<th class="column-title ">Heading</th>
									<th class="column-title ">View Pdf</th>
									<th class="column-title ">Category</th>
									<th class="column-title ">Topic</th>
									<th class="column-title ">Subtopic</th>
									<th class="column-title no-link last tc"><span class="nobr">Action</span></th>
								  </tr>
								</thead>
									<tbody>
								<?php 
										$i=$start;
										$result = mysql_query("Select * from `basics` limit $start,$end");
										$page_count=mysql_num_rows(mysql_query("Select * from `basics`"))/$limit;
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
										
									?>
								
								  <tr class="even pointer">
									<td><?php echo $i;?></td>
									<td><?php echo $row['heading']?></td>
									<td>
										<a style="color:blue; text-decoration:underline;" href="../uploads/basics/<?php echo $row['pdf']?>"><?php echo $row['heading'].'.pdf';?></a>
									</td>
									
									<?php 
									$cat_id=$row['cat_id'];
									$cat_query=mysql_query("SELECT * FROM `category` where cat_id='".$cat_id."' ");
									$cat_res=mysql_fetch_array($cat_query);
									?>
									<td><?php echo $cat_res['category']; ?></td>									
									
									<?php 
									$topic_id=$row['topic_id'];
									$topic_query=mysql_query("SELECT * FROM `topics` where topic_id='".$topic_id."' ");
									$topic_res=mysql_fetch_array($topic_query);
									?>
									<td><?php echo $topic_res['topic']; ?></td>
									
									<?php 
									$sub_id=$row['sub_id'];
									$subtopic_query=mysql_query("SELECT * FROM `subtopic` where sub_id='".$sub_id."' ");
									$subtopic_res=mysql_fetch_array($subtopic_query);
									?>
									<td><?php echo $subtopic_res['subtopic']; ?></td>
									
									<td class="a-right a-right tc content-center">
										<form action="" method="post">
											<button type="submit" name="delete_basic" class="btn btn-primary" value="<?php echo $row['basics_id']?>">Delete</button>
											
										</form>
										<form action="edit_basics.php" method="POST">
											<button type="submit" name="edit_basics" class="btn btn-primary" value="<?php echo $row['basics_id']?>">Edit</button>
										</form>
									</td>
								  </tr>
										<?php } ?>
								</tbody>
							  </table>
								<ul class="pagination pagination-lg">
								<li> <a  href="view_basics.php?page=<?php if($page>0) echo $page+1; else echo "#";?>">&laquo;</a></li>
								<?php $j=0;
								 while($j<$page_count){
									if($j==$page){ $class="active";} else $class='';
								 ?>
										<li class="<?php echo $class;?>" ><a  href="view_basics.php?page=<?php echo $j; ?>"><?php echo $j+1; ?></a></li>
								<?php $j++; 
								      }  ?>
							      <li><a href="view_basics.php?page=<?php if($page<$page_count-1) echo $page+1; else echo "#"; ?>">&raquo;</a></li>	  
							    </ul>
								
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
