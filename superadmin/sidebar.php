<?php 
require('../connection.php');
ob_start();
session_start();
	if(isset($_SESSION['username']) )
	{
		if(!($_SESSION['status']=='0'))
		{
			header('Location:login.php');
		}
	}
	else{
		header('Location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Padhle Pappu</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	  
	<!-- Custom Theme Style -->
    <link href="mystyle.css" rel="stylesheet">
  
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                    
                  </li>
				   <li><a><i class="fa fa-desktop"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_category.php">Add Category</a></li>
                      <li><a href="view_category.php">view Category</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Topics <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_topic.php">View Topics </a></li>
                      <li><a href="add_topic.php">Add Topics </a></li>
                      
                    </ul>
                  </li>
                 
				   <li><a><i class="fa fa-desktop"></i> SubTopic <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_subtopic.php">Add Subtopic</a></li>
                      <li><a href="view_subtopic.php">view Subtopic</a></li>
                     
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Questions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_question.php">View Questions</a></li>
					  <li><a href="add_question.php">Add Questions</a></li>
					   <li><a href="upload_question.php">Upload Questions File</a></li>
                    </ul>
                  </li>
				   <li><a><i class="fa fa-table"></i> Videos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_videos.php">View Videos</a></li>
					  <li><a href="add_videos.php">Add Videos</a></li>
                    </ul>
                  </li>
				   <li><a><i class="fa fa-table"></i> Basics <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_basics.php">View Basics</a></li>
					  <li><a href="upload_basics.php">Upload Basics</a></li>
                    </ul>
                  </li>
                  
                  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Online Test</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i>Category<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_cat.php">Add Category</a></li>
                      <li><a href="view_cat.php">View Category</a></li>
                      
                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Heading <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="view_test_heading.php">View Test Headeing</a></li>
                      <li><a href="add_test_heading.php">Add Test Heading</a></li>
                    </ul>
                  </li>
				  
				   <li><a><i class="fa fa-laptop"></i> Test Name <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_test_name.php">Add Test</a></li>
                      <li><a href="view_test_name.php">View Test</a></li>
                    </ul>
                  </li>
                                    
                  <li><a href="upload_test_question.php"><i class="fa fa-laptop"></i>s </a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
		 <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>			