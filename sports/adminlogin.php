<?php 
	require("config.php");

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sports Complex Management System</title> 
</head>




<body>
	<div class="login-form">
		<h1>ADMIN LOGIN PANEL</h1>
		<form>
			<div class="input-field">
				<i class="fa-solid fa-user"></i>
				<input type="text" name="adminUsername" placeholder="Admin Name">
			</div>


			<div class="input-field">
				<i class="fa-solid fa-user"></i>
				<input type="password" name="adminPassword" placeholder="Password">
			</div>


			<button type="submit" name="login"> Log In</button>
		</form>

	</div>

<?php 
if(isset($_POST['login']))
{
	$query= "SELECT * FROM `logins` WHERE `username` = '$_POST[adminUsername]' AND `password` = '$_POST[adminPassword]'";
	$result = mysql_query($conn,$query);
	if(mysql_num_rows($result)==1)
	{

		session_start();
		$_SESSION['loginID']=$_POST['adminUsername'];
		header("location: adminpanel.php");
	}
	else
	{
		echo "<script>alert('Incorrect Password');</script>";
	}


}


?>


</body>



</html>