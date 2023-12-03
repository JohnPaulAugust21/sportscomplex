

<?php 
	include_once('config.php');//database
	$db = new Database();

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$password = md5($password);

		$sql = 'SELECT * FROM members WHERE username = ? AND password = ?';
		$result = $db->getRow($sql, [$username, $password]);
		//echo print_r($result);

		if($result){
			$r = $result['userType'];

			if($r == '1'){
				$_SESSION['logged'] = '1';
				header('location: admin/index.php');
			}else{
				$_SESSION['logged'] = '2';

				$_SESSION['memberID'] = $result['memberID'];

				header('location: members/index.php');
			}
		}//if true

	}//end if isset log in
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

	<style 

	type="text/css">
		.navbar { margin-bottom:0px !important; }
		.carousel-caption { margin-top:0px !important }


	</style>

<!-- <style>
body {
  background-image: url('img/1.jpg');
  
}


/* .background-image{
	filter: blur(0px);
} */
</style> -->

	<body>
		
<br />
<br />
<br />
<br />
<br />
<br />

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title" style= "text-align: center">SIGN IN</h3>
					</div>
					<div class="panel-body">
						 <form action="" method="post">
							
							 	<div class="form-group">
							    <label for="inputdefault">Username*</label>
							    <input class="form-control" name="username" type="text" placeholder = "Username" required autofocus
							    value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>"
							    >
								
							  </div>

							   <div class="form-group">
							    <label for="inputdefault">Password*</label>
							    <input class="form-control" name="password" type="password" placeholder = "Password" required>
							  </div>

							  <button class="btn btn-info" type="submit" style="text-align: center; width: 380px;height: 40px" name="login">
							  	Log in
							  	<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
							  </button>
							        <br><p style= "text-align: center"><br>Don't have an account?  <a href="register.php">Sign up</a></p>
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