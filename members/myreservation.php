
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

			<?php
		// delete reserved
			if(isset($_GET['delr_id']))
				{
					$delrid = $_GET['delr_id'];
					$tid = $_SESSION['memberID'];

					$sql = "DELETE FROM reservations WHERE memberID = ? AND reservationID = ?";
					$res = $db->deleteRow($sql, [$tid, $delrid]);

						echo '
								<div class="alert alert-success">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>Cancel Reservation Successfully</strong> 
								</div>
							';
							//header('Location: myreservation.php');
				}
		 ?>

		 <br />
	
			<!-- <form method="post" action="search.php">
	<div>
		<label>Search using Date</label>
		<input type="date" name="date_from" value="<?php echo date('Y-m-d'); ?>"  />
	</div>
	<button type="submit" name="search">Search</button>
	</form> -->











		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th><center>VENUE IMAGE</center></th>
					<th>VENUE NAME</th>
					<th>RENTAL FEE</th>

					<th>DATE</th>
					<!-- <th>TIME</th> -->
					<th>RESERVATION BILLING</th>
					<th><center>ACTION</center></th>
				</thead>
				<tbody>
					<?php 
			$tid = $_SESSION['memberID'];
			$sql = "SELECT * FROM venues v INNER JOIN reservations r ON v.venueID = r.venueID
			INNER JOIN members m ON r.memberID = m.memberID
			WHERE m.memberID = ? ORDER BY schedDate, venueName";
			$res = $db->getRows($sql, [$tid]);
				

			// echo print_r($res);

			foreach ($res as  $r) {

				$r_id = $r['reservationID'];
				$img = $r['venueImage'];
				$bn = $r['venueName'];
				$bon = $r['venueType'];
				//$dstntn = $r['r_dstntn'];

				$rdate = $r['schedDate'];
				$rhr = $r['schedTime'];
				$rampm = $r['period'];

				$oras = $rhr.' '.$rampm;
				$fee = 500;
				$venueRentalFee = $r['venueRentalFee'];
				$bill = $venueRentalFee + $fee; 
		?>
					<tr>
						<td class="align-img"><center><img src="<?php echo $img; ?>" width="50" height="50"></center></td>





						<td class="align-img"><?php echo $bn; ?></td>
						<!-- <td class="align-img"><?php echo $bon; ?></td> -->
						<td class="align-img"><?php echo 'Php '.number_format($venueRentalFee, 2); ?></td>
						<!-- <td class="align-img"><?php echo $rdate; ?></td> -->


						<td class="align-img"><?php echo date("M d, Y ", strtotime ($r['schedDate'])); ?></td>
						<!-- <td class="align-img"><?php echo $oras; ?></td> -->
						<td class="align-img"><?php echo 'Php '.number_format($bill, 2); ?></td>
						
						
						<td class="align-img">
							<a class = "btn btn-danger  btn-xs" href="myreservation.php?delr_id=<?php echo $r_id; ?>">
								Cancel
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</a>
						</td>
						<!-- <td class="align-img">
						<button type="submit" id="approve_button" class="btn btn-danger">Pending
</button> -->

						</td> 
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
    <link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.css">
	<!--searh box positioning-->
    <script src="../bootstrap/js/jquery.dataTables2.js"></script>






</html>



<?php 
$db->Disconnect();
?>