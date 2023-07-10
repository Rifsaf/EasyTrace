


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="stylesheet" href="./css/stylesheet.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
  <div class="log-container">
    <div class="box-login">
      <img src="./img/Logo2.png" alt="logo" class="logo">
      <div class="line"></div>
      <form action=""   method="post">
       <label for="name"  id="label">Username</label> <br>
       <input type="text" placeholder ="Enter username" name="name" ><br>
       <label for="pass" id="label">Password </label><br>
       <input type="text" placeholder="Enter password" name="pass"><br>
       <a href="#" id="forpass">forgot password?</a><br>
       <BUtton name="log">LOGIN</BUtton><br>
       <a href="#" id="regis">Register</a><br>
  </form>
    </div>
  </div>
</body>
</html>
<?php
 include("config.php");
 if (isset($_POST["log"])){
  $name = $_POST["name"];
  $pass = $_POST["pass"];

 }
?>


