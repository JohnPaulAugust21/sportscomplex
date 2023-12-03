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
							<li>
								<a href="reservation.php">Reservation</a>
							</li>

                            <li class="active">
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
		<?php 
				//para delete
				if(isset($_GET['delid']))
					{
						$equipmentID = $_GET['delid'];
						$sql = "DELETE FROM equipments WHERE equipmentID = ? ";
						$res = $db->deleteRow($sql,[$equipmentID]);

						$equipmentImage = $_GET['equipmentImage'];
						if($equipmentImage != '../venueImage/'.'default.png'){
							unlink($equipmentImage);
						}
						//header('Location: index.php'$venueImage.'.jpg'
					}
			?>


		 <div class="container">
			<a href="equipment_create.php" class="btn btn-success">
				Add Equipment
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
			</a>
			<br />
			<br />

		 	 <table id="myTable" class="table table-striped" >  
				<thead>
					<th>EQUIPMENT NAME</th>
					<th>EQUIPMENT TYPE</th>
		
					<th><center>EQUIPMENT IMAGE</center></th>
					<th>RENTAL FEE</th>
					<th>ACTION</th>
				</thead>
				<tbody>
					<?php 

						$sql = "SELECT * FROM equipments ORDER BY equipmentName";
						$res = $db->getRows($sql);
						foreach ($res as $row) {
							$equipmentID = $row['equipmentID'];
							$equipmentName = $row['equipmentName'];
							$equipmentType = $row['equipmentType'];
							//$bon = $row['b_on'];

							$equipmentImage = $row['equipmentImage'];
							$equipmentRentalFee = $row['equipmentRentalFee'];
						

					?>
					<tr>
						<td class="align-img"><?php echo $equipmentName; ?></td>
						<td class="align-img"><?php echo $equipmentType; ?></td>
				
						<td class="align-img"><center><img src="<?php echo $equipmentImage; ?>" width="50" height="50"></center></td>
						<td class="align-img"><?php echo 'Php '.number_format($equipmentRentalFee, 2); ?></td>
						<td class="align-img">
							<a class = "btn btn-success btn-xs" href="equipment_update.php?editid=<?php echo $equipmentID; ?>">
								Edit
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
							<a class = "btn btn-danger  btn-xs" href="equipindex.php?delid=<?php echo $equipmentID; ?>&venueImage=<?php echo $equipmentImage; ?>">
								Delete
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</a>
						</td>
					</tr>
					<?php } ?>

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


</html>



<?php 
$db->Disconnect();
?>