<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgot password
  </title>
  <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
  <div class="log-container">
  <a class="button"href="index.php">back</a>
    <div class="box-login"  id='box-login'>
      <img src="./img/Logo2.png" alt="logo" class="logo">
      <div class="line"></div>
      <form action=""   method="post">
        <h5>RESET YOUR PASSWORD</h5>
       <input type="text" placeholder ="Enter existing username" name="name" ><br>
       <input type="text" placeholder="Enter new password" name="pass"><br>
       <button type="submit" name="log">RESET</button><br>
    </div>
  </form>
    </div>
  </div>
  <?php
  include('config.php');
  if(isset($_POST['log'])){
    $name = $_POST['name'];

    $sql="SELECT name from users WHERE name = '$name'";
    $result = mysqli_query($connect,$sql);

    if (mysqli_num_rows($result) === 1) {

      $row = mysqli_fetch_assoc($result);
      if ($row['name'] === $name){
          $pass = $_POST['pass'];
          $sql2 = "UPDATE users set password = '$pass' where name = '$name'";
          $quey = mysqli_query($connect,$sql2);
          header('location:index.php');
      }
    }else{
      echo "sorry who?";
    
    }}
  ?>
</body>
</html>