<!--NEWS-->
<div class="col-sm-4 col-xs-12" style="max-width:100%; ">
			<div class="col-xs-4" style="border:solid; background-color:white; height:560px; padding:0px; border:1; width:100%;"> 
				<div  class="col-xs-12"  style="background-color:#031658; height:35px; width:100%; color:white;">
					<h4  style="text-align:center;">Latest News<h4>
				</div>
				<marquee direction="up" style="height:520px;">
					<?php 
						$homepage = file_get_contents('http://newsapi.org/v1/articles?source=the-times-of-india&sortBy=top&apiKey=aac20ad4883a41e0b8d8f4874e8168e1');
						$news=json_decode($homepage,true);
						foreach($news['articles'] as $value)
						{ 
					?>
							<div class="col-xs-12" >
							<a href="<?php echo $value['url'];?>" target="_blank"
							<h4 class="text-primary"><?php echo $value['title'];?></h4></a>
							<p class="text-default"><?php echo $value['description'];?></p>
							</div>
						<?php } ?>
				</marquee>
			</div>
		</div>
<!--/NEWS-->
		