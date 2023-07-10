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
      $saved2 = $stmt2->execute($params2);
      header('location:pinjaman.php');
      exit;
      }};
      };
    ?>