<?php 

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

// ambil id lamaran
$idLamaran = $_GET["id"];
$lamaran = mysqli_query($db,"SELECT * from lamaran where id = $idLamaran");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- headtags -->
  <?php require "headtags.php" ?>
  <title>Hapus Data Lamaran</title>
</head>
<body>
    <!-- navbar -->
    <?php require "navbar.php" ?>

    <h1 class="mt-5 display-4 text-center">Sedang Mencoba Menolak Lamaran</h1>

    <!-- footer -->
    <?php require "footer.php" ?>
</body>
</html>

<?php

// jika tidak login sbg perusahaan, tendang ke index
if (!isset($_SESSION["perusahaan"])){
  echo "
    <script>
      Swal.fire('Akses Ditolak','Maaf Anda Tidak Dapat Mengakses Halaman Ini','warning').then(function(){
        window.location = 'index.php';
      });
    </script>
  ";
}else if (isset($_GET["id"]) == NULL){ // jika tidak mendapatkan data id
  echo "
    <script>
      Swal.fire('Halaman Tidak Memproses','Halaman Tidak Menerima Inputan Data Lamaran','warning').then(function(){
        window.location = 'data-lamaran.php';
      });
    </script>
  ";
}else if (mysqli_num_rows($lamaran) == 0){ // jika id lamaran tidak ada di db
  echo "
    <script>
      Swal.fire('Halaman Tidak Memproses','ID Lamaran Tidak Ditemukan','warning').then(function(){
        window.location = 'data-lamaran.php';
      });
    </script>
  ";
}else {
  $lamaran = mysqli_fetch_assoc(mysqli_query($db,"SELECT loker.idPerusahaan as idPerusahaan from lamaran join loker on lamaran.idLoker = loker.id where lamaran.id = $idLamaran"));
  $idPerusahaanLoker = $lamaran["idPerusahaan"];

  $emailPerusahaan = $_SESSION["perusahaan"];
  $perusahaan = mysqli_fetch_assoc(mysqli_query($db, "SELECT * from perusahaan where email = '$email'"));
  $idPerusahaanLogin = $perusahaan["id"];

  
  // jika yg masuk bkn perusahaan yg punya loker
  if ($idPerusahaanLoker != $idPerusahaanLogin){
    echo "
      <script>
        Swal.fire('Akses Ditolak','Lamaran Ini Bukan Untuk Perusahaan Anda','warning').then(function(){
          window.location = 'data-lamaran.php';
        });
      </script>
    ";
  }else {
    mysqli_query($db,"UPDATE lamaran SET status = 'Ditolak' where id = $idLamaran");
    if (mysqli_affected_rows($db) == 1){
      echo "
        <script>
          Swal.fire('Data Lamaran Ditolak','','success').then(function(){
            window.location = 'data-lamaran.php';
          });
        </script>
      ";
    }
  }

}



?>