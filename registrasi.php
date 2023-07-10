<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registrasi</title>
  <link rel="stylesheet" href="./css/login&registrasi.css"> <!--file css-->
  <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon"> <!--untuk logo di tab-->
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'> <!--untuk font-->
</head>
<body>
  <div class="reg-container">
    <div class="logo-sgv">
      <img src="./img/Logo2.png" alt="logo2" class="logo2">
      <img src="./img/Sign up-amico 1.png" alt="" class="logo2" style="width: 80% !important;">
    </div>
    <!--form register-->
    <div class="details">
    <form action="" method="post">
    <input type="text" name="name" placeholder ="Enter Name"  ><br><br>
      <input type="text" name="id" placeholder ="Enter ID Pegawai"  ><br><br>
      <input type="password" name="pass" placeholder ="Enter Password" ><br><br>
      <input type="password" name="conpass"placeholder ="Confirm password"  ><br>
      <Button type="submit" name="log">Register</Button><br>
      <p>sudah punya akun?<a href="index.php"> Login</a></p>
    </form>
    </div>
  </div>
  <?php

include("config.php");
#untuk memasukan data kedalam database
if (isset($_POST['log'])){
  $name = $_POST['name'];
  $idpg = $_POST['id'];
  $pass = $_POST['pass'];
  $conpass = $_POST['conpass'];

  if (($name=='') || ($pass=='') || ($idpg=='')){
    echo "<script>alert('Data belum terisi')</script>";
  }elseif($conpass !== $pass){
    echo "<script>alert('password not matched')</script>";  
  }else{
    $result = mysqli_query($connect, "INSERT INTO users (id_user,name,password) VALUE('$idpg','$name','$pass')");
    header('Location:index.php');
    exit;  
  }
};
?>
</body>
</html>