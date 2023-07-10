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
  <link rel="stylesheet" href="./css/modal.css">
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
      <h4><i class="fa-solid fa-box"></i>Data Barang Masuk</h4>
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
        <a href="barangmasuk.php">Barang Masuk</a>
        <a href="barangkeluar.php">Barang Keluar</a>
       </div>
       <button onclick="location.href='catalog.html'">Catalog</button>
       <button onclick="location.href='logout.php'">logout</button>
    </div>
  </div>

  <!--MODAL FORM-->
  <div id="mymodal"class="modal">
    <div class="modal-content">
      <div class="head">
        <h3>FORM INPUT BARANG</h3>
      </div>
      <div class="form-container">
        <form action="" id="form-f" method="post">
          <div class="form">
            <label for="">id Barang :</label>
            <input type="text" name="id" id="">
          </div>
          <div class="form">
            <label for="">Nama Barang :</label>
            <input type="text" name="namabrg" id="">
          </div>
          <div class="form">
            <label for="">Jenis Barang :</label>
            <input type="text" name="jenisbrg" id="">
          </div>
          <div class="form">
            <label for="">Jumlah Barang :</label>
            <input type="text" name="jumlah" id="">
          </div>
          <button id="modalbtn" name='modal-btn'>Simpan</button>
          </form>
      </div>
    </div>
  </div>
  <!--End of modal-->
    <!--tabel-->
    <div id="main" class="ha">
      <div class="ha bottom">
        <div class="show-len">
          <button id="myBtn" onclick="cliked()">Tambah</button>
          <p id="check"></p>
        </div>
        <Table width="100%"class="tb-data" cellspacing="0">
          <tr>
          <th>Nama Barang</th>
          <th>Jenis Barang</th>
          <th>Stok</th>
          <?php
          if(isset($_POST['modal-btn'])){
            $id = $_POST['id'];
            $nambar = $_POST['namabrg'];
            $jenbar = $_POST['jenisbrg'];
            $jumbar = $_POST['jumlah'];
          }
          ?>
          </tr>
        </Table>
      </div>
    </div>

  </body>
  </html>
  <?php
  // $db_host = "localhost";
  // $db_user = "root";
  // $db_pass = "";
  // $db_name = "et";
  
  // try {    
  //     //create PDO connection 
  //     $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
  // } catch(PDOException $e) {
  //     //show error
  //     die("Terjadi masalah: " . $e->getMessage());
  // }
    if(isset($_POST['modal-btn'])){
      $id = $_POST['id'];
      $nambar = $_POST['namabrg'];
      $jenbar = $_POST['jenisbrg'];
      $jumbar = $_POST['jumlah'];
      if (($id=='') || ($nambar=='') || ($jenbar=='') || ($jumbar=='')){
        echo 'pls fill it fully';
      }else{
       include('config.php');
       if ($jenbar == "Alat keselamatan"){
        $sql = "INSERT INTO barang (id_barang,nama_brg,stok,id_jenis) VALUE('$id','$nambar','$jumbar',3)";
        $result = mysqli_query($connect,$sql);
        header('location:barangmasuk.php');
        echo "<script>alert('added')</script>";  
       }elseif($jenbar == "Alat berat"){
        $sql2 = "INSERT INTO barang (id_barang,nama_brg,stok,id_jenis) VALUE('$id','$nambar','$jumbar',1)";
        $result = mysqli_query($connect,$sql2);
        echo "<script>alert('Added')</script>";  
       }elseif($jenbar == "Alat ringan"){
        $sql3 = "INSERT INTO barang (id_barang,nama_brg,stok,id_jenis) VALUE('$id','$nambar','$jumbar',2)";
        $result = mysqli_query($connect,$sql3);
        echo "<script>alert('added')</script>";  
      }
       }
      
      }?>
</body>
</html>