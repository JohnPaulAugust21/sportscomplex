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

	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>

	<body>

		<br />
		<br />
		<br />
		
	
			

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
							<li class="active">
								<a href="index.php">Venues</a>
							</li>
							<li>
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

		
		<!-- main cntent -->
		<div class="container-fluid">

			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a href="index.php" class="btn btn-success">
					Back
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				</a>
			<br />
			<br />

			

				<form action = "" method = "POST" enctype="multipart/form-data">
						<?php 
							//vie3w boat
							if(isset($_GET['editid']))
								{
									$editid = $_GET['editid'];

									$sql = "SELECT * FROM venues WHERE venueID = ?";
									$res = $db->getRow($sql, [$editid]);
									$venueName =  $res['venueName'];
									//$bon =  $res['b_on'];
									$venueType =  $res['venueType'];
									$venueRentalFee =  $res['venueRentalFee'];
									$getoldbimg = $res['venueImage'];
								
								 }

								 //update boat

								 if(isset($_POST['updateboat']))
								 	{
								 		$editid = $_POST['editid'];

								 		$venueName = $_POST['venueName'];
								 		//$bon = $_POST['bON'];
								 		$venueType = $_POST['venueType'];
								 		$venueRentalFee = $_POST['venueRentalFee'];
								 		$oldbimg = $_POST['oldbimg'];

								 		
										// $venueRentalFee = null;
										// if($venueType == '15 Persons'){
										// 	$venueRentalFee = 3000;
										// }else if($venueType == '25 Persons'){
										// 	$venueRentalFee = 3500;
										// }else{
										// 	$venueRentalFee = 4000;
										// }//end if else of venueType price


								 		//select old photo to delete in folder
								 		// echo print_r($bimg);


										$new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . uniqid() . '.jpg';
										// do some checks to make sure the file you have is an image and if you can trust it
										move_uploaded_file($_FILES["bimg"]["tmp_name"], "../venueImage/".$new_image_name);
										$new_image_name = '../venueImage/'.$new_image_name;

										if(empty($_FILES["bimg"]["tmp_name"])){
											$sql = "UPDATE venues SET venueName = ?, venueType = ?,  venueRentalFee = ? WHERE venueID = ?";
								 			$res = $db->updateRow($sql, [$venueName, $venueType, $venueRentalFee, $editid]);
										}else{
								 			$sql = "UPDATE venues SET venueName = ?, venueType = ?,  venueImage = ?, venueRentalFee = ? WHERE venueID = ?";
								 			$res = $db->updateRow($sql, [$venueName, $venueType,$new_image_name, $venueRentalFee, $editid]);
								 			if($oldbimg != '../venueImage/default.jpg'){
								 				unlink($oldbimg);
								 			}
										}


							 			echo '
							 				<div class="alert alert-success">
											  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											  <strong>Updated Successfully</strong> 
											</div>
							 			';
								 	}//end if isset updateboat
						?>

					   <div class="form-group">
					    <label for="inputdefault">Venue Name:</label>
					    <input class="form-control" id="inputdefault"  name="editid" type="hidden" value ="<?php echo $editid; ?>">
					    <input class="form-control" id="inputdefault"  name="venueName" type="text" value ="<?php echo $venueName; ?>">
					  </div>

					<!--   <div class="form-group">
					    <label for="inputdefault">Boat Operator Name:</label>
					    <input class="form-control" id="inputdefault" name="bON" type="text" value ="<?php echo $bon; ?>">
					  </div> -->

					    <div class="form-group">
					    <label for="inputdefault">Venue Type:</label>
					    <input class="form-control" id="inputdefault"  name="editid" type="hidden" value ="<?php echo $editid; ?>">
					    <input class="form-control" id="inputdefault"  name="venueType" type="text" value ="<?php echo $venueType; ?>">
					  </div>


					   <div class="form-group">
					    <label for="inputdefault">Rental Fee:</label>
					    <input class="form-control" id="inputdefault"  name="editid" type="hidden" value ="<?php echo $editid; ?>">
					    <input class="form-control" id="inputdefault"  name="venueRentalFee" type="text" value ="<?php echo $venueRentalFee; ?>">
					  </div>



					  <input type="hidden" name="oldbimg" value="<?php echo $getoldbimg; ?>">

					   <div class="form-group">
				    	  <label for="inputdefault">Venue Image:</label>
					      <input class="form-control" id="inputdefault" name="bimg" type="file">
					    </div>

					  <button class="btn btn-info" name = "updateboat">
					  		Update
					  		<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
					  </button>
				</form>	
			</div>
			<div class="col-md-3"></div>
		</div>
		<!-- main cntent -->



 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

	</body>
</html>