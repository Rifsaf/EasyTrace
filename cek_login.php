<?php
include('config.php');
$name = $_POST['name'];
$pass = $_POST['pass'];

if(($name=='')||($pass=='')){
  header("Location:index.php?error=User Name is required");
}else{
$login = mysqli_query($connect,"SELECT * from users where name = '$name' and password = '$pass'");
$cek = mysqli_num_rows($login);

if ($cek > 0 ){
  session_start();
  $_SESSION['name'] = $name;
  $_SESSION['status'] = 'login';
  header('location:dashboard.php');
}else{
  header('location:index.php');
}
}
?>