<?php $query = mysql_query("select * from `users`");
	  $query1 = mysql_query("select * from `question`");
	  $query2 = mysql_query("select * from `videos`");
	  $count = mysql_num_rows($query)-1;
	  $count_question = mysql_num_rows($query1);
	   $count_videos = mysql_num_rows($query2);
	  ?>
 <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count"><?php echo $count;?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i>Total Questions</span>
              <div class="count"><?php echo $count_question;?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Videos</span>
              <div class="count green"><?php echo $count_videos;?></div>
            </div>
          <!--  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
            </div>-->
          </div>