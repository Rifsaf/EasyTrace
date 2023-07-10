<!--PHP CODE-->
<?php
?>

<!--HTML CODE-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/login&registrasi.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>
<body>
  <div class="log-container">
    <div class="box-login">
      <img src="./img/Logo2.png" alt="logo" class="logo">
      <div class="line"></div>
      <form action="cek_login.php"   method="post">
        <label for="name"  id="label">Username</label> <br>
       <input type="text" placeholder ="Enter username" name="name" ><br>
       <label for="pass" id="label">Password </label><br>
       <input type="password" placeholder ="Enter username" name="pass" ><br>
       <a href="forpas.php" id="forpass">Forgot password?</a><br>
       <button type="submit" name="log">LOGIN</button><br>
       <a href="registrasi.php" id="regis">Register</a><br>
  </form>
    </div>
  </div>
</body>
</html>