<?php
#untuk memulai session
session_start();
if($_SESSION['status'] = 'login'){
  #untuk mengambil jumlah data di dashboard
include('config.php');
#jenis barang
$result4 = $connect->query("SELECT COUNT(*) FROM jenis");
$row = $result4->fetch_row();
#data user
$result = $connect->query("SELECT COUNT(*) FROM users");
$row1 = $result->fetch_row();
#data barang
$results = $connect->query("SELECT COUNT(*) FROM barang");
$row2 = $results->fetch_row();
#data interval dan data barang keluar
$result3 = $connect->query("SELECT COUNT(*) FROM data_pinjam");
$row3 = $result3->fetch_row();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/5084fa024d.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/Dashboard.css">
  <script type="text/javascript" src="./js/script.js"></script>
  <title>Dashboard</title>
</head>
<body>

  <!--header-->
  <div class="header">
    <div class="logo">
      <img src="./img/Logo2.png" alt="">
    </div>
    <div class="page-name">
      <h4><i class="fa-solid fa-house-chimney"></i>Dashboard</h4>
    </div>
  </div>


<!--Sidebar-->
  <div class="header stack-header">
    <div class="ava-name">
      <div class="ava">
        <img src="./img/cat.png"alt="">
      </div>
      <div class="name">
      <span style='padding:10px;'><?php echo $_SESSION['name'];?><span style='padding:0;'><b>Administrator</b></Span></span>
      </div>
    </div>

    <!--Sidebar button-->
    <div class="btn" style="width: 100%;">
      <button onclick="location.href='dashboard.php'"><i class="fa-solid fa-house-chimney"></i>Dashboard</button>
      <button onclick="location.href='databarang.php'"><i class="fa-solid fa-box"></i>Data Barang</button>
      <button onclick="location.href='pinjaman.php'"><i class="fa-solid fa-box-open"></i>Data Peminjaman</button>
      <button onclick="myfunction()" class="dropdwon">Transaksi</button>
       <div id="dpbtn" class="dropdown">
        <a href="barangkeluar.php">Barang Keluar</a>
       </div>
       <button onclick="location.href='catalog.html'">Catalog</button>
       <button onclick="location.href='logout.php'">logout</button>
    </div>

  </div>

<!--Content box atas-->
  <div id="main" class="ha">
    <!--ATAS-->
    <div class="ha top">
      <div class="data-top">
        <div class="icon"><img src="./img/box.png" alt=""></div>
        <div class="icon-des">
          <span>Data Barang <?php echo '<span>'.$row2[0].'</span>'?></span>
          <!--PAKE PHP BUAT AMBIL DATA PAKE COUNT--->
        </div>
      </div>
      <div class="data-top">
        <div class="icon"><img src="./img/direct-inbox.png" alt=""></div>
        <div class="icon-des">
          <span> Data Barang Masuk  <?php echo '<span>'.$row2[0].'</span>' ?></span>
          <!--PAKE PHP BUAT AMBIL DATA PAKE COUNT-->
        </div>
      </div>
      <div class="data-top">
        <div class="icon"><img src="./img/direct-send.png" alt=""></div>
        <div class="icon-des">
          <span>Data Barang Keluar<?php echo '<span>'.$row3[0].'</span>'?></span>
          <!--PAKE PHP BUAT AMBIL DATA PAKE COUNT-->
        </div>
      </div>
    </div>

     <!-- konten 3 box tengah-->
    <div class="ha middle">
      <div class="con barang">
        <div class="icon"><img src="./img/Group 26.png" alt=""></div>
        <div class="icon-des">
          <span>Data Jenis Barang<?php echo '<span>'.$row[0].'</span>'?></span>
          <!--PAKE PHP BUAT AMBIL DATA PAKE COUNT--->
        </div>
      </div>
      <div class="con data ">
        <div class="icon"><img src="./img/Group 27.png" alt=""></div>
        <div class="icon-des">
          <span>Data Interval<?php echo '<span>'.$row3[0].'</span>'?></span>
          <!--PAKE PHP BUAT AMBIL DATA PAKE COUNT--->
        </div>
      </div>
      <div class="con user">
        <div class="icon"><img src="./img/Group 29.png" alt=""></div>
        <div class="icon-des">
          <span>Data User<?php echo '<span>'.$row1[0].'</span>'?></span>
          <!--PAKE PHP BUAT AMBIL DATA BARANG KELUAR PAKE COUNT-->
        </div>
      </div>
    </div>

     <!--Tabel/welcome-->
     <div class="ha bottom">
      <div class="bot">
             <div class="bot-pic">
        <img src="./img/Sign up-amico 1.png" alt="">
      </div>
      <div class="bot-content">
        <H4>WELCOME BACK</H4>
      </div>
      </div>
  </div>
</body>
</html>
<?php
}else{
  echo'belom login';
}
?>
