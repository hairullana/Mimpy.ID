<?php

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

$id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "headtags.php" ?>
</head>
<body>
    <!-- navbar -->
    <?php require "navbar.php" ?>

    <!-- body -->
    <div class="row mt-5">
      <div class="col text-center">
        <h3>Sedang Mencoba Menghapus Data Pelamar</h3>
      </div>
    </div>

    <!-- footer -->
    <?php require "footer.php" ?>
</body>
</html>

<?php

if (!isset($_SESSION["admin"])){
  echo "
    <script>
      Swal.fire('Akses Ditolak !','Maaf Anda Tidak Dapat Mengakses Halaman Ini','warning').then(function(){
          window.location = 'index.php';
      });
    </script>
  ";
}else if (($_GET["id"]) == NULL){
  echo "
    <script>
      Swal.fire('Halaman Error !','Halaman Tidak Menerima Informasi Pelamar','error').then(function(){
          window.location = 'data-pelamar.php';
      });
    </script>
  ";
}else {
  mysqli_query($db,"DELETE from pelamar where id = $id");
  if (mysqli_affected_rows($db) == 1){
    echo "
      <script>
        Swal.fire('Data Pelamar Berhasil Di Hapus !','','success').then(function(){
            window.location = 'data-pelamar.php';
        });
      </script>
    ";
  }else {
    echo "
      <script>
        Swal.fire('Data Pelamar Gagal Di Hapus !','','error').then(function(){
            window.location = 'data-pelamar.php';
        });
      </script>
    ";
  }
}



?>