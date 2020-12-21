<?php 

// panggil koneksi db
require "db.php";
// panggil file functions.php
require "functions.php";
// aktifkan session
session_start();

$id = $_GET["id"];
$lamaran = mysqli_query($db, "SELECT * FROM lamaran where id = $id");
$lamaran = mysqli_fetch_assoc($lamaran);

$idPelamar = $lamaran["idPelamar"];
$pelamar = mysqli_fetch_assoc(mysqli_query($db,"SELECT * from pelamar where id = $idPelamar"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Panggilan</title>
    <?php require "headtags.php" ?>
</head>
<body>
    <?php require "navbar.php" ?>
    <div class="col-md-6 offset-md-3 card shadow-lg mt-5">
        <div class="card-header text-center">
            <h3>Surat Panggilan</h3>
        </div>
        <div class="card-body p-5">
            <?= $lamaran["pesanPerusahaan"] ?>
        </div>
    </div>
    <?php require "footer.php" ?>
</body>
</html>

<?php

if (!isset($_SESSION["pelamar"])){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','Anda Tidak Dizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}else if ($pelamar["email"] != $_SESSION["pelamar"]){
    echo "
        <script>
            Swal.fire('AKSES DITOLAK','Anda Tidak Dizinkan Untuk Mengakses Halaman Ini','warning').then(function(){
                window.location = 'index.php';
            });
        </script>
    ";
}


?>