<?php 
ob_start();
require('sidebar.php');
require('header.php');

$limit=15;
if(isset($_GET['page'])){
	$page = htmlspecialchars($_GET['page'],ENT_QUOTES);
	$start = $page*$limit;
	$end = $start+$limit;
}
else {
	$page=0;
	$start=$page;
	$end=$page+$limit-1;
}	

if(isset($_POST['delete_question']))
{	$id = htmlspecialchars($_POST['delete_question'],ENT_QUOTES);
	$delete = mysql_query("Delete from `question` where qid='".$id."'");
	if($delete)
	{	
		echo "<script>alert('Deleted Successfully');</script>";
	}
	else{
		echo "<script>alert('UnSuccessful');</script>";
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
                    <h1>Filter Question</h1>
                    <div class="clearfix"></div>
                  </div>
			<form id="demo-form2" data-parsley-validate method="POST"class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val form-control select-question" name="category_filer" >
						 
							     <?php 
								 
								 if(isset($_GET['cat_id']))
								        {  
									$cat_query=mysql_query("Select * from `category` where cat_id='".$_GET['cat_id']."'");
									$row_cat=mysql_fetch_array($cat_query);
									?>
									<option value="<?php echo htmlspecialchars($row_cat['cat_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row_cat['category'],ENT_QUOTES);?></option>
									<?php }
									else{ ?>
									<option value="">Select Category</option>
										<?php
									}
										$j = 0;
										$query = mysql_query("Select * from category");
										while($row=mysql_fetch_array($query))
										{ ?>
											<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row['category'],ENT_QUOTES);?></option>
										<?php } 
										
										?>
									
								</select>
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val topic-select form-control select-question" name="topic_filter" >
						          
									<?php 
									$folder=false;
									if(isset($_GET['topic_id']))
								        {  
									$topic_query=mysql_query("Select * from `topics` where topic_id='".$_GET['topic_id']."'");
									$row_topic=mysql_fetch_array($topic_query);
									if($row_topic['type']=="Folder"){$folder=true;}
									?>
										<option value="<?php echo htmlspecialchars($row_topic['topic_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row_topic['topic'],ENT_QUOTES);?></option>
									<?php }
									   else{ ?>
										  <option value="">Select Topic</option> 
									  <?php  }
										$j = 0;
										$query = mysql_query("Select * from topics where cat_id='".$_GET['cat_id']."' AND type='Question' ");
										while($row=mysql_fetch_array($query))
										{if($row['type']=="Folder"){$folder=true;}
											 
										?>
											<option value="<?php echo htmlspecialchars($row['topic_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row['topic'],ENT_QUOTES);?></option>
										<?php } ?>
										
						  </select>
                        </div>
                      </div>
					  
		<?php if($folder){?>
		
		
			  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Folder</label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val sub_topic-select form-control select-question" name="folder_Filter" >
								<?php if(isset($_GET['folder_id']))
								        {  
									$subtopic_query=mysql_query("Select * from `subtopic` where topic_id='".$_GET['topic_id']."'");
									$row_subtopic=mysql_fetch_array($subtopic_query);
									?>
									<option value="<?php echo htmlspecialchars($row_subtopic['sub_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row_subtopic['subtopic'],ENT_QUOTES);?></option>
									<?php }
									 else{
										?> 
									<option value="">Select Subtopic</option> 	
									 <?php }
										$j = 0;
										$query = mysql_query("Select * from subtopic where topic_id='".$_GET['topic_id']."'");
										while($row=mysql_fetch_array($query))
										{ ?>
											<option value="<?php echo htmlspecialchars($row['sub_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row['subtopic'],ENT_QUOTES);?></option>
										<?php } ?>
						  </select>
						  
                        </div>
					  </div>
		
		
		
		
		<?php } ?>
					  
					  
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select SubTopic</label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val sub_topic-select form-control select-question" name="subtopic_filter" >
								<?php if(isset($_GET['sub_id']))
								        {  
									$subtopic_query=mysql_query("Select * from `subtopic` where topic_id='".$_GET['topic_id']."'");
									$row_subtopic=mysql_fetch_array($subtopic_query);
									?>
									<option value="<?php echo htmlspecialchars($row_subtopic['sub_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row_subtopic['subtopic'],ENT_QUOTES);?></option>
									<?php }
									 else{
										?> 
									<option value="">Select Subtopic</option> 	
									 <?php }
										$j = 0;
										$query = mysql_query("Select * from subtopic where topic_id='".$_GET['topic_id']."'");
										while($row=mysql_fetch_array($query))
										{ ?>
											<option value="<?php echo htmlspecialchars($row['sub_id'],ENT_QUOTES);?>"><?php echo htmlspecialchars($row['subtopic'],ENT_QUOTES);?></option>
										<?php } ?>
						  </select>
						  
                        </div>
					  </div>
					 
                    </form>
<!--//filter question-->


					<div class="x_title">
						<h1>Questions</h1>
						<div class="clearfix"></div>
                    </div>
				    <div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
								  <tr class="headings">
									
									<th class="column-title">S.No.</th>
									<th class="column-title ">Question</th>
									
									<th class="column-title ">Option1</th>
									<th class="column-title ">Option2</th>
									<th class="column-title ">Option3</th>
									<th class="column-title ">Option4</th>
									<th class="column-title ">Answer</th>
									<th class="column-title no-link last tc"><span class="nobr">Action</span>
									
									</th>
									
											
									<th class="bulk-actions" colspan="7">
									  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
									</th>
								  </tr>
								</thead>
									<tbody class="view-question">
								<?php 
										$i=$start;
										//start of query
											$query="select * from `question` ";
											if(isset($_GET['cat_id'])){
												$query.=" where cat_id='".$_GET['cat_id']."'";
											}
											if(isset($_GET['topic_id'])){
												$query.=" AND topic_id='".$_GET['topic_id']."' ";
											}
											if(isset($_GET['sub_id'])){
												$query.=" AND sub_id='".$_GET['sub_id']."' ";
											}
											$query1=$query;
											$query.=" limit $start,$limit";
										
										$result=mysql_query($query);
										//$result = mysql_query("Select * from `question` limit $start,$end");
										$page_count=mysql_num_rows(mysql_query($query1))/$limit;
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										?>
								
									  <tr class="even pointer">
										<td><?php echo $i;?></td>
										<td><?php echo htmlspecialchars($row['question'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['opt1'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['opt2'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['opt3'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['opt4'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['answer'],ENT_QUOTES);?></td>
										<td class="a-right a-right tc content-center">
											<form action="" method="post">
												<button type="submit" name="delete_question" class="btn btn-primary" value="<?php echo htmlspecialchars($row['qid'],ENT_QUOTES);?>">Delete</button>
											</form>
											<form action="edit_question.php" method="POST">
												<button type="submit" name="edit_question" class="btn btn-primary" value="<?php echo htmlspecialchars($row['qid'],ENT_QUOTES);?>">Edit</button>
											</form>
										</td>
									 </tr>
								 <?php } ?>
								</tbody>
							  </table>
							 
							 <?php
							 $cat_page='';
							 $topic_page='';
							 $sub_page='';
							  if(isset($_GET['cat_id'])){
									$cat_page="&cat_id=".$_GET['cat_id'];
								}
								if(isset($_GET['topic_id'])){
									$topic_page="&topic_id=".$_GET['topic_id'];
								}
								if(isset($_GET['sub_id'])){
									$sub_page="&sub_id=".$_GET['sub_id'];
								}
							  ?>
							  
								<ul class="pagination pagination-lg">
								<li> <a  href="view_question.php?page=<?php if($page>0) echo ($page-1).$cat_page.$topic_page.$sub_page; else echo "0".$cat_page.$topic_page.$sub_page;?>">&laquo;</a></li>
								<?php $j=0;
								
								 while($j<$page_count){
									if($j==$page){ $class="active";} else $class='';
								 ?>
										<li class="<?php echo $class;?>" ><a  href="view_question.php?page=<?php echo $j.$cat_page.$topic_page.$sub_page;  ?>"><?php echo $j+1; ?></a></li>
								<?php $j++; 
								      }  ?>
							      <li><a href="view_question.php?page=<?php if($page<$page_count-1) echo ($page+1).$cat_page.$topic_page.$sub_page; else echo "0".$cat_page.$topic_page.$sub_page;?>"; >&raquo;</a></li>	  
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
