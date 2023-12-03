<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sports Complex Management System</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.css">
		<link rel="shortcut icon" href="img/sports-logo.png" type="image/x-icon" />
	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>



	<body>

		<!-- begin whole content -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img src="img/sports-logo.png" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Times New Roman; font-size: 20px;">Sports Complex Management System</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<!-- <li class="active">
								<a href="index.php">Home</a>
							</li> -->
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
							<li>
								<a href="login.php"> Sign In
									<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
								</a>
							</li>

							<li>
								<?php include_once('goto-registration.php'); ?>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->
		<div class="row">
			<div id="carousel-id" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-id" data-slide-to="0" class=""></li>
					<li data-target="#carousel-id" data-slide-to="1" class=""></li>
					<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<center>
						<img src="img/1.jpg" style="height: 500px; width: 100%;  filter: blur(0px);">
						</center>
						<div class="container">
							<div class="carousel-caption">
								<h1 style="color: #FFFFFF">SPORTS COMPLEX MANAGEMENT SYSTEM</h1>
								<p style="color: #FFFFFF;"> Managing things in the best way.</p>
								
							</div>
						</div>
					</div>
					<div class="item">
						<img src="img/1.jpg" style="height: 500px; width: 100%;  filter: blur(0px);">
						<div class="container">
							<div class="carousel-caption">
								<h1 style="color: #FFFFFF">SPORTS COMPLEX MANAGEMENT SYSTEM</h1>
								<p style="color: #FFFFFF"> Managing things in the best way.</p>
								
							</div>
						</div>
					</div>
					<div class="item active">
						<img src="img/1.jpg" style="height: 500px; width: 100%;  filter: blur(0px);">
						<div class="container">
							<div class="carousel-caption">
								<h1 style="color: #FFFFFF">SPORTS COMPLEX MANAGEMENT SYSTEM</h1>
								<p style="color: #FFFFFF"> Managing things in the best way.</p>
								
								
							</div>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>

		<br />
		<div class="row container-fluid">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><center>Overview</center></h3>
					</div>
					<div class="panel-body">
						<p align="justify">Sports Complex Management System is an application that will provide a database for sports facilities that utilize their amenities and services. 

						The application allows the user to organize their operations efficiently and is designed to be cost and user-friendly. 
						Features include booking, scheduling of facilities, equipment and staff rentals, billing, and financial management. 
						
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><center>Target Users</center></h3>
					</div>
					<div class="panel-body">
					<p align="justify">The target users of the project are schools with a variety of sports facilities that are prepared to be rented for professional and public use. 
						The project will be beneficial for documenting events and storing details of a competition. 
						Occupants will have their data protected and secured with the system. 
						Data gathered will be used for analytics allowing the schools to track their performance. 
</p>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title"><center>Benefits</center></h3>
					</div>
					<div class="panel-body">
					<p align="justify">The implementation of a management system at a sports complex helps process credentials for players, officials, and other participants in a sporting event efficiently and without encountering unwanted delays. 
						This will ensure that sporting events function well and that each person's data is held and secured because of the database that is present.</p>

					</div>
				</div>
			</div>
		</div>
 		
 		<p>
 			<center>
 			
 			</center>
 		</p>
		
		<footer style="background-color: white;">
			<!-- <center>
				&copy; All rights reserved
			</center> -->
		</footer>

 		<script src="bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="bootstrap/js/dataTables.js"></script>
 		<script src="bootstrap/js/dataTables2.js"></script>
 		<script src="bootstrap/js/bootstrap.js"></script>

	</body>
</html>