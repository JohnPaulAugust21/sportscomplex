
<?php 

	//include_once('../config.php');//database
	//$db = new Database();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_sportscomplex (1)";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
?>

<!DOCTYPE html>
<html lang="">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sports Complex Management System</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/jquery.dataTables.css">

		 <!--pagination-->
	    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
	    <script src="../bootstrap/	js/jquery.dataTables2.js"></script>
	    <link rel="shortcut icon" href="img/sports-logo.png" type="image/x-icon" />

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }

		td.align-img {
			line-height: 3 !important;
		}
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
						<img src="../img/sports-logo.png" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Times New Roman; font-size: 20px;">Venue Reservation</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li>
								<a href="index.php">Venues</a>
							</li>
							<li  class="active">
								<a href="myreservation.php">Reservation</a>
							</li>
								<li>
								<a href="equipIndex.php">Equipments</a>
							</li>
																					<li>
								<a href="myrental.php">Rental</a>
							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right" style="font-family: Times New Roman;">
							<li>
								<?php include_once('../includes/logout.php'); ?>
							</li>
						
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		<!-- end -->

		<br />
		<br />
		<br />
		<br />
		
		<!-- main cntent -->
		
		
 <div class="container">
			
			<br />
			<br />

			

		 <br />
		 <form method="post" action="search.php">
   <div>
      <label>Date From</label>
      <input type="date" name="date_from" value="<?php echo (isset ($_POST['date_from'])) ? $_POST['date_from']: ''; ?>" />
   </div>
   <button type="submit" name="search">Search</button>
</form>




		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th><center>RESERVED DATES</center></th>
					<th>VENUE NAME</th>
					<th>VENUE TYPE</th>

					<th>DATE</th>
					<!-- <th>TIME</th> -->
					<!-- <th>RENTAL FEE</th>
					<th><center>ACTION</center></th> -->
				</thead>
				<tbody>



				<?php
      //include ('database.php');
	  


	  $sql = "SELECT * FROM reservations JOIN venues ON venues.venueID=reservations.venueID";
	  
	  // Execute the SQL statement
	  $stmt = $conn->prepare($sql);
	  $stmt->execute();
	  
	  // Fetch all results as an associative array
	  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  
	  // Loop through the results and display them
	  foreach ($results as $row) {

		
		
		  //echo $row['schedDate'] . "<br>";
		  $r_id = $row['reservationID'];
				$img = $row['venueImage'];
				$bn = $row['venueName'];
				$bon = $row['venueType'];
	  }
	  
	  ?>
	  
     
      
<tr>
						<td class="align-img"><center><img src="<?php echo $img; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo $bn; ?></td>
						<td class="align-img"><?php echo $bon; ?></td>
		
						<!-- <td class="align-img"><?php //echo $rdate; ?></td> -->


						<td class="align-img"><?php echo date("M d, Y ", strtotime ($row['schedDate'])); ?></td>
						<!-- <td class="align-img"><?php //echo $oras; ?></td> -->
						<!-- <td class="align-img"><?php // echo 'Php '.number_format($bprice, 2); ?></td>
						<td class="align-img">
							<a class = "btn btn-danger  btn-xs" href="myreservation.php?delr_id=<?php //echo $r_id; ?>">
								Cancel
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> -->
							</a>
						</td>
					</tr>





					
   <?php		?>
					






					<?php
			//end foreach loop of display all resevdbation


		?>



				</tbody>
			</table>

		 </div>

			
		<!-- main cntent -->

	</body>
 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>
 		    <!--pagination-->
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>


    <script>
//script for pagination
// $(document).ready(function(){
//     $('#myTable').dataTable();
// });
    </script>


		
		<!-- main cntent -->

	</body>
 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>
 		    <!--pagination-->
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
	<!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>






</html>



<?php 
//$db->Disconnect();
?>