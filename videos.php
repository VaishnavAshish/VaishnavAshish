<?php 
 include("connection.php");
if(isset($_GET['cat_id']))
{
	$catQuery="SELECT * FROM `category` where cat_id=".$_GET['cat_id']." LIMIT 1";
	$category_query=mysql_query($catQuery);
	$category=mysql_fetch_array($category_query);
}
if(isset($_GET['topic_id']))
{ 
	$topQuery="SELECT * FROM `topics` where topic_id=".$_GET['topic_id']." LIMIT 1";
	$topic_query=mysql_query($topQuery);
	$topic=mysql_fetch_array($topic_query);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Paddhle-pappu</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="style/style.css">
	  <link rel="stylesheet" href="style/css/bootstrap.min.css">
	  <script src="style/js/jquery.min.js"></script>
	  <script src="style/js/bootstrap.min.js"></script>
  </head>

<body>

<!--Header-->	
<?php include("header.php");
?>	
<!--/Header-->

<!--Page heading-->
<div class="col-sm-12 col-xs-12 page-heading">
	<h3>HOME <span class="glyphicon glyphicon-forward"></span> <?php if($_GET['cat_id']){?><span class="text-success"><?php echo $category['category'];?></span><?php }?><h3>
</div>	
<!--/Page Heading-->
	
<!--Breadcrumbs-->
<div class="col-sm-12 col-xs-12 fixme">
	<div class="col-sm-12 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<?php if($_GET['cat_id']){?><li><a href="topics.php?cat_id=<?php echo $_GET['cat_id'];?>"><?php echo $category['category'];?></a></li><?php }?>    
            <?php if(@$_GET['topic_id']){?><li class="active"><?php echo $topic['topic'];?></li><?php }?>    
		 </ol>
	</div>
</div>	
<!--/Breadcrumbs-->
<br><br>
<!--Page Content-->
<div class = "container" style="margin-top:100px;margin-bottom:100px;padding-left:3%; padding-right:3%;" >			
		<div class="media_div col-sm-8 col-xs-12 " >
			
			<?php 
				$Q="SELECT * FROM `videos` where cat_id=".$_GET['cat_id']." AND topic_id=".$_GET['topic_id'];
				$query=mysql_query($Q);
				if(mysql_num_rows($query)>0){
				while($row=mysql_fetch_array($query)){
			?>
						<div class="col-xs-12 col-sm-6 image-subtopics" style="margin-bottom:50px;" >
							<iframe class="img-responsive" src="https://www.youtube.com/embed/6R5UveljmOQ" frameborder="0" allowfullscreen></iframe>
						</div>
			<?php }
			   }else {?>
                    <div class="row" style="margin-top:20px;margin-bottom:20px;">
                            <div class="container">
                                <center>
                                    <div class="col-xs-12" style="font-size:20px;background-color: #ececec;box-shadow: 5px 5px 20px #888888;padding:50px;text-align:center">
                                        <b>Sorry No Data To Be Shown</b>
                                    </div>
                                 </center>
                            </div>
                    </div>
        	<?php }?>
		</div>
		
<!--/-Page Content-->		


<!--Footer-->	
<?php include("footer.php");?>	
<!--/Footer-->
			
       </body>
 </html>
