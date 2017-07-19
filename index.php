<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Navigation</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="google-signin-client_id" content="214155233946-n3vsd276lrd5tno5m00nd7k4f1h5id32.apps.googleusercontent.com">
	  <link rel="stylesheet" href="style/style.css">
	  <link rel="stylesheet" href="style/css/bootstrap.min.css">
	  <script src="style/js/jquery.min.js"></script>
	  <script src="style/js/bootstrap.min.js"></script>
	
<script>


</script>
	</head>
	

<body>

<!--Header-->	
<div id="header">
<?php include("header.php");?>	
</div>
<!--/Header-->

<?php 
$cat=mysql_query("SELECT * FROM `category`");
?>

<!--Category Icons-->
<br><br>

<div class="container cont-width" >			
		<div class="col-sm-7 col-xs-12">
			 <form method="post" action="topics.php" id="cat" style="display:none;">
				<input type="text" name="cat_id">
			 </form>
			<?php while($row=mysql_fetch_array($cat))
					{ ?>
			<a class="category_post" href="JavaScript:void(0)" value="<?php echo $row['cat_id'];?>">
				<div class=" imageicon col-sm-4 col-md-4 col-xs-6">
					<img  src="images/<?php echo $row['cat_image'];?>" alt="<?php echo $row['cat_image'];?>"></img>
					<h4><?php echo $row['category'];?></h4>
				</div>
			</a>
					<?php } ?>
		</div>
		
<!--/Category Icons-->

<!--Footer-->	
 
<?php include("footer.php");?>	
<!--/Footer-->
		<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
       </body>
 </html>
