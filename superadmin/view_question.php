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

if(isset($_POST['delete_question']))
{	$id = $_POST['delete_question'];
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
							     <?php if(isset($_GET['cat_id']))
								        {  
									$cat_query=mysql_query("Select * from `category` where cat_id='".$_GET['cat_id']."'");
									$row_cat=mysql_fetch_array($cat_query);
									?>
									<option value="<?php echo $row_cat['cat_id'];?>"><?php echo $row_cat['category'];?></option>
										<?php } else {?>
										 <option value="">Select Category</option>
										<?php}
										$j = 0;
										$query = mysql_query("Select * from `category`");
										while($row1=mysql_fetch_array($query))
										{ ?>
									<option value="<?php echo $row1['cat_id'];?>"><?php echo $row1['category'];?></option>
										<?php } ?>
										
								</select>
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val topic-select form-control select-question" name="topic_filter" >
						           <option value="">Select Topic</option>
									<?php if(isset($_GET['cat_id'])){
										$topic_query=mysql_query("Select * from `topics` where cat_id='".$_GET['cat_id']."'");
										while($row_topic=mysql_fetch_array($topic_query)){
										?>
										<option value="<?php echo $row_topic['topic_id'];?>"><?php echo $row_topic['topic'];?></option>
									<?php  }} ?>
						  </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select SubTopic</label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="sel_val sub_topic-select form-control select-question" name="subtopic_filter" >
									<option value="">Select SubTopic</option>
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
										$result = mysql_query("Select * from `question` limit $start,$end");
										$page_count=mysql_num_rows(mysql_query("Select * from `question`"))/$limit;
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										?>
								
									  <tr class="even pointer">
										<td><?php echo $i;?></td>
										<td><?php echo $row['question']?></td>
										<td><?php echo $row['opt1']?></td>
										<td><?php echo $row['opt2']?></td>
										<td><?php echo $row['opt3']?></td>
										<td><?php echo $row['opt4']?></td>
										<td><?php echo $row['answer']?></td>
										<td class="a-right a-right tc content-center">
											<form action="" method="post">
												<button type="submit" name="delete_question" class="btn btn-primary" value="<?php echo $row['qid']?>">Delete</button>
											</form>
											<form action="edit_question.php" method="POST">
												<button type="submit" name="edit_question" class="btn btn-primary" value="<?php echo $row['qid']?>">Edit</button>
											</form>
										</td>
									 </tr>
								 <?php } ?>
								</tbody>
							  </table>
								<ul class="pagination pagination-lg">
								<li> <a  href="view_question.php?page=<?php if($page>0) echo $page+1; else echo "#";?>">&laquo;</a></li>
								<?php $j=0;
								 while($j<$page_count){
									if($j==$page){ $class="active";} else $class='';
								 ?>
										<li class="<?php echo $class;?>" ><a  href="view_question.php?page=<?php echo $j; ?>"><?php echo $j+1; ?></a></li>
								<?php $j++; 
								      }  ?>
							      <li><a href="view_question.php?page=<?php if($page<$page_count-1) echo $page+1; else echo "#"; ?>">&raquo;</a></li>	  
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
