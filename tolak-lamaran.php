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

    <h1 class="display-4 text-center">Sedang Mencoba Menolak Lamaran</h1>

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
}

// jika tidak mendapatkan data id
if (!isset($_GET["id"])){
  echo "
    <script>
      Swal.fire('Halaman Tidak Memproses','Halaman Tidak Menerima Inputan Data Lamaran','warning').then(function(){
        window.location = 'data-pelamar.php';
      });
    </script>
  ";
}

// jika id lamaran tidak ada di db
if (mysqli_num_rows($lamaran) == 1){
  echo "
    <script>
      Swal.fire('Halaman Tidak Memproses','Halaman Tidak Menerima Inputan Data Lamaran','warning').then(function(){
        window.location = 'data-pelamar.php';
      });
    </script>
  ";
}

mysqli_query($db,"UPDATE lamaran SET status = 'Ditolak' where id = $idLamaran");
if (mysqli_affected_rows($db) == 1){
  echo "
    <script>
      Swal.fire('Data Lamaran Ditolak','','success').then(function(){
        window.location = 'data-pelamar.php';
      });
    </script>
  ";
}


?>