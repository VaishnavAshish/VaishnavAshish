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

if(isset($_POST['delete_video']))
{	$id = $_POST['delete_video'];
	$delete = mysql_query("Delete from `videos` where video_id='".$id."'");
	if($delete)
	{	
		echo "<script>alert('Deleted Successfully');</script>";
	}
	else{
		echo "<script>alert('Deleted Unsuccessful');</script>";
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
								<!--Filter question-->
		<div class="x_title">
                    <h1>Filter Videos</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

         <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control" name="category-videos" >
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$query = mysql_query("Select * from category");
										while($row=mysql_fetch_array($query))
										{
											
										
									?>
									<option value="<?php echo $row['cat_id'];?>"><?php echo $row['category'];?></option>
										<?php } ?>
								</select>
                        </div>
                      </div>
					  
					    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val topic-select topic-type-video form-control" name="topic_id" >
									<option value="">Select Topic</option>
						  </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select SubTopic</label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val sub_topic-select form-control" name="videos-filter" >
									<option value="">Select SubTopic</option>
						  </select>
                        </div>
					  </div>
					 
                    </form>
<!--//filter question-->

					<div class="x_title">
						<h1>Videos</h1>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									
									<th class="column-title">S.No.</th>
									<th class="column-title ">Name</th>
									
									<th class="column-title ">Youtube Video Id</th>
									<th class="column-title no-link last tc"><span class="nobr">Action</span></th>
								  </tr>
								 </thead>
									<tbody>
								<?php 
										$i=$start;
										$query="Select * from videos";
										if(isset($_GET['subtopic_id']))
										{
											$query.="where sub_id='".$_GET['subtopic_id']."'";
										}
										$query1=$query;
										$query.=" limit $start,$limit";
							//			$result = mysql_query("Select * from `videos` limit $start,$end");
								$result=mysql_query($query);
									
										$page_count=mysql_num_rows(mysql_query($query1))/$limit;
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										?>
								
								  <tr class="even pointer">
									<td><?php echo $i;?></td>
									<td><?php echo $row['video_name']?></td>
									<td>
										<iframe width="100" height="100" src="https://www.youtube.com/embed/<?php echo $row['youtube_id']?>" frameborder="0" allowfullscreen></iframe>
									</td>	
									<td class="a-right a-right tc content-center">
										<form action="" method="post">
											<button type="submit" name="delete_video" class="btn btn-primary" value="<?php echo $row['video_id']?>">Delete</button>
											
										</form>
										<form action="edit_videos.php" method="POST">
											<button type="submit" name="edit_videos" class="btn btn-primary" value="<?php echo $row['video_id']?>">Edit</button>
										</form>
									</td>
								  </tr>
										<?php } ?>
								</tbody>
							  </table>
								<ul class="pagination pagination-lg">
								<li> <a  href="view_videos.php?page=<?php if($page>0) echo $page+1; else echo "#";?>">&laquo;</a></li>
								<?php $j=0;
								 while($j<$page_count){
									if($j==$page){ $class="active";} else $class='';
								 ?>
										<li class="<?php echo $class;?>" ><a  href="view_videos.php?page=<?php echo $j; ?>"><?php echo $j+1; ?></a></li>
								<?php $j++; 
								      }  ?>
							      <li><a href="view_videos.php?page=<?php if($page<$page_count-1) echo $page+1; else echo "#"; ?>">&raquo;</a></li>	  
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
