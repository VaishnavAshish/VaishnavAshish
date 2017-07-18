<?php 
ob_start();
require('sidebar.php');
require('header.php');
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
									<th class="column-title ">Category</th>
									
									<th class="column-title ">Topic</th>
									<th class="column-title ">SubTopic</th>
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
										$result = mysql_query("Select * from `topics` join `category` on topics.cat_id=category.cat_id join `subtopic` on subtopic.cat_id = topics.cat_id && subtopic.topic_id=topics.topic_id ");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
										
									?>
								
								  <tr class="even pointer">
									<td><?php echo $i;?></td>
											<td><?php echo $row['category']?></td>
											
											<td><?php echo $row['topic']?></td>
											<td><?php echo $row['subtopic']?></td>
									<td class="a-right a-right tc">
										<form action="edit_subtopic.php" method="POST">
											<button type="submit" name="view_question" class="btn btn-primary" value="<?php echo $row['sub_id']?>">View Question</button>
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
