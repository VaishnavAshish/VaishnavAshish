
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Gretong a Ecommerce Admin Panel Category Flat Bootstrap Responsive Web Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />


</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	    <div class="inner-content">
		<!-- header-starts -->
				<?php include("header.php");?>
		<!-- //header-ends -->
				
				<!--content-->
			<div class="content">
					
			
						<!--//area-->
							<div class="col-md-12 skil" style="width:100%;">
								<div class="col-md-4 content-top-1">
									<div class="col-md-6 top-content">
										<?php  
											$query = mysql_query("select * from `users`");
											$count = mysql_num_rows($query)-1;
										?>
										<h5>Registered User</h5>
										<label><?php echo $count;?></label>
									</div>
									<div class="col-md-6 top-content1">	   
										<div id="demo-pie-1" class="pie-title-center" data-percent="25"> <span class="pie-value">25%</span> </div>
									</div>
										<div class="clearfix"> </div>
								</div>
								<div class="col-md-4 content-top-1">
									<div class="col-md-6 top-content">
										<h5>Points</h5>
										<label>6295</label>
									</div>
									<div class="col-md-6 top-content1">	   
										<div id="demo-pie-2" class="pie-title-center" data-percent="50"> <span class="pie-value">50%</span> </div>
									</div>
									 <div class="clearfix"> </div>
								</div>
								<div class="col-md-4 content-top-1">
									<div class="col-md-6 top-content">
										<h5>Cards</h5>
										<label>3401</label>
									</div>
									<div class="col-md-6 top-content1">	   
										<div id="demo-pie-3" class="pie-title-center" data-percent="75"> <span class="pie-value">75%</span> </div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						
						
					<br><br><br><br><br><br><br><br><br><br><br><br>	
					<div class="content-top" align="center">
					
							<table class="table table-bordered" style="width: 75%; text-align:center;">
									<thead>
										<tr >
											<th style="text-align:center;">S. No</th>
											<th style="text-align:center;">Name</th>
											<th style="text-align:center;">Email</th>
											<th style="text-align:center;">Status</th>
											<th style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$i=0;
										$result = mysql_query("Select * from users where uid>1");
										while($row=mysql_fetch_array($result))
										{
											$i+=1;
											if($row['status']=="ACTIVATED")
											{
												$button = "DEACTIVATE";
											}
											else if($row['status']=="DEACTIVATED")
											{
												$button = "ACTIVATE";
											}
										
									?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row['name']?></td>
											<td><?php echo $row['email']?></td>
											<td>
												<?php echo $row['status'];?>
											</td>
											<td style=" display: flex;align-items: center;justify-content: center;">	
													<a href="delete_user.php?uid=<?php echo $row['uid'];?>"><button  type="button" class="button btn-danger">Delete</button></a>
													<button type="button"   id="change" class="button btn-danger" value="<?php echo $row['uid']?>"><?php echo $button;?></button>
													
												
											</td>
										</tr>
									
									<?php }?>
									</tbody>
							</table>
					</div>
						
			</div>		
						
	
			<!--//content-inner-->
			<!-- sidebar -->
						<?php include("sidebar.php");?>
			<!--/sidebar-menu-->
				
							  		
		</div>
	</div>	
</div>
	<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->

	<script type="text/javascript">

	$(function() {

		// We use an inline data source in the example, usually data would
		// be fetched from a server

		var data = [],
			totalPoints = 300;

		function getRandomData() {

			if (data.length > 0)
				data = data.slice(1);

			// Do a random walk

			while (data.length < totalPoints) {

				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

				if (y < 0) {
					y = 0;
				} else if (y > 100) {
					y = 100;
				}

				data.push(y);
			}

			// Zip the generated y values with the x values

			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
			}

			return res;
		}

		// Set up the control widget

		var updateInterval = 30;
		$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});

		var plot = $.plot("#placeholder", [ getRandomData() ], {
			series: {
				shadowSize: 0	// Drawing is faster without shadows
			},
			yaxis: {
				min: 0,
				max: 100
			},
			xaxis: {
				show: false
			}
		});

		function update() {

			plot.setData([getRandomData()]);

			// Since the axes don't change, we don't need to call plot.setupGrid()

			plot.draw();
			setTimeout(update, updateInterval);
		}

		update();

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
<!-- /real-time -->
<script src="js/jquery.fn.gantt.js"></script>
    <script>

		$(function() {

			"use strict";

			$(".gantt").gantt({
				source: [{
					name: "Sprint 0",
					desc: "Analysis",
					values: [{
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "Requirement Gathering", 
						customClass: "ganttRed"
					}]
				},{
					name: " ",
					desc: "Scoping",
					values: [{
						from: "/Date(1322611200000)/",
						to: "/Date(1323302400000)/",
						label: "Scoping", 
						customClass: "ganttRed"
					}]
				},{
					name: "Sprint 1",
					desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period", 
						customClass: "ganttOrange"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});

			prettyPrint();

		});

    </script>
	 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
		   <script src="js/menu_jquery.js"></script>
		   <script src=" main.js"></script>
</body>
</html>