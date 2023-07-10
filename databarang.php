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
  <link rel="stylesheet" href="./css/header&sidebar.css">
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
        <h4><i class="fa-solid fa-box"></i>Data Barang</h4>
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
            <!-- <input type="text" name="jenisbrg" id=""> -->
            <select name="jenisbrg" id="cars">
                <option value="Alat ringan">Alat ringan</option>
                <option value="Alat berat">Alat berat</option>
                <option value="Alat keselamatan">Alat keselamatan</option>
            </select>
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
        </div>
        <button id="myBtn" onclick="cliked()">Tambah</button>
        <Table width="100%" class="tb-data" cellspacing="0">
          <tr>
          <th>No</th>
          <th>ID</th>
          <th>Nama Barang</th>
          <th>Jenis Barang</th>
          <th>Stok</th>
          </tr>
          <?php
          include_once("config.php");
          $sql= "SELECT barang.id_barang, barang.nama_brg,barang.stok, jenis.jenis_brg
          FROM barang
          INNER JOIN jenis ON barang.id_jenis = jenis.id_jenis;";
          $result = mysqli_query($connect,$sql);
          while($databarang = mysqli_fetch_array($result)){
            global $no;
            $no = $no+1;
            echo "<tr>";
            echo "<td>". $no."</td>";
            echo "<td>". $databarang['id_barang']."</td>";
            echo "<td>". $databarang['nama_brg']."</td>";
            echo "<td>". $databarang['jenis_brg']."</td>";
            echo "<td>". $databarang['stok']."</td>";
            echo "</tr>";
          }
          ?>

        </Table>
      </div>
    </div>
  </body>
  </html>
  <?php
  if(isset($_POST['modal-btn'])){
      $id = $_POST['id'];
      $nambar = $_POST['namabrg'];
      $jenbar = $_POST['jenisbrg'];
      $jumbar = $_POST['jumlah'];
      if (($id=='') || ($nambar=='') || ($jenbar=='') || ($jumbar=='')){
        echo "<script>alert('data belum terisi')</script>";
      }else{
       include('config.php');
       if ($jenbar == "Alat keselamatan"){
        $sql = "INSERT INTO barang (id_barang,nama_brg,stok,id_jenis) VALUE('$id','$nambar','$jumbar',3)";
        $result = mysqli_query($connect,$sql); 
        header('location:databarang.php');
        exit;
       }elseif($jenbar == "Alat berat"){
        $sql2 = "INSERT INTO barang (id_barang,nama_brg,stok,id_jenis) VALUE('$id','$nambar','$jumbar',1)";
        $result = mysqli_query($connect,$sql2);
        header('location:databarang.php');
       }elseif($jenbar == "Alat ringan"){
        $sql3 = "INSERT INTO barang (id_barang,nama_brg,stok,id_jenis) VALUE('$id','$nambar','$jumbar',2)";
        $result = mysqli_query($connect,$sql3);
        header('location:databarang.php');
      }
       }
      
      }?>
</body>
</html>