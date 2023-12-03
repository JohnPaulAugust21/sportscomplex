<?php

include 'config.php';

if(isset($_POST['submit'])){

   $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
   $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
   $province = mysqli_real_escape_string($conn, $_POST['province']);
   $country = mysqli_real_escape_string($conn, $_POST['country']);
   $contactNum = mysqli_real_escape_string($conn, $_POST['contactNum']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
      $age = mysqli_real_escape_string($conn, $_POST['age']);
         $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `members` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `members`(firstName, lastName, province, country, contactNum, email, password, age, birthday, image) VALUES('$firstName', '$lastName','$province', '$country','$contactNum',
            '$email', '$pass', '$age', '$birthday','$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign Up</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Sign Up</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="lastName" placeholder="Last Name" class="box" required>
      <input type="text" name="firstName" placeholder="First Name" class="box" required>
      <input type="text" name="province" placeholder="Province" class="box" required>
      <input type="text" name="country" placeholder="Country" class="box" required>
      <input type="text" name="contactNum" placeholder="Contact Number" class="box" required>
      <input type="number" name="age" placeholder="Age" class="box" required>
      <input type="date" name="birthday" placeholder="Birthday" class="box" required>
      <input type="email" name="email" placeholder="Email" class="box" required>
      <input type="password" name="password" placeholder="Password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>

      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Sign Up" class="btn">
      <p>Have an account already? <a href="login.php">Log in</a></p>
   </form>

</div>

</body>
</html>