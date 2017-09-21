	
				<div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title no-link last tc"><span class="nobr">Action</span>
									<th class="column-title ">Question</th>
									<th class="column-title ">Option1</th>
									<th class="column-title ">Option2</th>
									<th class="column-title ">Option3</th>
									<th class="column-title ">Option4</th>
									<th class="column-title ">Answer</th>
									
                          </tr>
                        </thead>
							<tbody>
								<?php
									require('../connection.php');
									$query="SELECT * FROM `question`";
									if(isset($_GET['cat_id'])){
										$query.=" where cat_id=".$_GET['cat_id'];
									}
									if(isset($_GET['folder_id'])){
										$query.=" AND folder_id=".$_GET['folder_id'];
									}
									if(isset($_GET['topic_id'])){
										$query.=" AND topic_id=".$_GET['topic_id'];
									}
									if(isset($_GET['sub_id'])){
										$query.=" AND sub_id=".$_GET['sub_id'];
									}
									if(isset($_GET['q']) && $_GET['q']!=""){
										$query.=" having question LIKE '%".$_GET['q']."%' 
													or opt1 LIKE '%".$_GET['q']."%'
													or opt2 LIKE '%".$_GET['q']."%'
													or opt3 LIKE '%".$_GET['q']."%'
													or opt4 LIKE '%".$_GET['q']."%'
													or answer LIKE '%".$_GET['q']."%'";
									}
									//echo $query;
										$result=mysql_query($query);
										$i=0;
											while($row=mysql_fetch_array($result)){
												$i++;
								?>
							<tr class="even pointer">
									<td><?php echo $i;?></td>
									<td class="a-right a-right tc content-center">
											<form action="" method="post">
												<button type="submit" name="delete_question" class="btn btn-primary" value="<?php echo htmlspecialchars($row['qid'],ENT_QUOTES);?>">Delete</button>
											</form>
											<form action="edit_question.php" method="POST">
												<button type="submit" name="edit_question" class="btn btn-primary" value="<?php echo htmlspecialchars($row['qid'],ENT_QUOTES);?>">Edit</button>
											</form>
										</td>
										<td><?php echo htmlspecialchars($row['question'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['opt1'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['opt2'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['opt3'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['opt4'],ENT_QUOTES);?></td>
										<td><?php echo htmlspecialchars($row['answer'],ENT_QUOTES);?></td>
									
							</tr>
							<?php }?>
						</tbody>
					</div>