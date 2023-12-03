<?php 
include_once('../config.php');
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
						<img src="../img/sports-logo.png" height="50" width="50"> &nbsp;
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" style="font-family: Times New Roman; font-size: 20px;">Venue Reservation</a></li>
						</ul>

						<ul class="nav navbar-nav" style="font-family: Times New Roman;">
							<li class="active">
								<a href="index.php">Venues</a>
							</li>
							<li>
								<a href="myreservation.php">Reservation</a>
							</li>
							<li>
								<a href="equipIndex.php">Equipments</a>
							</li>
														<li>
								<a href="myrental.php">Rental</a>
							</li>
							<li>
								<a href="report.php">Report</a>
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

		<div id ="info"  ></div>
<!-- begin content -->
	<div class="container-fluid">
			
		<div class="panel panel-info">
		  <div class="panel-heading"><strong>Venues Available</strong> (To view the details, click on the image.)</div>
		  <div class="panel-body">
		  		<?php 
		  			$sql = 'SELECT * FROM venues ORDER by venueName';
		  		 	$res = $db->getRows($sql);
		  		 	//echo print_r($res);
		  		 	if($res){
		  		 		foreach ($res as $r) {
		  		 			$venueID = $r['venueID'];
	  		 				$venueName = $r['venueName'];
	  		 				$venueType = $r['venueType'];
	  		 				//$bON = $r['b_on'];
	  		 				$venueImage = $r['venueImage'];
	  		 				$venueRentalFee = $r['venueRentalFee'];
							  // $reservationFee = $r['reservationFee'];

	  		 	?>	
	  		 		<a href="#"  data-toggle="modal" data-target="#myModal<?php echo $venueID; ?>">
						<img class="img-rounded" src="<?php echo $venueImage; ?>" height="210" width="305">
	  		 		</a>
 					<!-- Modal -->
						<div id="myModal<?php echo $venueID; ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						      </div>
						      <div class="modal-body">
						      		<div class="row">
						      			<div class="col-md-6">
						      				<img src="<?php echo $venueImage; ?>" height="250" width="250">
						      			</div>
						      			<div class="col-md-6">
						      				<form>
						      					<strong>Venue Name: </strong><?php echo $venueName; ?><br /><br>
							      				<strong>Venue Type: </strong><?php echo $venueType; ?><br /><br>
												
							      				<strong>Rental Fee: </strong><?php echo 'Php '.number_format($venueRentalFee, 2); ?><br /><br>
												  <strong>Reservation Fee: </strong><?php echo 'Php 500.00'; ?><br /><br>
							      				<!-- <strong>Operator Name: </strong><?php 
							      				//echo $bON; ?> <br />
							      				<strong>Destination: </strong> <br /> -->
							      			<!-- 	<input type = "text" id="dstntn<?php echo $venueID; ?>" >
							      				<br /> -->
										   		<strong>Date: </strong>&nbsp;
							      				<br /> 
										    	<input class="btn-default" id="rdate<?php echo $venueID; ?>" size="30" name="rdate" type="date" autocomplete="off">
										    	<br /><br>
										    	<strong>Time: </strong>
										    	<br />
										    	<select class="btn-default" id="hr">
										    		<?php 
										    			$x = 12;
										    			for($time = 1; $time <= $x; $time++){
										    		?>
										    			<option value="<?php echo $time; ?>"><?php echo $time; ?></option>
										    		<?php
										    			}//end fpr
										    		 ?>
										    	</select>
										    	<select class="btn-default" id="ampm">
										    		<option value="AM">AM</option>
										    		<option value="PM">PM</option>
										    	</select>
						      				</form>
					      				
						      			</div>
						      		</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">
						        	Close
						        	<span class="glyphicon glyphicon-remove-sign"></span>
						        </button>
						        <input type="submit" value="Reserve" onclick="bogkot('<?php echo $venueID; ?>')" class="btn btn-success" data-dismiss="modal">
						      </div>
						    </div>

						  </div>
						</div>

						<!-- modal END -->
	  		 	<?php
		  		 		}//end foreacyh of select all venues
		  		 	}//
		  		 ?>
		  </div>
		</div>

	</div>
<!-- end content -->
	<script type="text/javascript">
		function boat(str){
			// alert(str);
		}
	</script>

 		<script src="../bootstrap/js/jquery-1.11.1.min.js"></script>
 		<script src="../bootstrap/js/dataTables.js"></script>
 		<script src="../bootstrap/js/dataTables2.js"></script>
 		<script src="../bootstrap/js/bootstrap.js"></script>

	</body>
</html>


<script type="text/javascript">

function bogkot(str){

	var dstntn = $('#dstntn'+str).val();

	var bid = str;
	var tid = '<?php echo $_SESSION['memberID']; ?>';
	var dstntn = $('#dstntn'+str).val();
	var rdate = $('#rdate'+str).val();
	var hr = $('#hr').val();
	var ampm = $('#ampm').val();
	// var fee = $('#reservationFee').val();
	// var venueRentalFee = $('#venueRentalFee').val();
	// var bill = fee + parseInt(venueRentalFee);
	// +"&fee="+fee+"&venueRentalFee="+venueRentalFee+"&bill="+bill
	var datas = "bid="+bid+"&tid="+tid+"&dstntn="+dstntn+"&rdate="+rdate+"&hr="+hr+"&ampm="+ampm;
	// +"&bill="+bill+"&venueRental="+venueRental
	$.ajax({
		   type: "POST",
		   url: "reservedprocess.php",
		   data: datas
		}).done(function( data ) {
		  $('#info').html(data);
		});

}

// alert("outside");
// .
// $('#bogkot').click(function(){
// 		alert("ni gana");
// });

</script>