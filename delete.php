<?php
include_once("config.php");
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
}
$id = $_GET['id'];
$nama= $_GET['nama'];
$jumlah= $_GET['jumlah'];
$sql = "UPDATE barang set stok = stok+:jumbar where nama_brg = :nambar";
$sql2 = "DELETE FROM data_pinjam WHERE nama_pinjam = :id";
      $smt2 = $db->prepare($sql2);
      $stmt = $db->prepare($sql);
      $params2 = array(
        ":id" => $id,
      );
      $params = array(
      ":nambar" => $nama,
      ":jumbar" => $jumlah,
      );
      $saved = $stmt->execute($params);
      $smt2->execute($params2);
      header("location:pinjaman.php");
   
# ambil id data dari url menggunakan method GET
// $id = $_GET['id'];
// $nama= $_GET['nama'];
// $jumlah= $_GET['jumlah'];
// # delete user data
// $res = mysqli_query($connect, "UPDATE barang set stok = stok+$jumlah where nama_brg = '$nama'");
// $result = mysqli_query($connect, "DELETE FROM data_pinjam WHERE nama_injam = '$id'");
// header('location:databarang.php');