<?php 
include_once('config.php');
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
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.css">
		<link rel="shortcut icon" href="img/sports-logo.png" type="image/x-icon" />
	</head>

	<style type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }
	</style>

<style>
.error {color: #FF0000;}
</style>




	<body>
<br />
 		<div class="row">
 			<div class="col-md-4"></div>
 			<div class="col-md-4">
 				<?php 
						if(isset($_POST['submit'])){
							

							$lastName = $_POST['lastName'];
							$firstName = $_POST['firstName'];
							$middleName = $_POST['middleName'];
							$address = $_POST['address'];
							$contactNum =  $_POST['contactNum'];
							$username =  $_POST['username'];
							$pass1 = $_POST['pass1'];
							$pass2 = $_POST['pass2'];

							if($pass1 != $pass2){
								echo '
									<div class="alert alert-danger">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									  <strong>Error!</strong> Password not match.
									</div>
								';
							}else//end if
							{

								$pass = md5($pass1);
								$sql = '
									INSERT INTO members(firstName,  lastName, middleName, address, contactNum, username, password, userType)
									VALUES(?,?,?,?,?,?,?, 2);
								';

								$result = $db->insertRow($sql, [$firstName, $lastName, $middleName, $address, $contactNum, $username, $pass]);
								if($result){
									header('location: login.php');
								}

							}

						

						}
					 ?>
 				<div class="panel panel-info">
				  <div class="panel-heading" style= "text-align: center">SIGN UP</div>
					  <div class="panel-body">
						 <form action="" method="post">


						 	<div class="form-group">
							 	 <label for="lastName">Last Name*</label>
							 	 <input type="text" class="form-control" name="lastName" id="lastName" placeholder = "Last Name"
							 	 value="<?php if(isset($lastName)){echo $lastName;} ?>"
							 	 required autofocus>
							</div>	

						 	<div class="form-group">
							 	 <label for="firstName">First Name*</label>
							 	 <input type="text" class="form-control" name="firstName" id="firstName" placeholder = "First Name"
							 	 value="<?php if(isset($firstName)){echo $firstName;} ?>"
							 	 required >
							</div>

							<div class="form-group">
							 	 <label for="middleName">Middle Name</label>
							 	 <input type="text" class="form-control" name="middleName" id="middleName" placeholder = "Middle Name"
							 	 value="<?php if(isset($middleName)){echo $middleName;} ?>">
							</div>



							<div class="form-group">
							 	 <label for="address">Address*</label>
							 	 <input type="text" class="form-control" name="address" id="address" placeholder = "Address"
							 	 value="<?php if(isset($address)){echo $address;} ?>"
							 	 required>
							</div>	


							<div class="form-group">
							 	 <label for="contactNum">Contact Number*</label>
							 	 <input type="text" class="form-control" name="contactNum" id="contactNum" placeholder = "Contact Number"
							 	  value="<?php if(isset($contactNum)){echo $contactNum;} ?>"
							 	 required>
							</div>

							<div class="form-group">
							 	 <label for="username">Username*</label>
							 	 <input type="text" class="form-control" name="username" id="username" placeholder = "Username"
							 	  value="<?php if(isset($username)){echo $username;} ?>"
							 	 required>
							</div>	

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									 	 <label for="pass1">Password*</label>
									 	 <input type="password" class="form-control" name="pass1" id="pass1" placeholder = "Password" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									 	 <label for="pass2">Confirm Password*</label>
									 	 <input type="password" class="form-control" name="pass2" id="pass2" placeholder = "Confirm Password" required>
									</div>
								</div>
							</div>	
							

							<button type="submit" style="text-align: center; width: 376px;height: 40px; "name="submit" class="btn btn-info">
								Sign in
								<span class="glyphicon glyphicon-check"></span>
							</button>	
	
							 <p style= "text-align: center"> <br>Have an account already? <a href="login.php">Log in</a></p>				 
						 </form> 	
					  </div>
				</div>
 			</div>
 			<div class="col-md-4"></div>
 		</div>

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