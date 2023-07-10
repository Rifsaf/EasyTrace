<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/5084fa024d.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/header&sidebar.css">
  <script type="text/javascript" src="./js/script.js"></script>
  <title>Data Barang</title>
</head>
<body>
     <!--header-->
     <div class="header">
      <div class="logo">
        <img src="./img/Logo2.png" alt="">
      </div>
      <div class="page-name">
        <h4><i class="fa-solid fa-box"></i>Data Barang Keluar</h4>
      </div>
    </div>

    <!--side bar-->
    <div class="header stack-header">
      <div class="ava-name">
        <div class="ava">
          <img src="./img/cat.png"alt="">
        </div>
        <div class="name">
        <span style='padding:10px;'><?php echo $_SESSION['name'];?><span style='padding:0;'><b>Administrator</b></Span></span>
        </div>
      </div>
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

    <!--tabel-->
    <div id="main" class="ha">
      <div class="ha bottom">
        <div class="show-len">
        </div>
        <Table width="100%"class="tb-data" cellspacing="0">
          <tr>
          <th>Nama Barang</th>
          <th>Stok</th>
            <?php
            include('config.php');
            $sql = "SELECT * from data_pinjam";
            $result = mysqli_query($connect,$sql);

          while($datapin = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>". $datapin['nama_barang']."</td>";
            echo "<td>". $datapin['jumlah_barang']."</td>";
            echo "</tr>";
          }
          ?>
          </tr>
        </Table>
      </div>
    </div>
  </body>
  </html>
</body>
</html>