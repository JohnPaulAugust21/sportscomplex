<?php 

	include_once('../config.php');//database
	$db = new Database();

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
							<li><a href="#" style="font-family: Times New Roman; font-size: 20px;">Admin - Sports Complex</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li>
								<a href="index.php">Venues</a>
							</li>
							<li  class="active">
								<a href="reservation.php">Reservation</a>
							</li>
							<li>
								<a href="equipindex.php">Equipments</a>
							</li>
							<li>
								<a href="rental.php">Rental</a>
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
		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>MEMBER</th>
					<th>CONTACT NUMBER</th>
					<th>ADDRESS</th>
					<th><center>IMAGE</center></th>
					<th>VENUE NAME</th>
<!-- 					<th>OPERATOR NAME</th> -->
<!-- 					<th>DESTINATION</th> -->
					<th>SCHEDULE</th>
					<!-- <th>TIME</th> -->
					<th>RENTAL FEE</th>
				</thead>
				<tbody>
					<?php 
			$sql = "SELECT * FROM venues v INNER JOIN reservations r ON v.venueID = r.venueID
			INNER JOIN members m ON r.memberID = m.memberID ORDER BY schedDate, venueName
			";
			$res = $db->getRows($sql);

			// echo print_r($res);

			foreach ($res as  $r) {

				$reservationID = $r['reservationID'];
				$firstName = $r['firstName'];
				$middleName = $r['middleName'];
				$lastName = $r['lastName'];
				$contactNum = $r['contactNum'];
				$address = $r['address'];
				$venueImage = $r['venueImage'];
				$venueName = $r['venueName'];
				//$bon = $r['b_on'];
				//$dstntn = $r['r_dstntn'];
				$venueRentalFee = $r['venueRentalFee'];
				$schedDate = $r['schedDate'];
				// $schedTime = $r['schedTime'];
				// $rampm = $r['r_ampm'];

				// $oras = $rhr.' '.$rampm;
		?>
					<tr>
						<td class="align-img"><?php echo $firstName.' '.$middleName.' '.$lastName; ?></td>
						<td class="align-img"><?php echo $contactNum; ?></td>
						<td class="align-img"><?php echo $address; ?></td>
						<td class="align-img"><center><img src="<?php echo $venueImage; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo $venueName; ?></td>

						<td class="align-img"><?php echo date("M d, Y ", strtotime ($r['schedDate'])); ?></td>
						<!-- <td class="align-img"><?php echo $schedTime; ?></td> -->
						<td class="align-img"><?php echo 'Php '.number_format($venueRentalFee, 2); ?></td>
					</tr>
					<?php
			}//end foreach loop of display all resevdbation


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
$(document).ready(function(){
    $('#myTable').dataTable();
});
    </script>


		
		<!-- main cntent -->

	</body>
 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>
 		    <!--pagination-->
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css"><!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>






</html>



<?php 
$db->Disconnect();
?>