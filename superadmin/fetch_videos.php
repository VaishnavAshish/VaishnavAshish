	
				<div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
									<th class="column-title">S.No.</th>
									<th class="column-title no-link last tc"><span class="nobr">Action</span>
									<th class="column-title ">Video</th>
									
									
                          </tr>
                        </thead>
							<tbody>
								<?php
									require('../connection.php');
									$query="SELECT * FROM `videos`";
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
										$query.=" having video_id LIKE '%".$_GET['q']."%'";
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
										<td>
												<iframe class="img-responsive" src="https://www.youtube.com/embed/<?php echo $row['youtube_id']?>" frameborder="0" allowfullscreen></iframe>
										</td>
									
								
									
							</tr>
							<?php }?>
						</tbody>
					</div>