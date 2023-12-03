<?php 
	include_once('../config.php');
	$db = new Database();
?>


<?php 
			// // $fee  = 500;
			// $fee    =500;
			// $stmt = $mysqli->prepare("SELECT venueRentalFee FROM venues");
			// $stmt->execute();
			// $array = [];
			// foreach ($stmt->get_result() as $row)
			// {
			// 	$_POST[] = $row['venueRentalFee'];
			// }
			// print_r($_POST);
	if(isset($_POST['bid']))
		{

			

			$bid	= $_POST['bid'];
			$tid	= $_POST['tid'];
			$dt 	= $_POST['dstntn'];
			$date 	= $_POST['rdate'];
			$hr 	= $_POST['hr'];
			$ampm 	= $_POST['ampm'];
			// $venueRentalFee = $_POST['venueRentalFee'];
			// $fee  = $_POST['reservationFee'];
			// $bill  = ((int)$fee +(int)$venueRentalFee);
			if(!$dt){
				echo '
					<div class="alert alert-danger">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong> It is required.</strong>
					</div>
				';
			}
			else if(!$date){
				echo '
					<div class="alert alert-danger">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong> Date is Required.</strong>
					</div>
				';
			}
				else
					{
						 $sql = "SELECT COUNT(schedDate) as rdt FROM reservations WHERE venueID = ? AND schedDate = ?";
						 $res  = $db->getRow($sql, [$bid, $date]);
					

						if($res['rdt'] > 2)
							{
								echo '
										<div class="alert alert-danger">
										  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										  <strong>The reservation of this venue is already in limit.</strong> 
										</div>
									';

							}
						else
							{
								// $venueRentalFee = $_POST['venueRentalFee'];
								// AND r.venueRentalFee = ? AND r.reservationBilling = ?
								// $venueRental, $bill 
								$sql = 'SELECT * FROM reservations WHERE venueID = ? AND schedDate = ? AND schedTime = ? AND period = ? ';
								$res = $db->getRows($sql, [$bid, $date, $hr, $ampm ]);
								// echo print_r($res);
								// AND reservationFee = ? AND reservationBilling = ? 
								// , $fee , $bill
								if($res)
								
							
									{
										foreach ($res as $r)
											{
												$rbid = $r['venueID'];
												$rd = $r['schedDate'];
												$rh = $r['schedTime'];
												$rampm = $r['period'];
												// $rfee = $r['reservationFee'];
												// $rbill = $r['reservationBilling'];
												// $rvenueRentalFee = $r['venueRentalFee'];
												// $current_date = time(); // Get the current Unix timestamp
												// $target_date = strtotime('2023-02-22');
												//AND ($current_date >= $target_date)
												if(($rd == $date) AND ($rh == $hr) AND ($rampm == $ampm) AND ($rbid == $bid))
													{
														// AND ($rfee == $fee) AND ($rbill == $bill)
														echo '
																<div class="alert alert-danger">
																  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																  <strong>Invalid. Date unavailable</strong> 
																</div>
															';
													}
											}
									}
									else
										{
											
											// $fee  = 500;
											// $venueRentalFee 	= $_POST['venueRentalFee'];
											// $bill  = ((int)$fee +(int)$venueRental);
										
											// venueRentalFee, reservationBilling
											// $venueRental, $bill 
											// $venueRentalFee = $_POST['venueRentalFee'];
											// $bill  = ((int)$fee +(int)$venueRentalFee);
											$sql = " INSERT INTO reservations(schedTime, period, venueID, memberID, schedDate)
											VALUES (?,?,?,?,?) ";

// , reservationFee, reservationBilling
// ,?,?
// ,$fee ,$bill
											$res = $db->insertRow($sql, [$hr, $ampm, $bid, $tid, $date]);
											// $sql = " INSERT INTO venues(venueRentalFee)
											// VALUES (?) ";
											// $res = $db->insertRow($sql, [$venueRental]);
											echo '
													<div class="alert alert-success">
													  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													  <strong>Reserved Successfully</strong>
													</div>
												';
										}
							}
					}
		}

?>