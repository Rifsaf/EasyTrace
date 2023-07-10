<?php 
session_start();
include_once("config.php");
$line= "SELECT * FROM data_pinjam";
$line2 = mysqli_query($connect,$line);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pinjaman</title>
  <link rel="shortcut icon" href="./img/logo2.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/header&sidebar.css">
  <link rel="stylesheet" href="./css/form.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://kit.fontawesome.com/5084fa024d.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>
</head>
<body>
   <!--header-->
   <div class="header">
    <div class="logo">
      <img src="./img/Logo2.png" alt="">
    </div>
    <div class="page-name">
      <h4><i class="fa-solid fa-house-chimney"></i>Data Pinjaman</h4>
    </div>
  </div>

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

    <div id="main" class="ha">
      <div class="ha top">
        <div class="input-form">
          <form action="" id="form-f" method="post">
            <div class="form">
              <label for="">Nama peminjam :</label>
              <input type="text" name="napin" id="napin">
            </div>
            <div class="form">
              <label for="">Nama barang :</label>
              <input type="text" name="nabar" id="nabar">
            </div>
            <div class="form">
              <label for="">Jumlah barang :</label>
              <input type="text" name="jumbar" id="jumbar">
            </div>
            <div class="form">
              <label for="">Tanggal pinjam :</label>
              <input type="date" name="tanggal" id="tanggal">
            </div>
            <button type="submit" name="submit" id="submit">Simpan</button>
          </form>
          
        </div>
      </div>
      <div class="ha bottom">
        <div class="tabel-con">
          <Table class="tb-data"width="100%" cellspacing="0">
            <tr>
            <th>Nama Peminjam</th>
            <th>Nama Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Jumlah barang</th>
            <th></th>
            </tr>
            <?php
            while ($datapin = mysqli_fetch_array($line2)){
            echo "<tr>";
            echo "<td>". $datapin['nama_pinjam']."</td>";
            echo "<td>". $datapin['nama_barang']."</td>";
            echo "<td>". $datapin['tanggal_pinjam']."</td>";
            echo "<td>". $datapin['jumlah_barang']."</td>";
            echo "<td><a href='delete.php?id=$datapin[nama_pinjam]&&nama=$datapin[nama_barang]&&jumlah=$datapin[jumlah_barang]'>Return</a></td>";
            echo "</tr>";
            }
            ?>
          </Table>
        </div>
      </div>
    </div>
    <?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "et";
    try {    
        //create PDO connection 
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    } catch(PDOException $e) {
        //show error
        die("Terjadi masalah: " . $e->getMessage());
    }?>
    <?php
    if (isset($_POST['submit'])){
      $pinjam = $_POST['napin'];
      $nambar = $_POST['nabar'];
      $jumbar = $_POST['jumbar'];
      $tanggal = $_POST['tanggal'];

      if(($pinjam=='') || ($nambar=='') || ($jumbar=='')|| ($tanggal=='')){

        echo "<script>alert('data belum terisi')</script>";

      }else{
      $sql = "INSERT INTO data_pinjam (id_pinjam,nama_pinjam, nama_barang, jumlah_barang, tanggal_pinjam) 
      VALUES ('',:peminjam, :nambar, :jumbar, :tanggal)";
      $stmt = $db->prepare($sql);

      $params = array(
      ":peminjam" => $pinjam,
      ":nambar" => $nambar,
      ":jumbar" => $jumbar,
      ":tanggal" => $tanggal,
      );
      $saved = $stmt->execute($params);

      if($saved){
      $sql2 = "UPDATE barang set stok = stok-:jumbar where nama_brg = :nambar"; 
      $stmt2 = $db->prepare($sql2);
      $params2 = array(
        ":jumbar" => $jumbar,
        ":nambar" => $nambar,
      );
      $done = $stmt2->execute($params2);
      header('location:pinjaman.php');
      }
      // if($done){
      // $q= $db->prepare("SELECT id_barang FROM barang WHERE nama_brg=?");
      // $q->execute([$nambar]);
      // $id = $q->fetchColumn();
      // $q2= $db->prepare("SELECT id_pinjam FROM data_pinjam WHERE tanggal_pinjam=?");
      // $q2->execute([$tanggal]);
      // $tanggal = $q->fetchColumn();
      // echo $tanggal;
      
      $sql4 = "INSERT INTO barang_klr(jumlah,tanggal_klr, id_pinjam, id_barang) 
      VALUES ('',:peminjam, :nambar, :jumbar, :tanggal)";
      }};
    ?>
</body>
</html>
<?php
// $db_host = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_name = "easytrace";

// try {    
//     //create PDO connection 
//     $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
// } catch(PDOException $e) {
//     //show error
//     die("Terjadi masalah: " . $e->getMessage());
// }?>
<?php
// eksekusi query untuk menyimpan ke database
  // if (isset($_POST['submit'])){
  //   $peminjam = $_POST['napin'];
  //   $nambar = $_POST['nabar'];
  //   $jumbar = $_POST['jumbar'];
  //   $tanggal = $_POST['tanggal'];

    // if ($pinjaman && $nambar && $jumbar && $tanggal == ''){
    //   echo "sorry ya need to fill the shit";
    // }else{

    //   $sql1= "SELECT id_barang from barang WHERE nama_brg = :nambar";
    //   $smt1 = $db->prepare($sql1);
    //   $params1 = array(
    //     ":nambar" => $nambar,
    //     );
    //   $id = $smt1->execute($params1);

      // $sql = "INSERT INTO data_pinjam (nama_pinjam, nama_barang, jumlah_barang, tanggal_pinjam, id_barang) 
      // VALUES (:peminjam, :nambar, :jumbar, :tanggal,1)"; 
    // $update = "UPDATE barang set jumlah_brg = jumlah_brg-:jumbar where nama_brg = :nambar";
    // $stmt = $db->prepare($sql);
    // $smt2 = $db->prepare($update);

    // $params = array(
    // ":peminjam" => $peminjam,
    // ":nambar" => $nambar,
    // ":jumbar" => $jumbar,
    // ":tanggal" => $tanggal,
    // );
    // $params2 = array(
    //   ":nambar" => $nambar,
    //   ":jumbar" => $jumbar,
    //   );
  

    // eksekusi query untuk menyimpan ke database
    // if  ($saved = $stmt->execute($params));{
    //   // $try = $smt2->execute($params2);
    // }

    // jika query simpan berhasil, maka user sudah terdaftar
    // // maka alihkan ke halaman login
    // if($saved) header("Location: pinjaman.php");


    // }
    // $last = "SELECT 'Id_pinjam' FROM 'data_pinjam' ORDER by 'Id_pinjam' DESC limit 1";
    // $db->prepare($last);
    // $id = $db + 1;
    // $idbrg = $db -> query("SELECT id_barang from barang where nama_brg = $nambar",PDO::FETCH_ASSOC);
    // echo $idbrg['id_barang'];

    // $sql = "INSERT INTO data_pinjam (nama_pinjam, nama_barang, jumlah_barang, tanggal_pinjam, id_barang) 
    // VALUES (:peminjam, :nambar, :jumbar, :tanggal,$idbrg)"; 
    // $update = "UPDATE barang set jumlah_brg = jumlah_brg-:jumbar where nama_brg = :nambar";
    // $stmt = $db->prepare($sql);
    // $smt2 = $db->prepare($update);

    // bind parameter ke query
    // $params = array(
    // ":peminjam" => $peminjam,
    // ":nambar" => $nambar,
    // ":jumbar" => $jumbar,
    // ":tanggal" => $tanggal
    // );
    // $params2 = array(
    //   ":nambar" => $nambar,
    //   ":jumbar" => $jumbar,
    //   );
  

    // eksekusi query untuk menyimpan ke database
    // $saved = $stmt->execute($params);
    // $try = $smt2->execute($params2);

    // jika query simpan berhasil, maka user sudah terdaftar
    // // maka alihkan ke halaman login
    // if($saved) header("Location: pinjaman.php");

  //   $result = mysqli_query($connect, "INSERT INTO data_peminjam_kedua VALUES('$peminjam','$nambar','$jumbar','$tanggal',1)");
    
  // header('Location: pinjaman.php');
  // exit;
  

  ?>